<template>

    <div class="container">
        <h3 class="mt-0 text-uppercase text-black content-box-title">Categories</h3>
        <div class="row pb-5 pt-5">


            <div class="col-12 col-md-8 mt-2">
                <div class="row w-100">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-2" v-for="category in categories"
                         @click="selectType(category)">
                        <div class="card text-dark">
                            <img class="card-img " v-lazy="category.image" style="padding: 20px;" alt="Card image">
                            <div class="card-img-overlay">
                                <h6 class="card-title">{{category.title}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div id="basicsAccordion">
                    <div class="card border-0 mb-3">
                        <div class="card-header card-collapse__header" id="basicsHeadingOne">
                            <h5 class="mb-0">
                                <button
                                    class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn"
                                    data-toggle="collapse" data-target="#basicsCollapseOne" aria-expanded="true"
                                    aria-controls="basicsCollapseOne">
                                    Publish your listing

                                    <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseOne" class="collapse show" aria-labelledby="basicsHeadingOne"
                             data-parent="#basicsAccordion">
                            <div class="card-body card-collapse__body px-0">
                                Our system matches your move with those of our other Fretbay users.
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 mb-3">
                        <div class="card-header card-collapse__header" id="basicsHeadingTwo">
                            <h5 class="mb-0">
                                <button
                                    class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                    data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false"
                                    aria-controls="basicsCollapseTwo">
                                    Compare the quotes

                                    <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo"
                             data-parent="#basicsAccordion">
                            <div class="card-body card-collapse__body px-0">
                                Grouped quotes at low prices are offered by our network of professional carriers.
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 mb-3">
                        <div class="card-header card-collapse__header" id="basicsHeadingThree">
                            <h5 class="mb-0">
                                <button
                                    class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                    data-toggle="collapse" data-target="#basicsCollapseThree" aria-expanded="false"
                                    aria-controls="basicsCollapseThree">
                                    Select a quote

                                    <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseThree" class="collapse" aria-labelledby="basicsHeadingThree"
                             data-parent="#basicsAccordion">
                            <div class="card-body card-collapse__body px-0">
                                Establish your transportation terms by contacting the carrier of your choice.
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 mb-3">
                        <div class="card-header card-collapse__header" id="basicsHeadingFour">
                            <h5 class="mb-0">
                                <button
                                    class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                    data-toggle="collapse" data-target="#basicsCollapseFour" aria-expanded="false"
                                    aria-controls="basicsCollapseFour">
                                    Evaluate the service

                                    <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseFour" class="collapse" aria-labelledby="basicsHeadingFour"
                             data-parent="#basicsAccordion">
                            <div class="card-body card-collapse__body px-0">
                                Following the move, give your opinion on the mover's service and the quality of the
                                grouped transport of your goods.
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>


       <quotes-cpmponent/>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                need_more: true,
                selected: '',
            }
        },
        computed: {
            categories() {
                return this.$store.getters.categories;
            },



        },

        methods: {

            selectType(type) {

                console.log("select-type", type)

                this.selected = type.id;
                this.$emit("select-type", this.selected)
            }
        }

    }
</script>
<style lang="scss">


</style>
