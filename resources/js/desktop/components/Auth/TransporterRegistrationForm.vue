<template>

    <ValidationObserver v-slot="{invalid}" tag="form" @submit.prevent="register">
        <div class="js-validate">

            <input type="hidden" name="_token" :value="csrf">
            <div id="signup-transpoter" data-target-group="idForm">


                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Account name" rules="required|alpha_num" v-slot="{ errors }">
                                    <input type="text" class="form-control form__input" name="company_name"
                                           v-model="new_user.company_name"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_1')" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="First name" rules="required|alpha|min:3" v-slot="{ errors }">
                                    <input type="text" class="form-control form__input" name="first_name"
                                           v-model="new_user.first_name"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_2')" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Last name" rules="required|alpha|min:3" v-slot="{ errors }">
                                    <input type="text" class="form-control form__input" name="second_name"
                                           v-model="new_user.second_name"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_3')" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Email" rules="required|email" v-slot="{ errors }">
                                    <input type="email" class="form-control form__input" name="email"
                                           autocomplete="username"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_4')" v-model="new_user.email" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Phone number 1" rules="required" v-slot="{ errors }">
                                    <input type="tel" class="form-control form__input" v-mask="'+ ### ### #######'"
                                           name="telephone_number_1" v-model="new_user.telephone_number_1"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_5')" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Phone number 2" rules="required" v-slot="{ errors }">
                                    <input type="tel" class="form-control form__input" v-mask="'+ ### ### #######'"
                                           name="telephone_number_2" v-model="new_user.telephone_number_2"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_6')" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Country" rules="required" v-slot="{ errors }">
                                    <multiselect
                                        :disabled="countries.length==0"
                                        id="country" name="country"
                                        v-model="new_user.country"
                                        :options="countries"
                                        :option-height="25"
                                        :placeholder="$trans('auth.signup_transporter_form.input_placeholder_7')"
                                        :show-labels="false"
                                        :maxHeight="200"
                                        label="title"
                                        track-by="id"
                                        :allow-empty="false"
                                        :searchable="true"
                                        :loading="countries_loading"
                                        @input="getRegions"
                                    >
                                        <!--                                    <template slot="singleLabel" slot-scope="props">-->
                                        <!--&lt;!&ndash;                                        <b :class="'slsf-country-to__select-flag flag-ui_narrowtpl_flags_20x13_'+props.option.id"></b>&ndash;&gt;-->
                                        <!--                                        <span class="option__desc">-->
                                        <!--                                            <span class="option__title">{{ props.option.title }}</span>-->
                                        <!--                                        </span>-->
                                        <!--                                    </template>-->
                                        <!--                                    <template slot="option" slot-scope="props">-->
                                        <!--&lt;!&ndash;                                        <b :class="'slsf-country-to__select-flag flag-ui_narrowtpl_flags_20x13_'+props.option.id"></b>&ndash;&gt;-->
                                        <!--                                        <span class="option__desc">-->
                                        <!--                                            <span class="option__title">{{ props.option.title}}</span>-->
                                        <!--                                        </span>-->
                                        <!--                                    </template>-->
                                    </multiselect>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Region" rules="required" v-slot="{ errors }">
                                    <input v-if="regionInputMode" type="text" class="form-control form__input"
                                           name="region"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_8')"
                                           v-model="new_user.region.title" required>
                                    <multiselect
                                        v-if="!regionInputMode"
                                        :disabled="regions.length==0"
                                        id="region" name="region"
                                        v-model="new_user.region"
                                        :options="regions"
                                        :option-height="25"
                                        :placeholder="$trans('auth.signup_transporter_form.input_placeholder_8')"
                                        :show-labels="false"
                                        :maxHeight="200"
                                        label="title"
                                        track-by="id"
                                        :allow-empty="false"
                                        :searchable="true"
                                        :loading="regions_loading"
                                        @input="chooseRegion"
                                    >
                                    </multiselect>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-sm-12">

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="City" rules="required" v-slot="{ errors }">
                                    <multiselect
                                        :disabled="cities.length===0"
                                        id="city" name="city"
                                        v-model="new_user.city"
                                        :options="cities"
                                        :option-height="25"
                                        :placeholder="$trans('auth.signup_transporter_form.input_placeholder_9')"
                                        :show-labels="false"
                                        :maxHeight="200"
                                        label="title"
                                        track-by="id"
                                        :allow-empty="false"
                                        :searchable="true"
                                        :show-no-results="false"
                                        :internal-search="true"
                                        @search-change="getCities"
                                        :clear-on-select="false"
                                    >
                                        <template slot="option" slot-scope="props">
                                            <span class="option__title">{{ props.option.title }}</span>
                                            <div class="option__desc" style="font-size: 10px;">
                                                <span class="option__title" v-if="props.option.area">{{ props.option.area }}</span>
                                                <span v-if="props.option.area&&props.option.region">, </span>
                                                <span class="option__small" v-if="props.option.region">{{ props.option.region }}</span>
                                            </div>
                                        </template>
                                    </multiselect>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Postal Code" rules="required" v-slot="{ errors }">
                                    <input type="text" class="form-control form__input" name="postal"
                                           v-model="new_user.postal"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_10')" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <multiselect
                                    :disabled="categories.length===0"
                                    id="area_of_expertise" name="areas_of_expertise"
                                    v-model="new_user.areas_of_expertise"
                                    :options="categories"
                                    :multiple="true" :close-on-select="false" :clear-on-select="false"
                                    :option-height="25"
                                    :show-labels="false"
                                    :maxHeight="200"
                                    :placeholder="$trans('auth.signup_transporter_form.input_placeholder_11')"
                                    label="title"
                                    track-by="id"
                                    :searchable="false"
                                >
                                    <template slot="selection" slot-scope="{ values, search, isOpen }">
                                        <span class="multiselect__single" v-if="values.length>0 && !isOpen"
                                              style="background: transparent">{{ values.length }} options selected</span>
                                        <span class="multiselect__single" v-if="values.length>0 && isOpen"
                                              style="background: transparent;">{{ values.length }} options selected</span>
                                    </template>

                                </multiselect>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- Divider -->
                <div class="text-center u-divider-wrapper my-3">
                    <span class="u-divider u-divider--xs u-divider--text">{{$trans('auth.signup_transporter_form.span_1')}}</span>
                </div>
                <!-- End Divider -->


                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Username" rules="required" v-slot="{ errors }">
                                    <input type="text" class="form-control form__input" name="username"
                                           v-model="new_user.username"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_12')" required>
                                    <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Password" rules="required|min:6" vid="password"
                                                    v-slot="{ errors }">
                                    <input type="password" class="form-control form__input"
                                           autocomplete="new-password"
                                           name="password"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_13')" required
                                           v-model="new_user.password">
                                    <p class="mb-0" style="color: red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <ValidationProvider name="Confirm password" rules="required|confirmed:password"
                                                    v-slot="{ errors }">
                                    <input type="password" class="form-control form__input" name="password_confirmation"
                                           autocomplete="current-password"
                                           :placeholder="$trans('auth.signup_transporter_form.input_placeholder_14')"
                                           required v-model="new_user.confirm_password">
                                    <p class="mb-0" style="color: red;font-size:11px">{{errors[0]}}</p>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <!-- Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                    <input type="checkbox" class="custom-control-input"
                                           v-model="new_user.newsletter_notify" id="iAgree_transporter_1" required>
                                    <label class="custom-control-label" for="iAgree_transporter_1">
                                        {{$trans('auth.signup_transporter_form.label_1')}}

                                    </label>
                                </div>
                                <!-- End Checkbox -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <!-- Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                    <input type="checkbox" class="custom-control-input" v-model="new_user.privacy_agree"
                                           id="iAgree_transpoter_Privacy" required>
                                    <label class="custom-control-label" for="iAgree_transpoter_Privacy">
                                        <a href="/privacy">{{$trans('auth.signup_transporter_form.a_1')}}</a>

                                 {{$trans('auth.signup_transporter_form.label_2')}}

                                    </label>
                                </div>
                                <!-- End Checkbox -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="js-form-message mb-3" v-if="error_message">
                    <div class="js-focus-state form">

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{error_message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>


                <div class="js-form-message mb-1">
                    <div class="js-focus-state form">
                        <button class="btn btn-primary w-100">
                            <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                                  aria-hidden="true"></span>

                            {{$trans('auth.signup_transporter_form.button_1')}}
                                                    </button>
                    </div>

                </div>


                <div class="js-form-message mb-3">
                    <div class="js-focus-state form">
                        <a class="btn btn-outline-primary w-100" href="/register-customer">
                            $trans('auth.signup_transporter_form.button_2')
                        </a>
                    </div>
                </div>

                <!-- Divider -->
                <!-- <div class="text-center u-divider-wrapper my-3">
                     <span class="u-divider u-divider&#45;&#45;xs u-divider&#45;&#45;text">OR</span>
                 </div>-->
                <!-- End Divider -->

                <!-- Signin Social Buttons -->
                <!--<div class="row mx-gutters-2 mb-4">
                    <div class="col-sm-6 mb-2 mb-sm-0">
                        <a href="/social/facebook" class="btn btn-block btn-facebook text-nowrap">
                            <i class="fab fa-facebook-f mr-2"></i>
                            Signin with Facebook
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="/social/twitter" class="btn btn-block btn-twitter">
                            <i class="fab fa-twitter mr-2"></i>
                            Signin with Twitter
                        </a>
                    </div>
                </div>-->
                <!-- End Signin Social Buttons -->
            </div>
        </div>
    </ValidationObserver>

</template>
<script>
    export default {
        data() {
            return {
                error_message: null,
                countries: [],
                regions: [],
                cities: [],
                countries_loading: false,
                regions_loading: false,
                cities_loading: false,
                regionInputMode: false,
                loading: false,
                new_user: {
                    first_name: '',
                    second_name: '',
                    email: '',
                    telephone_number_1: '',
                    telephone_number_2: '',
                    country: '',
                    region: '',
                    city: '',
                    postal: '',
                    company_name: '',
                    username: '',
                    password: '',
                    confirm_password: '',
                    transport_specialities: [],
                    areas_of_expertise: [],
                    newsletter_notify: false,
                    privacy_agree: false,
                },
            }
        },
        computed: {
            csrf: function () {
                return window.csrf;

            },
            categories() {
                return this.$store.getters.categories;
            },
        },
        created: function () {
            this.getCountries();
            this.$store.dispatch("getCategories");
        },
        methods: {
            chooseRegion() {
                this.new_user.city = null;
                this.getCities()
            },
            async getCities(query = 'null') {
                if (typeof query === 'object') {
                    query = 'null';
                }
                this.cities_loading = true;
                let locale = localStorage.getItem('locale') || 'en';
                if (query === 'null') {
                    await axios.get("/api/locations/cities/" + this.new_user.country.id + '/' + this.new_user.region.id + '/' + locale + '/' + query).then(resp => {
                        this.cities = resp.data;
                        this.cities_loading = false;
                    })
                } else {
                    if (query !== '' && query.length > 2) {
                        await axios.get("/api/locations/cities/" + this.new_user.country.id + '/' + this.new_user.region.id + '/' + locale + '/' + query).then(resp => {
                            this.cities = resp.data;
                            this.cities_loading = false;
                        })
                    }
                }
            },
            async getRegions() {
                this.regions_loading = true;
                let locale = localStorage.getItem('locale') || 'en';
                this.new_user.region = null;
                this.new_user.city = null;
                await axios.get("/api/locations/regions/" + this.new_user.country.id + '/' + locale).then(resp => {
                    this.regions = resp.data;
                    this.regionInputMode = false;
                    if (this.regions.length === 0) {
                        this.regionInputMode = true;
                        this.new_user.region = {id: 'null', title: ''};
                        this.getCities('null');
                    }
                    this.regions_loading = false;
                })
            },
            async getCountries() {
                this.countries_loading = true;
                let locale = localStorage.getItem('locale') || 'en';
                await axios.get("/api/locations/countries/" + locale).then(resp => {
                    this.countries = resp.data;
                    this.countries_loading = false;
                })
            },
            register() {
                this.error_message = null;
                this.loading = true;
                this.new_user.transport_specialities = this.new_user.areas_of_expertise.map(item => {
                    return item.id
                });
                axios.post('/register-transporter', this.new_user).then(resp => {
                    this.loading = false;
                    window.location = '/transporter/profile/transporter-wizard/start'
                }).catch(error => {
                    this.error_message = 'Account already in System!';
                    this.loading = false;
                })
            }
        }
    }
</script>

<style lang="scss">
    .cursor-disabled {
        cursor: not-allowed;
    }
</style>

