<template>
    <div class="card shadow-sm border-0 mb-4 px-4">
        <div class="card-header">
            <h4 class="text-primary">{{order.title}} </h4>
            <p><em>{{order.description}}</em></p>
            <hr>
            <p class="text-primary">{{status}}</p>
            <hr>
            <h5>{{$trans('profile.order.h5_1')}}</h5>
            <div class="row">
                <div class="col-sm-6 col-12">
                    <p>{{$trans('profile.order.p_1')}}: <strong>{{order.user.name}}</strong></p>
                    <p>{{$trans('profile.order.p_2')}}: <strong>{{order.user.email}}</strong></p>
                </div>
                <div class="col-sm-6 col-12">
                    <p>{{$trans('profile.order.p_3')}}: <strong>{{order.user.profile.telephone_number_1}}</strong></p>
                    <p>{{$trans('profile.order.p_4')}}: <strong>{{order.user.profile.telephone_number_2}}</strong></p>
                </div>
            </div>


        </div>
        <div class="card-body d-md-flex justify-content-between align-items-center py-4 px-0 flex-wrap">
            <md-steppers :md-active-step.sync="currentStep" md-vertical md-linear>
                <md-step id="first" :md-label="$trans('profile.order.label_1')"
                         :md-description="$trans('profile.order.description_1')" :md-editable="false"
                         :md-done.sync="first">

                    <div class="row w-100 mt-1 m-0">
                        <div class="col-sm-4 col-12 mt-2 mt-sm-0 p-0">
                            <i class="svg-icon svg-icon-xs text-secondary mt-n1 mr-2">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                            </i>

                            <strong>{{$trans('profile.order.strong_1')}}:</strong>
                        </div>
                        <div class="col-sm-8 col-12 p-0">
                            <a class="d-flex align-items-center text-secondary" href="#">


                                <strong class="mr-2">{{listing.place_of_loading.postal}},</strong>
                                {{listing.place_of_loading.place_name}}

                            </a>

                            <small> {{$trans('profile.order.small_1')}}
                                <strong style="color: #0fb15d">
                                    {{listing.shipping_date_from | moment('DD.MM')}}
                                </strong>

                                and

                                <strong style="color: #0fb15d">
                                    {{listing.shipping_date_to | moment('DD.MM')}}
                                </strong>
                            </small>
                        </div>

                        <div class="col-sm-4 col-12 mt-2 mt-sm-0 p-0">

                            <i class="svg-icon svg-icon-xs text-secondary mt-n1 mr-2 ">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                            </i>

                            <strong>{{$trans('profile.order.strong_2')}}:</strong>
                        </div>
                        <div class="col-sm-8 col-12 p-0">
                            <a class="d-flex align-items-center text-secondary" href="#">


                                <strong class="mr-2"> {{listing.place_of_delivery.postal}},</strong>
                                {{listing.place_of_delivery.place_name}}
                            </a>

                            <small> {{$trans('profile.order.small_2')}}
                                <strong style="color: #0fb15d">
                                    {{listing.unshipping_date_from | moment('DD.MM')}}
                                </strong> and
                                <strong style="color: #0fb15d">
                                    {{listing.unshipping_date_to | moment('DD.MM')}}
                                </strong>
                            </small>
                        </div>

                        <div class="col-sm-4 col-12 pl-0" v-if="listing.distance>0">
                            <p class="ml-sm-5 ml-0 p-sm-2 p-0 mt-2 mt-sm-0">{{$trans('profile.order.p_5')}}
                                <strong>{{listing.distance}}</strong> km
                            </p>
                        </div>


                        <div class="col-12 pl-0" v-if="listing.moving_package">
                            <p class="ml-sm-5 ml-0 p-sm-2 p-0 mt-2 mt-sm-0"><strong>{{listing.moving_package}}</strong>
                            </p>
                        </div>


                    </div>


                    <md-button class="md-raised md-primary" @click="setDone('first', 'second')">
                        {{$trans('profile.order.button_1')}}
                    </md-button>
                </md-step>

                <md-step id="second" :md-label="$trans('profile.order.label_2')"
                         :md-description="$trans('profile.order.description_2')"
                         :md-error="secondStepError"
                         :md-editable="false" :md-done.sync="second">

                    <div class="row">
                        <div class="col-sm-4 col-12 mt-2 mt-sm-0 p-0">

                            <i class="svg-icon svg-icon-xs text-secondary mt-n1 mr-2 ">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                            </i>

                            <strong>{{$trans('profile.order.strong_2')}}:</strong>
                        </div>
                        <div class="col-sm-8 col-12 p-0">
                            <a class="d-flex align-items-center text-secondary" href="#">


                                <strong class="mr-2"> {{listing.place_of_delivery.postal}},</strong>
                                {{listing.place_of_delivery.place_name}}
                            </a>

                            <small> {{$trans('profile.order.small_2')}}
                                <strong style="color: #0fb15d">
                                    {{listing.unshipping_date_from | moment('DD.MM')}}
                                </strong> and
                                <strong style="color: #0fb15d">
                                    {{listing.unshipping_date_to | moment('DD.MM')}}
                                </strong>
                            </small>
                        </div>
                    </div>


                    <md-button class="md-raised md-primary" @click="setDone('second', 'third')">
                        {{$trans('profile.order.button_2')}}
                    </md-button>
                    <md-button class="md-raised md-primary" @click="setError()">{{$trans('profile.order.button_3')}}
                    </md-button>
                </md-step>


                <md-step id="third"
                         :md-label="$trans('profile.order.label_3')"
                         :md-description="$trans('profile.order.description_3')" :md-editable="false"
                         :md-done.sync="third">

                    <div class="row" v-if="order.review">
                        <div class="col-12">
                            <h4>{{$trans('profile.order.h4_1')}} <span
                                class="p-2 font-size-28"
                                v-bind:class="{
                                            'text-danger':order.review.type===0,
                                            'text-warning':order.review.type===1,
                                            'text-primary':order.review.type===2,
                                        }"
                                v-html="prepareReviewType(order.review.type).data">
                                </span></h4>
                            <hr>
                            <h5>{{order.review.title}}</h5>
                            <p>{{order.review.text}}</p>
                            <h6>{{$trans('profile.order.h6_1')}}</h6>
                            <p><em v-html="prepareReviewType(order.review.type).description"></em></p>
                            <hr>
                        </div>
                    </div>
                    <p v-html="$trans('profile.order.p_6')"></p>

                </md-step>

            </md-steppers>
        </div>

        <div class="card-footer d-md-flex justify-content-between align-items-center px-0">


        </div>
    </div>
