<template>
    <div class="main-body mt-3">

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <form class="card-body" ref="passwords">
                        <h2>{{ $trans('profile.settings.h2_1') }}</h2>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="form-group">
                                <ValidationProvider name="Old password" rules="required" v-slot="{ errors }">
                                    <label for="" class="text-lg">{{ $trans('profile.settings.label_1') }}</label>
                                    <input type="password" class="form-control form-control-empty input-lg"
                                           v-model="old_password">
                                    <p style="color: red;font-size:11px">{{ errors[0] }}</p>
                                </ValidationProvider>
                            </div>
                            <div class="form-group">
                                <ValidationProvider name="New password" rules="required" vid="password"
                                                    v-slot="{ errors }">
                                    <label for="" class="text-lg">{{ $trans('profile.settings.label_2') }}</label>
                                    <input type="password" class="form-control form-control-empty input-lg"
                                           v-model="new_password">
                                    <p style="color: red;font-size:11px">{{ errors[0] }}</p>
                                </ValidationProvider>
                            </div>
                            <div class="form-group">
                                <ValidationProvider name="Confirm password" rules="required|confirmed:password"
                                                    v-slot="{ errors }">
                                    <label for="" class="text-lg">{{ $trans('profile.settings.label_3') }}</label>
                                    <input type="password" class="form-control form-control-empty input-lg"
                                           v-model="confirm_password">
                                    <p style="color: red;font-size:11px">{{ errors[0] }}</p>
                                </ValidationProvider>
                            </div>
                            <div class="form-group" v-if="message">
                                <div class="alert alert-dismissible fade show"
                                     v-bind:class="{'alert-primary':message_type==='info',
                                     'alert-danger':message_type==='danger'}"
                                     role="alert">
                                    {{ message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                            @click="message=null">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-standard w-100" @click="savePassword"
                                        :disabled="invalid||loadingPassword">{{ $trans('profile.settings.button_1') }}
                                </button>
                            </div>
                        </ValidationObserver>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>{{ $trans('profile.settings.h2_2') }}</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                               v-model="profile.email_notify"
                                               @change="save('email_notify', profile.email_notify?1:0)"
                                        >
                                        <label class="custom-control-label"
                                               for="customCheck1">{{ $trans('profile.settings.label_4') }}</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2"
                                               v-model="profile.push_notify"
                                               @change="save('push_notify', profile.push_notify?1:0)"
                                        >
                                        <label class="custom-control-label"
                                               for="customCheck2">{{ $trans('profile.settings.label_5') }}</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3"
                                               v-model="profile.newsletter_notify"
                                               @change="save('newsletter_notify', profile.newsletter_notify?1:0)"
                                        >
                                        <label class="custom-control-label"
                                               for="customCheck3">{{ $trans('profile.settings.label_6') }}</label>
                                    </div>

                                    <!--                                    <div class="form-group text-center">-->
                                    <!--                                        <button class="btn btn-success btn-standard">Save</button>-->
                                    <!--                                    </div>-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            message: null,
            message_type: 'info',
            loadingPassword: false,
            old_password: '',
            new_password: '',
            confirm_password: ''
        }
    },
    computed: {
        user() {
            return window.user
        },
        profile() {
            return this.user.profile
        },
    },
    methods: {
        async savePassword() {
            this.message = null;
            this.loadingPassword = true
            await axios.post('/auth/user/changePassword', {
                old_password: this.old_password,
                new_password: this.new_password
            })
                .then(resp => {
                    this.message = resp.data.message

                    this.message_type = 'info'
                    this.loadingPassword = false

                    this.$nextTick(()=>{
                        this.$refs.passwords.reset();
                    })
                })
                .catch(error => {
                    this.message = "Something went wrong"
                    this.message_type = 'danger'
                    this.loadingPassword = false

                })


        },
        async save(key, value) {
            await axios.post("/transporter/profile/save", {id: this.profile.id, key: key, value: value})
                .then(resp => {
                    this.$store.commit('setProfile', resp.data.profile)
                }).catch(error => {
                    console.log(error);
                });
        },
    }
}
</script>
