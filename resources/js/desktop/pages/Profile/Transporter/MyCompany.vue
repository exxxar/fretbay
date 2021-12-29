<template>
    <div class="main-body mt-3">
        <div class="row">

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>{{$trans('profile.company.h2_5')}}</h2>
                        <p class="inform-box" v-html="$trans('profile.company.p_3')">
                            </p>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row m-auto w-100">
                                <div class="col-sm-12 px-0 px-sm-2" v-if="!editDetailsMode">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_1')}}</label>
                                        <input type="text" :value="user.profile.company_name"
                                               class="form-control form-control-img-lock"
                                               :placeholder="$trans('profile.company.input_placeholder_1')" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_2')}}</label>
                                        <input type="text" :value="user.profile.address"
                                               class="form-control-empty form-control"
                                               :placeholder="$trans('profile.company.input_placeholder_2')" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_3')}}</label>
                                        <input type="text" :value="user.profile.telephone_number_1"
                                               class="form-control form-control-img-lock" placeholder="1234567890" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_4')}}</label>
                                        <input type="text" :value="user.profile.telephone_number_2"
                                               class="form-control form-control-img-lock"
                                               placeholder="1234567890" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-12 px-0 px-sm-2" v-if="editDetailsMode">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_1')}}</label>
                                        <input type="text" v-model="edit_details.company_name"
                                               class="form-control form-control-img-lock" placeholder="company">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_2')}}</label>
                                        <input type="text" v-model="edit_details.address"
                                               class="form-control-empty form-control" placeholder="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_3')}}</label>
                                        <input type="text" v-model="edit_details.telephone_number_1"
                                               class="form-control form-control-img-lock" placeholder="1234567890">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_4')}}</label>
                                        <input type="text" v-model="edit_details.telephone_number_2"
                                               class="form-control form-control-img-lock"
                                               placeholder="1234567890">
                                    </div>
                                </div>
<!--                                <div class="col-12 px-0 px-sm-2">-->
<!--                                    <div class="row m-auto w-100 justify-content-end">-->
<!--                                        <button class="btn btn-outline-blue mx-1" v-if="!editDetailsMode" @click="editDetails">Edit</button>-->
<!--                                        <button class="btn btn-outline-blue mx-1" v-if="editDetailsMode" :disabled="editDetailsLoading" @click="editDetailsMode=false">Cancel</button>-->
<!--                                        <button class="btn btn-primary px-4 mx-1" v-if="editDetailsMode" :disabled="invalid||editDetailsLoading" @click="saveWithoutApproval(edit_details)">-->
<!--                                            <span v-if="editDetailsLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->
<!--                                            Save-->
<!--                                        </button>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>{{$trans('profile.company.h2_1')}}</h2>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row m-auto w-100">
                                <div class="col-sm-12 px-0 px-sm-2" v-if="!editIntroductionMode">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_5')}}</label>
