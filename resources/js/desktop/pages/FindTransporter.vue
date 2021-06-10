<template>
    <div>
        <steps :step="0"/>

        <div class="container-fluid">

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
            <div v-show="step===2">
                <address-info-form/>
            </div>
            <div v-if="step===3">
    <!--                            <div class="content-box content-box-padding content-box-bordered step-box ng-scope">-->
    <!--                                <div class="register-content">-->

    <!--                                    <div class="text-center">-->
    <!--                                        <img class="login-icon" src="/images/public/login/login.svg" alt="">-->
    <!--                                    </div>-->

    <!--                                    <div class="form-header text-xs-center">-->
    <!--                                        <div class="row">-->
    <!--                                            <div class="col-sm-8">-->
    <!--                                                <h3 class="text-bold title m-0 ng-binding">Your FretBay account</h3>-->
    <!--                                            </div>-->
    <!--                                            <div class="col-sm-4 text-sm-right">-->
    <!--                                                <span><img src="/images/common/icons/general/user.svg" width="18px" height="18px" alt=""><a href="javascript:void(0)" class="btn-link text-mute ng-binding">I already have an account</a></span>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                    <div class="content-box-gray content-box-padding form-content">-->
    <!--                                        <p class="text-center ng-binding">Don't worry, your number will only be visible by the FretBay team who can contact you if necessary to facilitate your search for carriers</p>-->
    <!--                                        <div class="text-left">-->
    <!--                                            <div class="form-group form-group-lg">-->
    <!--                                                <div class="input-has-icon-left">-->
    <!--                                                    <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="Email" >-->
    <!--                                                    <span class="rel-icon"><img src="/images/common/icons/general/email.svg" width="18px" height="18px" alt=""></span>-->
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                            <div class="form-group form-group-lg">-->
    <!--                                                <div class="input-has-icon-left">-->
    <!--                                                    <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" placeholder="Username" maxlength="31">-->
    <!--                                                    <span class="rel-icon"><img src="/images/common/icons/general/user.svg" width="18px" height="18px" alt=""></span>-->
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                            <div class="form-group form-group-lg">-->
    <!--                                                <div class="custom-phone-menu-wrapper">-->
    <!--                                                    <div class="custom-phone-menu">-->
    <!--                                                        <div class="ui-select-container ui-select-bootstrap dropdown ng-pristine ng-untouched ng-valid ng-scope ng-not-empty ng-valid-required" title="Search" required>-->
    <!--                                                            <div class="ui-select-match ng-scope">-->
    <!--                                                                <span tabindex="-1" class="btn btn-default form-control ui-select-toggle" aria-label="Search activate" style="outline: 0;">-->
    <!--                                                                    <span class="ui-select-placeholder text-muted ng-binding ng-hide">Search</span>-->
    <!--                                                                    <span  class="ui-select-match-text pull-left">-->
    <!--                                                                        <span class="flag flag-fr"></span> 33</span>-->
    <!--                                                                    <i class="caret pull-right"></i>-->
    <!--                                                                    <a aria-label="Search clear" style="margin-right: 10px" class="btn btn-xs btn-link pull-right ng-hide">-->
    <!--                                                                        <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>-->
    <!--                                                                </span>-->
    <!--                                                            </div>-->
    <!--                                                            <span class="ui-select-refreshing glyphicon glyphicon-refresh ui-select-spin ng-hide"></span>-->
    <!--                                                            <input type="search" autocomplete="off" tabindex="-1" aria-expanded="true" aria-label="Search" aria-owns="ui-select-choices-0" class="form-control ui-select-search ng-pristine ng-untouched ng-valid ng-empty ng-hide" placeholder="Search" style="width: 10px;">-->
    <!--                                                            <ul class="ui-select-choices ui-select-choices-content ui-select-dropdown dropdown-menu ng-scope ng-hide">-->
    <!--                                                                <li class="ui-select-choices-group" id="ui-select-choices-0">-->
    <!--                                                                    <div class="divider ng-hide"></div><div class="ui-select-choices-group-label dropdown-header ng-binding ng-hide"></div>-->
    <!--                                                                </li></ul><div class="ui-select-no-choice"></div>-->
    <!--                                                            <input class="ui-select-focusser ui-select-offscreen ng-scope" type="text" id="focusser-0" aria-label="Search focus" aria-haspopup="true" role="button"></div>-->
    <!--                                                    </div>-->
    <!--                                                    <input type="text" class="form-control phone-field ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" only-digits="" maxlength="10" placeholder="Telephone">-->
    <!--                                                </div>-->

    <!--                                            </div>-->

    <!--                                            <div class="form-group form-group-lg" >-->
    <!--                                                <div class="input-has-icon-left">-->
    <!--                                                    <input type="password" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="Password" >-->
    <!--                                                    <span class="rel-icon"><img src="/images/common/icons/general/password.svg" width="18px" height="18px" alt=""></span>-->
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                            <div class="form-group form-group-lg">-->
    <!--                                                <div class="input-has-icon-left">-->
    <!--                                                    <input type="password" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="Confirm password">-->
    <!--                                                    <span class="rel-icon"><img src="/images/common/icons/general/password.svg" width="18px" height="18px" alt=""></span>-->
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                    </div>-->



    <!--                                    <div class="action-btns">-->
    <!--                                        <a href="javascript:void(0)" class="btn btn-link text-mute btn-back pull-xs-left ng-binding">Back</a>-->
    <!--                                        <button>Validate</button>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
                <div class="row w-100 m-auto align-items-center justify-content-center" v-if="window.user">

                </div>
                <div class="row w-100 m-auto align-items-center justify-content-center" v-else>
                  <div class="col-12 col-sm-8">
                      <h3 class="mt-0 text-uppercase text-black content-box-title text-center">Your FretBay account</h3>
                      <div class="signUpForm1-inputs">
                          <input type="email" class="signUpForm1__input signUpForm1__input-first" name="email"  placeholder="Your email" >
                          <input type="text" class="signUpForm1__input" name="name"  placeholder="Your Username">
                          <input type="tel" class="signUpForm1__input" v-mask="'+ ### ### #######'"  name="telephone_number_1"  placeholder="Your phone">
                          <input type="password" class="signUpForm1__input" name="password"  placeholder="Your password" v-on:change="pass_validate()">
                          <input type="password" class="signUpForm1__input" name="password_confirmation"  placeholder="Confirm your password" v-on:change="pass_validate()">
                      </div>
                  </div>

                </div>

                <div class="row d-flex justify-content-end mt-2 w-100">
                    <div class="col-12 col-sm-2">
                        <button class="btn btn-custom-danger" @click="prevStep(2)">Back</button>
                    </div>
                    <div class="col-12 col-sm-3">
                        <button class="btn btn-custom-white" @click="nextStep">Finish</button>
                    </div>
                </div>
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
    export default {
        components: {
            MovingCategory,
            Steps, TypeSelector, ArticleFormPage, VolumeForm, InventoryForm, TypeOfTransport,MovingPackageForm, AddressInfoForm, Grid
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
        },
        methods: {
            pass_validate: function () {
                if(this.password != this.password_confirmation){
                    this.password_correct = false;
                }else{
                    this.password_correct = true;
                }
            },
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

