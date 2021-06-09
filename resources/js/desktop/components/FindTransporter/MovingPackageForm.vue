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
                                    v-if="selected_package !=='Truck with Driver package'"
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
    .item-moving-container {
        background-color: white;
        border-radius: 10px;
        padding: 10px;

        .col-3 {
            margin: 0;
            padding: 0;
        }
    }

    .item-moving-package {
        padding: 10px;
        position: relative;

        &:hover {
            cursor:pointer;

            .package-header {
                .circle {

                    background-color: #35c86f;

                }
            }

            .package-body {
                background-color: #f4f4f4;

                ul {
                    li {

                        &:after {
                            content: "";
                            background: url(https://fretbay.com/en/assets/images/common/icons/general/circle-check-success.svg) no-repeat;
                        }
                    }
                }

                .btn-custom-gray {
                    background:  #e3342f;
                }
            }
        }

        &.active {
            cursor:pointer;

            .package-header {
                .circle {

                    background-color: #35c86f;

                }
            }

            .package-body {
                background-color: #f4f4f4;

                ul {
                    li {

                        &:after {
                            content: "";
                            background: url(https://fretbay.com/en/assets/images/common/icons/general/circle-check-success.svg) no-repeat;
                        }
                    }
                }

                .btn-custom-gray {
                    background:  #e3342f;
                }
            }
        }

        .package-header {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            height: 80px;

            .circle {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                background: #3D4E60;
                position: absolute;
                bottom: -35px;
                border: 10px white solid;
                padding: 10px;
                display: flex;
                justify-content: center;
                align-items: center;


            }
        }

        .package-body {
            background-color: #ededed;
            border-radius: 10px;
            padding: 60px 15px 10px 15px;

            h3 {
                color: #3D4E60;
            }

            p {
                line-height: 150%;
                font-size: 12px;
                padding: 20px;
                text-align: center;
            }

            ul {
                li {
                    width: 100%;
                    line-height: 150%;
                    margin-bottom: 15px;
                    font-size: 14px;
                    padding: 0px 0px 0px 28px;
                    position: relative;

                    &:after {
                        content: "";
                        background: url(https://fretbay.com/en/assets/images/common/icons/general/circle-check-gray.svg) no-repeat;
                        /* left: -27px; */
                        left: -3px;
                        width: 20px;
                        height: 20px;
                        /* background-color: red; */
                        top: 4px;
                        position: absolute;
                    }
                }
            }
        }
    }
</style>
