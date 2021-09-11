<template>
    <div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body p-5">


                    <form method="post" action="/login">

                        <input type="hidden" name="_token" :value="csrf">
                        <!-- Signin -->
                        <div v-if="!forgotPassword" data-target-group="idForm">
                            <!-- Title -->
                            <header class="text-center mb-5">
                                <h2 class="h4 mb-0">Please sign in</h2>
                                <p>Signin to manage your account.</p>
                            </header>
                            <!-- End Title -->


                            <!-- Input -->
                            <div class="js-form-message mb-3">
                                <div class="input-group form">
                                    <input type="email" class="form-control form__input" name="email" required=""
                                           placeholder="Email" aria-label="Email"
                                           data-msg="Please enter a valid email address." data-error-class="u-has-error"
                                           data-success-class="u-has-success">
                                </div>
                            </div>
                            <!-- End Input -->

                            <!-- Input -->
                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <input type="password" class="form-control form__input" name="password" required=""
                                           placeholder="Password" aria-label="Password"
                                           data-msg="Your password is invalid. Please try again."
                                           data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                            <!-- End Input -->

                            <div class="row mb-3">
                                <div class="col-6">
                                    <!-- Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="rememberMeCheckbox" >
                                        <label class="custom-control-label" for="rememberMeCheckbox">
                                            Remember Me
                                        </label>
                                    </div>
                                    <!-- End Checkbox -->
                                </div>

                                <div class="col-6 text-right">
                                    <a class="js-animation-link float-right" href="#" @click="forgotPassword = true"
                                       data-target="#forgotPassword" data-link-group="idForm"
                                       data-animation-in="fadeIn">Forgot Password?</a>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-block btn-primary">Signin</button>
                            </div>

                            <div class="text-center mb-3">
                                <p class="text-muted">
                                    Do not have an account?<br>
                                    <a class="js-animation-link" href="/register-customer">Signup
                                        as Customer</a> or <a class="js-animation-link" href="/register-transporter">Signup
                                    as Transporter </a>
                                </p>
                            </div>

                            <!-- Divider -->
                           <!-- <div class="text-center u-divider-wrapper my-3">
                                <span class="u-divider u-divider&#45;&#45;xs u-divider&#45;&#45;text">OR</span>
                            </div>-->
                            <!-- End Divider -->

                            <!-- Signin Social Buttons -->
                            <!--<div class="row mx-gutters-2 mb-4">
                                <div class="col-sm-6 mb-2 mb-sm-0">
                                    <a href="/social/facebook" class="btn btn-block btn-facebook text-nowrap">
                                        <i class="fab fa-facebook-f mr-2"></i>
                                        Signin with Facebook
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="/social/twitter" class="btn btn-block btn-twitter">
                                        <i class="fab fa-twitter mr-2"></i>
                                        Signin with Twitter
                                    </a>
                                </div>
                            </div>-->
                            <!-- End Signin Social Buttons -->
                        </div>
                        <!-- End Signin -->

                        <!-- Signup -->


                    </form>
                </div>

                <div id="forgotPassword" v-if="forgotPassword" data-target-group="idForm">

                    <header class="text-center mb-5">
                        <h2 class="h4 mb-0">Recover account</h2>
                        <p>Enter your email address and an email with instructions will be sent to you.</p>
                    </header>

                    <div class="js-form-message mb-3">
                        <div class="js-focus-state form">
                            <input type="email" class="form-control form__input" name="email" required=""
                                   placeholder="Email" aria-label="Email"
                                   data-msg="Please enter a valid email address." data-error-class="u-has-error"
                                   data-success-class="u-has-success">
                        </div>
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-block btn-primary">Recover Account</button>
                    </div>

                    <div class="text-center mb-3">
                        <p class="text-muted">
                            Have an account?
                            <a class="js-animation-link" href="#" @click="forgotPassword=false"
                               data-target="#signin" data-link-group="idForm" data-animation-in="fadeIn">Signin
                            </a>
                        </p>
                    </div>
                </div>

                <button type="button" class="close position-absolute-top-right-0 mt-4 mr-4" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">
                        <i class="svg-icon svg-icon-xs text-muted">
                        <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18">

                    </line>
                    </svg>
                    </i>
                    </span>
                </button>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                forgotPassword: false,
            }
        },
        computed: {
            csrf: function () {
                return window.csrf;

            }
        },
        methods: {
            hide() {
                $("#signIn").modal("hide")
            }
        }
    }
</script>
