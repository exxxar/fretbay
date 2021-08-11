<template>
    <section id="profile-wizard4" style="min-height:90vh;display:flex;">
        <div class="container">
            <div class="row w-100 m-auto h-100 text-center justify-content-center">
                <div class="col-12">
                    <img v-lazy="'/images/profile/profile1.png'" style="max-height: 350px; width: 100%; max-width:350px" alt="">
                    <h2 class="step-title" style="color:#21c87a; font-weight: 700">Spoken languages</h2>
                    <p class="info-box mb-1">Inform your future customers of your spoken languages</p>
                </div>
                <div class="col-12">
                    <div class="row w-100 mx-auto justify-content-center align-items-center my-4">
                        <div class="custom-control custom-checkbox mx-2">
                            <input type="checkbox" class="custom-control-input" id="english-lang"
                                   :checked="check('spoken_languages', 'en')"
                                   @change="choose('spoken_languages', 'en')">
                            <label class="custom-control-label" for="english-lang">English</label>
                        </div>
                        <div class="custom-control custom-checkbox mx-2">
                            <input type="checkbox" class="custom-control-input" id="german-lang"
                                   :checked="check('spoken_languages', 'de')"
                                   @change="choose('spoken_languages', 'de')">
                            <label class="custom-control-label" for="german-lang">German</label>
                        </div>
                        <div class="custom-control custom-checkbox mx-2">
                            <input type="checkbox" class="custom-control-input" id="franch-lang"
                                   :checked="check('spoken_languages', 'fr')"
                                   @change="choose('spoken_languages', 'fr')">
                            <label class="custom-control-label" for="franch-lang">Français</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row w-100 mx-auto align-items-center justify-content-center mb-3">
                        <a href="/transporter/profile/transporter-wizard/step-5"
                           class="btn btn-success w-100 m-1" style="max-width: 300px;">
                            Skip
                        </a>
                        <button @click="nextStep" :disabled="profile.spoken_languages.length === 0"
                                class="btn btn-success w-100 m-1" style="max-width: 300px;">
                            Next step
                        </button>
                    </div>
                </div>
                <!--            <div class="col-12 col-md-6">-->
                <!--                <img src="/images/profile/profile1.png" style="max-height: 350px; width: 100%; max-width:350px" alt="">-->
                <!--                <h2 class="step-title" style="color:#21c87a; font-weight: 700">Spoken languages</h2>-->
                <!--                <p class="info-box">Inform your future customers of your spoken languages</p>-->
                <!--                <a href="/transporter/profile/transporter-wizard/step-5" class="btn btn-success w-100 mb-3" style="max-width: 300px;">Skip</a>-->
                <!--            </div>-->
                <!--            <div class="col-12 col-md-6">-->
                <!--                <div class="card mb-3">-->
                <!--                    <div class="card-body">-->
                <!--                        <div class="row w-100 mx-auto">-->
                <!--                            <div class="col-12 col-lg-8 col-md-12 px-0 px-sm-2">-->
                <!--                                <div class="custom-control custom-checkbox">-->
                <!--                                    <input type="checkbox" class="custom-control-input" id="english-lang"-->
                <!--                                           :checked="check('spoken_languages', 'en')"-->
                <!--                                           @change="choose('spoken_languages', 'en')">-->
                <!--                                    <label class="custom-control-label" for="english-lang">English</label>-->
                <!--                                </div>-->

                <!--                                <div class="custom-control custom-checkbox">-->
                <!--                                    <input type="checkbox" class="custom-control-input" id="german-lang"-->
                <!--                                           :checked="check('spoken_languages', 'de')"-->
                <!--                                           @change="choose('spoken_languages', 'de')">-->
                <!--                                    <label class="custom-control-label" for="german-lang">German</label>-->
                <!--                                </div>-->

                <!--                                <div class="custom-control custom-checkbox">-->
                <!--                                    <input type="checkbox" class="custom-control-input" id="franch-lang"-->
                <!--                                           :checked="check('spoken_languages', 'fr')"-->
                <!--                                           @change="choose('spoken_languages', 'fr')">-->
                <!--                                    <label class="custom-control-label" for="franch-lang">Français</label>-->
                <!--                                </div>-->

                <!--                            </div>-->
                <!--                            <div class="col-12">-->
                <!--                                <button @click="nextStep" :disabled="profile.spoken_languages.length === 0"-->
                <!--                                   class="btn btn-success w-100 mx-1" style="max-width: 300px;">-->
                <!--                                    Next step-->
                <!--                                </button>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
            </div>
        </div>

    </section>
</template>
<script>
    export default {
        data(){
            return {
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
        created() {
            if(this.user=='')
            {
                this.$store.dispatch('getUser');
            }
        },
        methods:{
            async save(key, value) {
                await axios.post("/transporter/profile/save", {id:this.profile.id, key: key, value: value})
                    .then(resp => {
                        this.$store.commit('setProfile', resp.data.profile)
                    }).catch(error => {
                        console.log(error);
                    });
            },
            choose(field_name, value) {
                if(this.profile[field_name] == null) {
                    this.profile[field_name] = [];
                }
                let index = this.profile[field_name].findIndex(item => item === value);
                if (index <= -1) {
                    this.profile[field_name].push(value);
                }
                else {
                    this.profile[field_name].splice(index, 1);
                }
                this.save(field_name, this.profile[field_name]);
            },
            check(field_name, value) {
                if(this.profile[field_name] == null) {
                    this.profile[field_name] = [];
                }
                if(this.profile[field_name] != null) {
                    let array = this.profile[field_name];
                    let index = array.findIndex(item => item === value);
                    return index > -1;
                }
                return false;
            },
            nextStep() {
                this.$store.dispatch('setStep', {key:'step4', value:true });
                window.location = '/transporter/profile/transporter-wizard/step-5'
            }
        }
    }
</script>
