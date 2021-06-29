<template>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="min-height: 100vh;padding:100px 0px;">
            <div class="col-md-6 col-12 col-sm-12">
                <form class="js-validate form-signin" action="/register-customer" method="post">

                    <slot name="any-errors"></slot>
                    <slot name="csrf"></slot>
                    <div id="signin" data-target-group="idForm">
                        <!-- Title -->
                        <header class="text-center mb-5">
                            <img src="/assets/img/logo.png" alt="Logo" style="width: 100px;">
                            <h2 class="h4 mb-0">Please sign up as Customer</h2>
                            <p>And after SignIn to manage your account.</p>
                        </header>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form signUpForm1-radio">
                                        <input type="radio" name="type" class="suf1-radio" id="radioBox01"
                                               value="individual"
                                               v-model="userType" checked>
                                        <label for="radioBox01">You are an individual</label>
                                        <input type="radio" name="type" class="suf1-radio" id="radioBox02"
                                               v-model="userType"
                                               value="professional">
                                        <label for="radioBox02">You are a professional</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Input -->
                                <div class="js-form-message mb-3" v-if="userType==='professional'">
                                    <div class="js-focus-state form">
                                        <input type="text" class="form-control form__input" name="company_name"
                                               placeholder="Name of your company" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                                <!-- Input -->
                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="email" class="form-control form__input" name="email"
                                               placeholder="Email"
                                               required>
                                        <slot name="error-email"></slot>
                                    </div>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="email" class="form-control form__input" name="email_confirmation"
                                               placeholder="Confirm email" required>
                                        <slot name="error-email"></slot>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="password" class="form-control form__input" name="password"
                                               placeholder="Your password" required>
                                        <slot name="error-password"></slot>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6">

                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="password" class="form-control form__input"
                                               name="password_confirmation"
                                               placeholder="Confirm your password" required>
                                        <slot name="error-password"></slot>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="tel" v-mask="'+ ### ### #######'" class="form-control form__input"
                                               name="telephone_number_1" placeholder="Your phone" required>
                                        <slot name="error-phone"></slot>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="js-form-message mb-3">
                                    <div class="js-focus-state form">
                                        <input type="tel" v-mask="'+ ### ### #######'" class="form-control form__input"
                                               name="telephone_number_2" placeholder="Your mobile number" required>
                                        <slot name="error-phone"></slot>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="js-form-message mb-3">
                        <div class="js-focus-state form">
                            <!-- Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                <input type="checkbox" class="custom-control-input" id="iAgree">
                                <label class="custom-control-label" for="iAgree">
                                    I agree to receive commercial offers from FretBay and its partners.
                                </label>
                            </div>
                            <!-- End Checkbox -->
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
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                userType: 0,
            }
        }
    }
</script>
