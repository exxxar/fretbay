<template>
    <div class="row pb-0 d-flex justify-content-center">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-12 p-2">
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
        </div>
        <div class="col-lg-12 p-0" v-if="filteredReviews.length>0">
            <div class="p-2">
                <review-item-component :key="index" v-for="(item,index) in filteredReviews" :item="item"/>
            </div>
        </div>

        <div class="col-lg-12" v-else>
            <div class="d-flex p-5 justify-content-center" v-if="filteredReviews.length===0">
                <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
            </div>
            <h4 class="text-center">{{ $trans('profile.page.no_reviews') }}</h4>
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
        this.loadReviews()
    }
    ,
    methods: {

        loadReviews() {
            this.$store.dispatch("loadReviews")
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
