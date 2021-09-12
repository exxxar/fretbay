<template>
    <div class="container">
        <div class="row d-flex justify-content-center  mt-5" style="min-height: 90vh;">
            <div class="col-md-6 col-12 col-sm-12">

                <form method="POST" action="/login" v-if="!forgotPassword">

                    <slot name="csrf"></slot>
                    <!-- Signin -->
                    <div id="signin" data-target-group="idForm">
                        <!-- Title -->


                        <!-- End Title -->
                        <slot name="any-error"></slot>
                        <!-- Input -->
                        <div class="mb-3">
                            <div class="input-group form">

                                <div class="input-group-prepend form__prepend">
                                      <span class="input-group-text form__text">
                                        <i class="fa fa-user form__text-inner"></i>
                                      </span>
                                </div>

                                <input type="email" class="form-control form__input" name="email" placeholder="Email"
                                       required>
                            </div>
                        </div>
                        <!-- End Input -->

                        <!-- Input -->
                        <div class="mb-3">
                            <div class="input-group form">
                                <div class="input-group-prepend form__prepend">
                                  <span class="input-group-text form__text">
                                    <i class="fa fa-lock form__text-inner"></i>
                                  </span>
                                </div>
                                <input type="password" class="form-control form__input" name="password"
                                       placeholder="Password" required>
                            </div>
                        </div>
                        <!-- End Input -->

                        <div class="row mb-3">
                            <div class="col-6">
                                <!-- Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                    <input type="checkbox" class="custom-control-input"
                                           checked="checked" id="rememberMeCheckbox">
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
                        <!--     <div class="text-center u-divider-wrapper my-3">
                                 <span class="u-divider u-divider&#45;&#45;xs u-divider&#45;&#45;text">OR</span>
                             </div>-->
                        <!-- End Divider -->

                        <!-- Signin Social Buttons -->
                        <!--    <div class="row mx-gutters-2 mb-4">
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
                </form>

                <form id="forgotPassword" v-on:submit.prevent="recoverPassword" v-if="forgotPassword"
                      data-target-group="idForm">

                    <div class="js-form-message mb-3">
                        <div class="js-focus-state form">
                            <input type="email" class="form-control form__input" name="email" required=""
                                   placeholder="Email" aria-label="Email" v-model="recover.email"
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
                               data-target="#signin" data-link-group="idForm" data-animation-in="fadeIn">SignIn
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>


</template>
<script>
    export default {
        data() {
            return {
                forgotPassword: false,
                recover: {
                    email: null
                }
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
            },
            recoverPassword() {
                axios.post('/password/reset', {
                    email: this.recover.email
                })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
