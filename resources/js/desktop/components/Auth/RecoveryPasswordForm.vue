<template>

    <ValidationObserver v-slot="{invalid}" tag="form" @submit.prevent="login">
        <div class="js-validate">

            <input type="hidden" name="_token" :value="csrf">
            <div id="recovery-form" data-target-group="idForm">

                <!-- Input -->
                <div class="js-form-message mb-3">
                    <div class="js-focus-state form">
                        <ValidationProvider name="Email" rules="required|email" vid="email" v-slot="{ errors }">
                            <input type="email" class="form-control form__input" name="email"
                                   autocomplete="username"
                                   placeholder="Email" v-model="recovery_form.email" required>
                            <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                        </ValidationProvider>
                    </div>
                </div>
                <!-- End Input -->



                <div class="js-form-message mb-3" v-if="success_message">
                    <div class="js-focus-state form">

                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{success_message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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

                <div class="mb-3">
                    <button type="submit" class="btn btn-block btn-primary">
                        <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                              aria-hidden="true"></span>
                        Recovery</button>
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
                success_message: null,
                loading: false,


                recovery_form: {
                    email: '',

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
                this.success_message = null;
                this.loading = true;

                axios.post('/forgot-password', this.recovery_form).then(resp => {
                    this.loading = false;
                    this.success_message = 'We sent reset link to your email!';
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

