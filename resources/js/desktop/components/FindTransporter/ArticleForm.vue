<template>
    <div class="row mt-2">
        <div class="col-sm-6">
            <div class="form-fields-wrap content-box-gray content-box-padding">
                <ValidationObserver v-slot="{ invalid }">
                    <div class="content-box-gray">
                        <ValidationProvider name="listing_title" rules="required" v-slot="{ errors }">
                            <div class="form-group ">
                                <input v-model="listing_title" @blur="saveListingTitle" type="text" class="form-control"
                                       placeholder="3-seater Sofa, chairs, desks...">
                            </div>
                        </ValidationProvider>
                        <h6>Information about your equipment <span
                            class="text-primary d-inline">(required)</span>
                        </h6>

                        <div class="form-group">
                            <ValidationProvider name="Article name" rules="required" v-slot="{ errors }">
                                <input v-model="modes[mode].title" type="text" required="" class="form-control "
                                       placeholder="Article name">`
                            </ValidationProvider>
                        </div>
                        <div class="row m-auto w-100">
                            <template v-for="property in category.properties">
                                <article-input :field="property" :data.sync="modes[mode].properties[property.slug]"></article-input>
                            </template>
                        </div>
    <!--                    <div class="row">-->
    <!--                        <div class="col-6">-->
    <!--                            <div class="form-group ">-->
    <!--                                <div class="input-has-icon-right">-->
    <!--                                    <input v-model="modes[mode].length" type="number" class="form-control"-->
    <!--                                           placeholder="Length (cm)" required="">-->
    <!--                                    <span class="rel-icon rel-icon-square"><img-->
    <!--                                        src="/images/common/icons/units/longeur.svg"-->
    <!--                                        alt=""></span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="col-6">-->
    <!--                            <div class="form-group ">-->
    <!--                                <div class="input-has-icon-right">-->
    <!--                                    <input v-model="modes[mode].width" type="number" class="form-control" placeholder="Width (cm)"-->
    <!--                                           required="">-->
    <!--                                    <span class="rel-icon rel-icon-square"><img-->
    <!--                                        src="/images/common/icons/units/largeur.svg"-->
    <!--                                        alt=""></span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="row">-->
    <!--                        <div class="col-4">-->
    <!--                            <div class="form-group ">-->
    <!--                                <div class="input-has-icon-right">-->
    <!--                                    <input v-model="modes[mode].height" type="text" class="form-control"-->
    <!--                                           placeholder="Height (cm)" required="">-->
    <!--                                    <span class="rel-icon rel-icon-square"><img-->
    <!--                                        src="/images/common/icons/units/hauteur.svg"-->
    <!--                                        alt=""></span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="col-4">-->
    <!--                            <div class="form-group ">-->
    <!--                                <div class="input-has-icon-right">-->
    <!--                                    <input v-model="modes[mode].weight" type="text" class="form-control" placeholder="Weight"-->
    <!--                                           required="">-->
    <!--                                    <span class="rel-icon rel-icon-square"><img-->
    <!--                                        src="/images/common/icons/units/poids.svg"-->
    <!--                                        alt=""></span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="col-4">-->
    <!--                            <div class="form-group ">-->
    <!--                                <div class="input-has-icon-right">-->
    <!--                                    <input v-model="modes[mode].quantity" type="text"-->
    <!--                                           class="form-control"-->
    <!--                                           placeholder="Quantity" required="">-->
    <!--                                    <span class="rel-icon rel-icon-square"><img-->
    <!--                                        src="/images/common/icons/units/quantity.svg"-->
    <!--                                        alt=""></span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
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
                        <div class="form-group row w-100 m-auto">
                            <div class="col-6" v-if="mode === 1">
                                <button class="btn btn-custom-danger" @click="cancel" :disabled="true">Cancel article
                                </button>
                            </div>
                            <div class="col-6" v-if="mode === 1">
                                <button class="btn btn-custom-white" @click="save" :disabled="invalid">Save article
                                </button>
                            </div>
                            <div class="col-12" v-if="mode === 0">
                                <button @click="add" :disabled="invalid" class="btn btn-custom-white">
                                    Add article
                                </button>
                            </div>
                        </div>
                    </div>
                </ValidationObserver>
            </div>
        </div>
        <div class="col-sm-6 bg-gray-xs">
            <div class="article-section">
                <div class="articles-list-scroll">
                    <ul class="articles-list">
                        <li v-for="(article, index) in article_items">
                            <div class="article-header">
                                <div class="row m-auto w-100">
                                    <div class="col-8">
                                        <h4 class="article-title">{{article.title}}</h4>
                                    </div>
                                    <div class="col-4">
                                        <div class="article-controls">
                                            <div class="article-edit" @click="edit(index, article)">
                                                Edit
                                            </div>
                                            <div class="article-delete" @click="remove(index)" v-if="mode === 0">
                                                Remove
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul v-for="property in category.properties" class="list-group">
                                <li class="list-group-item">
                                    <span class="article-unit-text">{{property.title}}</span>
                                    <span class="badge">{{article.properties[property.slug]}}</span>
                                </li>

<!--                                <li class="list-group-item">-->
<!--                                    <span class="article-unit-text">Height</span>-->
<!--                                    <span class="badge">{{article.height}}</span>-->
<!--                                </li>-->
<!--                                <li class="list-group-item">-->
<!--                                    <span class="article-unit-text">Width</span>-->
<!--                                    <span class="badge">{{article.width}}</span>-->
<!--                                </li>-->
<!--                                <li class="list-group-item">-->
<!--                                    <span class="article-unit-text">Weight</span>-->
<!--                                    <span class="badge">{{article.weight}}</span>-->
<!--                                </li>-->
<!--                                <li class="list-group-item">-->
<!--                                    <span class="article-unit-text">Length</span>-->
<!--                                    <span class="badge">{{article.length}}</span>-->
<!--                                </li>-->
<!--                                <li class="list-group-item">-->
<!--                                    <span class="article-unit-text">Quantity</span>-->
<!--                                    <span class="badge">{{article.quantity}}</span>-->
<!--                                </li>-->
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
    import ArticleInput from "../Articles/ArticleInput";
    export default {
        components: {
            ArticleInput
        },
        props:['category'],
        data() {
            return {
                type: null,
                listing_title:'',
                new_article: {
                    category_title: "",
                    title: "",
                    can_moving:null,
                    accept_conveyors: null,
                    is_fragile_goods: false,
                    length: '',
                    width: '',
                    height: '',
                    weight: '',
                    quantity: '',
                    properties: [

                    ]
                },
                edit_article: {
                    category_title: "",
                    title: "",
                    can_moving:null,
                    accept_conveyors: null,
                    is_fragile_goods: false,
                    length: '',
                    width: '',
                    height: '',
                    weight: '',
                    quantity: '',
                    properties: [

                    ]
                },
                temp_article: {
                    category_title: "",
                    title: "",
                    can_moving:null,
                    accept_conveyors: null,
                    is_fragile_goods: false,
                    length: '',
                    width: '',
                    height: '',
                    weight: '',
                    quantity: '',
                    properties: [

                    ]
                },
                // edit_mode: false,
                edit_index:'',
                mode:0,
                modes:['new_article', 'edit_article']
            }
        },
        created() {
            this.category.properties.forEach(item=> {
                if(item.type==='checkbox')
                {
                    this.new_article.properties[item.slug]={ value:false};
                    this.edit_article.properties[item.slug]={ value:false};
                    this.temp_article.properties[item.slug]={ value:false};
                }
                else {
                    this.new_article.properties[item.slug]={ value:''};
                    this.edit_article.properties[item.slug]={ value:''};
                    this.temp_article.properties[item.slug]={ value:''};
                }

            })
        },
        computed: {
            article_items() {
                return this.$store.getters.articleCart;
            },
        },
        methods: {
            selectType(type) {
                this.type = type
            },
            add() {
                // this.article_items.push(this.new_article);
                this.$store.dispatch('addArticleItemToCart', this.new_article)
                this.$store.dispatch('editNewListing', {key:'articles', value: this.article_items});
            },
            edit(index, article) {
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

                // this.edit_mode = true;
                this.mode = 1;
                this.edit_index = index;

            },
            remove(index) {
                this.$store.dispatch('removeArticleItem', index)
                this.$store.dispatch('editNewListing', {key:'articles', value: this.article_items});
            },
            save() {
                this.$store.dispatch('setArticleItemInCart', {index: this.edit_index, item: this.edit_article});
                this.$store.dispatch('editNewListing', {key:'articles', value: this.article_items});
                this.mode = 0;
                // this.edit_mode = false;
            },
            cancel() {
                this.mode = 0;
                // this.edit_mode = false;
            },
            nextStep() {
                this.$store.dispatch('setStep', 3)
            },
            prevStep() {
                this.$store.dispatch('setStep', 1)
            },
            saveListingTitle() {
                this.$store.dispatch('editNewListing', {key:'title', value: this.listing_title})
            }
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