<!--                                         @blur="save('about_company', profile.about_company)"-->
                                        <textarea class="form-control"
                                                  rows="4" v-model="user.profile.about_company"
                                                  disabled
                                        >
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_6')}}</label>
<!--                                        @blur="save('additional_service', profile.additional_service)"-->
                                        <textarea class="form-control"
                                                  rows="4"
                                                  v-model="user.profile.additional_service"
                                                  disabled
                                        >
                                        </textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-6 text-lg lh-40">{{$trans('profile.company.label_7')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" :value="user.profile.insurance_company"
                                                   class="form-control-empty form-control" placeholder="1234567890" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-6 text-lg">{{$trans('profile.company.label_8')}}</label>
                                        <div class="col-sm-6 input-has-icon-right position-relative">
                                            <input type="text" class="form-control-empty form-control"
                                                   :value="user.profile.cargo_insurance_amount" placeholder="0" disabled>
                                            <span class="price-symbol position-absolute" style="top: 25%;right: 5%;">€</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 px-0 px-sm-2" v-if="editIntroductionMode">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_5')}}</label>
                                        <textarea class="form-control"
                                                  rows="4" v-model="edit_introduction.about_company"
                                        >
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.company.label_6')}}</label>
                                        <textarea class="form-control"
                                                  rows="4"
                                                  v-model="edit_introduction.additional_service"
                                        >
                                        </textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-6 text-lg lh-40">{{$trans('profile.company.label_7')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" v-model="edit_introduction.insurance_company"
                                                   class="form-control-empty form-control" placeholder="1234567890">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-6 text-lg">{{$trans('profile.company.label_8')}}</label>
                                        <div class="col-sm-6 input-has-icon-right position-relative">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_introduction.cargo_insurance_amount" placeholder="0">
                                            <span class="price-symbol position-absolute" style="top: 25%;right: 5%;">€</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-0 px-sm-2">
                                    <div class="row w-100 p-0 m-0 justify-content-end">
                                        <div class="col-md-4 col-12 p-0">
                                            <button class="btn btn-outline-blue w-100" v-if="!editIntroductionMode" @click="editIntroduction">{{$trans('profile.company.button_1')}}</button>
                                        </div>

                                        <div class="col-md-4 col-6 p-0 pr-1">
                                            <button class="btn btn-outline-blue w-100" v-if="editIntroductionMode" :disabled="editIntroductionLoading" @click="editIntroductionMode=false">{{$trans('profile.company.button_2')}}</button>
                                        </div>

                                        <div class="col-md-4 col-6 p-0 pl-1">
                                            <button class="btn btn-primary px-4 w-100" v-if="editIntroductionMode" :disabled="invalid||editIntroductionLoading" @click="saveWithApproval(edit_introduction)">
                                                <span v-if="editIntroductionLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                {{$trans('profile.company.button_3')}}
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>{{$trans('profile.company.h2_2')}}</h2>
                        <p class="inform-box">
                            {{$trans('profile.company.p_1')}}
                        </p>
                        <h4 class="tab-subtitle">{{$trans('profile.company.h4_1')}}</h4>
                        <div class="row w-100 mx-auto">
                            <div class="col-12 col-lg-8 col-md-12 px-0 px-sm-2">
                                <div class="checkbox-list">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="credit_card"
                                               class="custom-control-input"
                                               :checked="check('payment_methods', 'Credit card')"
                                               @change="choose('payment_methods','Credit card')"
                                        >
                                        <label class="custom-control-label" for="credit_card">{{$trans('profile.company.label_9')}}</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="cashier_cheque"
                                               class="custom-control-input"
                                               :checked="check('payment_methods', 'Cashier cheque')"
                                               @change="choose('payment_methods', 'Cashier cheque')"
                                        >
                                        <label class="custom-control-label" for="cashier_cheque">{{$trans('profile.company.label_10')}}</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="cheque"
                                               class="custom-control-input"
                                               :checked="check('payment_methods', 'Cheque')"
                                               @change="choose('payment_methods', 'Cheque')"
                                        >
                                        <label class="custom-control-label" for="cheque">{{$trans('profile.company.label_11')}}</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="cash"
                                               class="custom-control-input"
                                               :checked="check('payment_methods', 'Cash')"
                                               @change="choose('payment_methods', 'Cash')"
                                        >
                                        <label class="custom-control-label" for="cash">{{$trans('profile.company.label_12')}}</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="paypal"
                                               class="custom-control-input"
                                               :checked="check('payment_methods', 'Paypal')"
                                               @change="choose('payment_methods', 'Paypal')"
                                        >
                                        <label class="custom-control-label" for="paypal">{{$trans('profile.company.label_13')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>{{$trans('profile.company.h2_3')}}s</h2>
                        <h4 class="tab-subtitle">{{$trans('profile.company.h4_2')}}</h4>

                        <div class="row w-100 mx-auto">
                            <div class="col-12 col-lg-8 col-md-12 px-0 px-sm-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="english-lang"
                                           :checked="check('spoken_languages', 'en')"
                                           @change="choose('spoken_languages', 'en')">
                                    <label class="custom-control-label" for="english-lang">{{$trans('profile.company.label_14')}}</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="german-lang"
                                           :checked="check('spoken_languages', 'de')"
                                           @change="choose('spoken_languages', 'de')">
                                    <label class="custom-control-label" for="german-lang">{{$trans('profile.company.label_15')}}</label>
                                </div>


                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="franch-lang"
                                           :checked="check('spoken_languages', 'fr')"
                                           @change="choose('spoken_languages', 'fr')">
                                    <label class="custom-control-label" for="franch-lang">{{$trans('profile.company.label_16')}}</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="epspan-lang"
                                           :checked="check('spoken_languages', 'es')"
                                           @change="choose('spoken_languages', 'es')">
                                    <label class="custom-control-label" for="epspan-lang">{{$trans('profile.company.label_17')}}</label>
                                </div>

    <!--                            <div class="form-group text-center">-->
    <!--                                <a href="#"-->
    <!--                                   class="btn btn-success btn-standard">Save</a>-->
    <!--                            </div>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>{{$trans('profile.company.h2_4')}}</h2>
                        <p class="inform-box">
                            {{$trans('profile.company.p_2')}}
                             </p>

                        <div class="list-transport-categories">
                            <div class="row w-100 mx-auto">
                                <div class="col-12 col-sm-6 col-md-3 mb-2 px-0 px-sm-2" v-for="category in categories">
                                    <div class="card text-dark">
                                        <img alt="Card image" class="card-img" v-lazy="category.image"
                                             style="padding: 20px;">
                                        <div class="card-img-overlay">
                                            <h6 class="card-title">{{category.title}}</h6>
                                        </div>
                                        <div class="card-footer">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       :id="'category'+category.id"
                                                       @change="choose('transport_specialities', category.id)"
                                                       :checked="check('transport_specialities', category.id)"
                                                >
                                                <label class="custom-control-label" :for="'category'+category.id"
                                                       v-if="check('transport_specialities',category.id) == true"
                                                >
                                                    {{$trans('profile.company.label_18')}}
                                                </label>
                                                <label class="custom-control-label" :for="'category'+category.id"
                                                       v-if="check('transport_specialities', category.id) == false"
                                                >
                                                    {{$trans('profile.company.label_19')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                // payment_methods: {
                //     credit_card: false,
                //     cashier_cheque: false,
                //     cheque: false,
                //     cash: false,
                //     paypal: false,
                // }
                editDetailsMode: false,
                editDetailsLoading: false,
                edit_details: {
                    company_name:'',
                    address: '',
                    telephone_number_1: '',
                    telephone_number_2: '',
                    is_approved: false
                },
                editIntroductionMode: false,
                editIntroductionLoading: false,
                edit_introduction: {
                    about_company: '',
                    additional_service: '',
                    insurance_company: '',
                    cargo_insurance_amount: '',
                    is_approved: false
                },
            }
        },
        computed: {
            categories() {
                return this.$store.getters.categories;
            },
            user() {
                return this.$store.getters.user
            },
            profile() {
                return this.$store.getters.profile
            },
        },
        mounted() {
            this.$store.dispatch("getCategories");
        },
        methods:{
            async save(key, value) {
                await axios.post("/transporter/profile/save", {id:this.profile.id, key: key, value: value})
                    .then(resp => {
                        this.$store.commit('setProfile', resp.data.profile)
                        // this.profile = resp.data.profile;
                        // window.user.profile = resp.data.profile;
                    }).catch(function (error) {
                        console.log(error);
                    });
            },
            async saveWithoutApproval(fields) {
                this.editDetailsLoading = true;
                await axios.post("/transporter/profile/saveWithoutApproval", fields)
                    .then(resp => {
                        this.$store.commit('setProfile', resp.data.profile);
                        this.editDetailsLoading = false;
                        this.editDetailsMode = false;
                    }).catch(error => {
                        console.log(error);
                        this.editDetailsLoading = false;
                        this.editDetailsMode = false;
                    });
            },
            async saveWithApproval(fields) {
                this.editIntroductionLoading = true;
                await axios.post("/transporter/profile/saveWithApproval", fields)
                    .then(resp => {
                        this.$store.commit('setProfile', resp.data.profile);
                        this.editIntroductionLoading = false;
                        this.editIntroductionMode = false;
                    }).catch(error => {
                        console.log(error);
                        this.editIntroductionLoading = false;
                        this.editIntroductionMode = false;
                    });
            },
            choose(field_name, value) {
                if(this.profile[field_name] == null) {
                    this.profile[field_name] = [];
                }
                let index = this.profile[field_name].findIndex(item => item === value);
                if (index <= -1) {
                    this.profile[field_name].push(value);
                }
                else {
                    this.profile[field_name].splice(index, 1);
                }
                this.save(field_name, this.profile[field_name]);
            },
            check(field_name, value) {
                if(this.profile[field_name] == null) {
                    this.profile[field_name] = [];
                }
                if(this.profile[field_name] != null) {
                    let array = this.profile[field_name];
                    let index = array.findIndex(item => item === value);
                    return index > -1;
                }
                return false;
            },
            editDetails() {
                this.edit_details.company_name = this.profile.company_name;
                this.edit_details.address = this.profile.address;
                this.edit_details.telephone_number_1 = this.profile.telephone_number_1;
                this.edit_details.telephone_number_2 = this.profile.telephone_number_2;
                this.editDetailsMode = true;
            },
            editIntroduction() {
                this.edit_introduction.about_company = this.profile.about_company;
                this.edit_introduction.additional_service = this.profile.additional_service;
                this.edit_introduction.insurance_company = this.profile.insurance_company;
                this.edit_introduction.cargo_insurance_amount = this.profile.cargo_insurance_amount;
                this.editIntroductionMode = true;
            }
        }
    }
</script>
