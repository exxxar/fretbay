<template>
    <div class="container pb-5 p-0">
        <wizard :steps="2" ref="wizard">
            <template v-slot:step_0>
                <div class="col-12" v-if="!inventory_mode">
                    <h2 class="text-uppercase text-black text-center">{{$trans('request_a_quote.section_2.h2_1')}}</h2>
                    <div class="volume-step-box-wrap text-center">
                        <div class="row">
                            <div class="col-12 col-md-6">

                                <div class="card" style="min-height: 300px;">
                                    <div class="card-body d-flex align-items-center justify-content-center flex-wrap">

                                        <h3 class="box-title text-center"> {{$trans('request_a_quote.section_2.h3_1')}}</h3>
                                        <h6>{{$trans('request_a_quote.section_2.h6_1')}}</h6>

                                        <div class="input-group mb-3 d-flex justify-content-center">
                                            <input v-model="listing.summary_volume" type="number"
                                                   min="0"
                                                   class="form-control" style="max-width: 200px" @blur="editVolume"
                                                   :placeholder="$trans('request_a_quote.section_2.input_placeholder_1')">
                                            <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2"><em
                                                                class="volume-unit text-bold">m<sup>3</sup></em></span>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 mt-2">
                                <div class="card" style="min-height: 300px;">
                                    <div class="card-body d-flex align-items-center justify-content-center flex-wrap">
                                        <h3 class="box-title text-center">{{$trans('request_a_quote.section_2.h3_2')}}</h3>
                                        <div class="volume-step-box">
                                            <h6>{{$trans('request_a_quote.section_2.h6_2')}}</h6>
                                            <div class="form-group">
                                                <a class="btn btn-primary text-white" @click="inventory_mode=true">{{$trans('request_a_quote.section_2.a_1')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0" v-else>
                    <inventory-form :category="category"/>
                </div>
            </template>
            <template v-slot:step_1>
                <div class="mt-2 item-moving-container">
                    <moving-package-form/>
                </div>
            </template>
            <template v-slot:footer>
                <div class="row d-flex justify-content-end mt-2 p-3 m-0">
                    <div class="col-12 mb-1 mb-sm-0 col-sm-2">
                        <button class="btn btn-outline-blue  w-100" @click="prevStep">{{$trans('request_a_quote.global.button_prev')}}</button>
                    </div>
                    <div class="col-12 col-sm-3">
                        <button class="btn btn-outline-primary  w-100" @click="nextStep" :disabled="listing.summary_volume<=0">{{$trans('request_a_quote.global.button_next')}}</button>
                    </div>
                </div>
            </template>
        </wizard>

    </div>
</template>

<script>
    import InventoryForm from "./InventoryForm";
    import Wizard from "./Wizard";
    import MovingPackageForm from "./MovingPackageForm";

    export default {
        name: "MovingCategory",
        components: {
            InventoryForm, Wizard, MovingPackageForm
        },
        props: ['category'],
        data() {
            return {
                // current_step: 0,
                inventory_mode: false,
            }
        },
        computed: {
            // step() {
            //     return this.$store.getters.step;
            // }
            listing() {
                return this.$store.getters.listing;
            },
            volumeCartTotalVolume() {
                return this.$store.getters.volumeCartTotalVolume;
            }
        },
        mounted(){
            if (window.location.search)
            {
                this.inventory_mode = true
            }
        },
        methods: {
            nextStep() {
                this.$store.dispatch('editNewListing', {
                    key: 'title',
                    value: 'Déménagement ' + this.listing.summary_volume + ' m3'
                })
                if (this.$refs.wizard.current_step === 1) {
                    this.$store.dispatch('setStep', 2)
                } else {
                    this.$refs.wizard.nextStep();
                }

                window.scrollTo(0, 0);
                // if(this.current_step === 1)
                // {
                //     this.$store.dispatch('setStep', 2)
                // }
                // else {
                //     this.current_step++
                // }
            },
            prevStep() {
                if (this.$refs.wizard.current_step === 0) {
                    if (this.inventory_mode === true) {
                        this.inventory_mode = false;
                    } else {
                        this.$store.dispatch('setStep', 0)
                    }
                } else {
                    this.$refs.wizard.prevStep();
                }

                window.scrollTo(0, 0);
                // if(this.current_step === 0)
                // {
                //     if(this.inventory_mode === true)
                //     {
                //         this.inventory_mode = false;
                //     }
                //     else {
                //         this.$store.dispatch('setStep', 0)
                //     }
                // }
                // else {
                //     this.current_step--
                // }
            },
            chooseMovingPackage(title) {
                this.$store.dispatch('editNewListing', {key: 'moving_package', value: title})
            },
            editVolume() {
                this.$store.dispatch('editNewListing', {key: 'summary_volume', value: this.listing.summary_volume})
            }
        }
    }
</script>

<style scoped>

</style>
