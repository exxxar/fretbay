<template>

    <main id="content">
        <!-- Hero Section -->
        <div class="container space-2 space-3-top--lg">
            <div class="row">
                <div class="col-sm-4">
                    <div class="step">
                        <span class="step-num">1</span>
                        <h5 class="text-uppercase">FIND CUSTOMERS</h5>
                        <p>To optimize your tours.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="step">
                        <span class="step-num">2</span>
                        <h5 class="text-uppercase">SUBMIT YOUR QUOTE</h5>
                        <p>in just two minutes!</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="step">
                        <span class="step-num">3</span>
                        <h5 class="text-uppercase">INCREASE YOUR SALES REVENUE</h5>
                        <p>More than 20 Million in business volume</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Hero Section -->

        <div class="container mb-2">
            <div class="row">
                <div class="col-12">


                    <VueSlickCarousel v-bind="settings" v-if="categories.length>0">
                        <div v-for="category in categories" @click="selectType(category.id)">

                            <div class="card filter-card"
                                 :class="{'text-primary font-weight-bold card-primary':inSelectedType(category.id),'text-secondary':!inSelectedType(category.id)}">

                                <div class="card-body p-2">
                                    <img v-lazy="category.image" alt="" class="w-100">
                                    <small class="text-center w-100">{{category.title}}</small>
                                </div>

                            </div>

                        </div>
                    </VueSlickCarousel>


                </div>
            </div>
        </div>

        <!-- News Blog Content -->
        <div class="container space-3-bottom--lg">
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-9 mb-lg-0" v-if="listings.length>0">
                    <small style="color:lightgray;">Results {{listings.length}}</small>
                    <listing-item-component :key="index" v-for="(listing,index) in listings" :listing="listing"/>

                    <div class="mb-9"></div>

                    <listing-paginate-component/>
                </div>

                <div class="col-lg-9 order-lg-2 mb-9 mb-lg-0" v-else>
                    <img v-lazy="'/images/tagBackgrounds.png'" style="width: 100%;" alt="">
                    <h3 class="text-center">Empty list! Change filter!</h3>
                    <div class="d-flex justify-content-center w-100 row">
                        <div class="col-12 col-sm-6">
                            <button @click="applyFilter" class="btn btn-outline-success w-100 mb-1">Apply filter
                            </button>
                            <button @click="resetFilter" class="btn btn-outline-warning w-100">Reset filter</button>

                        </div>

                    </div>
                </div>

                <div class="col-lg-3 order-lg-1 ">

                    <div class="sticky-block">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <h6>Volume, m<sup>2</sup></h6>
                                <vue-range-slider v-model="filter.volume_range_value"
                                                  :speed="0"
                                                  :tooltip="'hover'"
                                                  :min="volumeRanger.min"
                                                  :max="volumeRanger.max"
                                                  :formatter="volumeRanger.formatter"
                                                  :enable-cross="volumeRanger.enableCross"/>
                            </div>
                            <div class="col-12 mt-2">
                                <h6>Distance, km</h6>
                                <vue-range-slider v-model="filter.distance_range_value"
                                                  :speed="0"
                                                  :tooltip="'hover'"
                                                  :min="distanceRanger.min"
                                                  :max="distanceRanger.max"
                                                  :formatter="distanceRanger.formatter"
                                                  :enable-cross="distanceRanger.enableCross"/>
                            </div>
                            <div class="col-12 mt-2">
                                <h6>Publication time, days</h6>
                                <vue-range-slider v-model="filter.publication_time_range_value"
                                                  :speed="0"
                                                  :tooltip="'hover'"
                                                  :min="publicationTimeRanger.min"
                                                  :max="publicationTimeRanger.max"
                                                  :formatter="publicationTimeRanger.formatter"
                                                  :enable-cross="publicationTimeRanger.enableCross"/>
                            </div>

                            <div class="col-12 mt-2" v-if="user">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" id="self-quotes" class="custom-control-input"
                                           @change="setSelfQuotes">
                                    <label for="self-quotes" class="custom-control-label">Only self quotes</label>
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <button @click="applyFilter" class="btn btn-outline-success w-100 mb-1">Apply filter
                                </button>
                                <button @click="resetFilter" class="btn btn-outline-warning w-100">Reset filter
                                </button>
                            </div>


                        </div>

                        <div id="basicsAccordion">
                            <div class="card border-0 mb-3">
                                <div class="card-header card-collapse__header" id="basicsHeadingOne">
                                    <h5 class="mb-0">
                                        <button
                                            class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn"
                                            data-toggle="collapse" data-target="#basicsCollapseOne" aria-expanded="true"
                                            aria-controls="basicsCollapseOne">
                                            Address <span v-if="filter.address_from||filter.address_to"
                                                          @click="clearAddress"><i
                                            class="fas fa-times text-primary cursor-pointer small"></i></span>

                                            <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="basicsCollapseOne" class="collapse" aria-labelledby="basicsHeadingOne"
                                     data-parent="#basicsAccordion">
                                    <div class="card-body card-collapse__body px-0">
                                        <small>Enter postal code</small>
                                        <input type="text" class="form-control"
                                               placeholder="City, Postal code, Region, Country">
                                        <p class="mt-1">Or</p>
                                        <div class="mb-1">
                                            <small> Point A</small>
                                            <address-input class="mb-2" v-on:selected="selectAddressA"
                                                           :address="filter.address_from"
                                                           :disabled="false" placeholder="Address"></address-input>
                                        </div>


                                        <div class="mb-1">
                                            <small>Point B</small>
                                            <address-input class="mb-2" v-on:selected="selectAddressB"
                                                           :address="filter.address_to"
                                                           :disabled="false" placeholder="Address"></address-input>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card border-0 mb-3">
                                <div class="card-header card-collapse__header" id="basicsHeadingTwo">
                                    <h5 class="mb-0">
                                        <button
                                            class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                            data-toggle="collapse" data-target="#basicsCollapseTwo"
                                            aria-expanded="false"
                                            aria-controls="basicsCollapseTwo">
                                            Dates
                                            <span @click="swapDates" v-if="filter.date_from||filter.date_to"><i
                                                class="fas fa-sync text-primary cursor-pointer small"></i></span>
                                            <span @click="clearDates" v-if="filter.date_from||filter.date_to"><i
                                                class="fas fa-times text-primary cursor-pointer small"></i></span>

                                            <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo"
                                     data-parent="#basicsAccordion">
                                    <div class="card-body card-collapse__body px-0">
                                        <date-picker v-model="filter.date_from" @input="changeDate"
                                                     placeholder="Date from"
                                                     class="mb-2 w-100"
                                                     :value-type="'timestamp'"
                                        />
                                        <date-picker v-model="filter.date_to" @input="changeDate" placeholder="Date to"
                                                     class="mb-2 w-100"
                                                     :value-type="'timestamp'"
                                        />
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End News Blog Content -->
    </main>

