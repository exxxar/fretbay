<template>
    <section class="container">
        <div class="row">

            <div class="col-12 promovoirBanner">
                <div class="top-text">
                    <h1>Contact us</h1>
                </div>
            </div>
        </div>


        <div class="container row eplique-bodycontainer contact">
            <div class="row">

                <div class="col-lg-12 col-md-12 main-box">
                    <div class="inner-left">
                        <div class="text-center-xs main-h2">

                            <h2>Our main objective is to offer you the best online service to sell and buy
                                transport services.</h2>
                            <div class="inner-grey">
                                <p><span class="imprtntLbl">IMPORTANT</span>: You have questions about the site
                                    and how it works? <br>Consult the Frequently Asked Questions first <a
                                        href="https://fretbay.com/en/frequently-asked-questions?idsess="> </a>
                                </p>
                            </div>
                            <hr>
                            <p class="bolder-para">If you have any further questions, please fill out the form
                                below.</p>
                        </div>
                        <form class="form-horizontal" action="" method="post" name="form" id="form">
                            <div class="bs-row">
                                <input type="hidden" name="contactForm" value="1">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-2">Name:</label>
                                        <div class="col-md-8 col-sm-10">
                                            <input type="text" class="form-control" name="Name" id="Name"
                                                   value="">
                                            <div class="errorLbl" id="Name-error">Required field</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-2">First name:</label>
                                        <div class="col-md-8 col-sm-10">
                                            <input type="text" class="form-control" name="prenom" id="prenom"
                                                   value="">
                                            <div class="errorLbl" id="prenom-error">Required field</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-2">Email:</label>
                                        <div class="col-md-8 col-sm-10">
                                            <input type="text" class="form-control" name="Email" id="Email"
                                                   value="">
                                            <div class="errorLbl" id="Email-error">Required field</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-2">Telephone:</label>
                                        <div class="col-md-8 col-sm-10">
                                            <input type="text" class="form-control" name="tel" id="tel">
                                            <div class="errorLbl" id="tel-error">Required field</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Object:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="objet" id="objet">
                                            <div class="errorLbl" id="objet-error">Required field</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Message:</label>
                                        <div class="col-sm-10">
                                                    <textarea class="form-control" rows="8" name="Details"
                                                              id="Details"></textarea>
                                            <div class="errorLbl" id="Details-error">Required field</div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-md-12">
                                    <input type="checkbox" name="requests" id="checkBox01" value="1" checked="checked">
                                    <label for="checkBox01">Je souhaite recevoir des demandes de transport</label>
                                </div>-->
                                <div class="col-md-12 col-sm-10 col-sm-offset-2">
                                    <input type="checkbox" name="updates" id="checkBox02" value="1"
                                           checked="checked">
                                    <label for="checkBox02">I would like to be informed of any changes to the
                                        website</label>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-10 btn-container">
                                    <button type="button" class="btn1 anchor-btn btn-block"
                                            onclick="validateForm();"
                                            style="margin-left:auto; margin-right:auto;">Send
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="inner-grey">
                            <p class="margin-bottom-50">Please note that we will also send you information and
                                promotional emails regarding the site <b>FretBay</b> and similar products and
                                services provided by <b>FretBay</b>. If you do not wish to receive some of these
                                emails, you can change your notification preferences in the <b>My FretBay</b>
                                section.</p>
                            <p class="bold">You have the right to access, modify, rectify, and delete data
                                concerning you by contacting us at:<a href="mailto:support@fretbay.com"
                                                                      title="">support@fretbay.com</a></p>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 no-padding hidden-sm hidden-xs" style="margin-top:30px;">
                    <!-- fretbat share -->

                    <!-- facebook -->
                    <div class="clear"></div>
                </div>


            </div>

        </div>


    </section>
</template>
<script>
    export default {}
</script>
