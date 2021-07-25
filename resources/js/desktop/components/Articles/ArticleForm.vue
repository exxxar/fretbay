<template>
    <div class="row mt-2">
        <div class="col-12 col-sm-6">
            <div class="form-fields-wrap content-box-gray content-box-padding">
                <div class="content-box-gray">
                    <ValidationProvider name="listing_title" rules="required" v-slot="{ errors }">
                        <div class="form-group">
                            <input v-model="listing_title" @blur="saveListingTitle" type="text" class="form-control"
                                   placeholder="3-seater Sofa, chairs, desks...">
                        </div>
                    </ValidationProvider>
                    <h6>Information about your equipment <span
                        class="text-primary d-inline">(required)</span></h6>
                    <ValidationObserver ref="article" disabled v-slot="observer">
                        <div class="form-group">
                            <ValidationProvider name="Article name" rules="required">
                                <input v-if="mode===0" v-model="new_article.title" type="text" class="form-control"
                                       placeholder="Article name">
                                <input v-else v-model="edit_article.title" type="text" class="form-control "
                                       placeholder="Article name">
                            </ValidationProvider>
                        </div>
                        <div class="row m-auto w-100">
                            <div class="col-12 col-sm-6 p-1" v-for="property in category.properties">
                                <article-input v-if="mode===0" :field="property" :props_data.sync="new_article.properties[property.slug]">
                                </article-input>
                                <article-input v-else :field="property" :props_data.sync="edit_article.properties[property.slug]">
                                </article-input>
                            </div>
                        </div>

                        <div class="form-group row w-100 m-auto">
                            <div class="col-12 col-sm-6" v-if="mode === 1">
                                <button class="btn btn-warning w-100" @click="cancel">
                                    Cancel
                                </button>
                            </div>
                            <div class="col-12 col-sm-6" v-if="mode === 1">
                                <button class="btn btn-primary w-100"
                                        @click="save"
                                        :disabled="observer.invalid"
                                >
                                    Save
                                </button>
                            </div>
                            <div class="col-12" v-if="mode === 0">
                                <button @click="add"
                                        :disabled="observer.invalid"
                                        class="btn w-100 btn-primary"
                                >
                                    Add article
                                </button>
                            </div>
                        </div>
                    </ValidationObserver>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 bg-gray-xs">

            <ul class="list-group">
                <li class="list-group-item" v-for="(article, index) in article_items" v-if="article_items.length>0">

                    <div class="row">
                        <div class="col-8"><h5 class="text-primary">{{article.title}}</h5></div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-link " @click="edit(index, article)">   <i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-link" @click="remove(index)" v-if="mode === 0">   <i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="d-inline p-2 bg-primary text-white p-2 m-2" v-for="property in category.properties">
                            {{property.title}}
                            <span class="badge badge-primary">{{article.properties[property.slug].value}}</span>
                        </div>
                    </div>



                </li>
            </ul>

      <!--
            <div class="article-section">
                <div class="articles-list-scroll">
                    <ul class="articles-list">
                        <li class="mb-1" v-for="(article, index) in article_items" v-if="article_items.length>0">
                            <div class="article-header">
                                <div class="row m-auto w-100 align-items-center">
                                    <div class="col-9">
                                        <h4 class="article-title">{{article.title}}</h4>
                                    </div>
                                    <div class="col-3">
                                        <div class="article-controls row m-auto w-100 align-items-center justify-content-center">
                                            <div class="article-edit mx-1" style="cursor: pointer" @click="edit(index, article)">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <div class="article-delete mx-1" style="cursor: pointer" @click="remove(index)" v-if="mode === 0">
                                                <i class="fa fa-trash"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul  class="row w-100 m-auto list-group">
                                <li class="list-group-item" v-for="property in category.properties">
                                    <span class="article-unit-text">{{property.title}}</span>
                                    <span class="badge">{{article.properties[property.slug].value}}</span>
                                </li>

                                &lt;!&ndash;                                <li class="list-group-item">&ndash;&gt;
                                &lt;!&ndash;                                    <span class="article-unit-text">Height</span>&ndash;&gt;
                                &lt;!&ndash;                                    <span class="badge">{{article.height}}</span>&ndash;&gt;
                                &lt;!&ndash;                                </li>&ndash;&gt;
                                &lt;!&ndash;                                <li class="list-group-item">&ndash;&gt;
                                &lt;!&ndash;                                    <span class="article-unit-text">Width</span>&ndash;&gt;
                                &lt;!&ndash;                                    <span class="badge">{{article.width}}</span>&ndash;&gt;
                                &lt;!&ndash;                                </li>&ndash;&gt;
                                &lt;!&ndash;                                <li class="list-group-item">&ndash;&gt;
                                &lt;!&ndash;                                    <span class="article-unit-text">Weight</span>&ndash;&gt;
                                &lt;!&ndash;                                    <span class="badge">{{article.weight}}</span>&ndash;&gt;
                                &lt;!&ndash;                                </li>&ndash;&gt;
                                &lt;!&ndash;                                <li class="list-group-item">&ndash;&gt;
                                &lt;!&ndash;                                    <span class="article-unit-text">Length</span>&ndash;&gt;
                                &lt;!&ndash;                                    <span class="badge">{{article.length}}</span>&ndash;&gt;
                                &lt;!&ndash;                                </li>&ndash;&gt;
                                &lt;!&ndash;                                <li class="list-group-item">&ndash;&gt;
                                &lt;!&ndash;                                    <span class="article-unit-text">Quantity</span>&ndash;&gt;
                                &lt;!&ndash;                                    <span class="badge">{{article.quantity}}</span>&ndash;&gt;
                                &lt;!&ndash;                                </li>&ndash;&gt;
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>-->
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
                    properties: {}
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
                    properties: {}
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
                    properties: {}
                },
                // edit_mode: false,
                edit_index:'',
                mode:0,
                // modes:['new_article', 'edit_article']
            }
        },
        mounted() {

            console.log("ARTICLE FORM", this.category)
            this.listing_title = this.listing.title;
            this.category.properties.forEach((item) => {
                if(item.type==='checkbox')
                {
                    this.$set(this.new_article.properties, item.slug, { value:false})
                    this.$set(this.edit_article.properties, item.slug, { value:false})
                    this.$set(this.temp_article.properties, item.slug, { value:false})
                    // this.new_article.properties[item.slug]={ value:false};
                    // this.edit_article.properties[item.slug]={ value:false};
                    // this.temp_article.properties[item.slug]={ value:false};
                }
                else {
                    this.$set(this.new_article.properties, item.slug, { value:''})
                    this.$set(this.edit_article.properties, item.slug, { value:''})
                    this.$set(this.temp_article.properties, item.slug, { value:''})
                    // this.new_article.properties[item.slug]={ value:''};
                    // this.edit_article.properties[item.slug]={ value:''};
                    // this.temp_article.properties[item.slug]={ value:''};
                }

            })
        },
        created() {
        },
        computed: {
            article_items() {
                return this.$store.getters.articleCart;
            },
            listing() {
                return this.$store.getters.listing;
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
                this.new_article = {
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
                    properties: {}
                }
                this.category.properties.forEach((item) => {
                    if(item.type==='checkbox')
                    {
                        this.new_article.properties[item.slug]={ value:false};
                    }
                    else {
                        this.new_article.properties[item.slug]={ value:''};
                    }

                })
            },
            edit(index, article) {
                this.temp_article.title = article.title;
                this.temp_article.properties = article.properties;

                this.edit_article.title = article.title;
                this.edit_article.properties = article.properties;
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
                this.$store.dispatch('setStep', 2)
            },
            prevStep() {
                this.$store.dispatch('setStep', 0)
            },
            saveListingTitle() {
                this.$store.dispatch('editNewListing', {key:'title', value: this.listing_title})
            }
        }
    }
</script>
<style lang="scss">


</style>
