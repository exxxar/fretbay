<template>
    <div class="modal fade" id="signUp-transporter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body p-5">

                    <form class="js-validate" action="/register-transporter" method="post">

                        <input type="hidden" name="_token" :value="csrf">
                        <div id="signin" data-target-group="idForm">
                            <!-- Title -->
                            <header class="text-center mb-5">
                                <h2 class="h4 mb-0">Sign up with Transporter</h2>
                                <p>And after SignIn to manage your account.</p>
                            </header>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="text" class="form-control form__input" name="company_name"
                                                   placeholder="Name of your company" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="text" class="form-control form__input" name="first_name"
                                                   placeholder="First name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">

                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="text" class="form-control form__input" name="second_name"
                                                   placeholder="Second name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-12">

                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="email" class="form-control form__input" name="email"
                                                   placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="email" class="form-control form__input"
                                                   name="email_confirmation"
                                                   placeholder="Email confirm" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="tel" class="form-control form__input"
                                                   v-mask="'+ ### ### #######'"
                                                   name="telephone_number_1"
                                                   placeholder="Telephone number" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">

                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="tel" class="form-control form__input"
                                                   v-mask="'+ ### ### #######'"
                                                   name="telephone_number_2"
                                                   placeholder="Mobile number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <select id="country" class="form-control form__input" v-model="country_id"
                                                    :disabled="countries.length===0"
                                                    name="country" v-on:change="loadCity()">
                                                <option value="" disabled selected>Country</option>
                                                <option v-for="country in countries" :label="country.title"
                                                        :value="country.id">
                                                    {{country.id}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
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
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="text" class="form-control form__input" name="postal"
                                                   placeholder="Postal Code or City" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">

                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="text" class="form-control form__input" name="city"
                                                   placeholder="Your city" required>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 col-sm-12">
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
                                </div>

                            </div>


                            <!-- Divider -->
                            <div class="text-center u-divider-wrapper my-3">
                                <span class="u-divider u-divider--xs u-divider--text">Account</span>
                            </div>
                            <!-- End Divider -->


                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="text" class="form-control form__input" name="username"
                                                   placeholder="Username" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="password" class="form-control form__input" name="password"
                                                   placeholder="Password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">

                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <input type="password" class="form-control form__input"
                                                   name="password_confirmation"
                                                   placeholder="Confirm password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 col-sm-12">


                                    <div class="js-form-message mb-3">
                                        <div class="js-focus-state form">
                                            <!-- Checkbox -->
                                            <div
                                                class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                <input type="checkbox" class="custom-control-input" id="iAgree">
                                                <label class="custom-control-label" for="iAgree">
                                                    I agree to receive commercial offers from FretBay and its partners.
                                                </label>
                                            </div>
                                            <!-- End Checkbox -->
                                        </div>

                                    </div>

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

                <button type="button" class="close position-absolute-top-right-0 mt-4 mr-4" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true"><i class="svg-icon svg-icon-xs text-muted"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18"
                                                                                                   y2="18"></line></svg></i></span>
                </button>
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
                country_id: null
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
            this.loadCountries();
            this.$store.dispatch("getCategories");
        },
        methods: {
            loadCountries() {
                axios
                    .get('/api/locations/countries')
                    .then(response => {
                        this.countries = response.data;

                    });
            },
            loadCity: function () {
                axios
                    .get('/api/locations/cities/' + this.country_id)
                    .then(response => {
                        this.regions = response.data;

                    });
            },
        }
    }
</script>






