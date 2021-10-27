<template>
    <div class="container mt-2 pb-5">
        <ValidationObserver ref="article_form" v-slot="{invalid}" >

            <article-form :category="category"></article-form>
            <div class="row mx-auto d-flex justify-content-end mt-2 w-100" v-if="category.mode!='grid'">
                <div class="col-6 col-sm-2">
                    <button class="btn w-100 btn-outline-blue" @click="prevStep">{{$trans('request_a_quote.global.button_prev')}}</button>
                </div>
                <div class="col-6 col-sm-3">
                    <button class="btn btn-outline-primary w-100" @click="nextStep" :disabled="invalid || article_items.length===0">{{$trans('request_a_quote.global.button_next')}}</button>
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

                window.scrollTo(0, 0);
            },
            prevStep() {
                this.$store.dispatch('setStep', 0)

                window.scrollTo(0, 0);
            },
            saveListingTitle() {
                this.$store.dispatch('editNewListing', {key:'title', value: this.listing_title})
            }
        }
    }
</script>
<style lang="scss">

</style>
