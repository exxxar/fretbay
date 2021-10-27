<template>

    <main id="content">


        <div class="container mb-2 mt-2 pt-5">
            <div class="row">
                <div class="col-12">

                    <VueSlickCarousel v-bind="settings" v-if="categories.length>0">
                        <div v-for="category in categories" @click="selectType(category.id)" class="p-2">

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
            <div class="row d-block d-sm-none mb-2">
                <div class="col-12 mt-2">

                    <small> {{$trans('profile.find_loads.small_1')}}</small>
                    <input type="number" class="form-control w-100"
                           v-model="filter.reference"
                           :placeholder="$trans('profile.find_loads.input_placeholder_1')">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-9 mb-lg-0 p-2" v-if="listings.length>0">

                    <listing-item-component :key="index" v-for="(listing,index) in listings" :listing="listing"/>

                    <div class="mb-9"></div>

                    <listing-paginate-component/>
                </div>

                <div class="col-lg-9 order-lg-2 mb-9 mb-lg-0" v-else>
                    <img v-lazy="'/images/tagBackgrounds.png'" style="width: 100%;" alt="">
                    <h3 class="text-center">{{$trans('profile.find_loads.h3_1')}}</h3>
                    <div class="d-flex justify-content-center w-100 row">
                        <div class="col-12 col-sm-6">
                            <button @click="applyFilter" class="btn btn-outline-success w-100 mb-1">
                                {{$trans('profile.find_loads.button_1')}}
                            </button>
                            <button @click="resetFilter" class="btn btn-outline-warning w-100">
                                {{$trans('profile.find_loads.button_2')}}
                            </button>

                        </div>

                    </div>
                </div>

                <div class="col-lg-3 order-lg-1 p-0">

                    <div class="sticky-block">

                        <vue-custom-scrollbar class="scroll-area" :settings="settingsScroll"
                                              @ps-scroll-y="scrollHandler">
                            <div class="row m-0">

                                <div class="col-12 mt-2 mb-2">
                                    <small style="color:lightgray;">{{$trans('profile.find_loads.small_2')}}
                                        {{listings.length}}</small>

                                    <button class="btn btn-link text-danger"
                                            style="margin: 0 !important; padding:0px 10px;"
                                            v-if="isFilter" @click="resetFilter">
                                        {{$trans('profile.find_loads.button_2')}}
                                    </button>
                                </div>

                                <div class="col-12 mt-2 mb-2" v-if="isMovingActive">
                                    <small>{{$trans('profile.find_loads.small_3')}}<sup>3</sup></small>

                                    <div class="row m-0">
                                        <div class="col-sm-6 mb-2 p-1">
                                            <input type="number" class="form-control"
                                                   v-model="filter.volume_range_value[0]"
                                                   min="0"
                                                   :max="filter.volume_range_value[1]"
                                                   :placeholder="$trans('profile.find_loads.input_placeholder_2')">

                                        </div>
                                        <div class="col-sm-6 mb-2 p-1">
                                            <input type="number" class="form-control"
                                                   v-model="filter.volume_range_value[1]"
                                                   :min="filter.volume_range_value[0]"
                                                   :placeholder="$trans('profile.find_loads.input_placeholder_3')">
                                        </div>
                                    </div>


                                    <div class="p-1 w-100 mb-2">
                                        <vue-slider
                                            ref="volumeRanger"
                                            v-model="filter.volume_range_value"
                                            v-bind="volumeRanger.options"
                                        ></vue-slider>
                                    </div>

                                    <div class="custom-control custom-switch " :key="index"
                                         v-for="(item,index) in formulaList">
                                        <input type="checkbox" class="custom-control-input" :id="'formula-'+index"
                                               v-model="filter.formula" :value="item">
                                        <label :for="'formula-'+index" class="custom-control-label">{{item}}</label>
                                    </div>

                                </div>

                                <div class="col-12 mt-2">
                                    <small>{{$trans('profile.find_loads.small_4')}}</small>
                                    <div class="row m-0">
                                        <div class="col-sm-6 mb-2 p-1">
                                            <input type="number" class="form-control"
                                                   v-model="filter.distance_range_value[0]"
                                                   min="0"
                                                   :max="filter.distance_range_value[1]"
                                                   :placeholder="$trans('profile.find_loads.input_placeholder_2')">

                                        </div>
                                        <div class="col-sm-6 mb-2 p-1">
                                            <input type="number" class="form-control"
                                                   v-model="filter.distance_range_value[1]"
                                                   :min="filter.distance_range_value[0]"
                                                   :placeholder="$trans('profile.find_loads.input_placeholder_3')">
                                        </div>
                                    </div>

                                    <div class="p-1 w-100">
                                        <vue-slider
                                            ref="distanceRanger"
                                            v-model="filter.distance_range_value"
                                            v-bind="distanceRanger.options"
                                        ></vue-slider>
                                    </div>

                                </div>
                                <div class="col-12 mt-2">
                                    <small>{{$trans('profile.find_loads.small_5')}}</small>

                                    <div class="p-1 w-100">
                                        <vue-slider
                                            ref="publicationRanger"
                                            v-model="filter.publication_time_range_value"
                                            v-bind="publicationTimeRanger.options"
                                        ></vue-slider>

                                    </div>
                                </div>


                                <div class="col-12 mt-2">

                                    <small>{{$trans('profile.find_loads.small_1')}}</small>
                                    <input type="number" class="form-control w-100"
                                           v-model="filter.reference"
                                           :placeholder="$trans('profile.find_loads.input_placeholder_1')">

                                </div>

                                <div class="col-12 mt-2">

                                    <small>{{$trans('profile.find_loads.small_6')}}</small>

                                    <input type="text" class="form-control w-100"
                                           :placeholder="$trans('profile.find_loads.input_placeholder_7')"
                                           v-model="filter.postal">

                                </div>

                                <div class="col-12 mt-2">

                                    <small>{{$trans('profile.find_loads.small_7')}}</small>

                                    <small @click="clearAddress()" v-if="this.filter.region"><i
                                        class="fas fa-times"></i></small>
                                    <address-input v-model="region" v-on:selected="selectAddress"
                                                   :placeholder="$trans('profile.find_loads.input_placeholder_4')">

                                    </address-input>

                                </div>


                                <div class="col-12 mt-2">
                                    <small>{{$trans('profile.find_loads.small_8')}}</small>
                                    <date-picker v-model="filter.date_from" @input="changeDate"
                                                 :placeholder="$trans('profile.find_loads.input_placeholder_5')"
                                                 class="mb-2 w-100"
                                                 :value-type="'timestamp'"
                                    />
                                    <date-picker v-model="filter.date_to" @input="changeDate"
                                                 :placeholder="$trans('profile.find_loads.input_placeholder_6')"
                                                 class="mb-2 w-100"
                                                 :value-type="'timestamp'"
                                    />
                                </div>


                            </div>
                        </vue-custom-scrollbar>

                        <div class="row" style="position:sticky; bottom: 10px; z-index: 9;">
                            <div class="col-12 p-5"  >
                                <button @click="applyFilter" class="btn btn-success w-100 mb-1 ">
                                    {{$trans('profile.find_loads.button_1')}}
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
        <!-- End News Blog Content -->

        <!-- Hero Section -->
        <div class="container space-2">
            <div class="row">
                <div class="col-sm-4">
                    <div class="step">
                        <span class="step-num">1</span>
                        <h5 class="text-uppercase">{{$trans('profile.listing.h5_1')}}</h5>
                        <p>{{$trans('profile.listing.p_1')}}.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="step">
                        <span class="step-num">2</span>
                        <h5 class="text-uppercase">{{$trans('profile.listing.h5_2')}}</h5>
                        <p>{{$trans('profile.listing.p_2')}}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="step">
                        <span class="step-num">3</span>
                        <h5 class="text-uppercase">{{$trans('profile.listing.h5_3')}}</h5>
                        <p>{{$trans('profile.listing.p_3')}}</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Hero Section -->
    </main>

