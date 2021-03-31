<template>
    <div class="container">
        <section class="etape-box ims2">
            <div class="col-md-6 col-sm-6 hidden-xs">
                <section class="port-img-sec">
                    <h1>Looking for professional carriers?</h1>

                    <div class="col-sm-12 mr-l mr-r port-imgs">
                        <img src="images/shipperSignPimage.png" alt="Image" class="img-responsive">
                    </div><!--col-sm-12-->

                </section><!--port-img-sec-->
            </div><!--col-md-6-->
            <div class="col-md-6 col-sm-6">
                <section class="etaps shipperSignUpPro">
                    <h1>Get started - it's free.</h1>
                    <small>The registration takes no more than a minute...</small>
                    <form id="signUpForm1" name="signUpForm" action="https://fretbay.com/fr/shipper/shipperSignupProcess.php" method="POST" class="feature" onsubmit="return false;">
                        <input type="hidden" id="emailFlag" value="1">
                        <input type="hidden" id="pseudoFlag" value="1">
                        <input type="hidden" id="formError" value="1">
                        <input type="hidden" name="langUser" value="en">
                        <div class="margin-bottom-30">
                            <input type="radio" name="pro" value="0" id="radioBox01" checked="" onclick="showHideUsertype('1');">
                            <label for="radioBox01">You are an individual</label>
                            <input type="radio" name="pro" value="1" id="radioBox02" onclick="showHideUsertype('2');">
                            <label for="radioBox02">You are a professional</label>
                        </div>
                        <div class="log-row margin-bottom-10 professional-fields" style="display:none">
                            <input type="text" id="companyName" name="companyName" class="lis form-control" placeholder="Name of your company">
                            <span id="companyName-error" class="error-class"></span>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row margin-bottom-20 professional-fields" style="display:none">
                            <input type="text" id="tva" name="tva" class="form-control ui-autocomplete-input" placeholder="City" autocomplete="off">
                            <input type="hidden" id="postalCode" name="postalCode">
                            <input type="hidden" id="region" name="region">
                            <span id="tva-error" class="error-class"></span>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row margin-bottom-20">
                            <input type="text" id="email" name="email" class="lis form-control" placeholder="Your email">
                            <span id="email-error" class="error-class"></span>
                            <span class="emailHint e-msg-etap"></span>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row margin-bottom-20">
                            <input type="text" id="cemail" name="cemail" class="form-control" placeholder="Confirm your email">
                            <span id="cemail-error" class="error-class"></span>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row margin-bottom-20">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Your password">
                            <span id="password-error" class="error-class"></span>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row margin-bottom-20">
                            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password">
                            <span id="cpassword-error" class="error-class"></span>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row margin-bottom-20">
                            <input type="text" class="form-control" name="userName" id="userName" placeholder="Your Username">
                            <span id="userName-error" class="error-class"></span>
                            <span class="userHint error-class"></span>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row margin-bottom-20">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Your phone">
                            <span id="phone-error" class="error-class"></span>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row margin-bottom-20">
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Your mobile number">
                            <span id="mobile-error" class="error-class"></span>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row margin-bottom-10">
                            <input type="checkbox" id="checkBox01" name="checkBox01" class="signup-checkbox">
                            <label for="checkBox01"><!--J’accepte les Conditions</span>--><small id="checkBox01-error" class="bot-con">I agree to receive commercial offers from FretBay and its partners.</small>
                            </label>
                        </div>
                        <div class="clearfix"></div><!--clearfix-->
                        <!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row"> <small class="bot-con">By clicking on register, I accept the <a href="https://fretbay.com/en/conditions.php">General Terms and Conditions</a> of FretBay.com.  </small>
                        </div>
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row">
                            <!--<input type="checkbox" name="checkBox03"  id="checkBox03">
                            <label for="checkBox03"><span id="checkBox03-error">J’accepte les Conditions Générales de Vente de Fretbay</span></label>-->
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                        <div class="log-row">
                            <button type="submit" id="submitSignup" class="btn bb">Sign Up</button>
                        </div><!--log-row-->
                        <div class="clearfix"></div><!--clearfix-->
                    </form>
                </section><!--shipper-pro-->
            </div><!--col-md-6-->
            <div class="clearfix"></div><!--clearfix-->
        </section><!--etape-box-->
    </div>
</template>
<script>
    export default {

    }
</script>
