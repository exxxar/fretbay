<template>
    <div class="mt-2 item-moving-container">
        <div class="row w-100 mx-auto">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="item-moving-package" :class="{'active': selected_package ==='Truck with Driver package'}">
                    <div class="package-header">
                        <div class="circle">
                            <img src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">
                        </div>
                    </div>

                    <div class="package-body">
                        <h3>Truck with Driver package</h3>
                        <p>
                            No deposit to pay, no schedule to change for the trip, the driver drives for you!
                        </p>
                        <ul>
                            <li> A truck adapted to your volume</li>
                            <li> A professional driver who helps to secure the truck</li>
                            <li> The protection of goods by special equipment (blankets, straps...)</li>
                            <li> All road-related costs (fuel, possible tolls, insurance)</li>
                        </ul>

                        <div class="w-100 d-flex justify-content-center">
                            <button class="btn btn-custom-gray"
                                    @click="chooseMovingPackage('Truck with Driver')"
                            >
                                Choose
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="item-moving-package">
                    <div class="package-header">
                        <div class="circle">
                            <img src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">
                        </div>
                    </div>

                    <div class="package-body">
                        <h3>Truck with Driver package</h3>
                        <p>
                            No deposit to pay, no schedule to change for the trip, the driver drives for you!
                        </p>
                        <ul>
                            <li> A truck adapted to your volume</li>
                            <li> A professional driver who helps to secure the truck</li>
                            <li> The protection of goods by special equipment (blankets, straps...)</li>
                            <li> All road-related costs (fuel, possible tolls, insurance)</li>
                        </ul>

                        <div class="w-100 d-flex justify-content-center">
                            <button class="btn btn-custom-gray">Choose</button>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="item-moving-package">
                    <div class="package-header">
                        <div class="circle">
                            <img src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">
                        </div>
                    </div>

                    <div class="package-body">
                        <h3>Truck with Driver package</h3>
                        <p>
                            No deposit to pay, no schedule to change for the trip, the driver drives for you!
                        </p>
                        <ul>
                            <li> A truck adapted to your volume</li>
                            <li> A professional driver who helps to secure the truck</li>
                            <li> The protection of goods by special equipment (blankets, straps...)</li>
                            <li> All road-related costs (fuel, possible tolls, insurance)</li>
                        </ul>

                        <div class="w-100 d-flex justify-content-center">
                            <button class="btn btn-custom-gray">Choose</button>

                        </div>

                    </div>

                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="item-moving-package">
                    <div class="package-header">
                        <div class="circle">
                            <img src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">
                        </div>
                    </div>

                    <div class="package-body">
                        <h3>Truck with Driver package</h3>
                        <p>
                            No deposit to pay, no schedule to change for the trip, the driver drives for you!
                        </p>
                        <ul>
                            <li> A truck adapted to your volume</li>
                            <li> A professional driver who helps to secure the truck</li>
                            <li> The protection of goods by special equipment (blankets, straps...)</li>
                            <li> All road-related costs (fuel, possible tolls, insurance)</li>
                        </ul>

                        <div class="w-100 d-flex justify-content-center">
                            <button class="btn btn-custom-gray">Choose</button>

                        </div>

                    </div>

                </div>
            </div>
        </div>

<!--        <div class="row d-flex justify-content-center mt-2 w-100">-->
<!--            <div class="col-2">-->
<!--                <button class="btn btn-custom-danger">Back</button>-->
<!--            </div>-->

<!--        </div>-->
    </div>
</template>
<script>
    export default {
        data() {
            return {
                selected_package: 'Truck with Driver package',
            }
        },
        mounted() {
            this.$store.commit('editNewListing', {key:'moving_package', value: this.selected_package})
        },
        methods:{
            chooseMovingPackage(value) {
                this.selected_package = value;
                this.$store.commit('editNewListing', {key:'moving_package', value: value})
            }
        }
    }
</script>
<style lang="scss">

</style>
