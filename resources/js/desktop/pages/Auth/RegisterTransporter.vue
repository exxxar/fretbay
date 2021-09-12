<template>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-6 col-12 col-sm-12">
                <ValidationObserver v-slot="{invalid}">
                    <!--                     action="/register-transporter" method="post"-->
                    <div class="js-validate form-signin">
                        <slot name="csrf"></slot>
                        <div id="signin" data-target-group="idForm">

                            <slot name="any-error"></slot>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="Company name" rules="required|alpha" v-slot="{ errors }">
                                        <input type="text" class="form-control form__input" name="company_name"
                                               v-model="new_user.company_name"
                                               placeholder="Name of your company" required>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="First name" rules="required|alpha|min:3"
                                                        v-slot="{ errors }">
                                        <input type="text" class="form-control form__input" name="first_name"
                                               v-model="new_user.first_name"
                                               placeholder="First name" required>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="Last name" rules="required|alpha|min:3"
                                                        v-slot="{ errors }">
                                        <input type="text" class="form-control form__input" name="second_name"
                                               v-model="new_user.second_name"
                                               placeholder="Last name" required>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="Email" rules="required|email" v-slot="{ errors }">
                                        <input type="email" class="form-control form__input" name="email"
                                               placeholder="Email" v-model="new_user.email" required>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <!--                            <div class="js-form-message mb-3">-->
                            <!--                                <div class="js-focus-state form">-->
                            <!--                                    <input type="email" class="form-control form__input" name="email_confirmation"-->
                            <!--                                           placeholder="Email confirm" required>-->
                            <!--                                </div>-->
                            <!--                            </div>-->

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="Phone number 1" rules="required" v-slot="{ errors }">
                                        <input type="tel" class="form-control form__input" v-mask="'+ ### ### #######'"
                                               name="telephone_number_1" v-model="new_user.telephone_number_1"
                                               placeholder="Telephone number" required>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="Phone number 2" rules="required" v-slot="{ errors }">
                                        <input type="tel" class="form-control form__input" v-mask="'+ ### ### #######'"
                                               name="telephone_number_2" v-model="new_user.telephone_number_2"
                                               placeholder="Mobile number" required>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <!--                                <select id="country" class="form-control form__input" v-model="country_id"-->
                                    <!--                                        :disabled="countries.length===0"-->
                                    <!--                                        name="country" v-on:change="getRegions()">-->
                                    <!--                                    <option value="" disabled selected>Country</option>-->
                                    <!--                                    <option v-for="country in countries" :label="country.title" :value="country.id" v-model="country_id">-->
                                    <!--                                        {{country.id}}-->
                                    <!--                                    </option>-->
                                    <!--                                </select>-->
                                    <ValidationProvider name="Country" rules="required" v-slot="{ errors }">
                                        <multiselect
                                            :disabled="countries.length==0"
                                            id="country" name="country"
                                            v-model="new_user.country"
                                            :options="countries"
                                            :option-height="25"
                                            placeholder="Country"
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

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <!--                                <select id="region" name="region" class="form-control form__input" :disabled="regions.length===0">-->
                                    <!--                                    <option value="" disabled selected>Region</option>-->
                                    <!--                                    <option v-bind=region v-for="region in regions" :label="region.title">-->
                                    <!--                                        {{region.id}}-->
                                    <!--                                    </option>-->
                                    <!--                                </select>-->

                                    <ValidationProvider name="Region" rules="required" v-slot="{ errors }">
                                        <input v-if="regionInputMode" type="text" class="form-control form__input"
                                               name="region"
                                               placeholder="Your region" v-model="new_user.region.title" required>
                                        <multiselect
                                            v-if="!regionInputMode"
                                            :disabled="regions.length==0"
                                            id="region" name="region"
                                            v-model="new_user.region"
                                            :options="regions"
                                            :option-height="25"
                                            placeholder="Region"
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

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <!--                                <input type="text" class="form-control form__input" name="city"-->
                                    <!--                                       placeholder="Your city" required>-->
                                    <ValidationProvider name="City" rules="required" v-slot="{ errors }">
                                        <multiselect
                                            :disabled="cities.length===0"
                                            id="city" name="city"
                                            v-model="new_user.city"
                                            :options="cities"
                                            :option-height="25"
                                            placeholder="Your city"
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

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="Postal Code" rules="required" v-slot="{ errors }">
                                        <input type="text" class="form-control form__input" name="postal"
                                               v-model="new_user.postal"
                                               placeholder="Postal Code" required>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <!--                                <select id="area_of_expertise" name="areas_of_expertise"-->
                                    <!--                                        :disabled="categories.length===0"-->
                                    <!--                                        class="form-control form__input">-->
                                    <!--                                    <option value="" disabled selected>Your area of expertise</option>-->
                                    <!--                                    <option :value="category" v-for="category in categories">{{category.title}}</option>-->
                                    <!--                                </select>-->

                                    <multiselect
                                        :disabled="categories.length===0"
                                        id="area_of_expertise" name="areas_of_expertise"
                                        v-model="new_user.areas_of_expertise"
                                        :options="categories"
                                        :multiple="true" :close-on-select="false" :clear-on-select="false"
                                        :option-height="25"
                                        :show-labels="false"
                                        :maxHeight="200"
                                        placeholder="Your area of expertise"
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

                            <!-- Divider -->
                            <div class="text-center u-divider-wrapper my-3">
                                <span class="u-divider u-divider--xs u-divider--text">Account</span>
                            </div>
                            <!-- End Divider -->


                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="Username" rules="required" v-slot="{ errors }">
                                        <input type="text" class="form-control form__input" name="username"
                                               v-model="new_user.username"
                                               placeholder="Username" required>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="Password" rules="required|min:6" vid="password"
                                                        v-slot="{ errors }">
                                        <input type="password" class="form-control form__input"
                                               name="password" placeholder="Password" required
                                               v-model="new_user.password">
                                        <p class="mb-0" style="color: red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <ValidationProvider name="Confirm password" rules="required|confirmed:password"
                                                        v-slot="{ errors }">
                                        <input type="password" class="form-control form__input"
                                               name="password_confirmation"
                                               placeholder="Confirm password" required
                                               v-model="new_user.confirm_password">
                                        <p class="mb-0" style="color: red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <!-- Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                        <input type="checkbox" class="custom-control-input"
                                               v-model="new_user.newsletter_notify" id="iAgree">
                                        <label class="custom-control-label" for="iAgree">
                                            I agree to receive commercial offers from AlloTrans and its partners.
                                        </label>
                                    </div>
                                    <!-- End Checkbox -->
                                </div>

                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <!-- Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                        <input type="checkbox" class="custom-control-input" id="iAgreePrivacy" required>
                                        <label class="custom-control-label" for="iAgreePrivacy">
                                            I <a href="/privacy" target="_blank">read ang agree</a> with a privacy
                                            police

                                        </label>
                                    </div>
                                    <!-- End Checkbox -->
                                </div>

                            </div>


                            <div class="js-form-message mb-1">
                                <div class="js-focus-state form">
                                    <button class="btn btn-primary w-100" :disabled="invalid||loading"
                                            @click="register">
                                        <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                                              aria-hidden="true"></span>
                                        Register
                                    </button>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <a class="btn btn-outline-primary w-100" href="/register-customer">
                                        I am a Customer
                                    </a>
                                </div>
                            </div>

                            <!-- Divider -->
                            <!-- <div class="text-center u-divider-wrapper my-3">
                                 <span class="u-divider u-divider&#45;&#45;xs u-divider&#45;&#45;text">OR</span>
                             </div>-->
                            <!-- End Divider -->

                            <!-- Signin Social Buttons -->
                            <!--  <div class="row mx-gutters-2 mb-4">
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
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                countries: [],
                regions: [],
                cities: [],
                countries_loading: false,
                regions_loading: false,
                cities_loading: false,
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
                },
                loading: false,
                regionInputMode: false
            }
        },
        computed: {
            categories() {
                return this.$store.getters.categories;
            },
        },
        mounted() {
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
                this.loading = true;
                this.new_user.transport_specialities = this.new_user.areas_of_expertise.map(item => {
                    return item.id
                });
                axios.post('/register-transporter', this.new_user).then(resp => {
                    this.loading = false;
                    window.location = '/transporter/profile/transporter-wizard/start'
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                })
                // this.loading = false;
            }
        }
    }
