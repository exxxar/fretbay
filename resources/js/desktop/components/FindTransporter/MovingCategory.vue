<template>
    <div class="container pb-5">
        <wizard :steps="2" ref="wizard">
            <template v-slot:step_0>
                <div class="col-12" v-if="!inventory_mode">
                    <h2 class="text-uppercase text-black text-center">The volume of your move</h2>
                    <div class="volume-step-box-wrap text-center">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="box-title text-center">I know my volume</h3>
                                <div class="volume-step-box box-top">
                                    <h6>I know my volume to move. It is correct and I would like to inform it.</h6>
                                    <div class="volume-field">
                                        <div class="volume-field-wrap">
                                            <div class="input-group mb-3">
                                                <input  v-model="listing.summary_volume" type="text" class="form-control" @blur="editVolume" placeholder="Your volume">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><em class="volume-unit text-bold">m<sup>3</sup></em></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <h3 class="box-title text-center">I don’t know my volume</h3>
                                <div class="volume-step-box">
                                    <h6>I don't know my volume to move. I would like to carry out my inventory online.</h6>
                                    <div class="form-group">
                                        <a class="btn btn-primary" @click="inventory_mode=true">Online inventory</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" v-else>
                    <inventory-form :category="category"/>
                </div>
            </template>
            <template v-slot:step_1>
                <div class="mt-2 item-moving-container">
                   <moving-package-form></moving-package-form>
                </div>
            </template>
            <template v-slot:footer>
                <div class="row d-flex justify-content-end mt-2">
                    <div class="col-12 col-sm-2">
                        <button class="btn btn-outline-warning  w-100" @click="prevStep">Back</button>
                    </div>
                    <div class="col-12 col-sm-3">
                        <button class="btn btn-outline-primary  w-100" @click="nextStep">Next</button>
                    </div>
                </div>
            </template>
        </wizard>
<!--        <div v-if="current_step===0 && !inventory_mode" class="p-2 mt-5">-->
<!--            <h2 class="text-uppercase text-black text-center">The volume of your move</h2>-->
<!--            <div class="volume-step-box-wrap text-center">-->
<!--                <div class="row">-->
<!--                    <div class="col-sm-6">-->
<!--                        <h3 class="box-title text-center">I know my volume</h3>-->
<!--                        <div class="volume-step-box box-top">-->
<!--                            <h4>I know my volume to move. It is correct and I would like to inform it.</h4>-->
<!--                            <div class="volume-field">-->
<!--                                <div class="volume-field-wrap">-->
<!--                                    <input v-model="volumeCartTotalVolume" type="text" class="form-control input-lg text-center text-black"-->
<!--                                           placeholder="Your volume" autofocus="">-->
<!--                                    <em class="volume-unit text-bold">m<sup>3</sup></em>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div class="col-sm-6">-->
<!--                        <h3 class="box-title text-center">I don’t know my volume</h3>-->
<!--                        <div class="volume-step-box">-->
<!--                            <h4>I don't know my volume to move. I would like to carry out my inventory online.</h4>-->
<!--                            <div class="form-group">-->
<!--                                <a class="btn btn-custom-success" @click="inventory_mode=true">Online inventory</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div v-if="current_step===0 && inventory_mode">-->
<!--            <inventory-form/>-->
<!--        </div>-->
<!--        <div v-if="current_step===1">-->
<!--            <div class="mt-2 item-moving-container">-->
<!--                <div class="row">-->
<!--                    <div class="col-3">-->
<!--                        <div class="item-moving-package">-->
<!--                            <div class="package-header">-->
<!--                                <div class="circle">-->
<!--                                    <img src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="package-body">-->
<!--                                <h3>Truck with Driver package</h3>-->
<!--                                <p>-->
<!--                                    No deposit to pay, no schedule to change for the trip, the driver drives for you!-->
<!--                                </p>-->
<!--                                <ul>-->
<!--                                    <li> A truck adapted to your volume</li>-->
<!--                                    <li> A professional driver who helps to secure the truck</li>-->
<!--                                    <li> The protection of goods by special equipment (blankets, straps...)</li>-->
<!--                                    <li> All road-related costs (fuel, possible tolls, insurance)</li>-->
<!--                                </ul>-->

