<template>
    <div>
        <steps :step="0"/>

        <div class="container">

            <div class="row">
                <div class="col-lg-9 col-md-6 col-12 mt-2">
                    <div class="panel-left">
                        <div v-if="step===0">
<!--                            <type-selector v-on:select-type="selectType"/>-->
                            <adress-info-form/>
                        </div>

                        <div v-if="step===1">

                            <div v-if="category.mode =='article'">
                                <article-form :category="category"/>
                            </div>
                            <div v-if="category.mode =='grid'">
                                <grid :category="category"></grid>
                            </div>
                            <div v-if="category.mode =='calculator'">
                                <moving-category :category="category"></moving-category>
                            </div>

<!--                            <type-of-transport/>-->
                        </div>
                        <div v-if="step===2">
                            <adress-info-form/>
                        </div>
                        <div v-if="step===3">
                            if user not logged in --> registration
                            Order complete
                        </div>

                    </div>


                </div>

                <div class="col-lg-3 col-md-6 col-12 mt-2">
                    <div class="panel-right ">
                        <h4> Publish your listing</h4>
                        <p> Our system matches your move with those of our other Fretbay users.</p>


                        <h4>Compare the quotes</h4>
                        <p> Grouped quotes at low prices are offered by our network of professional carriers.
                        </p>

                        <h4> Select a quote</h4>
                        <p> Establish your transportation terms by contacting the carrier of your choice.
                        </p>

                        <h4> Evaluate the service</h4>

                        <p> Following the move, give your opinion on the mover's service and the quality of the
                            grouped
                            transport of your goods.</p>

                    </div>

                </div>
            </div>

        </div>
    </div>
</template>
<script>
    import Steps from '../components/FindTransporter/Steps'
    import TypeSelector from '../components/FindTransporter/TypeSelector'
    import ArticleForm from '../components/FindTransporter/ArticleForm'
    import VolumeForm from '../components/FindTransporter/VolumeForm'
    import InventoryForm from '../components/FindTransporter/InventoryForm'
    import TypeOfTransport from '../components/FindTransporter/TypeOfTransport'
    import MovingPackageForm from '../components/FindTransporter/MovingPackageForm'
    import AdressInfoForm from '../components/FindTransporter/AdressInfoForm'
    import MovingCategory from "../components/FindTransporter/MovingCategory";

    export default {
        components: {
            MovingCategory,
            Steps, TypeSelector, ArticleForm, VolumeForm, InventoryForm, TypeOfTransport,MovingPackageForm, AdressInfoForm
        },
        data() {
            return {
                category: null,
                component_name:''
            }
        },
        computed: {
            categories() {
                return this.$store.getters.categories;
            },
            step() {
                return this.$store.getters.step;
            }
        },
        created() {
            if(this.categories.length <=0)
            {
                this.$store.dispatch('getCategories')
            }
        },
        mounted() {
            this.$store.dispatch('setStep', 0)
        },
        methods: {
            selectType(id) {
                //todo: find object of category by id or index
                let index = this.categories.findIndex(category => category.id === id)
                this.category = this.categories[index];
                this.$store.dispatch('editNewListing', {key:'category', value: id})
                // if(this.category.mode === 'calculator') {
                //     this.component_name = 'inventory-form';
                // }
                // else if (this.category.mode === 'grid')
                // {
                //     this.component_name = 'grid';
                // }
                // else {
                //     this.component_name = 'article-form';
                // }
                this.$store.dispatch('setStep', 1)
            },
            submit() {

            }
        }
    }
</script>

<style lang="scss">

    .articles-list {
        li {
            padding: 10px;
            background: #f3f4f8;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;

            .article-header {
                width: 100%;
                display: flex;
            }

            .list-group {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;

                .list-group-item {
                    position: relative;
                    background-color: #fff;
                    border: 1px solid rgba(0, 0, 0, 0.125);
                    display: inline;
                    padding: 5px;
                    font-size: 10px;
                    border-radius: 10px;
                    margin-left: 5px;
                    margin-top: 5px;
                }
            }
        }
    }
    .panel-left {
        padding: 20px;
        background: white;
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: 0 3px 1px 0 rgb(0 0 0 / 6%);
    }

    .panel-right {
        padding: 20px;
        background: lightgray;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .transport-category {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px;


        &.active {


            &:after {
                content: '';
                background: url(/images/common/icons/general/circle-check.svg) no-repeat center center;
                width: 30px;
                height: 30px;
                position: absolute;
                left: 15px;
                top: 15px;
            }

            label {
                border: 2px #0083fe solid;
                background-color: #008bdb17;

            }
        }

        label {

            min-height: 170px;
            width: 100%;
            padding: 14px 20px;
            cursor: pointer;
            border-radius: 10px;
            transition: .3s;
            text-align: center;

            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px transparent solid;

            &:hover {
                background-color: #008bdb17;
                border: 2px #0083fe solid;
            }

            span.category-label-inner {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                flex-direction: column;

            }
        }
    }



</style>

