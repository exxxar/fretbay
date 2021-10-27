<template>
    <section id="profile-wizard4" style="min-height:90vh;display:flex;">
        <div class="row w-100 m-auto h-100 text-center justify-content-center">
            <div class="col-12 col-md-6">


                <img src="/images/profile/profile1.png" style="max-height: 350px; width: 100%; max-width:350px" alt="">
                <h2 class="step-title" style="color:#21c87a; font-weight: 700">
                    {{$trans('profile.wizard.step_5.h2_1')}}</h2>
                <p class="info-box" v-html="$trans('profile.wizard.step_5.p_1')"></p>
                <a href="/transporter/profile" class="btn btn-success w-100 mb-3" style="max-width: 300px;">{{$trans('profile.wizard.step_5.a_1')}}</a>
            </div>
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row m-auto w-100">
                                <div class="col-sm-12 px-0 px-sm-2">
                                    <div class="form-group">
                                        <label for=""
                                               class="text-lg">{{$trans('profile.wizard.step_5.label_1')}}</label>
                                        <textarea class="form-control"
                                                  rows="4" v-model="edit_introduction.about_company"
                                        >
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for=""
                                               class="text-lg">{{$trans('profile.wizard.step_5.label_2')}}</label>
                                        <textarea class="form-control"
                                                  rows="4"
                                                  v-model="edit_introduction.additional_service"
                                        >
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-12 px-0 px-sm-2">
                                    <div class="row m-auto w-100 justify-content-end">
                                        <button class="btn btn-primary px-4 mx-1"
                                                :disabled="invalid||editIntroductionLoading"
                                                @click="saveWithApproval(edit_introduction)">
                                            <span v-if="editIntroductionLoading"
                                                  class="spinner-border spinner-border-sm" role="status"
                                                  aria-hidden="true"></span>
                                            {{$trans('profile.wizard.step_5.button_1')}}
                                        </button>
                                        <!--                                        <a href="/transporter/profile"-->
                                        <!--                                           class="btn btn-success w-100 mx-1" style="max-width: 300px;">-->
                                        <!--                                            Finish-->
                                        <!--                                        </a>-->
                                    </div>
                                </div>
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                editIntroductionLoading: false,
                edit_introduction: {
                    about_company: '',
                    additional_service: '',
                    is_approved: false,
                    // is_first_activation:true
                },
            }
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            profile() {
                return this.$store.getters.profile
            },
            steps() {
                return this.$store.getters.first_activation_steps
            }
        },
        created() {
            if (this.user == '') {
                this.$store.dispatch('getUser').then(resp => {
                    this.editIntroduction();
                });
            }
        },
        // mounted() {
        //     this.editIntroduction();
        // },
        methods: {
            async save(key, value) {
                await axios.post("/transporter/profile/save", {
                    id: this.profile.id,
                    key: key,
                    value: value,
                    finish: true
                })
                    .then(resp => {
                        this.$store.dispatch('setProfile', resp.data.profile)
                    }).catch(error => {
                        console.log(error);
                    });
            },
            async saveWithApproval(fields) {
                this.editIntroductionLoading = true;
                await axios.post("/transporter/profile/saveWithApproval", fields)
                    .then(resp => {
                        this.$store.dispatch('setProfile', resp.data.profile);
                        this.$store.dispatch('setStep', {key: 'step5', value: true});
                        if (this.steps.step1 == true && this.steps.step2 == true && this.steps.step3 == true && this.steps.step4 == true && this.steps.step5 == true) {
                            this.save('is_first_activation', false)
                        }
                        this.editIntroductionLoading = false;
                        window.location = '/transporter/profile';
                    }).catch(error => {
                        console.log(error);
                        this.editIntroductionLoading = false;
                    });
            },

            editIntroduction() {
                this.edit_introduction.about_company = this.profile.about_company;
                this.edit_introduction.additional_service = this.profile.additional_service;
            }
        }
    }
</script>
