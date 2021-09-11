<template>
    <div class="mt-2 item-moving-container">
        <div class="row p-1">
            <div class="col-12 col-md-6 col-lg-3 mb-2">

                <div class="card choose-card w-100 cursor-pointer"
                     @click="chooseMovingPackage('Truck with Driver package')"
                     :class="{'active': selected_package ==='Truck with Driver package'}">


                    <img class="choose-img"
                         src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">

                    <div class="card-body">
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

                    </div>


                        <div class="card-footer d-flex justify-content-center">
                            <button
                                :class="{'active': selected_package ==='Truck with Driver package','btn btn-outline-primary w-100':true}"
                                @click="chooseMovingPackage('Truck with Driver package')"
                            >
                                Choose
                            </button>
                        </div>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-2">
                <div class="card choose-card w-100 cursor-pointer"
                     @click="chooseMovingPackage('The Economic package')"
                     :class="{'active': selected_package ==='The Economic package'}">

                    <img class="choose-img"
                         src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon2-w.svg" alt="">

                    <div class="card-body">
                        <h3>The Economic package</h3>
                        <p>
                            Protection of property by special equipment (blankets, straps)
                        </p>
                        <ul>
                            <li> A truck adapted to your volume</li>
                            <li> The number of movers required to load and unload the truck</li>
                            <li> Protection of property by special equipment (blankets, straps)</li>
                            <li> All road-related costs (fuel, possible tolls, insurance)</li>
                        </ul>

                    </div>

                    <div class="card-footer d-flex justify-content-center">
                        <button
                            :class="{'active': selected_package ==='The Economic package','btn btn-outline-primary w-100':true}"
                            @click="chooseMovingPackage('The Economic package')"
                        >Choose
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-2">
                <div class="card choose-card w-100 cursor-pointer"
                     @click="chooseMovingPackage('The Standard package')"
                     :class="{'active': selected_package ==='The Standard package'}">

                    <img class="choose-img"
                         src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon3-w.svg" alt="">


                    <div class="card-body">
                        <h3>The Standard package</h3>
                        <p>
                            No fatigue, no waste of time, you're just packing!
                        </p>
                        <ul>
                            <li> A truck adapted to your volume</li>
                            <li> The number of movers required to load and unload the truck</li>
                            <li> Disassembly and reassembly of certain furniture</li>
                            <li> The packaging of the fragile</li>
                            <li> The protection of goods by special equipment (blankets, straps...)</li>
                            <li> All road-related costs (fuel, possible tolls, insurance)</li>
                        </ul>



                    </div>

                    <div class="card-footer d-flex justify-content-center">
                        <button
                            :class="{'active': selected_package ==='The Standard package','btn btn-outline-primary w-100':true}"
                            @click="chooseMovingPackage('The Standard package')"
                        >Choose
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-2">
                <div class="card choose-card w-100 cursor-pointer"
                     @click="chooseMovingPackage('The Complete package')"
                     :class="{'active': selected_package ==='The Complete package'}"
                >
                    <img class="choose-img"
                         src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon4-w.svg" alt="">


                    <div class="card-body">
                        <h3>The Complete package</h3>
                        <p>
                            No fatigue, no stress: your move is 100% covered
                        </p>
                        <ul>
                            <li> A truck adapted to your volume</li>
                            <li> The number of movers required to load and unload the truck</li>
                            <li> The cartoning and packaging of the fragil</li>
                            <li> Disassembly and reassembly of certain furnitur</li>
                            <li> The protection of goods by special equipment (blankets, straps...)</li>
                            <li> All road-related costs (fuel, possible tolls, insurance)</li>
                        </ul>



                    </div>

                    <div class="card-footer d-flex justify-content-center">
                        <button
                            :class="{'active': selected_package ==='The Complete package','btn btn-outline-primary w-100':true}"
                            @click="chooseMovingPackage('The Complete package')"
                        >Choose
                        </button>
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
                selected_package: 'Truck with Driver package',
            }
        },
        mounted() {
            this.$store.commit('editNewListing', {key: 'moving_package', value: this.selected_package})
        },
        methods: {
            chooseMovingPackage(value) {
                this.selected_package = value;
                this.$store.commit('editNewListing', {key: 'moving_package', value: value})
            }
        }
    }
</script>
<style lang="scss">
    .choose-img {
        width: 100%;
        height: 100%;
        background: #c3c3c3;

    }

    .card.active {
        .choose-img {
            background: #009e00;
        }
    }

    .choose-card {

        .card-body {
            height: 400px;
        }
        ul {
            line-height: 150%;
            list-style: decimal;
            padding: 15px;
            font-size:12px;
            font-style: italic;
        }
    }
</style>
