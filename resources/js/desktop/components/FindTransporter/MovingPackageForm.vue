<template>
    <div class="mt-2 item-moving-container">

        <VueSlickCarousel class="p-1" v-bind="settings">
            <div class="card choose-card w-100 cursor-pointer"
                 @click="chooseMovingPackage('Truck with Driver package')"
                 :class="{'active': selected_package ==='Truck with Driver package'}">


                <img class="choose-img"
                     src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon1-w.svg" alt="">

                <vue-custom-scrollbar class="card-body" :settings="settingsScroll">
                    <h3>{{$trans('request_a_quote.section_4.h3_1')}}</h3>
                    <p>
                        {{$trans('request_a_quote.section_4.p_1')}}
                    </p>

                    <ul v-html="$trans('request_a_quote.section_4.ul_1')"></ul>

                </vue-custom-scrollbar>


                <!--   <div class="card-footer d-flex justify-content-center">
                       <button

                           :class="{'active': selected_package ==='Truck with Driver package','btn btn-outline-primary w-100':true}"
                           @click="chooseMovingPackage('Truck with Driver package')"
                       >
                           Choose
                       </button>
                   </div>-->

            </div>
            <div class="card choose-card w-100 cursor-pointer"
                 @click="chooseMovingPackage('The Economic package')"
                 :class="{'active': selected_package ==='The Economic package'}">

                <img class="choose-img"
                     src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon2-w.svg" alt="">

                <vue-custom-scrollbar class="card-body" :settings="settingsScroll">
                    <h3> {{$trans('request_a_quote.section_4.h3_2')}}</h3>
                    <p>
                        {{$trans('request_a_quote.section_4.p_2')}}
                    </p>


                    <ul v-html="$trans('request_a_quote.section_4.ul_2')">

                    </ul>

                </vue-custom-scrollbar>

                <!--  <div class="card-footer d-flex justify-content-center">
                      <button
                          :class="{'active': selected_package ==='The Economic package','btn btn-outline-primary w-100':true}"
                          @click="chooseMovingPackage('The Economic package')"
                      >Choose
                      </button>
                  </div>-->

            </div>
            <div class="card choose-card w-100 cursor-pointer"
                 @click="chooseMovingPackage('The Standard package')"
                 :class="{'active': selected_package ==='The Standard package'}">

                <img class="choose-img"
                     src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon3-w.svg" alt="">

                <vue-custom-scrollbar class="card-body" :settings="settingsScroll">

                    <h3> {{$trans('request_a_quote.section_4.h3_3')}}</h3>
                    <p>
                        {{$trans('request_a_quote.section_4.p_3')}}
                    </p>

                    <ul v-html="$trans('request_a_quote.section_4.ul_3')">

                    </ul>


                </vue-custom-scrollbar>
                <!--   <div class="card-footer d-flex justify-content-center">
                       <button
                           :class="{'active': selected_package ==='The Standard package','btn btn-outline-primary w-100':true}"
                           @click="chooseMovingPackage('The Standard package')"
                       >Choose
                       </button>
                   </div>-->

            </div>
            <div class="card choose-card w-100 cursor-pointer"
                 @click="chooseMovingPackage('The Complete package')"
                 :class="{'active': selected_package ==='The Complete package'}"
            >
                <img class="choose-img"
                     src="https://fretbay.com/en/assets/images/shipper/postJob/formula-icon4-w.svg" alt="">

                <vue-custom-scrollbar class="card-body" :settings="settingsScroll">

                    <h3> {{$trans('request_a_quote.section_4.h3_4')}}</h3>
                    <p>
                        {{$trans('request_a_quote.section_4.p_4')}}
                    </p>

                    <ul v-html="$trans('request_a_quote.section_4.ul_4')">

                    </ul>


                </vue-custom-scrollbar>
                <!--<div class="card-footer d-flex justify-content-center">
                    <button
                        :class="{'active': selected_package ==='The Complete package','btn btn-outline-primary w-100':true}"
                        @click="chooseMovingPackage('The Complete package')"
                    >Choose
                    </button>
                </div>-->
            </div>
        </VueSlickCarousel>

    </div>
</template>
<script>

    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    import vueCustomScrollbar from 'vue-custom-scrollbar'
    import "vue-custom-scrollbar/dist/vueScrollbar.css"

    export default {
        data() {
            return {
                selected_package: 'Truck with Driver package',
                settingsScroll: {
                    suppressScrollY: false,
                    suppressScrollX: true,
                    wheelPropagation: false
                },
                settings: {
                    "dots": false,
                    "arrows": true,
                    "focusOnSelect": true,
                    "infinite": true,
                    "speed": 500,
                    "slidesToShow": 4,
                    "slidesToScroll": 3,
                    "touchThreshold": 4,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4,
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
        },
        components: {
            VueSlickCarousel, vueCustomScrollbar
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
            height: 250px;
            overflow-y: auto;
            padding: 10px;


        }

        ul {
            line-height: 150%;
            list-style: decimal;
            padding: 15px;
            font-size: 12px;
            font-style: italic;
        }
    }
</style>
