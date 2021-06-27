<template>
    <div class="main-body mt-3">
        <div class="row">

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>Company details</h2>
                        <p class="inform-box">
                            You wish to change your informations?
                            <br>
                            Please contact us at <a href="#">transporteur@fretbay.com</a> to make the request.</p>
                        <form action="#">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group"><label for="" class="text-lg">Company name</label><input
                                        type="text" :value="user.profile.company_name"
                                        class="form-control form-control-img-lock" placeholder="company" disabled></div>
                                    <div class="form-group"><label for="" class="text-lg">Address</label><input
                                        type="text" :value="user.profile.address"
                                        class="form-control-empty form-control" placeholder="address"></div>
                                    <div class="form-group"><label for="" class="text-lg">Phone number</label><input
                                        type="text" :value="user.profile.telephone_number_1"
                                        class="form-control form-control-img-lock" placeholder="1234567890" disabled>
                                    </div>
                                    <div class="form-group"><label for="" class="text-lg">Mobile phone
                                        number</label><input type="text" :value="user.profile.telephone_number_2"
                                                             class="form-control form-control-img-lock"
                                                             placeholder="1234567890" disabled></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>Company introduction</h2>
                        <form action="">
                            <div class="form-group">
                                <label for="" class="text-lg">About my company</label>
                                <textarea class="form-control" rows="4">{{user.profile.about_company}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-lg">Additional services</label>
                                <textarea class="form-control" rows="4">{{user.profile.additional_service}}</textarea>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6 text-lg lh-40">Insurance company</label>
                                <div class="col-sm-6">
                                    <input type="text" :value="user.profile.insurance_company"
                                           class="form-control-empty form-control" placeholder="1234567890">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6 text-lg">Cargo insurance amount</label>
                                <div class="col-sm-6 input-has-icon-right">
                                    <input type="text" class="form-control-empty form-control"
                                           :value="user.profile.cargo_insurance_amount" placeholder="0">
                                    <span class="price-symbol">€</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>About the payment</h2>
                        <p class="inform-box">
                            The customer will pay you 45% of the amount upon loading and 55% upon delivery.</p>
                        <form action="#">
                            <h4 class="tab-subtitle">Choose the accepted payment method(s)</h4>
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2 col-md-12 ">
                                    <div class="checkbox-list">
                                        <label for="">
                                            <span class="label-text">Credit card</span>
                                            <span class="custom-checkbox">
                                                <input type="checkbox">
                                                <span>&nbsp;</span>
                                            </span>
                                        </label>
                                        <label for="">
                                            <span class="label-text">Cashier's cheque</span>
                                            <span class="custom-checkbox">
                                                <input type="checkbox">
                                                <span>&nbsp;</span>
                                            </span>
                                        </label>
                                        <label for="">
                                            <span class="label-text">Cheque</span>
                                            <span class="custom-checkbox">
                                                <input type="checkbox">
                                                <span>&nbsp;</span>
                                            </span>
                                        </label>
                                        <label for="">
                                            <span class="label-text">Cash</span>
                                            <span class="custom-checkbox">
                                                <input type="checkbox">
                                                <span>&nbsp;</span>
                                            </span>
                                        </label>
                                        <label for="">
                                            <span class="label-text">Paypal</span>
                                            <span class="custom-checkbox">
                                                <input type="checkbox">
                                                <span>&nbsp;</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>Spoken languages</h2>
                        <h4 class="tab-subtitle">Choose your spoken languages</h4>

                        <form action="">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="english-lang">
                                <label class="custom-control-label" for="english-lang">English</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="german-lang">
                                <label class="custom-control-label" for="german-lang">German</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="franch-lang">
                                <label class="custom-control-label" for="franch-lang">Franch</label>
                            </div>

                            <div class="form-group text-center">
                                <a href="#"
                                   class="btn btn-success btn-standard">Save</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>Your transport specialties</h2>
                        <p class="inform-box">
                            Choose the transport specialties that your company can offer as a service.</p>

                        <div class="list-transport-categories">
                            <div class="row">


                                <div class="col-3 mb-2" v-for="(category, index) in categories">
                                    <div class="card text-dark">
                                        <img alt="Card image" class="card-img "
                                                                     v-lazy="category.image"
                                                                     style="padding: 20px;">
                                        <div class="card-img-overlay">
                                            <h6 class="card-title">{{category.title}}</h6>

                                        </div>
                                        <div class="card-footer">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" :id="'category'+category.id">
                                                <label class="custom-control-label" for="'category'+category.id">In use</label>
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
        computed: {
            categories() {
                return this.$store.getters.categories;
            },
            user() {
                return window.user
            }
        },
        mounted() {
            this.$store.dispatch("getCategories");


        }
    }
</script>
