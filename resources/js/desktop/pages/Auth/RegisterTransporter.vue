<template>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="min-height: 100vh;padding:100px 0px;">
            <div class="col-md-6 col-12 col-sm-12">
                <form class="js-validate form-signin" action="/register-transporter" method="post">

                    <slot name="csrf"></slot>
                    <div id="signin" data-target-group="idForm">
                        <!-- Title -->
                        <header class="text-center mb-5">
                            <img src="/assets/img/logo.png" alt="Logo" style="width: 100px;">
                            <h2 class="h4 mb-0">Sign up with Transporter</h2>
                            <p>And after SignIn to manage your account.</p>
                        </header>

                        <slot name="any-error"></slot>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="text" class="form-control form__input" name="company_name"
                                       placeholder="Name of your company" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="text" class="form-control form__input" name="first_name"
                                       placeholder="First name" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="text" class="form-control form__input" name="second_name"
                                       placeholder="Second name" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="email" class="form-control form__input" name="email"
                                       placeholder="Email" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="email" class="form-control form__input" name="email_confirmation"
                                       placeholder="Email confirm" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="tel" class="form-control form__input" v-mask="'+ ### ### #######'"
                                       name="telephone_number_1"
                                       placeholder="Telephone number" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="tel" class="form-control form__input" v-mask="'+ ### ### #######'"
                                       name="telephone_number_2"
                                       placeholder="Mobile number" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <select id="country" class="form-control form__input" v-model="country_id"
                                        :disabled="countries.length===0"
                                        name="country" v-on:change="getRegions()">
                                    <option value="" disabled selected>Country</option>
                                    <option v-for="country in countries" :label="country.title" :value="country.id" v-model="country_id">
                                        {{country.id}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="text" class="form-control form__input" name="postal"
                                       placeholder="Postal Code or City" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="text" class="form-control form__input" name="city"
                                       placeholder="Your city" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <select id="region" name="region" class="form-control form__input" :disabled="regions.length===0">
                                    <option value="" disabled selected>Region</option>
                                    <option v-bind=region v-for="region in regions" :label="region.title">
                                        {{region.id}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <select id="area_of_expertise" name="areas_of_expertise"
                                        :disabled="categories.length===0"
                                        class="form-control form__input">
                                    <option value="" disabled selected>Your area of expertise</option>
                                    <option :value="category" v-for="category in categories">{{category.title}}</option>
                                </select>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="text-center u-divider-wrapper my-3">
                            <span class="u-divider u-divider--xs u-divider--text">Account</span>
                        </div>
                        <!-- End Divider -->


                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="text" class="form-control form__input" name="username"
                                       placeholder="Username" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="password" class="form-control form__input" name="password"
                                       placeholder="Password" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <input type="password" class="form-control form__input" name="password_confirmation"
                                       placeholder="Confirm password" required>
                            </div>
                        </div>

                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <!-- Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                    <input type="checkbox" class="custom-control-input" id="iAgree">
                                    <label class="custom-control-label" for="iAgree">
                                        I agree to receive commercial offers from FretBay and its partners.
                                    </label>
                                </div>
                                <!-- End Checkbox -->
                            </div>

                        </div>


                        <div class="js-form-message mb-3">
                            <div class="js-focus-state form">
                                <button type="submit" class="btn btn-primary w-100">
                                    Register
                                </button>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="text-center u-divider-wrapper my-3">
                            <span class="u-divider u-divider--xs u-divider--text">OR</span>
                        </div>
                        <!-- End Divider -->

                        <!-- Signin Social Buttons -->
                        <div class="row mx-gutters-2 mb-4">
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
                        </div>
                        <!-- End Signin Social Buttons -->


                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
          return {
              country_id: null,
              countries:[],
              regions:[],
          }
        },
        computed:{
            categories() {
                return this.$store.getters.categories;
            },
        },
        mounted(){
            this.getCountries()
            this.$store.dispatch("getCategories");
        },
        methods:{
            getRegions(){
                axios.get("/api/locations/cities/"+this.country_id).then(resp=>{
                    this.regions = resp.data
                })
            },
            getCountries(){
                axios.get("/api/locations/countries").then(resp=>{
                    this.countries = resp.data
                })
            }
        }
    }
</script>

