<template>
    <div>
<!--        <steps :step="0"/>-->

        <div class="container" >
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
            Steps, TypeSelector, ArticleFormPage, VolumeForm, InventoryForm, TypeOfTransport,MovingPackageForm, AddressInfoForm, Grid, FinishPage
        },
        data() {
            return {
                category: null,

                email:"",
                phone:"",
                username:"",
                password:"",
                password_confirmation:"",
                password_correct: false,
                email_correct: false,
                email_confirmation:"",

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
            if(this.categories.length <=0)
            {
                this.$store.dispatch('getCategories')
            }
        },
        mounted() {
            this.$store.dispatch('setStep', 0)
            console.log(window.user)
            if (window.user) {
                this.$store.dispatch('editNewListing', {key:'user_id', value: window.user.id})
            }
        },
        methods: {
            pass_validate: function () {
                if (this.password != this.password_confirmation){
                    this.password_correct = false;
                }else{
                    this.password_correct = true;
                }
            },
            selectType(id) {
                //todo: find object of category by id or index
                let index = this.categories.findIndex(category => category.id === id)
                this.category = this.categories[index];
                this.$store.dispatch('editNewListing', {key:'category', value: this.category})
                this.$store.dispatch('editNewListing', {key:'category_id', value: id})
                this.$store.dispatch('editNewListing', {key:'mode', value: this.category.mode})
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
        & h4 {
            font-size: 18px;
        }
        & p {
            font-size: 14px;
        }
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

