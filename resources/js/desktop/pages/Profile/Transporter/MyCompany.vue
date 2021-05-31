 <template>
        <div class="tab-content col-md-8">
            <div class="tab1_1 tab">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="tab-title">Company details</h2>
                        <p class="inform-box">
                            You wish to change your informations?
                            <br>
                            Please contact us at <a href="#">transporteur@fretbay.com</a> to make the request.</p>
                        <form action="#">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group"><label for="" class="text-lg">Company name</label><input type="text" class="form-control form-control-img-lock" placeholder="company" disabled></div>
                                    <div class="form-group"><label for="" class="text-lg">Address</label><input type="text" class="form-control-empty form-control" placeholder="address"></div>
                                    <div class="form-group"><label for="" class="text-lg">Phone number</label><input type="text" class="form-control form-control-img-lock" placeholder="1234567890" disabled></div>
                                    <div class="form-group"><label for="" class="text-lg">Mobile phone number</label><input type="text" class="form-control form-control-img-lock" placeholder="1234567890" disabled></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab1_2 tab">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="tab-title">Company introduction</h2>
                        <form action="">
                            <div class="form-group">
                                <label for="" class="text-lg">About my company</label>
                                <textarea class="form-control-textarea" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-lg">Additional services</label>
                                <textarea class="form-control-textarea" rows="4"></textarea>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6 text-lg lh-40">Insurance company</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control-empty form-control" placeholder="1234567890">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6 text-lg">Cargo insurance amount</label>
                                <div class="col-sm-6 input-has-icon-right">
                                    <input type="text" class="form-control-empty form-control" placeholder="0">
                                    <span class="price-symbol">€</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab1_3 tab">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="tab-title">About the payment</h2>
                        <p class="inform-box">
                            The customer will pay you 45% of the amount upon loading and 55% upon delivery.</p>
                        <form action="#">
                            <h4 class="tab-subtitle">Choose the accepted payment method(s)</h4>
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
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
            <div class="tab1_4 tab">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="tab-title">Spoken languages</h2>
                        <form action="#">
                            <h4 class="tab-subtitle">Choose your spoken languages</h4>
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                                    <div class="checkbox-list">
                                        <label for="">
                                            <i class="flag flag-fr"></i>
                                            <span class="label-text">French</span>
                                            <span class="custom-checkbox">
                                                <input type="checkbox">
                                                <span>&nbsp;</span>
                                            </span>
                                        </label>
                                        <label for="">
                                            <i class="flag flag-uk"></i>
                                            <span class="label-text">English - Us</span>
                                            <span class="custom-checkbox">
                                                <input type="checkbox">
                                                <span>&nbsp;</span>
                                            </span>
                                        </label>
                                        <label for="">
                                            <i class="flag flag-es"></i>
                                            <span class="label-text">Spanish</span>
                                            <span class="custom-checkbox">
                                                <input type="checkbox">
                                                <span>&nbsp;</span>
                                            </span>
                                        </label>
                                        <label for="">
                                            <i class="flag flag-de"></i>
                                            <span class="label-text">German</span>
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
            <div class="tab1_5 tab">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="tab-title">Your transport specialties</h2>
                        <p class="inform-box">
                            Choose the transport specialties that your company can offer as a service.</p>
                    </div>
                </div>
                <div class="list-transport-categories">
                    <ul>
                        <li class="list-transport-category">
                            <label for="" class="selected">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/1.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Household equipment</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/2.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Moving</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/3.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Vehicle</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/5.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Boats & voluminous</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/6.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Miscellaneous</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/9.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Commercial goods</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/11.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Animals</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/13.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Fragile goods</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/14.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Agri-food</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/17.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Motorcycles and sports vehicles</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/18.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Package/Fold</span>
                            </label>
                        </li>
                        <li class="list-transport-category">
                            <label for="">
                                <input type="checkbox">
                                <span class="category-icon"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/default/19.svg?v=0.0.5" alt=""></span>
                                <span class="category-name">Pallet</span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
 </template>
<script>
    export default {

    }
</script>
