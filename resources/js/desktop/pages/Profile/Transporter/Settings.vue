<template>
    <div class="main-body mt-3">

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>Password</h2>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="form-group">
                                <ValidationProvider name="Old password" rules="required" v-slot="{ errors }">
                                    <label for="" class="text-lg">Old password</label>
                                    <input type="password" class="form-control form-control-empty input-lg" v-model="old_password">
                                    <p style="color: red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                            <div class="form-group">
                                <ValidationProvider name="New password" rules="required" vid="password" v-slot="{ errors }">
                                    <label for="" class="text-lg">New password</label>
                                    <input type="password" class="form-control form-control-empty input-lg" v-model="new_password">
                                    <p style="color: red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                            <div class="form-group">
                                <ValidationProvider name="Confirm password" rules="required|confirmed:password" v-slot="{ errors }">
                                    <label for="" class="text-lg">Confirm password</label>
                                    <input type="password" class="form-control form-control-empty input-lg" v-model="confirm_password">
                                    <p style="color: red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-standard w-100" @click="savePassword" :disabled="invalid||loadingPassword">Save</button>
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>Notifications</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                               v-model="profile.email_notify"
                                               @change="save('email_notify', profile.email_notify?1:0)"
                                        >
                                        <label class="custom-control-label" for="customCheck1">Email</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2"
                                               v-model="profile.push_notify"
                                               @change="save('push_notify', profile.push_notify?1:0)"
                                        >
                                        <label class="custom-control-label" for="customCheck2">Push messages</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3"
                                               v-model="profile.newsletter_notify"
                                               @change="save('newsletter_notify', profile.newsletter_notify?1:0)"
                                        >
                                        <label class="custom-control-label" for="customCheck3">Newsletter</label>
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
        data(){
            return {
                loadingPassword:false,
                old_password:'',
                new_password:'',
                confirm_password:''
            }
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            profile() {
                return this.$store.getters.profile
            },
        },
        methods: {
            async savePassword() {
                await axios.post('/auth/user/changePassword', {old_password: this.old_password, new_password: this.new_password})
                    .then( resp => {

                    })
                    .catch( error => {

                    })
            },
            async save(key, value) {
                await axios.post("/transporter/profile/save", {id:this.profile.id, key: key, value: value})
                    .then(resp => {
                        this.$store.commit('setProfile', resp.data.profile)
                    }).catch(error => {
                        console.log(error);
                    });
            },
        }
    }
</script>
