<template>
<div class="row w-100 m-auto">
    <div class="col-12 mt-2">
        <div class="panel-left">
            <h3 class="mt-0 text-uppercase text-black content-box-title">Categories</h3>
            <ul class="row w-100 m-auto">
                <li v-for="category in categories" class="col-12 col-md-3 col-sm-6 transport-category"
                    v-bind:class="{'active':(selected===category.id)}"
                    @click="selectType(category.id)"
                >
                    <label>
                    <span class="category-label-inner">
                        <span class="animated-icon">
                            <img :src="category.image" width="75px" height="75px" alt="">
                        </span>
                        <span>{{category.title}}</span>
                    </span>
                    </label>
                </li>
            </ul>
        </div>
    </div>
<!--    <div class="hidden-sm hidden-xs col-md-4 col-lg-3 col-12 mt-2">-->
<!--        <div class="panel-right ">-->
<!--            <h4> Publish your listing</h4>-->
<!--            <p> Our system matches your move with those of our other Fretbay users.</p>-->


<!--            <h4>Compare the quotes</h4>-->
<!--            <p> Grouped quotes at low prices are offered by our network of professional carriers.-->
<!--            </p>-->

<!--            <h4> Select a quote</h4>-->
<!--            <p> Establish your transportation terms by contacting the carrier of your choice.-->
<!--            </p>-->

<!--            <h4> Evaluate the service</h4>-->

<!--            <p> Following the move, give your opinion on the mover's service and the quality of the-->
<!--                grouped-->
<!--                transport of your goods.</p>-->

<!--        </div>-->

<!--    </div>-->
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
                this.selected = type;
                this.$emit("select-type", this.selected)
            }
        }

    }
</script>
<style lang="scss">

    .btn-custom-white {
        min-width: 200px;

        color: #737480;
        background-color: #f8f8fa;
        transition: all 0.3s;

        border-radius: 50px;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 7px;
        padding-bottom: 7px;
        line-height: 1.42857;
        border-bottom: 4px solid rgba(0, 0, 0, 0.09);

    }



</style>
