<template>

    <ValidationObserver v-slot="{invalid}" tag="form" @submit.prevent="register">
        <div class="js-validate">

            <input type="hidden" name="_token" :value="csrf">
            <div id="signup-customer" data-target-group="idForm">


                <div class="row">

                    <div class="col-12">


                        <input type="radio" name="type" class="suf1-radio" id="radioBox01"
                               value="individual"

                               v-model="userType" required>
                        <label for="radioBox01">You are an individual</label>


                    </div>
                    <div class="col-12">
                        <input type="radio" name="type" class="suf1-radio" id="radioBox02"
                               v-model="userType"
                               value="professional" required>
                        <label for="radioBox02">You are a professional</label>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- Input -->
                        <div class="js-form-message mb-3" v-if="userType==='professional'">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Account name" rules="required|alpha_num" v-slot="{ errors }">
                                    <input type="text" class="form-control form__input" name="company_name"
                                           v-model="new_user.company_name"
                                           placeholder="Account name" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="First name" rules="required|alpha|min:3" v-slot="{ errors }">
                                    <input type="text" class="form-control form__input" name="first_name"
                                           v-model="new_user.first_name"
                                           placeholder="First name" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Last name" rules="required|alpha|min:3" v-slot="{ errors }">
                                    <input type="text" class="form-control form__input" name="second_name"
                                           v-model="new_user.second_name"
                                           placeholder="Last name" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        <!-- Input -->
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Email" rules="required|email" vid="email" v-slot="{ errors }">
                                    <input type="email" class="form-control form__input" name="email"
                                           autocomplete="username"
                                           placeholder="Email" v-model="new_user.email" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                        <!-- End Input -->
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Confirm email" rules="required|email|confirmed:email" v-slot="{ errors }">
                                    <input type="email" class="form-control form__input" name="email_confirmation"
                                           autocomplete="username"
                                           placeholder="Confirm email" v-model="new_user.confirm_email" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>


                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Password" rules="required|min:6" vid="password"
                                                    v-slot="{ errors }">
                                    <input type="password" class="form-control form__input"
                                           autocomplete="new-password"
                                           name="password" placeholder="Password" required
                                           v-model="new_user.password">
                                    <p class="mb-0" style="color: red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6">

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Confirm password" rules="required|confirmed:password"
                                                    v-slot="{ errors }">
                                    <input type="password" class="form-control form__input" name="password_confirmation"
                                           autocomplete="current-password"
                                           placeholder="Confirm password" required v-model="new_user.confirm_password">
                                    <p class="mb-0" style="color: red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Phone number 1" rules="required" v-slot="{ errors }">
                                    <input type="tel" class="form-control form__input" v-mask="'+ ### ### #######'"
                                           name="telephone_number_1" v-model="new_user.telephone_number_1"
                                           placeholder="Telephone number" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Phone number 2" rules="required" v-slot="{ errors }">
                                    <input type="tel" class="form-control form__input" v-mask="'+ ### ### #######'"
                                           name="telephone_number_2" v-model="new_user.telephone_number_2"
                                           placeholder="Mobile number" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <!-- Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                    <input type="checkbox" class="custom-control-input"
                                           v-model="new_user.newsletter_notify" id="iAgree_customer" required>
                                    <label class="custom-control-label" for="iAgree_customer">
                                        I agree to receive commercial offers from AlloTrans and its partners.

                                    </label>
                                </div>
                                <!-- End Checkbox -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <!-- Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                    <input type="checkbox" class="custom-control-input" v-model="new_user.privacy_agree"
                                           id="iAgree_customer_Privacy" required>
                                    <label class="custom-control-label" for="iAgree_customer_Privacy">
                                        I <a href="/privacy">read ang agree</a> with a privacy police

                                    </label>
                                </div>
                                <!-- End Checkbox -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="js-form-message mb-3" v-if="error_message">
                    <div class="js-focus-state form">

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{error_message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>


                <div class="js-form-message mb-1">
                    <div class="js-focus-state form">
                        <button class="btn btn-primary w-100">
                            <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                                  aria-hidden="true"></span>
                            Register
                        </button>
                    </div>
                </div>

                <div class="js-form-message mb-3">
                    <div class="js-focus-state form">
                        <a class="btn btn-outline-primary w-100" href="/register-transporter">
                            I am a Transporter
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </ValidationObserver>

</template>
<script>
    export default {
        data() {
            return {
                error_message: null,
                loading: false,
                userType: 0,

                new_user: {
                    email: '',
                    confirm_email: '',
                    telephone_number_1: '',
                    telephone_number_2: '',
                    company_name: '',
                    first_name: '',
                    second_name: '',
                    password: '',
                    confirm_password: '',
                    newsletter_notify: false,
                    privacy_agree: false,
                },
            }
        },
        computed: {
            csrf: function () {
                return window.csrf;

            },

        },

        methods: {

            register() {
                this.error_message = null;
                this.loading = true;

                axios.post('/register-customer', this.new_user).then(resp => {
                    this.loading = false;
                    window.location = '/customer/profile'
                }).catch(error => {
                    this.error_message = 'Account already in System!';
                    this.loading = false;
                })
            }
        }
    }
</script>

<style lang="scss">
    .cursor-disabled {
        cursor: not-allowed;
    }
</style>

