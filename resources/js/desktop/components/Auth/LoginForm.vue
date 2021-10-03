<template>

    <ValidationObserver v-slot="{invalid}" tag="form" @submit.prevent="login">
        <div class="js-validate">

            <input type="hidden" name="_token" :value="csrf">
            <div id="signin" data-target-group="idForm">

                <!-- Input -->
                <div class="js-form-message mb-3">
                    <div class="js-focus-state form">
                        <ValidationProvider name="Email" rules="required|email" vid="email" v-slot="{ errors }">
                            <input type="email" class="form-control form__input" name="email"
                                   placeholder="Email" v-model="login_form.email" required>
                            <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                        </ValidationProvider>
                    </div>
                </div>
                <!-- End Input -->

                <!-- Input -->
                <div class="js-form-message mb-3">
                    <div class="js-focus-state form">
                        <ValidationProvider name="Password" rules="required|min:6" vid="password"
                                            v-slot="{ errors }">
                            <input type="password" class="form-control form__input"
                                   name="password" placeholder="Password" required
                                   v-model="login_form.password">
                            <p class="mb-0" style="color: red;font-size:11px">{{errors[0]}}</p>
                        </ValidationProvider>
                    </div>
                </div>
                <!-- End Input -->

                <div class="row mb-3">
                    <div class="col-6">
                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                            <input type="checkbox" name="remember" class="custom-control-input" id="rememberMeCheckbox" checked v-model="login_form.remember">
                            <label class="custom-control-label" for="rememberMeCheckbox">
                                Remember Me
                            </label>
                        </div>
                        <!-- End Checkbox -->
                    </div>

                    <div class="col-6 text-right">
                        <a class="js-animation-link float-right" href="/recovery-password">Forgot Password?</a>
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

                <div class="mb-3">

                    <button type="submit" class="btn btn-block btn-primary">
                        <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                              aria-hidden="true"></span>
                        Signin
                    </button>
                </div>

                <div class="text-center mb-3">
                    <p class="text-muted">
                        Do not have an account?<br>
                        <a class="js-animation-link" href="/register-customer">Signup
                            as Customer</a> or <a class="js-animation-link" href="/register-transporter">Signup
                        as Transporter </a>
                    </p>
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

                login_form: {
                    email: '',
                    password: '',
                    remember: true,
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

            login() {
                this.error_message = null;
                this.loading = true;

                axios.post('/login', this.login_form).then(resp => {
                    this.loading = false;
                    window.location = '/'
                }).catch(error => {
                    this.error_message = 'Bad account!';
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

