<template>
    <div class="modal fade" id="signUp-customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body p-5">

                    <form class="js-validate" action="/register-customer" method="post">

                        <input type="hidden" name="token" :value="csrf">

                        <!-- Title -->
                        <header class="text-center mb-5">
                            <h2 class="h4 mb-0">Please sign up as Customer</h2>
                            <p>And after SignIn to manage your account.</p>
                        </header>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form signUpForm1-radio">
                                <input type="radio" name="type" class="suf1-radio" id="radioBox01"
                                       value="individual" v-model="userType" checked>
                                <label for="radioBox01">You are an individual</label>
                                <input type="radio" name="type" class="suf1-radio" id="radioBox02"
                                       v-model="userType" value="professional">
                                <label for="radioBox02">You are a professional</label>
                            </div>
                        </div>

                        <div class="row" v-if="userType==='professional'">
                            <div class="col-md-12 col-sm-12">
                                <!-- Input -->
                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="text" class="form-control form__input" name="company_name"
                                               placeholder="Name of your company" required>
                                    </div>
                                </div>
                                <!-- End Input -->
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <!-- Input -->
                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="email" class="form-control form__input" name="email"
                                               placeholder="Email" required>
                                    </div>
                                </div>
                                <!-- End Input -->

                            </div>
                            <div class="col-md-6 col-sm-12">

                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="email" class="form-control form__input" name="email_confirmation"
                                               placeholder="Confirm email" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-12">

                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="password" class="form-control form__input" name="password"
                                               placeholder="Your password" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-12">

                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="password" class="form-control form__input"
                                               name="password_confirmation"
                                               placeholder="Confirm your password" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="tel" v-mask="'+ ### ### #######'" class="form-control form__input"
                                               name="telephone_number_1" placeholder="Your phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="tel" v-mask="'+ ### ### #######'" class="form-control form__input"
                                               name="telephone_number_2" placeholder="Your mobile number" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <!-- Checkbox -->
                                        <div
                                            class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                            <input type="checkbox" class="custom-control-input" id="iAgree">
                                            <label class="custom-control-label" for="iAgree">
                                                I agree to receive commercial offers from FretBay and its partners.
                                            </label>
                                        </div>
                                        <!-- End Checkbox -->
                                    </div>

                                </div>
                            </div>

                        </div>


                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <button type="submit" class="btn btn-primary w-100">
                                    Register
                                </button>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="text-center u-divider-wrapper my-3">
                            <span class="u-divider u-divider--xs u-divider--text">OR</span>
                        </div>
                        <!-- End Divider -->

                        <!-- Signin Social Buttons -->
                        <div class="row mx-gutters-2 mb-4">
                            <div class="col-sm-6 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-block btn-facebook text-nowrap">
                                    <i class="fab fa-facebook-f mr-2"></i>
                                    Signin with Facebook
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-block btn-twitter">
                                    <i class="fab fa-twitter mr-2"></i>
                                    Signin with Twitter
                                </button>
                            </div>
                        </div>
                        <!-- End Signin Social Buttons -->

                    </form>
                </div>

                <button type="button" class="close position-absolute-top-right-0 mt-4 mr-4" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true"><i class="svg-icon svg-icon-xs text-muted"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18"
                                                                                                   y2="18"></line></svg></i></span>
                </button>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                userType: 0,
            }
        },
        computed: {
            csrf: function () {
                return window.csrf;

            }
        }
    }
</script>

