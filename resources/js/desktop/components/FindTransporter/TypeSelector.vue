<template>

    <div>
        <h3 class="mt-0 text-uppercase text-black content-box-title">Categories</h3>
        <ul class="row">
            <li v-for="category in categories" class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===category.id)}"
                @click="selectType(category.id)">
                <label>
                    <span class="category-label-inner">
                        <span class="animated-icon">
                            <img :src="category.image" width="75px" height="75px" alt="">
                        </span>
                        <span>{{category.title}}</span>
                    </span>
                </label>
            </li>
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===0)}"-->
<!--                @click="selectType(0)">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/1.svg" width="75px"-->
<!--                                 height="75px" alt="">-->
<!--                        </span>-->
<!--                        <span>Household equipment</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===1)}"-->
<!--                @click="selectType(1)">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/2.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->

<!--                        </span>-->
<!--                        <span>Moving</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===2)}"-->
<!--                @click="selectType(2)">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/3.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->
<!--    -->
<!--                        </span>-->
<!--                        <span>Vehicle</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===3)}"-->
<!--                @click="selectType(3)">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/17.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->
<!--                        </span>-->
<!--                        <span>Motorcycles and sports vehicles</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===4)}"-->
<!--                @click="selectType(4)" v-show="need_more">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/5.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->

<!--                        </span>-->
<!--                        <span>Boats &amp; voluminous</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===5)}"-->
<!--                @click="selectType(5)" v-show="need_more">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/13.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->

<!--                        </span>-->
<!--                        <span>Fragile goods</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===6)}"-->
<!--                @click="selectType(6)" v-show="need_more">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/18.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->
<!--    -->
<!--                        </span>-->
<!--                        <span>Package/Fold</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===7)}"-->
<!--                @click="selectType(7)" v-show="need_more">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/19.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->

<!--                        </span>-->
<!--                        <span> Pallet </span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===8)}"-->
<!--                @click="selectType(8)" v-show="need_more">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/11.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->

<!--                        </span>-->
<!--                        <span>Animals</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===9)}"-->
<!--                @click="selectType(9)" v-show="need_more">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/14.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->

<!--                        </span>-->
<!--                        <span>Agri-food</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===10)}"-->
<!--                @click="selectType(10)" v-show="need_more">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img src="/images/common/icons/category/default/9.svg?v=0.0.4"-->
<!--                                 width="75px" height="75px" alt="">-->

<!--                        </span>-->
<!--                        <span>Commercial goods</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--            <li class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===11)}"-->
<!--                @click="selectType(11)" v-show="need_more">-->
<!--                <label>-->
<!--										<span class="category-label-inner">-->
<!--											<span class="animated-icon">-->
<!--												<img src="/images/common/icons/category/default/6.svg?v=0.0.4"-->
<!--                                                     width="75px" height="75px" alt="">-->

<!--											</span>-->
<!--											<span>Miscellaneous</span>-->
<!--										</span>-->
<!--                </label>-->
<!--            </li>-->
        </ul>

<!--        <div class="text-center">-->
<!--            <a href="#" class="btn btn-custom-white" @click="need_more = !need_more">-->

<!--                <span v-if="!need_more">Show all</span>-->
<!--                <span v-else>Hide other</span>-->
<!--            </a>-->
<!--        </div>-->


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
