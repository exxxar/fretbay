<template>
    <div class="row mt-2">
        <div class="col-sm-6">
            <div class="form-fields-wrap content-box-gray content-box-padding">
                <div class="content-box-gray">
<!--                    <div class="form-group ">-->
<!--                        <input type="text" class="form-control"-->
<!--                               placeholder="3-seater Sofa, chairs, desks...">-->
<!--                    </div>-->

                    <h6>Information about your equipment <span
                        class="text-primary d-inline">(required)</span>
                    </h6>

                    <div class="form-group">
                        <input v-model="new_article.title" type="text" required="" class="form-control "
                               placeholder="Article name">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input v-model="new_article.length" type="text" class="form-control"
                                           placeholder="Length (cm)" required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/longeur.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input v-model="new_article.width" type="text" class="form-control" placeholder="Width (cm)"
                                           required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/largeur.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input v-model="new_article.height" type="text" class="form-control"
                                           placeholder="Height (cm)" required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/hauteur.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input v-model="new_article.weight" type="text" class="form-control" placeholder="Weight"
                                           required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/poids.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input v-model="new_article.quantity" type="text"
                                           class="form-control"
                                           placeholder="Quantity" required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/quantity.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <div class="row">-->
<!--                        <div class="col-6">-->
<!--                            <div class="input-has-icon-right">-->
<!--                                <input type="text" class="form-control" placeholder="Make" required="">-->

<!--                                <span class="rel-icon rel-icon-square"><img-->
<!--                                    src="/images/common/icons/units/hauteur.svg"-->
<!--                                    alt=""></span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-6">-->
<!--                            <div class="input-has-icon-right">-->
<!--                                <input type="text" class="form-control" placeholder="Model" required="">-->
<!--                                <span class="rel-icon rel-icon-square"><img-->
<!--                                    src="/images/common/icons/units/hauteur.svg"-->
<!--                                    alt=""></span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div class="row">-->
<!--                        <div class="col-12 p-2">-->
<!--                            <div class="custom-control custom-switch">-->
<!--                                <input type="checkbox" class="custom-control-input" id="accept_conveyors">-->
<!--                                <label class="custom-control-label" for="accept_conveyors">I accept conveyors</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div class="row">-->
<!--                        <div class="col-12 p-2">-->
<!--                            <div class="custom-control custom-switch">-->
<!--                                <input type="checkbox" class="custom-control-input" id="fragile_goods">-->
<!--                                <label class="custom-control-label" for="fragile_goods">Fragile goods</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->


<!--                    <div class="row mb-2">-->
<!--                        <div class="col-12">-->
<!--                            <div class="input-has-icon-right">-->
<!--                                <input type="text" class="form-control" placeholder="Estimated value" required="">-->
<!--                                <span class="rel-icon rel-icon-square">-->
<!--                                    <img src="/images/common/icons/units/euro.svg" alt="">-->
<!--                                </span>-->
<!--                            </div>-->

<!--                        </div>-->
<!--                    </div>-->


<!--                    <div class="row mb-2">-->
<!--                        <div class="col-12">-->
<!--                            <div class="input-has-icon-right">-->
<!--                                <input type="text" class="form-control" placeholder="Animal bread" required="">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->


<!--                    <div class="row mb-2">-->
<!--                        <div class="col-6">-->
<!--                            <div class="input-has-icon-right">-->
<!--                                <input type="text" class="form-control" placeholder="Special needs" required="">-->
<!--                                <span class="rel-icon rel-icon-square">-->
<!--                                    <img src="https://fretbay.com/en/assets/images/common/icons/units/need.svg" alt="">-->
<!--                                </span>-->
<!--                            </div>-->

<!--                        </div>-->

<!--                        <div class="col-6">-->
<!--                            <div class="input-has-icon-right">-->
<!--                                <input type="text" class="form-control" placeholder="Are the vaccinations up to date?"-->
<!--                                       required="">-->
<!--                                <span class="rel-icon rel-icon-square">-->
<!--                                    <img src="https://fretbay.com/en/assets/images/common/icons/units/vaccine.svg"-->
<!--                                         alt="">-->
<!--                                </span>-->
<!--                            </div>-->