<!--                                <div class="w-100 d-flex justify-content-center">-->
<!--                                    <button class="btn btn-custom-gray" @click="chooseMovingPackage('Truck with Driver')">Choose</button>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-3">-->
<!--                        <div class="item-moving-package">-->
<!--                            <div class="package-header">-->
<!--                                <div class="circle">-->
<!--                                    <img src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="package-body">-->
<!--                                <h3>Truck with Driver package</h3>-->
<!--                                <p>-->
<!--                                    No deposit to pay, no schedule to change for the trip, the driver drives for you!-->
<!--                                </p>-->
<!--                                <ul>-->
<!--                                    <li> A truck adapted to your volume</li>-->
<!--                                    <li> A professional driver who helps to secure the truck</li>-->
<!--                                    <li> The protection of goods by special equipment (blankets, straps...)</li>-->
<!--                                    <li> All road-related costs (fuel, possible tolls, insurance)</li>-->
<!--                                </ul>-->

<!--                                <div class="w-100 d-flex justify-content-center">-->
<!--                                    <button class="btn btn-custom-gray" @click="chooseMovingPackage('Truck with Driver')">Choose</button>-->

<!--                                </div>-->
<!--                            </div>-->

<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-3">-->
<!--                        <div class="item-moving-package">-->
<!--                            <div class="package-header">-->
<!--                                <div class="circle">-->
<!--                                    <img src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="package-body">-->
<!--                                <h3>Truck with Driver package</h3>-->
<!--                                <p>-->
<!--                                    No deposit to pay, no schedule to change for the trip, the driver drives for you!-->
<!--                                </p>-->
<!--                                <ul>-->
<!--                                    <li> A truck adapted to your volume</li>-->
<!--                                    <li> A professional driver who helps to secure the truck</li>-->
<!--                                    <li> The protection of goods by special equipment (blankets, straps...)</li>-->
<!--                                    <li> All road-related costs (fuel, possible tolls, insurance)</li>-->
<!--                                </ul>-->

<!--                                <div class="w-100 d-flex justify-content-center">-->
<!--                                    <button class="btn btn-custom-gray" @click="chooseMovingPackage('Truck with Driver')">Choose</button>-->

<!--                                </div>-->

<!--                            </div>-->

<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-3">-->
<!--                        <div class="item-moving-package">-->
<!--                            <div class="package-header">-->
<!--                                <div class="circle">-->
<!--                                    <img src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="package-body">-->
<!--                                <h3>Truck with Driver package</h3>-->
<!--                                <p>-->
<!--                                    No deposit to pay, no schedule to change for the trip, the driver drives for you!-->
<!--                                </p>-->
<!--                                <ul>-->
<!--                                    <li> A truck adapted to your volume</li>-->
<!--                                    <li> A professional driver who helps to secure the truck</li>-->
<!--                                    <li> The protection of goods by special equipment (blankets, straps...)</li>-->
<!--                                    <li> All road-related costs (fuel, possible tolls, insurance)</li>-->
<!--                                </ul>-->

<!--                                <div class="w-100 d-flex justify-content-center">-->
<!--                                    <button class="btn btn-custom-gray" @click="chooseMovingPackage('Truck with Driver')">Choose</button>-->

<!--                                </div>-->

<!--                            </div>-->

<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--            </div>-->
<!--        </div>-->
<!--        <div class="row d-flex justify-content-end mt-2 w-100">-->
<!--            <div class="col-2">-->
<!--                <button class="btn btn-custom-danger" @click="prevStep">Back</button>-->
<!--            </div>-->
<!--            <div class="col-3">-->
<!--                <button class="btn btn-custom-white" :disabled="volumeCartTotalVolume<=0" @click="nextStep">Next</button>-->
<!--            </div>-->
<!--        </div>-->
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
        props:['category'],
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
        methods: {
          nextStep() {
              this.$store.dispatch('editNewListing', {key:'title', value: 'Déménagement '+ this.listing.summary_volume+' m3'})
              if(this.$refs.wizard.current_step === 1)
              {
                  this.$store.dispatch('setStep', 2)
              }
              else {
                  this.$refs.wizard.nextStep();
              }
              // if(this.current_step === 1)
              // {
              //     this.$store.dispatch('setStep', 2)
              // }
              // else {
              //     this.current_step++
              // }
          },
          prevStep() {
              if(this.$refs.wizard.current_step === 0)
              {
                  if(this.inventory_mode === true)
                  {
                      this.inventory_mode = false;
                  }
                  else {
                      this.$store.dispatch('setStep', 0)
                  }
              }
              else {
                  this.$refs.wizard.prevStep();
              }
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
                this.$store.dispatch('editNewListing', {key:'moving_package', value: title})
            },
            editVolume() {
                this.$store.dispatch('editNewListing', {key:'summary_volume', value: this.listing.summary_volume})
            }
        }
    }
</script>

<style scoped>

</style>
