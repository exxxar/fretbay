<template>
    <main id="content">


        <div class="gradient-overlay-half-dark-v1 bg-img-hero"
             style="background-image: url(/assets/img/1920x1080/img5.jpg);">
            <div class="d-lg-flex align-items-lg-center flex-lg-column">
                <div class="container space-sm-3 space-1 space-4-top--lg">
                    <!-- Title -->
                    <div class="w-md-50">
                        <h1 class="display-4 font-size-48--md-down text-white">{{$trans('index.section_1.h1_1')}}</h1>
                        <p class="lead text-white">{{$trans('index.section_1.p_1')}}</p>


                    </div>
                    <!-- End Title -->

                    <form class="js-validate w-100" novalidate="novalidate" action="/find-transporter" method="get">
                        <div class="row mb-7">


                            <div class="col-lg-2 align-self-lg-end">
                                <button type="submit" class="btn btn-block btn-primary transition-3d-hover">
                                    {{$trans('index.section_1.button_1')}}
                                </button>
                            </div>
                        </div>

                        <p class="small text-white">{{$trans('index.section_1.p_2')}}</p>
                    </form>
                </div>
            </div>


        </div>


        <div class="container text-center space-3--md">
            <div class="row">
                <div class="col-md-6">
                    <!-- Card -->
                    <article
                        class="card shadow-sm h-md-100 px-4 pt-7 pb-0 border-top-0 border-left-0 border-right-0 border-bottom border-3 border-primary mb-4 mb-md-0">
                        <div class="w-md-70 mx-md-auto h-100">
                <span class="u-icon u-icon--lg u-icon--primary-soft rounded-circle mb-4">
                  <i class="svg-icon svg-icon-sm text-primary u-icon__inner">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path
                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                            fill="#000000"></path>
                        <path
                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                            fill="#000000"></path>
                      </g>
                    </svg>
                  </i>
                </span>

                            <h3 class="text-lh-xs mb-3">
                                {{$trans('index.section_2.h3_1')}}</h3>
                            <p class="text-muted mb-5">
                                {{$trans('index.section_2.p_1')}}</p>

                        </div>

                        <div class="card-footer">
                            <a class="btn btn-sm btn-primary w-100" href="/find-transporter">
                                {{$trans('index.section_2.a_1')}}</a>
                        </div>
                    </article>
                    <!-- End Card -->
                </div>

                <div class="col-md-6">
                    <!-- Card -->
                    <article
                        class="card shadow-sm h-md-100 px-4 pt-7 pb-0 border-top-0 border-left-0 border-right-0 border-bottom border-3 border-primary">
                        <div class="w-md-70 mx-md-auto h-100">
                <span class="u-icon u-icon--lg u-icon--primary-soft rounded-circle mb-4">
                  <i class="svg-icon svg-icon-sm text-primary u-icon__inner">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path
                            d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                            fill="#000000"></path>
                      </g>
                    </svg>
                  </i>
                </span>

                            <h3 class="text-lh-xs mb-3">
                                {{$trans('index.section_2.h3_2')}}</h3>
                            <p class="text-muted mb-5">
                                {{$trans('index.section_2.p_2')}}</p>

                        </div>


                        <div class="card-footer">
                            <a class="btn btn-sm btn-primary w-100" href="/find-loads">
                                {{$trans('index.section_2.a_2')}}</a>
                        </div>
                    </article>
                    <!-- End Card -->
                </div>
            </div>
        </div>


        <!-- Our Work Section -->
        <div class="container mt-5">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <span class="u-label u-label--sm u-label--purple mb-3">{{$trans('index.section_3.span_1')}}</span>
                <h2>{{$trans('index.section_3.h2_1')}}</h2>
                <p>{{$trans('index.section_3.p_1')}}</p>
            </div>
            <!-- End Title -->

            <div class="row justify-content-lg-between">
                <div class="col-md-7">
                    <!-- Gallery -->
                    <div class="row mx-gutters-2 mb-9 mb-md-0">
                        <div class="col-12 mb-3">
                            <img class="img-fluid" src="/assets/img/700x700/img5.jpg" alt="Image Description">
                        </div>

                        <div class="col-12 align-self-end mb-3">
                            <img class="img-fluid" src="/assets/img/500x450/img4.jpg" alt="Image Description">
                        </div>

                    </div>
                    <!-- End Gallery -->
                </div>

                <div class="col-md-5 col-lg-4">
                    <h3 class="h5">{{$trans('index.section_3.h3_1')}}</h3>

                    <!-- Icon Blocks -->
                    <a class="media align-items-center mb-4" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/location-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            {{$trans('index.section_3.div_1')}}
                        </div>
                    </a>
                    <!-- End Icon Blocks -->

                    <!-- Icon Blocks -->
                    <a class="media align-items-center mb-4" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/request-quote-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            {{$trans('index.section_3.div_2')}}
                        </div>
                    </a>
                    <!-- End Icon Blocks -->

                    <!-- Icon Blocks -->
                    <a class="media align-items-center mb-4" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/file-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            {{$trans('index.section_3.div_3')}}
                        </div>
                    </a>
                    <!-- End Icon Blocks -->

                    <!-- Icon Blocks -->
                    <a class="media align-items-center mb-4" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/mouse-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            {{$trans('index.section_3.div_4')}}
                        </div>
                    </a>
                    <!-- End Icon Blocks -->

                    <!-- Icon Blocks -->
                    <a class="media align-items-center" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/box-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            {{$trans('index.section_3.div_5')}}
                        </div>
                    </a>
                    <!-- End Icon Blocks -->
                </div>
            </div>
        </div>
        <!-- End Our Work Section -->

        <!-- Features -->
        <div class="container">
            <div class="border-top border-bottom space-2 space-3--md">
                <!-- Title -->
                <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
                    <span class="u-label u-label--sm u-label--purple mb-3">  {{$trans('index.section_4.span_1')}}</span>
                    <h2> {{$trans('index.section_4.h2_1')}}</h2>
                    <p> {{$trans('index.section_4.p_1')}}.</p>
                </div>
                <!-- End Title -->

                <div class="card-deck d-block d-lg-flex">
                    <!-- Card -->
                    <div class="card shadow-sm overflow-hidden mb-3 mb-lg-0">
                        <div class="card-body p-5 pr-9">
                            <span class="h1 text-primary">01.</span>
                            <h3 class="h5 font-weight-medium"> {{$trans('index.section_4.h3_1')}}</h3>
                            <p>{{$trans('index.section_4.p_2')}}</p>
                        </div>
                        <div class="card-footer border-top-0 p-5 pr-9">
                            <a class="font-weight-medium" href="#">{{$trans('index.section_4.a_1')}}</a>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card shadow-sm overflow-hidden mb-3 mb-lg-0">
                        <div class="card-body p-5 pr-9">
                            <span class="h1 text-primary">02.</span>
                            <h3 class="h5 font-weight-medium">{{$trans('index.section_4.h3_2')}}</h3>
                            <p>{{$trans('index.section_4.p_3')}}</p>
                        </div>
                        <div class="card-footer border-top-0 p-5 pr-9">
                            <a class="font-weight-medium" href="#">{{$trans('index.section_4.a_2')}}</a>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card shadow-sm overflow-hidden">
                        <div class="card-body p-5 pr-9">
                            <span class="h1 text-primary">03.</span>
                            <h3 class="h5 font-weight-medium">{{$trans('index.section_4.h3_3')}}</h3>
                            <p>{{$trans('index.section_4.p_4')}}</p>
                        </div>
                        <div class="card-footer border-top-0 p-5 pr-9">
                            <a class="font-weight-medium" href="#">{{$trans('index.section_4.a_3')}}</a>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
        <!-- End Features -->


        <div class="container space-2-bottom space-3--md">
            <div class="gradient-overlay-half-dark-v1 bg-img-hero-center"
                 style="background-image: url(/assets/img/1200x600/img1.jpg);">
                <div class="w-lg-50 p-9">
                    <!-- Title -->
                    <div class="mb-7">
                        <span class="u-label u-label--sm u-label--light mb-2">
