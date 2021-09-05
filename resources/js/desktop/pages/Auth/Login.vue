<template>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="min-height: 90vh;">
            <div class="col-md-6 col-12 col-sm-12">

                <form method="POST" action="/login">

                    <slot name="csrf"></slot>
                    <!-- Signin -->
                    <div id="signin" data-target-group="idForm">
                        <!-- Title -->
                        <header class="text-center mb-5">
                            <img src="/assets/img/logo.png" alt="Logo" style="width: 100px;">
                            <h2 class="h4 mb-0">Please sign in</h2>
                            <p>Signin to manage your account.</p>
                        </header>


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

                                <input type="email" class="form-control form__input" name="email"  placeholder="Email">
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
                                <input type="password" class="form-control form__input" name="password"  placeholder="Password">
                            </div>
                        </div>
                        <!-- End Input -->

                        <div class="row mb-3">
                            <div class="col-6">
                                <!-- Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                    <input type="checkbox" class="custom-control-input" id="rememberMeCheckbox">
                                    <label class="custom-control-label" for="rememberMeCheckbox">
                                        Remember Me
                                    </label>
                                </div>
                                <!-- End Checkbox -->
                            </div>

                            <div class="col-6 text-right">
                                <a class="js-animation-link float-right" href="javascript:;" data-target="#forgotPassword" data-link-group="idForm" data-animation-in="fadeIn">Forgot Password?</a>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-block btn-primary">Signin</button>
                        </div>

                        <div class="text-center mb-3">
                            <p class="text-muted">
                                Do not have an account?
                                <a class="js-animation-link" href="javascript:;" data-target="#signup" data-link-group="idForm" data-animation-in="fadeIn">Signup
                                </a>
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

                <!-- Forgot Password -->
                <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">
                    <!-- Title -->
                    <header class="text-center mb-5">
                        <h2 class="h4 mb-0">Recover account</h2>
                        <p>Enter your email address and an email with instructions will be sent to you.</p>
                    </header>
                    <!-- End Title -->

                    <!-- Input -->
                    <div class="mb-3">
                        <div class=" form">
                            <input type="email" class="form-control form__input" name="email"  placeholder="Email" aria-label="Email" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                    </div>
                    <!-- End Input -->

                    <div class="mb-3">
                        <button type="submit" class="btn btn-block btn-primary">Recover Account</button>
                    </div>

                    <div class="text-center mb-3">
                        <p class="text-muted">
                            Have an account?
                            <a class="js-animation-link" href="javascript:;" data-target="#signin" data-link-group="idForm" data-animation-in="fadeIn">Signin
                            </a>
                        </p>
                    </div>
                </div>
                <!-- End Forgot Password -->
            </div>
        </div>
    </div>


</template>
<script>
    export default {

    }
</script>
<style lang="scss" scoped>

</style>
