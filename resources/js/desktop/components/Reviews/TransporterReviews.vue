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
            <div class="d-flex p-5 justify-content-center"  v-if="filteredReviews.length===0">
                <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
            </div>
            <h4 class="text-center">No reviews yet!</h4>
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
                ]
            }
        },

        mounted() {
             this.loadReviews()
        }
        ,
        methods: {

            loadReviews() {
                axios.get("/reviews/list").then(resp => {
                    this.reviews = resp.data.reviews
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