</template>
<script>


    export default {

        props: ["order"],

        data() {
            return {
                active: 'first',
                first: true,
                second: false,
                third: false,
                secondStepError: null
            }
        },
        computed: {
            reviewTypes: function () {
                return this.$store.getters.reviewTypes
            },
            listing() {
                return this.order.listing
            },
            status() {
                return ["Begin mission", "Loading", "Shipping", "Unloading", "Complete", "Stopped"][this.order.status] || "Begin mission"
            },
            currentStep() {
                if (this.order.status >= 0 && this.order.status <= 2) {
                    this.first = true;
                    return "first";
                }
                if (this.order.status === 3) {
                    this.first = true;
                    this.second = true
                    return "second";
                }
                if (this.order.status === 4) {
                    this.first = true;
                    this.second = true
                    this.third = true;
                    return "third";
                }
            },
            user: function () {
                return window.user
            },


        },
        methods: {
            prepareReviewType(type) {
                return this.reviewTypes.find(item => item.id === type)
            },
            changeOrderStatus(status) {
                axios.post('/orders/status', {
                    order_id: this.order.id,
                    status: status
                }).then(() => {
                    window.location.reload()
                })
            },
            setDone(id, index) {
                this[id] = true

                this.secondStepError = null

                switch (id) {
                    default:
                    case "first":
                        this.changeOrderStatus(3);
                        break;
                    case "second":
                        this.changeOrderStatus(4);
                        break;
                }


                if (index) {
                    this.active = index

                }

            },
            setError() {
                this.secondStepError = 'This is an error!'
                this.changeOrderStatus(5)
            }
        },
        mounted() {
            console.log("order", this.order)
        }
    }


</script>
<style lang="scss">

    .custom-avatar {
        display: flex;

        width: 70px;
        height: 70px;

        img {
            border: 5px #3fca83 solid;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }


</style>
