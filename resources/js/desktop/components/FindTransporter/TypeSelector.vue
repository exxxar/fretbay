<template>

    <div class="container">
        <h3 class="mt-0 text-uppercase text-black content-box-title mb-0">
            {{$trans('request_a_quote.section_1.h3_1')}}</h3>
        <div class="row pb-5">

            <div class="col-12 col-md-8 mt-2 p-0">
                <div class="row w-100 m-0">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-1 category-card p-1" v-for="category in categories"
                         @click="selectType(category)">
                        <div class="card text-dark">

                            <img class="card-img filtered-img mt-5" v-lazy="category.image+'?v=2'"
                                 style="padding: 20px;" alt="Card image">
                            <div class="card-img-overlay">
                                <p class="card-title p-0 m-0 custom-card-title">{{category.title}}</p>
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
                                    {{$trans('request_a_quote.section_1.button_1')}}

                                    <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseOne" class="collapse show" aria-labelledby="basicsHeadingOne"
                             data-parent="#basicsAccordion">
                            <div class="card-body card-collapse__body px-0">
                                {{$trans('request_a_quote.section_1.div_1')}}
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
                                    {{$trans('request_a_quote.section_1.button_2')}}

                                    <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo"
                             data-parent="#basicsAccordion">
                            <div class="card-body card-collapse__body px-0">
                                {{$trans('request_a_quote.section_1.div_2')}}
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
                                    {{$trans('request_a_quote.section_1.button_3')}}

                                    <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseThree" class="collapse" aria-labelledby="basicsHeadingThree"
                             data-parent="#basicsAccordion">
                            <div class="card-body card-collapse__body px-0">
                                {{$trans('request_a_quote.section_1.div_3')}}
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

                                    {{$trans('request_a_quote.section_1.button_4')}}

                                    <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseFour" class="collapse" aria-labelledby="basicsHeadingFour"
                             data-parent="#basicsAccordion">
                            <div class="card-body card-collapse__body px-0">


                                {{$trans('request_a_quote.section_1.div_4')}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

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
        mounted() {

            if (window.location.search)
                setTimeout(() => {
                    this.$emit("select-type", 2)
                    this.$store.dispatch("setStep", 1)
                }, 2000)

        },
        methods: {

            selectType(type) {


                this.selected = type.id;
                this.$emit("select-type", this.selected)
                window.scrollTo(0, 0);
            }
        }

    }
</script>
<style lang="scss">
    .category-card {
        cursor: pointer;

        .card {
            border: 2px #e3e6f0 solid;

            &:hover {
                border: 2px #21c87a solid;
            }


        }
    }

    .filtered-img {
        filter: drop-shadow(2px 2px 0px #21c87a);
    }


</style>