</script>
<style>
    .multiselect {
        border-radius: 0.25rem;
    }

    .multiselect__placeholder {
        color: #95a0ab;
    }

    /*.multiselect--disabled {*/
    /*    opacity: 1;*/
    /*}*/
    .multiselect__tags {
        display: block;
        width: 100%;
        height: calc(1.7em + 1.5rem + 2px);
        padding: 0.75rem 1rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.7;
        color: #151b26;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #e3e6f0;
        border-radius: 0.25rem;
        transition: all 0.2s ease-in-out;
    }

    .multiselect__single {
        margin-top: 4px;
    }

    .multiselect__select {
        height: 53px;
        top: 0px;
        z-index: 2;
    }

    .multiselect__select::before {
        top: 60%;
        color: black;
        border-color: black transparent transparent;
    }

    .multiselect__spinner {
        height: 51px;
    }

    .flag-ui_narrowtpl_flags_20x13_1,
    .flag-ui_narrowtpl_flags_20x13_10,
    .flag-ui_narrowtpl_flags_20x13_100,
    .flag-ui_narrowtpl_flags_20x13_102,
    .flag-ui_narrowtpl_flags_20x13_103,
    .flag-ui_narrowtpl_flags_20x13_104,
    .flag-ui_narrowtpl_flags_20x13_105,
    .flag-ui_narrowtpl_flags_20x13_106,
    .flag-ui_narrowtpl_flags_20x13_107,
    .flag-ui_narrowtpl_flags_20x13_108,
    .flag-ui_narrowtpl_flags_20x13_109,
    .flag-ui_narrowtpl_flags_20x13_11,
    .flag-ui_narrowtpl_flags_20x13_110,
    .flag-ui_narrowtpl_flags_20x13_111,
    .flag-ui_narrowtpl_flags_20x13_112,
    .flag-ui_narrowtpl_flags_20x13_113,
    .flag-ui_narrowtpl_flags_20x13_114,
    .flag-ui_narrowtpl_flags_20x13_115,
    .flag-ui_narrowtpl_flags_20x13_116,
    .flag-ui_narrowtpl_flags_20x13_117,
    .flag-ui_narrowtpl_flags_20x13_118,
    .flag-ui_narrowtpl_flags_20x13_119,
    .flag-ui_narrowtpl_flags_20x13_12,
    .flag-ui_narrowtpl_flags_20x13_120,
    .flag-ui_narrowtpl_flags_20x13_121,
    .flag-ui_narrowtpl_flags_20x13_122,
    .flag-ui_narrowtpl_flags_20x13_123,
    .flag-ui_narrowtpl_flags_20x13_124,
    .flag-ui_narrowtpl_flags_20x13_125,
    .flag-ui_narrowtpl_flags_20x13_126,
    .flag-ui_narrowtpl_flags_20x13_127,
    .flag-ui_narrowtpl_flags_20x13_128,
    .flag-ui_narrowtpl_flags_20x13_129,
    .flag-ui_narrowtpl_flags_20x13_13,
    .flag-ui_narrowtpl_flags_20x13_130,
    .flag-ui_narrowtpl_flags_20x13_131,
    .flag-ui_narrowtpl_flags_20x13_132,
    .flag-ui_narrowtpl_flags_20x13_133,
    .flag-ui_narrowtpl_flags_20x13_134,
    .flag-ui_narrowtpl_flags_20x13_135,
    .flag-ui_narrowtpl_flags_20x13_136,
    .flag-ui_narrowtpl_flags_20x13_137,
    .flag-ui_narrowtpl_flags_20x13_138,
    .flag-ui_narrowtpl_flags_20x13_139,
    .flag-ui_narrowtpl_flags_20x13_14,
    .flag-ui_narrowtpl_flags_20x13_148,
    .flag-ui_narrowtpl_flags_20x13_149,
    .flag-ui_narrowtpl_flags_20x13_15,
    .flag-ui_narrowtpl_flags_20x13_150,
    .flag-ui_narrowtpl_flags_20x13_154,
    .flag-ui_narrowtpl_flags_20x13_155,
    .flag-ui_narrowtpl_flags_20x13_156,
    .flag-ui_narrowtpl_flags_20x13_157,
    .flag-ui_narrowtpl_flags_20x13_158,
    .flag-ui_narrowtpl_flags_20x13_159,
    .flag-ui_narrowtpl_flags_20x13_16,
    .flag-ui_narrowtpl_flags_20x13_160,
    .flag-ui_narrowtpl_flags_20x13_161,
    .flag-ui_narrowtpl_flags_20x13_162,
    .flag-ui_narrowtpl_flags_20x13_163,
    .flag-ui_narrowtpl_flags_20x13_164,
    .flag-ui_narrowtpl_flags_20x13_165,
    .flag-ui_narrowtpl_flags_20x13_166,
    .flag-ui_narrowtpl_flags_20x13_167,
    .flag-ui_narrowtpl_flags_20x13_168,
    .flag-ui_narrowtpl_flags_20x13_169,
    .flag-ui_narrowtpl_flags_20x13_17,
    .flag-ui_narrowtpl_flags_20x13_170,
    .flag-ui_narrowtpl_flags_20x13_171,
    .flag-ui_narrowtpl_flags_20x13_172,
    .flag-ui_narrowtpl_flags_20x13_173,
    .flag-ui_narrowtpl_flags_20x13_174,
    .flag-ui_narrowtpl_flags_20x13_175,
    .flag-ui_narrowtpl_flags_20x13_176,
    .flag-ui_narrowtpl_flags_20x13_177,
    .flag-ui_narrowtpl_flags_20x13_178,
    .flag-ui_narrowtpl_flags_20x13_179,
    .flag-ui_narrowtpl_flags_20x13_18,
    .flag-ui_narrowtpl_flags_20x13_180,
    .flag-ui_narrowtpl_flags_20x13_181,
    .flag-ui_narrowtpl_flags_20x13_183,
    .flag-ui_narrowtpl_flags_20x13_184,
    .flag-ui_narrowtpl_flags_20x13_185,
    .flag-ui_narrowtpl_flags_20x13_186,
    .flag-ui_narrowtpl_flags_20x13_189,
    .flag-ui_narrowtpl_flags_20x13_19,
    .flag-ui_narrowtpl_flags_20x13_190,
    .flag-ui_narrowtpl_flags_20x13_191,
    .flag-ui_narrowtpl_flags_20x13_192,
    .flag-ui_narrowtpl_flags_20x13_193,
    .flag-ui_narrowtpl_flags_20x13_194,
    .flag-ui_narrowtpl_flags_20x13_196,
    .flag-ui_narrowtpl_flags_20x13_197,
    .flag-ui_narrowtpl_flags_20x13_199,
    .flag-ui_narrowtpl_flags_20x13_2,
    .flag-ui_narrowtpl_flags_20x13_20,
    .flag-ui_narrowtpl_flags_20x13_200,
    .flag-ui_narrowtpl_flags_20x13_201,
    .flag-ui_narrowtpl_flags_20x13_202,
    .flag-ui_narrowtpl_flags_20x13_21,
    .flag-ui_narrowtpl_flags_20x13_22,
    .flag-ui_narrowtpl_flags_20x13_23,
    .flag-ui_narrowtpl_flags_20x13_24,
    .flag-ui_narrowtpl_flags_20x13_25,
    .flag-ui_narrowtpl_flags_20x13_26,
    .flag-ui_narrowtpl_flags_20x13_27,
    .flag-ui_narrowtpl_flags_20x13_28,
    .flag-ui_narrowtpl_flags_20x13_29,
    .flag-ui_narrowtpl_flags_20x13_3,
    .flag-ui_narrowtpl_flags_20x13_30,
    .flag-ui_narrowtpl_flags_20x13_31,
    .flag-ui_narrowtpl_flags_20x13_33,
    .flag-ui_narrowtpl_flags_20x13_34,
    .flag-ui_narrowtpl_flags_20x13_35,
    .flag-ui_narrowtpl_flags_20x13_36,
    .flag-ui_narrowtpl_flags_20x13_37,
    .flag-ui_narrowtpl_flags_20x13_38,
    .flag-ui_narrowtpl_flags_20x13_39,
    .flag-ui_narrowtpl_flags_20x13_4,
    .flag-ui_narrowtpl_flags_20x13_40,
    .flag-ui_narrowtpl_flags_20x13_41,
    .flag-ui_narrowtpl_flags_20x13_42,
    .flag-ui_narrowtpl_flags_20x13_43,
    .flag-ui_narrowtpl_flags_20x13_44,
    .flag-ui_narrowtpl_flags_20x13_45,
    .flag-ui_narrowtpl_flags_20x13_46,
    .flag-ui_narrowtpl_flags_20x13_47,
    .flag-ui_narrowtpl_flags_20x13_48,
    .flag-ui_narrowtpl_flags_20x13_49,
    .flag-ui_narrowtpl_flags_20x13_5,
    .flag-ui_narrowtpl_flags_20x13_50,
    .flag-ui_narrowtpl_flags_20x13_51,
    .flag-ui_narrowtpl_flags_20x13_52,
    .flag-ui_narrowtpl_flags_20x13_53,
    .flag-ui_narrowtpl_flags_20x13_54,
    .flag-ui_narrowtpl_flags_20x13_55,
    .flag-ui_narrowtpl_flags_20x13_56,
    .flag-ui_narrowtpl_flags_20x13_57,
    .flag-ui_narrowtpl_flags_20x13_58,
    .flag-ui_narrowtpl_flags_20x13_59,
    .flag-ui_narrowtpl_flags_20x13_6,
    .flag-ui_narrowtpl_flags_20x13_60,
    .flag-ui_narrowtpl_flags_20x13_61,
    .flag-ui_narrowtpl_flags_20x13_62,
    .flag-ui_narrowtpl_flags_20x13_63,
    .flag-ui_narrowtpl_flags_20x13_64,
    .flag-ui_narrowtpl_flags_20x13_65,
    .flag-ui_narrowtpl_flags_20x13_66,
    .flag-ui_narrowtpl_flags_20x13_67,
    .flag-ui_narrowtpl_flags_20x13_68,
    .flag-ui_narrowtpl_flags_20x13_69,
    .flag-ui_narrowtpl_flags_20x13_7,
    .flag-ui_narrowtpl_flags_20x13_70,
    .flag-ui_narrowtpl_flags_20x13_71,
    .flag-ui_narrowtpl_flags_20x13_72,
    .flag-ui_narrowtpl_flags_20x13_73,
    .flag-ui_narrowtpl_flags_20x13_74,
    .flag-ui_narrowtpl_flags_20x13_75,
    .flag-ui_narrowtpl_flags_20x13_76,
    .flag-ui_narrowtpl_flags_20x13_77,
    .flag-ui_narrowtpl_flags_20x13_78,
    .flag-ui_narrowtpl_flags_20x13_79,
    .flag-ui_narrowtpl_flags_20x13_8,
    .flag-ui_narrowtpl_flags_20x13_80,
    .flag-ui_narrowtpl_flags_20x13_81,
    .flag-ui_narrowtpl_flags_20x13_82,
    .flag-ui_narrowtpl_flags_20x13_83,
    .flag-ui_narrowtpl_flags_20x13_84,
    .flag-ui_narrowtpl_flags_20x13_86,
    .flag-ui_narrowtpl_flags_20x13_87,
    .flag-ui_narrowtpl_flags_20x13_88,
    .flag-ui_narrowtpl_flags_20x13_89,
    .flag-ui_narrowtpl_flags_20x13_9,
    .flag-ui_narrowtpl_flags_20x13_90,
    .flag-ui_narrowtpl_flags_20x13_91,
    .flag-ui_narrowtpl_flags_20x13_92,
    .flag-ui_narrowtpl_flags_20x13_93,
    .flag-ui_narrowtpl_flags_20x13_95,
    .flag-ui_narrowtpl_flags_20x13_96,
    .flag-ui_narrowtpl_flags_20x13_97,
    .flag-ui_narrowtpl_flags_20x13_98,
    .flag-ui_narrowtpl_flags_20x13_99 {
        display: inline-block;
        background-image: url('/images/ui_narrowtpl_flags_20x13_sprite.png');
        width: 20px;
        height: 13px
    }

    .flag-ui_narrowtpl_flags_20x13_1 {
        background-position: -21px 0
    }

    .flag-ui_narrowtpl_flags_20x13_10 {
        background-position: -63px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_100 {
        background-position: 0 -14px
    }

    .flag-ui_narrowtpl_flags_20x13_102 {
        background-position: -21px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_103 {
        background-position: 0 -28px
    }

    .flag-ui_narrowtpl_flags_20x13_104 {
        background-position: -21px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_105 {
        background-position: -42px 0
    }

    .flag-ui_narrowtpl_flags_20x13_106 {
        background-position: -42px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_107 {
        background-position: -42px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_108 {
        background-position: 0 -42px
    }

    .flag-ui_narrowtpl_flags_20x13_109 {
        background-position: -21px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_11 {
        background-position: -42px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_110 {
        background-position: -63px 0
    }

    .flag-ui_narrowtpl_flags_20x13_111 {
        background-position: -63px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_112 {
        background-position: -63px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_113 {
        background-position: -63px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_114 {
        background-position: 0 -56px
    }

    .flag-ui_narrowtpl_flags_20x13_115 {
        background-position: -21px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_116 {
        background-position: -42px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_117 {
        background-position: -63px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_118 {
        background-position: 0 -70px
    }

    .flag-ui_narrowtpl_flags_20x13_119 {
        background-position: -21px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_12 {
        background-position: -42px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_120 {
        background-position: -63px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_121 {
        background-position: -84px 0
    }

    .flag-ui_narrowtpl_flags_20x13_122 {
        background-position: -84px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_123 {
        background-position: -84px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_124 {
        background-position: -84px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_125 {
        background-position: -84px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_126 {
        background-position: -84px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_127 {
        background-position: 0 -84px
    }

    .flag-ui_narrowtpl_flags_20x13_128 {
        background-position: -21px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_129 {
        background-position: -42px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_13 {
        background-position: -63px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_130 {
        background-position: -84px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_131 {
        background-position: -105px 0
    }

    .flag-ui_narrowtpl_flags_20x13_132 {
        background-position: -105px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_133 {
        background-position: -105px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_134 {
        background-position: -105px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_135 {
        background-position: -105px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_136 {
        background-position: -105px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_137 {
        background-position: -105px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_138 {
        background-position: 0 -98px
    }

    .flag-ui_narrowtpl_flags_20x13_139 {
        background-position: -21px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_14 {
        background-position: -42px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_148 {
        background-position: -63px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_149 {
        background-position: -84px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_15 {
        background-position: -105px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_150 {
        background-position: 0 -112px
    }

    .flag-ui_narrowtpl_flags_20x13_154 {
        background-position: -21px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_155 {
        background-position: -42px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_156 {
        background-position: -63px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_157 {
        background-position: -84px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_158 {
        background-position: -105px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_159 {
        background-position: -126px 0
    }

    .flag-ui_narrowtpl_flags_20x13_16 {
        background-position: -126px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_160 {
        background-position: -126px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_161 {
        background-position: -126px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_162 {
        background-position: -126px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_163 {
        background-position: -126px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_164 {
        background-position: -126px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_165 {
        background-position: -126px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_166 {
        background-position: -126px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_167 {
        background-position: 0 -126px
    }

    .flag-ui_narrowtpl_flags_20x13_168 {
        background-position: -21px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_169 {
        background-position: -42px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_17 {
        background-position: -63px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_170 {
        background-position: -84px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_171 {
        background-position: -105px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_172 {
        background-position: -126px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_173 {
        background-position: -147px 0
    }

    .flag-ui_narrowtpl_flags_20x13_174 {
        background-position: -147px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_175 {
        background-position: -147px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_176 {
        background-position: -147px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_177 {
        background-position: -147px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_178 {
        background-position: -147px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_179 {
        background-position: -147px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_18 {
        background-position: -147px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_180 {
        background-position: -147px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_181 {
        background-position: -147px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_183 {
        background-position: 0 -140px
    }

    .flag-ui_narrowtpl_flags_20x13_184 {
        background-position: -21px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_185 {
        background-position: -42px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_186 {
        background-position: -63px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_189 {
        background-position: -84px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_19 {
        background-position: -105px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_190 {
        background-position: -126px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_191 {
        background-position: -147px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_192 {
        background-position: 0 -154px
    }

    .flag-ui_narrowtpl_flags_20x13_193 {
        background-position: -21px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_194 {
        background-position: -42px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_195 {
        display: inline-block;
        background-image: url('/images/ui_narrowtpl_flags_20x13_sprite.png');
        background-position: 0 0;
        width: 20px;
        height: 13px
    }

    .flag-ui_narrowtpl_flags_20x13_196 {
        background-position: -84px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_197 {
        background-position: -105px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_199 {
        background-position: -126px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_2 {
        background-position: -147px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_20 {
        background-position: -168px 0
    }

    .flag-ui_narrowtpl_flags_20x13_200 {
        background-position: -168px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_201 {
        background-position: -168px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_202 {
        background-position: -168px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_21 {
        background-position: -168px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_22 {
        background-position: -168px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_23 {
        background-position: -168px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_24 {
        background-position: -168px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_25 {
        background-position: -168px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_26 {
        background-position: -168px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_27 {
        background-position: -168px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_28 {
        background-position: -168px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_29 {
        background-position: 0 -168px
    }

    .flag-ui_narrowtpl_flags_20x13_3 {
        background-position: -21px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_30 {
        background-position: -42px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_31 {
        background-position: -63px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_33 {
        background-position: -84px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_34 {
        background-position: -105px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_35 {
        background-position: -126px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_36 {
        background-position: -147px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_37 {
        background-position: -168px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_38 {
        background-position: -189px 0
    }

    .flag-ui_narrowtpl_flags_20x13_39 {
        background-position: -189px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_4 {
        background-position: -189px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_40 {
        background-position: -189px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_41 {
        background-position: -189px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_42 {
        background-position: -189px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_43 {
        background-position: -189px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_44 {
        background-position: -189px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_45 {
        background-position: -189px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_46 {
        background-position: -189px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_47 {
        background-position: -189px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_48 {
        background-position: -189px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_49 {
        background-position: -189px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_5 {
        background-position: 0 -182px
    }

    .flag-ui_narrowtpl_flags_20x13_50 {
        background-position: -21px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_51 {
        background-position: -42px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_52 {
        background-position: -63px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_53 {
        background-position: -84px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_54 {
        background-position: -105px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_55 {
        background-position: -126px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_56 {
        background-position: -147px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_57 {
        background-position: -168px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_58 {
        background-position: -189px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_59 {
        background-position: 0 -196px
    }

    .flag-ui_narrowtpl_flags_20x13_6 {
        background-position: -21px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_60 {
        background-position: -42px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_61 {
        background-position: -63px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_62 {
        background-position: -84px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_63 {
        background-position: -105px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_64 {
        background-position: -126px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_65 {
        background-position: -147px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_66 {
        background-position: -168px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_67 {
        background-position: -189px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_68 {
        background-position: -210px 0
    }

    .flag-ui_narrowtpl_flags_20x13_69 {
        background-position: -210px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_7 {
        background-position: -210px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_70 {
        background-position: -210px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_71 {
        background-position: -210px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_72 {
        background-position: -210px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_73 {
        background-position: -210px -84px
    }

    .flag-ui_narrowtpl_flags_20x13_74 {
        background-position: -210px -98px
    }

    .flag-ui_narrowtpl_flags_20x13_75 {
        background-position: -210px -112px
    }

    .flag-ui_narrowtpl_flags_20x13_76 {
        background-position: -210px -126px
    }

    .flag-ui_narrowtpl_flags_20x13_77 {
        background-position: -210px -140px
    }

    .flag-ui_narrowtpl_flags_20x13_78 {
        background-position: -210px -154px
    }

    .flag-ui_narrowtpl_flags_20x13_79 {
        background-position: -210px -168px
    }

    .flag-ui_narrowtpl_flags_20x13_8 {
        background-position: -210px -182px
    }

    .flag-ui_narrowtpl_flags_20x13_80 {
        background-position: -210px -196px
    }

    .flag-ui_narrowtpl_flags_20x13_81 {
        background-position: 0 -210px
    }

    .flag-ui_narrowtpl_flags_20x13_82 {
        background-position: -21px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_83 {
        background-position: -42px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_84 {
        background-position: -63px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_86 {
        background-position: -84px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_87 {
        background-position: -105px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_88 {
        background-position: -126px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_89 {
        background-position: -147px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_9 {
        background-position: -168px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_90 {
        background-position: -189px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_91 {
        background-position: -210px -210px
    }

    .flag-ui_narrowtpl_flags_20x13_92 {
        background-position: -231px 0
    }

    .flag-ui_narrowtpl_flags_20x13_93 {
        background-position: -231px -14px
    }

    .flag-ui_narrowtpl_flags_20x13_95 {
        background-position: -231px -28px
    }

    .flag-ui_narrowtpl_flags_20x13_96 {
        background-position: -231px -42px
    }

    .flag-ui_narrowtpl_flags_20x13_97 {
        background-position: -231px -56px
    }

    .flag-ui_narrowtpl_flags_20x13_98 {
        background-position: -231px -70px
    }

    .flag-ui_narrowtpl_flags_20x13_99 {
        background-position: -231px -84px
    }

</style>