</template>

<script>
    // import './resources/sass/desktop/find-loads.module.scss'
    import AddressInput from "../../components/AddressInfoForm/AddressInput";

    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/antd.css'

    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    import vueCustomScrollbar from 'vue-custom-scrollbar'
    import "vue-custom-scrollbar/dist/vueScrollbar.css"

    export default {
        components: {
            AddressInput, DatePicker, VueSlider, VueSlickCarousel, vueCustomScrollbar
        },
        data() {
            return {
                region: null,
                formulaList: [
                    "The Economic package",
                    "Truck with Driver package",
                    "The Standard package",
                    "The Complete package"
                ],
                settingsScroll: {
                    suppressScrollY: false,
                    suppressScrollX: false,
                    wheelPropagation: false
                },
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
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        }

                    ]
                },


                publicationTimeRanger: {
                    options: {
                        dotSize: 14,
                        width: 'auto',
                        height: 4,
                        contained: false,
                        direction: 'ltr',
                        data: null,
                        dataLabel: 'label',
                        dataValue: 'value',
                        min: 0,
                        max: 31,
                        interval: 1,
                        disabled: false,
                        clickable: true,
                        duration: 0.5,
                        adsorb: false,
                        lazy: false,
                        tooltip: 'active',
                        tooltipPlacement: 'top',
                        tooltipFormatter: void 0,
                        useKeyboard: false,
                        keydownHook: null,
                        dragOnClick: false,
                        enableCross: false,
                        fixed: false,
                        minRange: void 0,
                        maxRange: void 0,
                        order: true,
                        marks: false,
                        dotOptions: void 0,
                        dotAttrs: void 0,
                        process: true,
                        dotStyle: void 0,
                        railStyle: void 0,
                        processStyle: void 0,
                        tooltipStyle: void 0,
                        stepStyle: void 0,
                        stepActiveStyle: void 0,
                        labelStyle: void 0,
                        labelActiveStyle: void 0,
                    },
                },
                volumeRanger: {
                    options: {
                        dotSize: 14,
                        width: 'auto',
                        height: 4,
                        contained: false,
                        direction: 'ltr',
                        data: null,
                        dataLabel: 'label',
                        dataValue: 'value',
                        min: 0,
                        max: 10000,
                        interval: 1,
                        disabled: false,
                        clickable: true,
                        duration: 0.5,
                        adsorb: false,
                        lazy: false,
                        tooltip: 'active',
                        tooltipPlacement: 'top',
                        tooltipFormatter: void 0,
                        useKeyboard: false,
                        keydownHook: null,
                        dragOnClick: false,
                        enableCross: false,
                        fixed: false,
                        minRange: void 0,
                        maxRange: void 0,
                        order: true,
                        marks: false,
                        dotOptions: void 0,
                        dotAttrs: void 0,
                        process: true,
                        dotStyle: void 0,
                        railStyle: void 0,
                        processStyle: void 0,
                        tooltipStyle: void 0,
                        stepStyle: void 0,
                        stepActiveStyle: void 0,
                        labelStyle: void 0,
                        labelActiveStyle: void 0,
                    },
                },

                distanceRanger: {
                    options: {
                        dotSize: 14,
                        width: 'auto',
                        height: 4,
                        contained: false,
                        direction: 'ltr',
                        data: null,
                        dataLabel: 'label',
                        dataValue: 'value',
                        min: 0,
                        max: 10000,
                        interval: 1,
                        disabled: false,
                        clickable: true,
                        duration: 0.5,
                        adsorb: false,
                        lazy: false,
                        tooltip: 'active',
                        tooltipPlacement: 'top',
                        tooltipFormatter: void 0,
                        useKeyboard: false,
                        keydownHook: null,
                        dragOnClick: false,
                        enableCross: false,
                        fixed: false,
                        minRange: void 0,
                        maxRange: void 0,
                        order: true,
                        marks: false,
                        dotOptions: void 0,
                        dotAttrs: void 0,
                        process: true,
                        dotStyle: void 0,
                        railStyle: void 0,
                        processStyle: void 0,
                        tooltipStyle: void 0,
                        stepStyle: void 0,
                        stepActiveStyle: void 0,
                        labelStyle: void 0,
                        labelActiveStyle: void 0,
                    },
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
                    user_id: null,
                    formula: [],
                    region: null,
                    reference: null,
                    postal: null,

                }
            }
        },

        watch: {
            /* filter: {
                 handler: function (val, oldVal) {
                     this.applyFilter()
                 },
                 deep: true
             }*/
        },

        computed: {
            isFilter() {
                let tmp = this.filter;

                return tmp.categories.length > 0 ||
                    tmp.date_from != null || tmp.date_to != null ||
                    tmp.user_id != null || tmp.formula.length > 0 ||
                    tmp.region != null || tmp.reference != null || tmp.postal != null
                /*  tmp.distance_range_value[0]!= this.distanceRanger.options.min||
                  tmp.distance_range_value[1]!= this.distanceRanger.options.max||
                  tmp.volume_range_value[0]!= this.volumeRanger.options.min||
                  tmp.volume_range_value[1]!= this.volumeRanger.options.max||
                  tmp.publication_time_range_value[0]!= this.publicationTimeRanger.options.min||
                  tmp.publication_time_range_value[1]!= this.publicationTimeRanger.options.max*/
            },
            categories() {
                return this.$store.getters.categories;
            },
            user() {
                return window.user
            },
            listings: function () {
                return this.$store.getters.listings;
            },
            maxDistance() {

                if (this.listings.length === 0)
                    return 0;

                let tmp_max = this.listings[0].distance || 0;

                this.listings.forEach(item => {
                    if (item.distance > tmp_max)
                        tmp_max = item.distance
                });
                return tmp_max;
            },

            maxVolume() {

                if (this.listings.length === 0)
                    return 0;

                let tmp_max = this.listings[0].summary_volume || 0;

                this.listings.forEach(item => {
                    if (item.summary_volume > tmp_max)
                        tmp_max = item.summary_volume
                });
                return tmp_max;
            },

            isMovingActive() {
                return this.filter.categories.filter(item => item === 2) > 0
            }
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
            this.$store.dispatch('getListings').then(resp => {
                this.filter.distance_range_value = [0, this.maxDistance]
                this.filter.volume_range_value = [0, this.maxVolume]
                this.distanceRanger.options.max = this.maxDistance
                this.volumeRanger.options.max = this.maxVolume
            })
            this.$store.dispatch("getCategories");


        },
        methods: {
            selectAddress(region) {
                console.log("region=>", region)
                this.filter.region = region
            },
            scrollHandler(evt) {
                console.log(evt)
            },
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

                this.filter.region = null;
                this.region = null
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
                console.log(this.filter.formula)
                // window.eventBus.$emit("preloader")
                this.$store.dispatch('getFilteredListings', this.filter);
            },

            resetFilter() {

                this.filter.categories = []

                this.filter.distance_range_value = [0, this.maxDistance]
                this.filter.volume_range_value = [0, this.maxVolume]
                this.distanceRanger.options.max = this.maxDistance
                this.volumeRanger.options.max = this.maxVolume

                this.filter.formula = []
                this.filter.region = null
                this.filter.reference = null
                this.filter.user_id = null
                this.filter.postal = null

                this.clearAddress()
                this.clearDates()

                this.$nextTick(() => {
                    window.eventBus.$emit("preloader")
                    this.$store.dispatch('getListings');
                })

            }
        }

    }
</script>

<style lang="scss">

    .scroll-area {
        position: relative;
        margin: auto;
        width: 100%;
        height: 80vh;
    }


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

    .vue-slider {
        padding: 7px 20px !important;
        width: 100% !important;
        height: 25px !important;
        box-sizing: border-box;
    }

    .vue-range-slider.slider-component {
        width: 100% !important;

    }

</style>
