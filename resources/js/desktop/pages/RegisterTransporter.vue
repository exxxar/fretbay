<template>
    <div class="container">
        <section class="etape-box ims2 etape1-box">
            <div class="col-md-6 col-sm-6">
                <section class="port-img-sec">
                    <h1 class="hidden-xs">Join the largest network of professional transporters in Europe!</h1>
                    <div class="row ">
                        <div class="col-sm-4 hidden-xs mr-l mr-r port-imgs">
                            <img src="https://fretbay.com/fr/transporter/images/port-img1.png" alt="Image" class="img-responsive">
                        </div>
                        <!--col-sm-4-->
                        <div class="col-sm-4 hidden-xs mr-l mr-r port-imgs">
                            <img src="https://fretbay.com/fr/transporter/images/port-img2.png" alt="Image" class="img-responsive">
                        </div>
                        <!--col-sm-4-->
                        <div class="col-sm-4 hidden-xs mr-l mr-r port-imgs">
                            <img src="https://fretbay.com/fr/transporter/images/port-img3.png" alt="Image" class="img-responsive">
                        </div>
                        <!--col-sm-4-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="col-sm-4 hidden-xs mr-l mr-r port-imgs">
                            <img src="https://fretbay.com/fr/transporter/images/port-img4.png" alt="Image" class="img-responsive">
                        </div>
                        <!--col-sm-4-->
                        <div class="col-sm-4 hidden-xs mr-l mr-r port-imgs">
                            <img src="https://fretbay.com/fr/transporter/images/port-img5.png" alt="Image" class="img-responsive">
                        </div>
                        <!--col-sm-4-->
                        <div class="col-sm-4 hidden-xs mr-l mr-r port-imgs">
                            <img src="https://fretbay.com/fr/transporter/images/port-img6.png" alt="Image" class="img-responsive">
                        </div>
                        <!--col-sm-4-->

                    </div>
                </section>
                <!--port-img-sec-->
            </div>
            <!--col-md-6-->
            <div class="col-md-6 col-sm-6 etape1-box-col">
                <section class="shipper-pro etaps etape1">

                    <h3>
                        Get started - it's free.              <small>The registration process takes no more than a minute.</small>
                    </h3>

                    <form id="signUpForm" name="signUpForm" action="https://fretbay.com/fr/transporter/joinnowProcess.php?lang=en" method="POST" class="feature" onsubmit="alert('done');return false;">




                        <input type="hidden" id="emailFlag" value="0">
                        <input type="hidden" id="loginFlag" value="0">
                        <input type="hidden" id="formError" value="1">
                        <input type="hidden" name="referal" value="">
                        <input type="hidden" name="fzr123" value="0">
                        <input type="hidden" name="userLang" value="en">


                        <div class="log-row fix-spacing ">
                            <input type="text" id="companyName" name="companyName" class="lis form-control " placeholder="Name of your company" value="">
                            <span id="companyName-error" class="e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row fix-spacing ">
                            <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First name" value="">
                            <span id="firstName-error" class="e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row fix-spacing">
                            <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Name" value="">
                            <span id="lastName-error" class="e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->

                        <div class="log-row fix-spacing">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="">
                            <span id="email-error" class="e-msg-etap"></span>
                            <span class="emailHint e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row fix-spacing">
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Telephone number" value="">
                            <span id="phone-error" class="e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row fix-spacing">
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile number" value="">
                            <span id="mobile-error" class="e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row etap-select biger-sel fix-select fix-country">
                            <div class="search-box ">
                                <div class="size-container ">
                                    <select id="country" name="country">
                                        <option value="AT">Austria</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="CA">Canada</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DE">Germany</option>
                                        <option value="DK">Denmark</option>
                                        <option value="EE">Estonia</option>
                                        <option value="UK">England</option>
                                        <option value="US">United States</option>
                                        <option value="ES">Spain</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="GR">Greece</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IT">Italy</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="LV">Latvia</option>
                                        <option value="MT">Malta</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="RO">Romania</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="AUT">Other</option>

                                    </select>
                                    <div class="clearfix"></div>
                                    <!--clearfix-->
                                </div>
                                <!--size-container-->
                                <div class="clearfix"></div>
                                <!--clearfix-->
                                <span id="country-error" class="e-msg-etap"></span>
                                <div class="clearfix"></div>
                                <!--clearfix-->
                            </div>
                            <!--search-box-->
                            <div class="clearfix"></div>
                            <!--clearfix-->
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row fix-spacing">
                            <input type="text" id="cp" name="cp" class="form-control ui-autocomplete-input" placeholder="Postal Code or City" value="" autocomplete="off">
                            <span id="cp-error" class="e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row etap-select biger-sel2 fix-select">
                            <div class="search-box">
                                <div class="size-container">
                                    <input type="hidden" id="regionVal" value="">
                                    <select id="region" name="region"><option value="">Region</option><option value="Burgenland">Burgenland</option><option value="Kärnten">Kärnten</option><option value="Niederösterreich">Niederösterreich</option><option value="Oberösterreich">Oberösterreich</option><option value="Salzburg">Salzburg</option><option value="Steiermark">Steiermark</option><option value="Tirol">Tirol</option><option value="Vorarlberg">Vorarlberg</option><option value="Wien">Wien</option></select>
                                </div>
                                <!--size-container-->
                                <div class="clearfix"></div>
                                <!--clearfix-->
                            </div>
                            <!--search-box-->
                        </div>
                        <!--log-row-->
                        <span id="region-error" class="e-msg-etap"></span>
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <!-- edit: categroy-box -->
                        <div class="log-row etap-select biger-sel cat-box fix-select border-bottom-sm">
                            <select id="cat" class="selectpicker show-menu-arrow form-control " name="cat[]" multiple="multiple" style="display: none;">
                                <option value="1" data-icon="equipment">Home equipment</option>
                                <option value="2" data-icon="demenagement">Moving</option>
                                <option value="3" data-icon="vehicle">Vehicle</option>
                                <option value="5" data-icon="bateaux">Boats &amp; Voluminous</option>
                                <option value="6" data-icon="divers">Miscellaneous</option>
                                <option value="9" data-icon="commerciaux">Commercial goods</option>
                                <option value="17" data-icon="motos">Motorcycles and sports vehicles</option>
                                <option value="11" data-icon="animaux">Animals</option>
                                <option value="13" data-icon="fragiles">Fragile assets</option>
                                <option value="14" data-icon="agroalimentaire">Agri-food</option>
                                <option value="18" data-icon="colis">Packages</option>
                                <option value="19" data-icon="palette">Pallets</option>
                            </select><div class="btn-group bootstrap-select show-tick  show-menu-arrow form-control"><button type="button" class="btn dropdown-toggle selectpicker cat-button btn-default" data-toggle="dropdown" data-id="cat" title="Your areas of expertise"><span class="filter-option pull-left cat-span-text">Your areas of expertise</span>&nbsp;<span class="sel-aar cat-span-button"></span></button><div class="dropdown-menu open"><a href="javascript:void(0);" class="close-ddrop">x</a><ul class="dropdown-menu inner selectpicker" role="menu"><li data-original-index="0"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon equipment&quot;></span> <span class=&quot;text&quot;>Home equipment</span>"><span class="glyphicon equipment"></span> <span class="text">Home equipment</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon demenagement&quot;></span> <span class=&quot;text&quot;>Moving</span>"><span class="glyphicon demenagement"></span> <span class="text">Moving</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon vehicle&quot;></span> <span class=&quot;text&quot;>Vehicle</span>"><span class="glyphicon vehicle"></span> <span class="text">Vehicle</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon bateaux&quot;></span> <span class=&quot;text&quot;>Boats &amp;amp; Voluminous</span>"><span class="glyphicon bateaux"></span> <span class="text">Boats &amp; Voluminous</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon divers&quot;></span> <span class=&quot;text&quot;>Miscellaneous</span>"><span class="glyphicon divers"></span> <span class="text">Miscellaneous</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon commerciaux&quot;></span> <span class=&quot;text&quot;>Commercial goods</span>"><span class="glyphicon commerciaux"></span> <span class="text">Commercial goods</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon motos&quot;></span> <span class=&quot;text&quot;>Motorcycles and sports vehicles</span>"><span class="glyphicon motos"></span> <span class="text">Motorcycles and sports vehicles</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon animaux&quot;></span> <span class=&quot;text&quot;>Animals</span>"><span class="glyphicon animaux"></span> <span class="text">Animals</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon fragiles&quot;></span> <span class=&quot;text&quot;>Fragile assets</span>"><span class="glyphicon fragiles"></span> <span class="text">Fragile assets</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon agroalimentaire&quot;></span> <span class=&quot;text&quot;>Agri-food</span>"><span class="glyphicon agroalimentaire"></span> <span class="text">Agri-food</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon colis&quot;></span> <span class=&quot;text&quot;>Packages</span>"><span class="glyphicon colis"></span> <span class="text">Packages</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" data-normalized-text="<span class=&quot;glyphicon palette&quot;></span> <span class=&quot;text&quot;>Pallets</span>"><span class="glyphicon palette"></span> <span class="text">Pallets</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div></div>

                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <span id="cat-error" class="e-msg-etap"></span>
                        <div class="log-row fix-spacing">
                            <input type="text" id="userName" name="userName" value="" class="form-control" placeholder="Username">
                            <span id="userName-error" class="e-msg-etap"></span>
                            <span class="userHint e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row fix-spacing">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="">
                            <span id="password-error" class="e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row fix-spacing">
                            <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm password" value="">
                            <span id="cpassword-error" class="e-msg-etap"></span>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row fix-spacing"> <small class="bot-con">By clicking on register, I accept the <a title="" href="https://fretbay.com/en/conditions.php">General conditions</a> of FretBay.com.  </small> </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                        <div class="log-row fix-spacing">
                            <button name="join" value="S'inscrire" id="submitSignup" type="button" class="btn bb">Register</button>
                        </div>
                        <!--log-row-->
                        <div class="clearfix"></div>
                        <!--clearfix-->
                    </form>
                </section>
                <!--shipper-pro-->
            </div>
            <!--col-md-6-->
            <div class="clearfix"></div>
            <!--clearfix-->
        </section>
        <!--etape-box-->
        <div class="clearfix"></div>
        <!--clearfix-->
    </div>
</template>
<script>
    export default {

    }
</script>
