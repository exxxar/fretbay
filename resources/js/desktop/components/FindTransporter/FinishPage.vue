<template>
    <div class="row w-100 m-auto align-items-center justify-content-center">
        <div class="col-12 col-sm-8">
            <ValidationObserver v-slot="{invalid}">
                <h3 class="mt-0 text-uppercase text-black content-box-title text-center">Your FretBay account</h3>
                <div class="row w-100 m-auto align-items-center justify-content-center" v-if="login_mode">
                    <div class="signUpForm1-inputs">
                        <ValidationProvider name="Email" rules="required|email" v-slot="{ errors }">
                            <input v-model="email" type="email" class="signUpForm1__input signUpForm1__input-first" name="email"  placeholder="Your email" >
                        </ValidationProvider>
                        <ValidationProvider name="Password" rules="required" v-slot="{ errors }">
                            <input v-model="password" type="password" class="signUpForm1__input" name="password"  placeholder="Your password">
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                    <div class="row w-100 m-auto">
                        <button class="btn btn-primary" @click="login" :disabled="invalid">Login</button>
                    </div>
                    <p @click="login_mode=false"> I do not have account yet</p>
                </div>
                <div class="row w-100 m-auto align-items-center justify-content-center" v-else>
                        <div class="signUpForm1-inputs">
                            <ValidationProvider name="Email" rules="required|email" v-slot="{ errors }">
                                <input v-model="email" type="email" class="signUpForm1__input signUpForm1__input-first" name="email"  placeholder="Your email" >
                            </ValidationProvider>
                            <ValidationProvider name="Username" rules="required" v-slot="{ errors }">
                                <input v-model="username" type="text" class="signUpForm1__input" name="name"  placeholder="Your Username">
                            </ValidationProvider>
                                <ValidationProvider name="Phone" rules="required" v-slot="{ errors }">
                            <input v-model="phone" type="tel" class="signUpForm1__input" v-mask="'+ ### ### #######'"  name="telephone_number_1"  placeholder="Your phone">
                                </ValidationProvider>
                            <ValidationProvider name="Password" rules="required" vid="password" v-slot="{ errors }">
                                <input v-model="password" type="password" class="signUpForm1__input" name="password"  placeholder="Your password">
                                <span>{{ errors[0] }}</span>
                            </ValidationProvider>
                            <ValidationProvider name="Password confirmation" rules="required|confirmed:password" v-slot="{ errors }">
                                <input v-model="password_confirmation" type="password" class="signUpForm1__input" name="password_confirmation"  placeholder="Confirm your password">
                                <span>{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <div class="row w-100 m-auto">
                            <button class="btn btn-primary" @click="register" :disabled="invalid">Register</button>
                        </div>
                        <p @click="login_mode=true"> I already have account</p>
                </div>
            </ValidationObserver>
        </div>
        <div class="col-12">
            <div class="row d-flex justify-content-end mt-2 w-100">
                <div class="col-12 col-sm-2">
                    <button class="btn btn-custom-danger" @click="prevStep(2)">Back</button>
                </div>
                <!--            <div class="col-12 col-sm-3">-->
                <!--                <button class="btn btn-custom-white" @click="nextStep">Finish</button>-->
                <!--            </div>-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FinishPage",
        data() {
            return {
                email:"",
                phone:"",
                username:"",
                password:"",
                password_confirmation:"",
                password_correct: false,
                email_correct: false,
                email_confirmation:"",

                login_mode: false,
            }
        },
        methods: {
            prevStep(step) {
                this.$store.dispatch('setStep', step)
            },
            nextStep() {

            },
            register() {
                window.location = '/profile-my-account'
            },
            login() {
                window.location = '/profile-my-account'
            }
        }
    }
</script>

<style scoped>

</style>
