<template>
    <div class="row mt-2">
        <ValidationObserver ref="article_form" v-slot="{invalid}" >
            <div class="row mx-auto d-flex justify-content-start mt-2 w-100">
                <ValidationProvider name="listing_title" rules="required" v-slot="{ errors }">
                    <div class="form-group">
                        <input v-model="listing_title" @blur="saveListingTitle" type="text" class="form-control"
                               placeholder="3-seater Sofa, chairs, desks...">
                    </div>
                </ValidationProvider>
            </div>
            <article-form :category="category"></article-form>
            <div class="row mx-auto d-flex justify-content-end mt-2 w-100">
                <div class="col-12 col-sm-2">
                    <button class="btn w-100 btn-custom-danger" @click="prevStep">Back</button>
                </div>
                <div class="col-12 col-sm-3">
                    <button class="btn w-100" @click="nextStep" :disabled="invalid || article_items.length===0">Next</button>
                </div>
            </div>
        </ValidationObserver>
    </div>
</template>

<script>
    import ArticleForm from "../Articles/ArticleForm";
    export default {
        components: {
            ArticleForm,
        },
        props:['category'],
        data() {
            return {
                listing_title:''
            }
        },
        computed: {
            article_items() {
                return this.$store.getters.articleCart;
            },
        },
        methods: {
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
