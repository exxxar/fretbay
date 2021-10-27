<template>
    <section id="profile-wizard3" style="min-height:90vh;display:flex; position:relative">


        <div class="row w-100 m-auto h-100 text-center justify-content-center">
            <div class="col-12 h-100" v-bind:class="[vehicles.length==0 ? 'col-md-12' : 'col-md-12 col-xl-6 sticky-post']">
                <img v-lazy="'https://fretbay.com/fr/frv2/assets/images/common/icons/general/add-vehicle.svg'"
                     style="max-height: 350px; width: 100%; max-width:350px" alt=""
                     class="mt-3"
                >
                <h2 class="step-title" style="color:#21c87a; font-weight: 700">  {{$trans('profile.wizard.step_3.h2_1')}}</h2>
                <p class="info-box" v-html="$trans('profile.wizard.step_3.h2_1')"></p>
                <div class="row mx-auto w-100 align-items-center justify-content-center">
                    <button data-toggle="modal" data-target="#add-vehicle"
                            class="text-center btn btn-primary w-100 mb-3 mx-1"
                            style="max-width: 300px;" v-if="vehicles.length==0"
                    >
                        {{$trans('profile.wizard.step_3.button_1')}}
                    </button>
                    <a href="/transporter/profile/transporter-wizard/step-4" class="btn btn-success w-100 mb-3 mx-1" style="max-width: 300px;">  {{$trans('profile.wizard.step_3.button_2')}}</a>
                </div>
            </div>
            <div class="col-12 col-md-12 col-xl-6">
                <vehicles-list button-position="bottom">
                    <template v-slot:BottomAddButton>
                        <div class="row mx-auto w-100 align-items-center justify-content-center" :class="[vehicles.length>0 ? '' : 'd-none']">
                            <button data-toggle="modal" data-target="#add-vehicle"
                                    class="text-center btn btn-primary w-100 m-1"
                                    style="max-width: 300px;"
                            >
                                {{$trans('profile.wizard.step_3.button_1')}}
                            </button>
                            <button class="btn btn-success w-100 m-1" style="max-width: 300px;" @click="nextStep">
                                {{$trans('profile.wizard.step_3.button_3')}}
                            </button>
                        </div>
                    </template>
                </vehicles-list>
            </div>
        </div>
    </section>
</template>
<script>

    import MultiUploadFiles from "../../../components/MultiUploadFiles";
    import VehiclesList from "../../../components/VehiclesList";
    export default {
        components:{MultiUploadFiles, VehiclesList},
        data() {
            return {
                new_vehicle : {
                    type:'',
                    brand:'',
                    model:'',
                    plate_number:'',
                    total_laden_weight:'',
                    cubing:'',
                    images:[],
                },
                edit_vehicle : {
                    type:'',
                    brand:'',
                    model:'',
                    plate_number:'',
                    total_laden_weight:'',
                    cubing:'',
                    images:[],
                },
                new_images:[],
                deleted_images:[],
                loading: false
            }
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            vehicles() {
                return this.$store.getters.vehicles;
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
        methods: {
            nextStep() {
                this.$store.dispatch('setStep', {key:'step3', value:true });
                window.location = '/transporter/profile/transporter-wizard/step-4'
            }
        }
    }
</script>
<style>
    @media (min-width: 1200px) {
        .sticky-post {
            top: 85px;
            position: sticky !important;
        }
    }
</style>