De l'espace en déplacement</span>
                        <h2 class="text-white">{{$trans('index.section_5.h2_1')}}</h2>
                        <p class="text-white">{{$trans('index.section_5.p_1')}}</p>
                    </div>
                    <!-- End Title -->

                    <!-- Button -->
                    <button type="button" class="btn btn-xs btn-dark text-left mb-2 mb-md-0 mr-md-2">
            <span class="media align-items-center">
              <i class="fab fa-apple fa-3x mr-3"></i>
              <span class="d-block">
                <span class="d-block">{{$trans('index.section_5.span_1')}}</span>
                <strong class="d-block font-size-14">
{{$trans('index.section_5.strong_1')}}</strong>
              </span>
            </span>
                    </button>
                    <!-- End Button -->

                    <!--  &lt;!&ndash; Button &ndash;&gt;
                      <button type="button" class="btn btn-xs btn-dark text-left mb-2 mb-md-0">
              <span class="media align-items-center">
                <i class="fab fa-google-play fa-3x mr-3"></i>
                <span class="d-block">
                  <span class="d-block">
  Mettez-le sur</span>
                  <strong class="d-block font-size-14">jeu de Google</strong>
                </span>
              </span>
                      </button>-->
                    <!-- End Button -->
                </div>
            </div>
        </div>
        <!-- End FAQ Section -->

    </main>
</template>
<script>
    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    export default {
        components: {
            VueSlickCarousel
        },
        data() {
            return {


                slickOptions: {
                    //options can be used from the plugin documentation
                    slidesToShow: 2,
                    infinite: true,
                    accessibility: true,
                    adaptiveHeight: true,
                    arrows: true,
                    dots: true,
                    draggable: true,
                    edgeFriction: 0.30,
                    swipe: true,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 1008,
                            settings: {
                                slidesToShow: 1,
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
        computed: {
            user() {
                return window.user
            },
            profileLink() {
                return window.user.is_transporter ? "/transporter/profile" : "/customer/profile"
            },
            notifications: function () {
                return this.$store.getters.notifications;
            },
        },
        mounted() {
            this.$store.dispatch('loadNotifications')
        },
    }
</script>
<style>
    .slider-custom-slide {
        min-height: 300px;
    }
</style>
