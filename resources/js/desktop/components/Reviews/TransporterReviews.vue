<template>
    <div class="row pb-5 d-flex justify-content-center">


        <div class="col-lg-12 mb-9 mb-lg-0 " v-if="filteredReviews.length>0">

            <div class="row">
                <div class="col-12 p-2">
                    <div class="form-group row d-flex justify-content-center mb-0">

                        <label class=" ml-2 mb-2"
                               :for="'review'+item.id"

                               :key="item.id" v-for="item in review_types"
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

            <div class="p-2">
                <review-item-component :key="index" v-for="(item,index) in filteredReviews" :item="item"/>
            </div>
        </div>

        <div class="col-lg-12 mb-9 mb-lg-0" v-else>
            <p>Reviews list is Empty</p>
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
                review_types: [
                    {
                        id: 0,
                        data: '<i class="far fa-angry"></i>',
                        description: 'You were dissatisfied with the work of the carrier'
                    },
                    {
                        id: 1,
                        data: '<i class="far fa-meh"></i>',
                        description: 'You are neutral about the work of the carrier'
                    },
                    {
                        id: 2,
                        data: '<i class="far fa-smile"></i>',
                        description: 'You liked the quality of the carrier\'s services'
                    }
                ],
                completed_orders_without_comment: [
                    {
                        id: 1,
                        title: 'Order 1'
                    },
                    {
                        id: 2,
                        title: 'Order 2'
                    }
                ],
                reviews: [
                    {
                        id: 1,
                        title: 'Bad service',
                        text: 'This transporter is bad',
                        type: 0,
                        is_visible: true,
                        user_id: 1,
                        order_id: 1,
                        transporter_id: 1,
                        review_id: null,
                        created_at:'2021-07-12 21:37:34',
                        transporter: {
                            profile: {
                                company_name: 'Test company'
                            }
                        }
                    },
                    {
                        id: 2,
                        title: 'Neutral service',
                        text: 'This transporter is Neutral',
                        type: 1,
                        is_visible: true,
                        user_id: 1,
                        order_id: 2,
                        transporter_id: 1,
                        review_id: null,
                        created_at:'2021-07-12 21:37:34',
                        transporter: {
                            profile: {
                                company_name: 'Test company'
                            }
                        }
                    },
                    {
                        id: 3,
                        title: 'Good service',
                        text: 'This transporter is Good',
                        type: 2,
                        is_visible: true,
                        user_id: 1,
                        order_id: 2,
                        transporter_id: 1,
                        review_id: null,
                        created_at:'2021-07-12 21:37:34',
                        transporter: {
                            profile: {
                                company_name: 'Test company'
                            }
                        }
                    }
                ]
            }
        },

        mounted() {

        }
        ,
        methods: {

            submit() {

                axios.post('/transporter/listing/quotes/add', {
                    price: this.bidPrice,
                    type_of_transport: this.type_of_transport,
                    quote_validity: this.quote_validity,
                    status: 0,
                    currency: this.currentCurrency,
                    listing_id: this.listing.id,
                    user_id: this.user.id,
                    formula: this.selected_formula
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
</style>
