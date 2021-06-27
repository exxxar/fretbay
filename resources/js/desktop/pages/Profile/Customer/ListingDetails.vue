<template>
    <div class="row main-row listing-details">
        <div class="col-lg-8 col-12 contents">
            <ul class="nav nav-tabs main-tabs">
                <li class="active">
                    <a href="#">My listing</a>
                </li>
                <li><a href="#">My quotes (0)</a></li>
                <li><a href="#">Messages (0)</a></li>
            </ul>
            <div class="tab-content main-tabs-content">
                <div class="tab-pane active">
                    <div class="row row-narrow">
                        <div class="col-sm-4">
                            <div class="content-sidebar">
                                <div class="main-content-box">
                                    <h3 class="mt-0 listing-title">Fragile goods</h3>
                                    <div class="clearfix">
                                        <span class="pull-left">
                                            Reference : <span class="text-bold">428134</span>
                                        </span>
                                        <span class="pull-right">
                                            Viewed : <span class="text-bold">1 times</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="main-content-box">
                                    <span class="list-title title-loading text-bold">Loading</span>
                                    <ul class="list-unstyled">
                                        <li>Date : <span class="text-bold info-val">22/06/2021</span></li>
                                        <li>City : <span class="text-bold info-val">Erfurt  (99084)</span></li>
                                        <li>Country : <span class="text-bold info-val">Germany</span></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li>Type of location : <span class="text-bold info-val">House</span></li>
                                        <li>Furniture lift : <span class="text-bold info-val">no</span></li>
                                    </ul>
                                </div>
                                <div class="main-content-box">
                                    <span class="list-title title-delivery text-bold">Delivery</span>
                                    <ul class="list-unstyled">
                                        <li>Date : <span class="text-bold info-val">22/06/2021</span></li>
                                        <li>City : <span class="text-bold info-val">Erfurt  (99084)</span></li>
                                        <li>Country : <span class="text-bold info-val">Germany</span></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li>Type of location : <span class="text-bold info-val">House</span></li>
                                        <li>Furniture lift : <span class="text-bold info-val">no</span></li>
                                    </ul>
                                </div>
                                <div class="main-content-box">
                                    <span class="list-title title-category category-d-13 text-bold">Category</span>
                                    <ul class="list-unstyled acticle-list">
                                        <li class="text-bold black">Fragile goods # 1</li>
                                        <li>Dimension : <span class="text-bold info-val">231 cm x 23131 cm x 3123 cm</span></li>
                                        <li>Quantity : <span class="text-bold info-val">12312</span></li>
                                        <li>Weight : <span class="text-bold info-val">3123 Kilo(s)</span></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li>Additional information</li>
                                        <li class="text-lg black">test****</li>
                                    </ul>
                                    <div class="action-btns text-center mb-10">
                                        <a href="#" class="btn btn-primary">Modify</a>
                                        <a href="#" class="btn btn-warning">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="main-content-box">
                                <div class="text-sm-right text-center">
                                    <a href="#" class="btn btn-primary promote-listing-btn">Priority listing for 4.99€</a>
                                </div>
                                <div class="map-wrapper">
                                    <div class="mapboxgl-map"><img src="https://img2.labirint.ru/rcimg/414d3a0ad1b792592b2dad1d32b2378b/960x540/books51/508700/ph_1.jpg?1612279589" alt=""></div>
                                </div>
                                <div class="map-bottom clearfix">
                                    <div class="pull-left map-distance">
                                        <p>Estimate of the distance of the trip : <span class="text-bold text-black">0</span> km</p>
                                    </div>
                                    <div class="pull-right">
                                        <p>
                                            <span class="text-bold text-black">0</span> h
                                            <span class="text-bold text-black">0</span> min
                                        </p>
                                    </div>
                                </div>
                                <div class="grey-box text-center upload-images">
                                    <h5 class="grey-box-title text-bold">Photos of your listing</h5>
                                    <ul class="list-unstyled list-inline">
                                        <li v-for="i in 5">
                                            <label>
                                                <input type="file" class="hide">
                                                <img src="https://fretbay.com/en/assets/images/common/icons/general/img-upload.png" alt="" class="img-link">
                                            </label>
                                        </li>
                                    </ul>
                                </div>

                                <div class="grey-box text-center profile-comletion">
                                    <h5 class="grey-box-title text-bold">The more complete your listing is, the more likely you are to receive offers. Fill rate of your ad</h5>
                                    <div class="progressbar-wrap">
                                        <div class="progressbar" style="width: 94%;"></div>
                                        <div class="progressbar-label text-bold">94%</div>
                                    </div>
                                    <a href="#" class="text-lg btn-link">Complete my listing</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane"></div>
                <div class="tab-pane"></div>
            </div>
            <div class="panel-group faq-section content-box">
                <h3 class="mt-0 title">Frequently asked <span class="text-primary">questions</span></h3>

                <div class="panel">
                    <a href="#" class="faq-link">Are the prices inclusive of tax?</a>
                    <div class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>
                                Yes, the prices include VAT and road costs (rental of the vehicle and its driver, diesel fuel, tolls), and possibly other services according to your request and the carrier's offer.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <a href="#" class="collapsed faq-link">How to accept an offer?</a>
                    <div class="panel-collapse collapse">
                        <div class="panel-body">
                            You can accept a price offer by clicking on the "Accept this quote" button (to the right of the quote). When you accept a quote, you book with the moving company and it automatically puts you on its schedule. In order to prove that your request is serious and that you do not book with several companies at the same time, you pay a percentage of the quote (not exceeding 25% of the quotation price). The rest of the estimate is to be paid directly to the company. As soon as you have made your reservation, you will receive the contact details of the chosen company by e-mail. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 sidebar common-sidebar">
            <div class="content-box-light-shadow content-box-narrow-padding form-group hiw-steps">
                <article>
                    <h4 class="title text-bold">Don't miss any opportunities</h4>
                    <p>Each quote is only valid for a limited period of time. It may be withdrawn at any time if the carrier complements its transports with other customers' shipments.</p>
                </article>
                <article>
                    <h4 class="title text-bold">Be responsive!</h4>
                    <p>The carriers take the time to study your request in order to answer it as well as possible. Discuss with them via the Question and Answer section to determine the terms and conditions of your transport, otherwise it could lead to a lack of interest on their part.</p>
                </article>
                <article>
                    <h4 class="title text-bold">Don't waste time</h4>
                    <p>The best time to accept an offer is when you receive the most competitive quote from a reliable and serious carrier. Remember, the longer you wait, the more prices increase and the less available offers there will be. So be quick, book your transport now at the best price!</p>
                </article>
            </div>
            <div class="trustpilot-wrap">
                <div class="trustpilot-wrap">
                    <div class="content-box content-box-rounded">
                        <div class="trustpilot-widget" data-locale="en-EN" data-template-id="539ad60defb9600b94d7df2c" data-businessunit-id="4dd92b6800006400050fbdc1" data-style-height="626px" data-style-width="100%" data-stars="4,5" data-review-languages="en" style="position: relative;">
                            <iframe title="Customer reviews powered by Trustpilot" loading="auto" src="https://widget.trustpilot.com/trustboxes/539ad60defb9600b94d7df2c/index.html?templateId=539ad60defb9600b94d7df2c&amp;businessunitId=4dd92b6800006400050fbdc1#locale=en-EN&amp;styleHeight=626px&amp;styleWidth=100%25&amp;stars=4%2C5&amp;reviewLanguages=en" style="position: relative; height: 626px; width: 100%; border-style: none; display: block; overflow: hidden;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>