</template>

<script>
    // import './resources/sass/desktop/find-loads.module.scss'
    import AddressInput from "../../components/AddressInfoForm/AddressInput";

    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

    import 'vue-range-component/dist/vue-range-slider.css'
    import VueRangeSlider from 'vue-range-component'

    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    export default {
        components: {
            AddressInput, DatePicker, VueRangeSlider, VueSlickCarousel
        },
        data() {
            return {
                settings: {
                    "dots": false,
                    "arrows": true,
                    "focusOnSelect": false,
                    "infinite": true,
                    "speed": 500,
                    "slidesToShow": 6,
                    "slidesToScroll": 4,
                    "touchThreshold": 5,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 1008,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                },
                publicationTimeRanger: {
                    min: 0,
                    max: 31,
                    enableCross: false,
                },
                volumeRanger: {
                    min: 0,
                    max: 10000,
                    enableCross: false,
                },

                distanceRanger: {
                    min: 0,
                    max: 10000,
                    enableCross: false,
                },

                filter: {
                    categories: [],
                    address_from: null,
                    address_to: null,
                    date_from: null,
                    date_to: null,
                    distance_range_value: [0, 10000],
                    volume_range_value: [0, 1000],
                    publication_time_range_value: [0, 31],
                    only_self: false,
                    user_id: null

                }
            }
        },

        computed: {
            categories() {
                return this.$store.getters.categories;
            },
            user() {
                return window.user
            },
            listings: function () {
                return this.$store.getters.listings;
            },
        },

        created() {
            this.distanceRanger.formatter = value => `${value} km`
            this.volumeRanger.formatter = value => `${value}`
            this.publicationTimeRanger.formatter = value => `${value} day`

            this.filter.distance_range_value = [0, 10000]
            this.filter.volume_range_value = [0, 1000]
            this.filter.publication_time_range_value = [0, 31]
        },
        mounted() {
            this.$store.dispatch('getListings');
            this.$store.dispatch("getCategories");


        },
        methods: {
            swapAddress() {
                console.log("swapAddress")
                let tmp = this.filter.address_from
                this.filter.address_from = this.filter.address_to
                this.filter.address_to = tmp
            },
            swapDates() {
                console.log("swapDates")
                let tmp = this.filter.date_from
                this.filter.date_from = this.filter.date_to
                this.filter.date_to = tmp
            },
            clearDates() {
                this.filter.date_from = null
                this.filter.date_to = null
            },
            clearAddress() {
                window.eventBus.$emit("address_input")
                this.filter.address_from = null
                this.filter.address_to = null
            },
            clearCategories() {
                console.log("clearCategories")
                this.filter.categories = []
                this.$store.dispatch('getListings');
            },
            selectAddressB(address) {
                this.filter.address_to = JSON.stringify(address)
            },
            selectAddressA(address) {
                this.filter.address_from = JSON.stringify(address)
            },
            changeDate(date) {

            },

            setSelfQuotes(item) {
                this.filter.only_self = item.target.checked
                this.filter.user_id = this.user.id

            },
            inSelectedType(id) {
                return this.filter.categories.indexOf(id) !== -1
            },
            selectType(id) {
                let index = this.filter.categories.indexOf(id)
                if (index === -1) {
                    this.filter.categories.push(id)
                    return;
                }

                this.filter.categories.splice(index, 1);
            },
            applyFilter() {
                window.eventBus.$emit("preloader")
                this.$store.dispatch('getFilteredListings', this.filter);
            },
            resetFilter() {
                window.eventBus.$emit("preloader")
                this.filter.categories = []
                this.$store.dispatch('getListings');


                this.filter.distance_range_value = [0, 10000]
                this.filter.volume_range_value = [0, 1000]
                this.filter.publication_time_range_value = [0, 31]

                this.clearAddress()
                this.clearDates()
            }
        }

    }
</script>

<style lang="scss">
    .bg-info {
        width: 50px;
        height: 50px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .item {
        background: white;
        border: 1px lightgray solid;
        padding: 0px;
        border-radius: 5px;
        margin-bottom: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .step {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        text-align: center;

        .step-num {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background: #21c87a;
            margin-bottom: 10px;
        }
    }

    .sticky-block {
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
    }

    .card-primary {
        border: 1px #21c87a solid;
    }

    .filter-card {
        height: 145px;

        img {
            height: 100px;
            object-fit: contain;
        }

        small {
            display: block;
            line-height: 100%;
        }
    }


    .slick-arrow {
        padding: 5px;
        width: 40px;
        height: 40px;

        border-radius: 7px;
        z-index: 100;
        display: flex;
        justify-content: center;
        align-items: center;

        &:before {
            color: #21c87a;
        }

        &.slick-next {
            right: 0;
        }

        &.slick-prev {
            left: 0;
        }
    }

    .vue-range-slider.slider-component {
        width: 100% !important;

    }

</style>
