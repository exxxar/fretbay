<template>
    <div class="container">
        <div class="row w-100 m-auto align-items-center justify-content-center">
            <div class="col-12" v-if="message">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-sm-8">
                <ValidationObserver v-slot="{invalid}">
                    <h3 class="mt-0 text-uppercase text-black content-box-title text-center">Your FretBay account</h3>
                    <div class="row w-100 m-auto align-items-center justify-content-center" v-if="login_mode">
                        <div class="col-12">
                            <ValidationProvider name="Email" rules="required|email" v-slot="{ errors }">
                                <input v-model="email" type="email" class="form-control mb-2"
                                       name="email" placeholder="Your email">
                            </ValidationProvider>
                            <ValidationProvider name="Password" rules="required" v-slot="{ errors }">
                                <input v-model="password" type="password" class="form-control mb-2" name="password"
                                       placeholder="Your password">
                                <span>{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <div class="row w-100 m-auto">
                            <button class="btn btn-primary" @click="login" :disabled="invalid">Login</button>
                        </div>
                        <butto class="btn btn-primary" @click="login_mode=false"> I do not have account yet</butto>
                    </div>
                    <div class="row w-100 m-auto align-items-center justify-content-center" v-else>
                        <div class="col-12">
                            <ValidationProvider name="Email" rules="required|email" v-slot="{ errors }">
                                <input v-model="email" type="email" class="form-control mb-2"
                                       name="email" placeholder="Your email">
                            </ValidationProvider>
                            <ValidationProvider name="Username" rules="required" v-slot="{ errors }">
                                <input v-model="username" type="text" class="form-control mb-2" name="name"
                                       placeholder="Your Username">
                            </ValidationProvider>
                            <ValidationProvider name="Phone" rules="required" v-slot="{ errors }">
                                <input v-model="phone" type="tel" class="form-control mb-2"
                                       v-mask="'+ ### ### #######'" name="telephone_number_1" placeholder="Your phone">
                            </ValidationProvider>
                            <ValidationProvider name="Password" rules="required" vid="password" v-slot="{ errors }">
                                <input v-model="password" type="password" class="form-control mb-2" name="password"
                                       placeholder="Your password">
                                <span>{{ errors[0] }}</span>
                            </ValidationProvider>
                            <ValidationProvider name="Password confirmation" rules="required|confirmed:password"
                                                v-slot="{ errors }">
                                <input v-model="password_confirmation" type="password" class="form-control mb-2"
                                       name="password_confirmation" placeholder="Confirm your password">
                                <span>{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <div class="row w-100 m-auto d-flex justify-content-center mb-2">
                            <button class="btn btn-primary" @click="register" :disabled="invalid">Register</button>
                        </div>
                        <button class="btn btn-outline-primary mt-2" @click="login_mode=true"> I already have account
                        </button>
                    </div>
                </ValidationObserver>
            </div>
            <div class="col-12">
                <div class="row d-flex justify-content-end mt-2 mb-2 w-100">
                    <div class="col-12 col-sm-4">
                        <button class="btn btn-outline-primary w-100" @click="prevStep(2)">Back</button>
                    </div>
                    <!--            <div class="col-12 col-sm-3">-->
                    <!--                <button class="btn btn-custom-white" @click="nextStep">Finish</button>-->
                    <!--            </div>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FinishPage",
        data() {
            return {
                message: null,
                email: "",
                phone: "",
                username: "",
                password: "",
                password_confirmation: "",
                password_correct: false,
                email_correct: false,
                email_confirmation: "",

                login_mode: false,
            }
        },
        computed: {
            listing() {
                return this.$store.getters.listing;
            },
            articles() {
                return this.$store.getters.articleCart;
            },
        },
        methods: {
            prevStep(step) {
                this.$store.dispatch('setStep', step)
            },
            nextStep() {

            },
            register() {
                let user = {
                    email: this.email,
                    phone: this.phone,
                    name: this.username,
                    password: this.password,
                };
                this.message = null;
                axios.post('/register-customer-with-listing', user).then(resp => {
                    this.$store.dispatch('editNewListing', {key: 'user_id', value: resp.data.user_id});
                    // this.$store.dispatch('editNewListing', {key:'articles', value:this.articles});

                    let formData = new FormData();
                    Object.keys(this.listing).forEach(key => {
                        if (key !== 'images' && key !== 'place_of_loading' && key !== 'place_of_delivery' && key !== 'articles') {
                            formData.append(key, this.listing[key]);
                        }
                    });
                    formData.append('place_of_loading', JSON.stringify(this.listing.place_of_loading));
                    formData.append('place_of_delivery', JSON.stringify(this.listing.place_of_delivery));
                    formData.append('articles', JSON.stringify(this.listing.articles));
                    for (let i = 0; i < this.listing.images.length; i++) {
                        formData.append('images[' + i + ']', this.listing.images[i]);
                    }
                    this.$store.dispatch('addListing', formData).then(resp => {
                        this.$store.commit('addListing', resp.data.listing)
                        window.location = '/customer/profile'
                    })
                }).catch(resp => {
                    this.message = "Error!"
                })
            },
            login() {
                let user = {
                    email: this.email,
                    password: this.password,
                };
                window.location = '/customer/profile'
            }
        }
    }
</script>

<style scoped>

</style>
