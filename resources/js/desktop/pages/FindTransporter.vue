<template>
    <div style="padding-top: 130px">
        <steps :step="0"/>

        <div v-if="step===0">
            <type-selector v-on:select-type="selectType"/>
        </div>
        <div v-if="step===1">

            <div v-if="category.mode === 'article'">
                <article-form-page :category="category"/>
            </div>
            <div v-if="category.mode ==='grid'">
                <grid :category="category"/>
            </div>
            <div v-if="category.mode === 'calculator'">
                <moving-category :category="category"/>
            </div>
        </div>
        <div v-if="step===2">
            <address-info-form/>
        </div>
        <div v-if="step===3">
            <finish-page></finish-page>
        </div>


    </div>
</template>
<script>
    import Steps from '../components/FindTransporter/Steps'
    import TypeSelector from '../components/FindTransporter/TypeSelector'
    import ArticleFormPage from '../components/FindTransporter/ArticleFormPage'
    import VolumeForm from '../components/FindTransporter/VolumeForm'
    import InventoryForm from '../components/FindTransporter/InventoryForm'
    import TypeOfTransport from '../components/FindTransporter/TypeOfTransport'
    import MovingPackageForm from '../components/FindTransporter/MovingPackageForm'
    import AddressInfoForm from '../components/FindTransporter/AddressInfoForm'
    import MovingCategory from "../components/FindTransporter/MovingCategory";
    import Grid from "../components/FindTransporter/Grid";
    import FinishPage from "../components/FindTransporter/FinishPage";

    export default {
        components: {
            MovingCategory,
            Steps,
            TypeSelector,
            ArticleFormPage,
            VolumeForm,
            InventoryForm,
            TypeOfTransport,
            MovingPackageForm,
            AddressInfoForm,
            Grid,
            FinishPage
        },
        data() {
            return {
                category: null,

                email: "",
                phone: "",
                username: "",
                password: "",
                password_confirmation: "",
                password_correct: false,
                email_correct: false,
                email_confirmation: "",

                login_mode: false,
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
            if (this.categories.length <= 0) {
                this.$store.dispatch('getCategories')
            }
        },
        mounted() {
            this.$store.dispatch('setStep', 0)
            console.log(window.user)
            if (window.user) {
                this.$store.dispatch('editNewListing', {key: 'user_id', value: window.user.id})
            }
        },
        methods: {
            pass_validate: function () {
                if (this.password != this.password_confirmation) {
                    this.password_correct = false;
                } else {
                    this.password_correct = true;
                }
            },
            selectType(id) {
                //todo: find object of category by id or index
                let index = this.categories.findIndex(category => category.id === id)
                this.category = this.categories[index];
                this.$store.dispatch('editNewListing', {key: 'category', value: this.category})
                this.$store.dispatch('editNewListing', {key: 'category_id', value: id})
                this.$store.dispatch('editNewListing', {key: 'mode', value: this.category.mode})
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
            prevStep(step) {
                this.$store.dispatch('setStep', step)
            },
            nextStep() {

            },
        }
    }
</script>

<style lang="scss">


</style>