<!--                        </div>-->
<!--                    </div>-->

<!--                    <h6>Cage (optional)</h6>-->

<!--                    <div class="row mb-2">-->
<!--                        <div class="col-4">-->
<!--                            <div class="form-group ">-->
<!--                                <div class="input-has-icon-right">-->
<!--                                    <input type="text" class="form-control"-->
<!--                                           placeholder="Cage length (cm)" required="">-->
<!--                                    <span class="rel-icon rel-icon-square"><img-->
<!--                                        src="/images/common/icons/units/longeur.svg"-->
<!--                                        alt=""></span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-4">-->
<!--                            <div class="form-group ">-->
<!--                                <div class="input-has-icon-right">-->
<!--                                    <input type="text" class="form-control" placeholder="Cage width (cm)"-->
<!--                                           required="">-->
<!--                                    <span class="rel-icon rel-icon-square"><img-->
<!--                                        src="/images/common/icons/units/largeur.svg"-->
<!--                                        alt=""></span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-4">-->
<!--                            <div class="form-group ">-->
<!--                                <div class="input-has-icon-right">-->
<!--                                    <input type="text"-->
<!--                                           class="form-control"-->
<!--                                           placeholder="Cage height" required="">-->
<!--                                    <span class="rel-icon rel-icon-square"><img-->
<!--                                        src="/images/common/icons/units/hauteur.svg"-->
<!--                                        alt=""></span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="form-group ">
                        <button v-if="edit_mode" class="btn btn-custom-danger" @click="cancel" :disabled="true">Cancel article
                        </button>
                        <button v-if="edit_mode" class="btn btn-custom-white" @click="save" :disabled="true">Save article
                        </button>
                        <button v-if="!edit_mode" @click="add" class="btn btn-custom-white">
                            Add article
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 bg-gray-xs">
            <div class="article-section">
                <div class="articles-list-scroll">
                    <ul class="articles-list">
                        <li v-for="article in article_items">
                            <div class="article-header position-relative">
                                <div class="article-controls position-absolute float-right" style="right: 0;">
                                    <div>
                                        <a class="article-edit">
                                            edit-icon
                                        </a>
                                        <a class="article-delete">
                                            delete-icon
                                        </a>
                                    </div>

                                </div>
                                <h4 class="article-title">{{article.title}}</h4>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="article-unit-text">Height</span>
                                    <span class="badge">{{article.height}}</span>
                                </li>

                                <li class="list-group-item">
                                    <span class="article-unit-text">Width</span>
                                    <span class="badge">{{article.width}}</span>
                                </li>

                                <li class="list-group-item">
                                    <span class="article-unit-text">Weight</span>
                                    <span class="badge">{{article.weight}}</span>
                                </li>
                                <li class="list-group-item">
                                    <span class="article-unit-text">Length</span>
                                    <span class="badge">{{article.length}}</span>
                                </li>
                                <li class="list-group-item">
                                    <span class="article-unit-text">Quantity</span>
                                    <span class="badge">{{article.quantity}}</span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-end mt-2 w-100">
            <div class="col-2">
                <button class="btn btn-custom-danger" @click="prevStep">Back</button>
            </div>
            <div class="col-3">
                <button class="btn btn-custom-white" @click="nextStep" :disabled="article_items.length===0">Next</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                type: null,
                new_article: {
                    category_title: "",
                    title: "",
                    can_moving:null,
                    accept_conveyors: null,
                    is_fragile_goods: false,
                    length: 0,
                    width: 0,
                    height: 0,
                    weight: 0,
                    quantity: 0,
                    properties: [
                        {
                            key: 'estimated value',
                            value: 0,
                            units: '$'
                        },
                        {
                            key: 'make',
                            value: 'Test',
                        },
                        {
                            key: 'model',
                            value: 'Test',
                        },
                        {
                            key: 'length',
                            value: 0,
                            units: 'cm'
                        },
                        {
                            key: 'width',
                            value: 0,
                            units: 'cm'
                        },

                        {
                            key: 'height',
                            value: 0,
                            units: 'cm'
                        },
                        {
                            key: 'weight',
                            value: 0,
                            units: 'kg'
                        },

                        {
                            key: 'quantity',
                            value: 0,
                        },
                    ]
                },
                edit_article: {
                    category_title: "",
                    title: "",
                    can_moving:null,
                    accept_conveyors: null,
                    is_fragile_goods: false,
                    length: 0,
                    width: 0,
                    height: 0,
                    weight: 0,
                    quantity: 0,
                    properties: [
                        {
                            key: 'estimated value',
                            value: 0,
                            units: '$'
                        },
                        {
                            key: 'make',
                            value: 'Test',
                        },
                        {
                            key: 'model',
                            value: 'Test',
                        },
                        {
                            key: 'length',
                            value: 0,
                            units: 'cm'
                        },
                        {
                            key: 'width',
                            value: 0,
                            units: 'cm'
                        },

                        {
                            key: 'height',
                            value: 0,
                            units: 'cm'
                        },
                        {
                            key: 'weight',
                            value: 0,
                            units: 'kg'
                        },

                        {
                            key: 'quantity',
                            value: 0,
                        },
                    ]
                },
                temp_article: {
                    category_title: "",
                    title: "",
                    can_moving:null,
                    accept_conveyors: null,
                    is_fragile_goods: false,
                    length: 0,
                    width: 0,
                    height: 0,
                    weight: 0,
                    quantity: 0,
                    properties: [
                        {
                            key: 'estimated value',
                            value: 0,
                            units: '$'
                        },
                        {
                            key: 'make',
                            value: 'Test',
                        },
                        {
                            key: 'model',
                            value: 'Test',
                        },
                        {
                            key: 'length',
                            value: 0,
                            units: 'cm'
                        },
                        {
                            key: 'width',
                            value: 0,
                            units: 'cm'
                        },

                        {
                            key: 'height',
                            value: 0,
                            units: 'cm'
                        },
                        {
                            key: 'weight',
                            value: 0,
                            units: 'kg'
                        },

                        {
                            key: 'quantity',
                            value: 0,
                        },
                    ]
                },
                edit_mode: false
            }
        },
        computed: {
            article_items() {
                return this.$store.getters.articleCart;
            }
        },
        methods: {
            selectType(type) {
                this.type = type
            },
            add() {
                this.article_items.push(this.new_article);
            },
            edit(article) {
                this.temp_article.title = article.title;
                this.temp_article.length = article.length;
                this.temp_article.width = article.width;
                this.temp_article.height = article.height;
                this.temp_article.weight = article.weight;
                this.temp_article.quantity = article.quantity;

                this.edit_article.title = article.title;
                this.edit_article.length = article.length;
                this.edit_article.width = article.width;
                this.edit_article.height = article.height;
                this.edit_article.weight = article.weight;
                this.edit_article.quantity = article.quantity;

                this.edit_mode = true;

            },
            delete(index) {
                this.$store.dispatch('removeArticleItem', index)
            },
            save() {
                this.edit_mode = false;
            },
            cancel() {
                this.edit_mode = false;
            },
            nextStep() {
                this.$store.dispatch('setStep', 2)
            },
            prevStep() {
                this.$store.dispatch('setStep', 0)
            },
        }
    }
</script>
<style lang="scss">
    .content-box-gray {
        background: #f3f4f8;
        border-radius: 12px;
        padding: 10px;
        box-sizing: border-box;

        .input-has-icon-right {
            position: relative;

            input {
                font-size: 12px;
            }

            .rel-icon {
                position: absolute;
                right: 6px;
                left: auto;
                top: -3px;

                img {
                    width: 30px;
                    height: 30px;
                }
            }
        }
    }

    .form-control {
        padding: 10px 34px 10px 10px;
    }


</style>
