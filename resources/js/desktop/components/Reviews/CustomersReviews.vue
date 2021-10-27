<template>
    <div class="row pb-5 d-flex justify-content-center">


        <div class="col-lg-6 mb-2 mb-lg-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="form-group row d-flex justify-content-center mb-0">

                        <label class=" ml-2 mb-2"
                               :for="'review'+item.id"

                               :key="item.id" v-for="item in reviewTypes"
                        >
                    <span class="btn btn-outline-primary"
                          v-bind:class="{'btn-primary text-white':filter.selected_review_types.includes(item.id)}"
                          v-html="item.data"></span>
                            <input type="checkbox" :name="'review'+item.id" :id="'review'+item.id" :value="item.id"
                                   v-model="filter.selected_review_types" style="display: none">
                        </label>

                    </div>
                </div>
            </div>

            <div class="comment-list p-2" v-if="filteredReviews.length>0">
                <review-item-component :key="index" v-for="(item,index) in filteredReviews" :item="item"/>

            </div>

            <div v-else>
                <div class="d-flex p-5 justify-content-center" v-if="filteredReviews.length===0">
                    <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
                </div>
                <h4 class="text-center">{{$trans('profile.page.no_reviews')}}</h4>
            </div>

        </div>


        <div class="col-lg-6 mb-9 mb-lg-0" v-if="filteredReviews">
            <div class="card">
                <div class="card-body">

                    <form v-on:submit.prevent="submit">

                        <div class="form-group">
                            <input type="text" class="form-control mb-0"
                                   placeholder="Review title"
                                   v-model="title"
                                   maxlength="100" required>
                            <span class="text-gray-700" v-if="title.length>0"><small>
                                {{$trans('profile.reviews.span_1')}} {{100-title.length}}</small></span>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control mb-0"
                                      placeholder="Text review"
                                      v-model="text"
                                      maxlength="255" required></textarea>
                            <span class="text-gray-700" v-if="text.length>0"><small>
                                {{$trans('profile.reviews.span_1')}} {{255-text.length}}</small></span>
                        </div>
                        <h6 class="text-center">{{$trans('profile.reviews.h6_1')}}</h6>
                        <div class="form-group row d-flex justify-content-center mb-0">
                            <button class="btn ml-2 mb-2"
                                    type="button"
                                    v-bind:class="{'btn-primary':selected_review_type===item.id,
                                    'btn-outline-primary':selected_review_type!==item.id}"
                                    :key="item.id" v-for="item in reviewTypes"
                                    @click="selected_review_type = item.id" v-html="item.data">
                            </button>

                        </div>
                        <div class="row d-flex justify-content-center mb-2">

                            <small v-if="selected_review_type"><em>{{prepareReviewType(selected_review_type).description}}</em></small>

                        </div>

                        <h6 class="text-center">{{$trans('profile.reviews.h6_2')}}</h6>
                        <div class="form-group row d-flex justify-content-center"
                             v-if="completedOrdersWithoutComment.length>0">

                            <div class="col-12 col-sm-6 ">
                                <div class="input-group mb-3">
                                    <select class="custom-select" v-model="selected_order" reqired>
                                        <option :key="item.id" v-for="item in completedOrdersWithoutComment"
                                                :value="item">{{item.title}}
                                        </option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row" v-else>
                            <div class="col-12">
                                <p class="text-center text-primary">{{$trans('profile.reviews.p_1')}}</p>
                            </div>

                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-sm-6">
                                <button class="btn w-100"
                                        type="submit"
                                        v-bind:class="{'btn-custom-gray':completedOrdersWithoutComment.length===0,
                                        'btn-primary':completedOrdersWithoutComment.length>0}"
                                        :disbaled="completedOrdersWithoutComment.length===0">
                                    {{$trans('profile.reviews.button_1')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</template>
<script>
    export default {
        computed: {
            user: function () {
                return window.user;
            },
            filteredReviews: function () {
                return this.filter.selected_review_types.length === 0 ? this.reviews :
                    this.reviews.filter(item => this.filter.selected_review_types.includes(item.type))
            },
            completedOrdersWithoutComment: function () {
                return this.$store.getters.completedOrdersWithoutComment
            },
            reviewTypes: function () {
                return this.$store.getters.reviewTypes
            },
            reviews: function () {
                return this.$store.getters.reviews
            }
        },
        data: function () {
            return {
                filter: {
                    selected_review_types: []
                },
                title: '',
                text: '',
                selected_review_type: 1,
                selected_order: null,

            }
        },

        mounted() {
            this.loadOrdersWithoutReviews()
            this.loadReviews()
        }
        ,
        methods: {
            prepareReviewType(type) {
                return this.reviewTypes.find(item => item.id === type)
            },
            loadReviews() {
                this.$store.dispatch("loadReviews")
            },
            loadOrdersWithoutReviews() {
                this.$store.dispatch("getOrdersWithoutReviews")
            },
            submit() {
                console.log("this.selected_review_type=>", this.selected_review_type)
                console.log("this.selected_order=>", this.selected_order)
                this.$store.dispatch("addReview", {
                    title: this.title,
                    text: this.text,
                    type: this.selected_review_type,//тип отзыва
                    is_visible: false,//флаг модерации
                    order_id: this.selected_order.id,
                }).then(resp => {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000)
                })
            },

        }


    }
</script>
<style lang="scss">
    .comment-list {
        max-height: 500px;
        overflow-y: auto;
    }

    .btn-custom-checker {
        font-size: 8px;
        padding: 5px 11px;
        border-radius: 5px;
        margin: 5px;
    }

    .prepared-formula-text {
        text-overflow: ellipsis;
        word-break: break-all;
        font-size: 10px;
    }

    .btn-custom-gray {
        background: lightgrey;
        color: gray;
    }
</style>
