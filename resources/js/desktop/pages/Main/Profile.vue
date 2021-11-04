<template>
    <!--    <div class="container">-->


    <div>
        <div class="container">
            <div class="row w-100 mx-auto my-5" style="min-height:100vh;">
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-body px-1 px-sm-3">
                            <div class="row w-100 mx-auto">
                                <div class="col-md-8 col-sm-8">
                                    <h2 class="card-title mb-2"><strong>{{fullName}}</strong></h2>
                                    <div class="row w-100 mx-auto mb-3 align-items-center">
                                        <div class="col-12 p-0 ">
                                            <div
                                                class="row w-100 mx-auto align-items-center d-flex justify-content-center justify-content-sm-start"
                                                v-if="info.is_approved">
                                                <img src="/images/profile/approved.png" class="mr-1"
                                                     style="width: 25px; height: 25px" alt="Approved">
                                                <span class="text-uppercase" style="font-size:14px">{{$trans('profile.public_profile.span_1')}}</span>
                                            </div>
                                            <div
                                                class="row w-100 mx-auto align-items-center d-flex justify-content-center justify-content-sm-start"
                                                v-if="!info.is_approved">
                                                <img src="/images/profile/not_approved.png" class="mr-1"
                                                     style="width: 25px; height: 25px" alt="Not approved">
                                                <span class="text-uppercase" style="font-size:14px">{{$trans('profile.public_profile.span_2')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06 d-flex justify-content-center justify-content-sm-start"
                                       style="font-size: 10px" v-html="$trans('profile.public_profile.p_1')"></p>
                                    <p class="mb-1 text-dark d-flex justify-content-center justify-content-sm-start">
                                        {{info.created_at | moment("DD.MM.YYYY")}}</p>
                                    <p class="mb-1 text-dark d-flex justify-content-center justify-content-sm-start">
                                        <star-rating v-model="user.computed_rating" :show-rating="false"
                                                     :read-only="true"/>
                                    </p>
                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06"
                                       style="font-size: 10px" v-if="info.payment_methods.length>0"
                                       v-html="$trans('profile.public_profile.p_2')"></p>
                                    <div class="row w-100 m-auto" v-if="info.payment_methods.length>0">
                                        <span
                                            class="u-label u-label--xs u-label--primary text-uppercase letter-spacing-0_06 mr-2 mb-2"
                                            v-for="pay in info.payment_methods">
                                            {{pay}}
                                        </span>
                                    </div>
                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06"
                                       style="font-size: 10px"
                                       v-if="info.transport_specialities&&info.transport_specialities.length>0"
                                       v-html="$trans('profile.public_profile.p_3')">

                                    </p>
                                    <div class="row w-100 m-auto"
                                         v-if="info.transport_specialities&&info.transport_specialities.length>0">
                                        <span
                                            class="u-label u-label--xs u-label--primary text-uppercase letter-spacing-0_06 mr-2 mb-2"
                                            v-for="category in info.transport_specialities">
                                            {{category.title}}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <img class="img-fluid img-thumbnail" v-lazy="info.avatar"
                                         alt="" style="object-fit:contain">
                                </div>
                                <div class="col-4 col-md-4 col-sm-4 text-center">
                                    <h2 class="mb-0 mt-2" style="line-height:1;">
                                        <strong>{{info.vehicles_count}}</strong></h2>
                                    <p v-html="$trans('profile.public_profile.p_4')"></p>
                                    <!--                                    <button class="btn btn-primary btn-block btn-md"><span class="fa fa-facebook-square"></span> Like  </button>-->
                                </div>
                                <div class="col-4 col-md-4 col-sm-4 text-center">
                                    <h2 class="mb-0 mt-2" style="line-height:1;">
                                        <strong>{{info.reviews.length}}</strong></h2>
                                    <p v-html="$trans('profile.public_profile.p_5')"></p>
                                    <!--                                    <button class="btn btn-success btn-block btn-md"><span class="fa fa-twitter-square"></span> Tweet </button>-->
                                </div>
                                <div class="col-4 col-md-4 col-sm-4 text-center">
                                    <h2 class="mb-0 mt-2" style="line-height:1;"><strong>{{info.orders.length}}</strong>
                                    </h2>
                                    <p v-html="$trans('profile.public_profile.p_6')"></p>
                                    <!--                                    <button type="button" class="btn btn-danger btn-block btn-md"><span class="fa fa-google-plus-square"></span> Follow </button>-->
                                </div>
                                <div class="col-12">
                                    <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                                        <li class="nav-item m-1" role="presentation">
                                            <button class=" btn btn-outline-primary  w-100 active p-2"
                                                    id="pills-company-tab" data-toggle="pill"
                                                    data-target="#pills-company" type="button" role="tab"
                                                    aria-controls="pills-company" aria-selected="true"
                                            >
                                                {{$trans('profile.public_profile.button_1')}}
                                            </button>
                                        </li>
                                        <li class="nav-item m-1" role="presentation">
                                            <button class="btn btn-outline-primary w-100 p-2" id="pills-vehicles-tab"
                                                    data-toggle="pill"
                                                    data-target="#pills-vehicles" type="button" role="tab"
                                                    aria-controls="pills-vehicles" aria-selected="true"
                                            >
                                                {{$trans('profile.public_profile.button_2')}}
                                            </button>
                                        </li>
                                        <li class="nav-item m-1" role="presentation">
                                            <button class=" btn btn-outline-primary w-100 p-2" id="pills-reviews-tab"
                                                    data-toggle="pill"
                                                    data-target="#pills-reviews" type="button" role="tab"
                                                    aria-controls="pills-reviews" aria-selected="false"
                                            >
                                                {{$trans('profile.public_profile.button_3')}}
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-company" role="tabpanel"
                                             aria-labelledby="pills-company-tab">
                                            <div class="card my-2">
                                                <div class="card-body">
                                                    <div class="row m-auto w-100">
                                                        <div class="col-sm-12 px-0 px-sm-2">
                                                            <div class="form-group">
                                                                <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06"
                                                                   style="font-size: 10px"
                                                                   v-html="$trans('profile.public_profile.p_7')"></p>
                                                                <span>{{info.company_name}}</span>
                                                                <p class="mb-0" v-if="info.company_name===''"
                                                                   v-html="$trans('profile.public_profile.p_8')"></p>
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06"
                                                                   style="font-size: 10px"
                                                                   v-html="$trans('profile.public_profile.p_9')"></p>
                                                                <span> {{info.about_company}}</span>
                                                                <p class="mb-0" v-if="info.about_company===''"
                                                                   v-html="$trans('profile.public_profile.p_10')"></p>
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06"
                                                                   style="font-size: 10px"
                                                                   v-html="$trans('profile.public_profile.p_11')"></p>
                                                                <span>
                                                                    {{info.additional_service}}
                                                                </span>
                                                                <p class="mb-0" v-if="info.additional_service === ''"
                                                                   v-html="$trans('profile.public_profile.p_12')">

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-vehicles" role="tabpanel"
                                             aria-labelledby="pills-vehicles-tab">
                                            <div class="row w-100 m-auto align-items-center justify-content-center"
                                                 style="min-height: 100px"
                                                 v-if="info.vehicles.length===0"
                                            >
                                                <p class="mb-0" v-html="$trans('profile.public_profile.p_13')"></p>
                                            </div>
                                            <div class="row mx-auto w-100" v-for="(vehicle, index) in info.vehicles"
                                                 v-if="info.vehicles.length>0">
                                                <div class="card w-100 h-100 my-2">
                                                    <div class="card-body">
                                                        <div class="row mx-auto w-100 align-items-center text-center">
                                                            <div class="col-12 col-md-2 px-0 px-sm-1 px-md-2">
                                                                <img v-if="vehicle.images[0]" v-lazy="vehicle.images[0]"
                                                                     alt="Vehicle" class="rounded-circle"
                                                                     style="width: 100px; height: 100px; object-fit: cover">
                                                                <img v-else v-lazy="" alt="Vehicle"
                                                                     class="rounded-circle"
                                                                     style="width: 100px; height: 100px; object-fit: cover">
                                                            </div>
                                                            <div class="col-12 col-sm-6 col-md-3 px-0 px-sm-1 px-md-2">
                                                                <p class="d-flex inform-box mb-0 justify-content-center">
                                                                    {{$trans('profile.public_profile.p_14')}}</p>
                                                                {{vehicle.brand}}
                                                            </div>
                                                            <div class="col-6 col-md-2 px-0 px-sm-1 px-md-2">
                                                                <p class="d-flex inform-box mb-0 justify-content-center">
                                                                    {{$trans('profile.public_profile.p_15')}}</p>
                                                                {{vehicle.model}}
                                                            </div>
                                                            <div class="col-6 col-md-2 px-0 px-sm-1 px-md-2">
                                                                <p class="d-flex inform-box mb-0 justify-content-center">
                                                                    {{$trans('profile.public_profile.p_15')}}</p>
                                                                {{vehicle.cubing}}
                                                            </div>
                                                            <div class="col-12 col-md-3 px-0 px-sm-1 px-md-2">
                                                                <p class="d-flex inform-box mb-0 justify-content-center">
                                                                    {{$trans('profile.public_profile.p_16')}}</p>
                                                                {{vehicle.total_laden_weight}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-reviews" role="tabpanel"
                                             aria-labelledby="pills-reviews-tab">
                                            <transporter-reviews-component/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--    </div>-->

</template>
<script>

    import StarRating from "vue-star-rating";

    export default {

        props: ['info'],
        components: {StarRating},
        data() {
            return {
                // section: 1
            }
        },
        created() {
            console.log("info=>", this.info)
            this.$store.dispatch('getUser').then(reps => {
                console.log("USER=>", this.user)

            })


            console.log("id=>", this.info.user.id)

            this.$store.dispatch("loadReviewsById", this.info.user.id)

        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            fullAddress() {
                if (!this.info.country || this.info.country == '') {
                    return ''
                }
                return this.info.country + ","
                    + this.info.region;
            },
            fullName() {
                return this.info.first_name + " "
                    + this.info.second_name;
            },
        },

        methods: {

            check(field_name, value) {
                if (this.info[field_name] == null) {
                    this.info[field_name] = [];
                }
                if (this.info[field_name] != null) {
                    let array = this.info[field_name];
                    let index = array.findIndex(item => item === value);
                    return index > -1;
                }
                return false;
            },
        }
    }
</script>
<style scoped>
    .btn {
        border-radius: 0;
    }

    .btn-md {
        border-width: 0;
        outline: none;
        border-radius: 0;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, .6);
        cursor: pointer;
    }
</style>
