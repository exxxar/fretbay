<template>
    <main id="content">
        <!-- Hero Section -->
        <div class="gradient-half-primary-v1">
            <div class="bg-img-hero" style="background-image: url(/assets/img/bg/bg2.png);">
                <div class="container space-2 space-4-top--lg space-3-bottom--lg">
                    <div class="w-md-80 w-lg-60 text-center mx-auto">
                        <!-- Title -->
                        <div class="mb-9">
                            <h1 class="display-4 text-white">Find a plan</h1>
                            <p class="lead text-white">All our plans include a 14-day free trial. Money-back guarantee,
                                cancel any time.</p>
                        </div>
                        <!-- End Title -->

                        <!-- Button Group -->
                        <div class="btn-group btn-group-toggle mb-4">
                            <a class="js-animation-link btn btn-outline-light btn-wide active" href="javascript:;"
                               data-target="#pricingIndividual" data-link-group="idPricing">
                                Individual
                            </a>
                            <a class="js-animation-link btn btn-outline-light btn-wide" href="javascript:;"
                               data-target="#pricingEntertainment" data-link-group="idPricing">
                                Entertainment
                            </a>
                        </div>
                        <!-- End Button Group -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero Section -->

        <!-- Pricing Section -->
        <div class="container">
            <div class="bg-gray-100 shadow-lg rounded mt-n9">
                <!-- Individual -->
                <div id="pricingIndividual" data-target-group="idPricing">

                    <VueSlickCarousel v-bind="slickOptions">
                        <div>
                            <div class="card border-0">
                                <!-- Header -->
                                <header class="card-header text-center p-5">
                                    <h4 class="h4">Team</h4>
                                    <p>All core features you need to track your expenses</p>
                                    <span class="d-block">
                    <span class="display-4 text-dark">
                      $69
                    </span>
                    <span class="d-block text-secondary font-size-14">billed annually</span>
                  </span>
                                </header>
                                <!-- End Header -->

                                <!-- Content -->
                                <div class="card-body p-5">
                                    <ul class="list-unstyled mb-4">
                                        <li class="font-size-14 py-2">Community support</li>
                                        <li class="font-size-14 py-2">400+ pages</li>
                                        <li class="font-size-14 py-2">100+ header variations</li>
                                        <li class="font-size-14 py-2">20+ home page options</li>
                                    </ul>
                                    <button type="button" class="btn btn-block btn-primary" tabindex="0">Start Free
                                        Trial
                                    </button>
                                </div>
                                <!-- End Content -->
                            </div>
                        </div>
                        <div>
                            <div class="card border-0">
                                <!-- Header -->
                                <header class="card-header text-center p-5">
                                    <h4 class="h4">Growth</h4>
                                    <p>Create the perfect flow for your growing business</p>
                                    <span class="d-block">
                    <span class="display-4 text-dark">
                      $99
                    </span>
                    <span class="d-block text-secondary font-size-14">billed annually</span>
                  </span>
                                </header>
                                <!-- End Header -->

                                <!-- Content -->
                                <div class="card-body p-5">
                                    <ul class="list-unstyled mb-4">
                                        <li class="font-size-14 py-2">Community support</li>
                                        <li class="font-size-14 py-2">400+ pages</li>
                                        <li class="font-size-14 py-2">100+ header variations</li>
                                        <li class="font-size-14 py-2">20+ home page options</li>
                                    </ul>
                                    <button type="button" class="btn btn-block btn-primary" tabindex="0">Start Free
                                        Trial
                                    </button>
                                </div>
                                <!-- End Content -->
                            </div>
                        </div>
                        <div>
                            <div class="card border-0">
                                <!-- Header -->
                                <header class="card-header text-center p-5">
                                    <h4 class="h4">Enterprises</h4>
                                    <p>Tailored to your needs with a little help from our unicorns</p>
                                    <span class="d-block">
                    <span class="display-4 text-dark">
                      $129
                    </span>
                    <span class="d-block text-secondary font-size-14">billed annually</span>
                  </span>
                                </header>
                                <!-- End Header -->

                                <!-- Content -->
                                <div class="card-body p-5">
                                    <ul class="list-unstyled mb-4">
                                        <li class="font-size-14 py-2">Community support</li>
                                        <li class="font-size-14 py-2">400+ pages</li>
                                        <li class="font-size-14 py-2">100+ header variations</li>
                                        <li class="font-size-14 py-2">20+ home page options</li>
                                    </ul>
                                    <button type="button" class="btn btn-block btn-primary" tabindex="0">Start Free
                                        Trial
                                    </button>
                                </div>
                                <!-- End Content -->
                            </div>
                        </div>

                    </VueSlickCarousel>


                </div>
                <!-- End Individual -->

                <!-- Entertainment -->
                <div id="pricingEntertainment" style="display: none; opacity: 0;" data-target-group="idPricing">
                    <div class="js-slick-carousel u-slick u-slick--gutters slick-initialized slick-slider slick-dotted"
                         data-slides-show="3" data-slides-scroll="1"
                         data-pagi-classes="d-lg-none text-center u-slick__pagination mt-7 mb-0" data-responsive="[{
                 &quot;breakpoint&quot;: 1200,
                 &quot;settings&quot;: {
                   &quot;slidesToShow&quot;: 3
                 }
               }, {
                 &quot;breakpoint&quot;: 992,
                 &quot;settings&quot;: {
                   &quot;slidesToShow&quot;: 2
                 }
               }, {
                 &quot;breakpoint&quot;: 768,
                 &quot;settings&quot;: {
                   &quot;slidesToShow&quot;: 1
                 }
               }, {
                 &quot;breakpoint&quot;: 554,
                 &quot;settings&quot;: {
                   &quot;slidesToShow&quot;: 1
                 }
               }]">
                        <div class="slick-list draggable">
                            <div class="slick-track"
                                 style="opacity: 1; width: 0px; transform: translate3d(0px, 0px, 0px);">
                                <div class="js-slide slick-slide slick-current slick-active" data-slick-index="0"
                                     aria-hidden="false" style="width: 0px; height: auto;" tabindex="0" role="tabpanel"
                                     id="slick-slide10" aria-describedby="slick-slide-control10">
                                    <!-- Pricing -->
                                    <div class="card border-0">
                                        <!-- Header -->
                                        <header class="card-header text-center p-5">
                                            <h4 class="h4">Team</h4>
                                            <p>All core features you need to track your expenses</p>
                                            <span class="d-block">
                    <span class="display-4 text-dark">
                      $169
                    </span>
                    <span class="d-block text-secondary font-size-14">billed annually</span>
                  </span>
                                        </header>
                                        <!-- End Header -->

                                        <!-- Content -->
                                        <div class="card-body p-5">
                                            <button type="button" class="btn btn-block btn-primary" tabindex="0">Start
                                                Free Trial
                                            </button>
                                        </div>
                                        <!-- End Content -->
                                    </div>
                                    <!-- End Pricing -->
                                </div>
                                <div class="js-slide slick-slide slick-active" data-slick-index="1" aria-hidden="false"
                                     style="width: 0px; height: auto;" tabindex="0" role="tabpanel" id="slick-slide11"
                                     aria-describedby="slick-slide-control11">
                                    <!-- Pricing -->
                                    <div class="card border-0">
                                        <!-- Header -->
                                        <header class="card-header text-center p-5">
                                            <h4 class="h4">Growth</h4>
                                            <p>Create the perfect flow for your growing business</p>
                                            <span class="d-block">
                    <span class="display-4 text-dark">
                      $199
                    </span>
                    <span class="d-block text-secondary font-size-14">billed annually</span>
                  </span>
                                        </header>
                                        <!-- End Header -->

                                        <!-- Content -->
                                        <div class="card-body p-5">
                                            <button type="button" class="btn btn-block btn-primary" tabindex="0">Start
                                                Free Trial
                                            </button>
                                        </div>
                                        <!-- End Content -->
                                    </div>
                                    <!-- End Pricing -->
                                </div>
                                <div class="js-slide slick-slide slick-active" data-slick-index="2" aria-hidden="false"
                                     style="width: 0px; height: auto;" tabindex="0" role="tabpanel" id="slick-slide12"
                                     aria-describedby="slick-slide-control12">
                                    <!-- Pricing -->
                                    <div class="card border-0">
                                        <!-- Header -->
                                        <header class="card-header text-center p-5">
                                            <h4 class="h4">Enterprises</h4>
                                            <p>Tailored to your needs with a little help from our unicorns</p>
                                            <span class="d-block">
                    <span class="display-4 text-dark">
                      $1129
                    </span>
                    <span class="d-block text-secondary font-size-14">billed annually</span>
                  </span>
                                        </header>
                                        <!-- End Header -->

                                        <!-- Content -->
                                        <div class="card-body p-5">
                                            <button type="button" class="btn btn-block btn-primary" tabindex="0">Start
                                                Free Trial
                                            </button>
                                        </div>
                                        <!-- End Content -->
                                    </div>
                                    <!-- End Pricing -->
                                </div>
                            </div>
                        </div>


                        <ul class="js-pagination d-lg-none text-center u-slick__pagination mt-7 mb-0" role="tablist">
                            <li class="slick-active slick-current" role="presentation"><span></span></li>
                        </ul>
                    </div>
                </div>
                <!-- End Entertainment -->
            </div>
        </div>
        <!-- End Pricing Section -->

        <!-- Pricing Table Section -->
        <div class="container space-2 space-3-bottom--lg">
            <!-- Individual Pricing Table Features -->
            <table class="table table-striped table-borderless table-responsive-sm mb-9">
                <thead>
                <tr>
                    <th scope="col" class="py-5">
                        <span class="h4 font-weight-normal mb-0">Space Individual</span>
                    </th>
                    <th scope="col" class="py-5">
                        <span class="d-block font-weight-medium">Team</span>
                        <span class="d-block text-secondary font-weight-normal">$69/mo</span>
                        <a class="btn btn-xs btn-outline-primary py-1 px-2"
                           href="https://themes.getbootstrap.com/product/space-multipurpose-responsive-template/">Choose
                            Plan</a>
                    </th>
                    <th scope="col" class="py-5">
                        <span class="d-block font-weight-medium">Growth</span>
                        <span class="d-block text-secondary font-weight-normal">$99/mo</span>
                        <a class="btn btn-xs btn-primary py-1 px-2"
                           href="https://themes.getbootstrap.com/product/space-multipurpose-responsive-template/">Choose
                            Plan</a>
                    </th>
                    <th scope="col" class="py-5">
                        <span class="d-block font-weight-medium">Enterprise</span>
                        <span class="d-block text-secondary font-weight-normal">$129/mo</span>
                        <a class="btn btn-xs btn-primary py-1 px-2"
                           href="https://themes.getbootstrap.com/product/space-multipurpose-responsive-template/">Choose
                            Plan</a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Community support
                        <i class="fa fa-info-circle text-secondary ml-1" data-toggle="tooltip" data-placement="top"
                           title="" data-original-title="Get access to our premium community support."></i>
                    </th>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        400+ pages
                        <i class="fa fa-info-circle text-secondary ml-1" data-toggle="tooltip" data-placement="top"
                           title="" data-original-title="Space comes packed with more than 400 pages."></i>
                    </th>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        100+ header options
                        <i class="fa fa-info-circle text-secondary ml-1" data-toggle="tooltip" data-placement="top"
                           title="" data-original-title="Upon purchase you will get over 100 header options"></i>
                    </th>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        10 home options
                    </th>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Approval flow
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td class="small font-weight-medium">upon request</td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Central billing
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td class="small font-weight-medium">upon request</td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Custom fields
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td class="small font-weight-medium">upon request</td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Custom messages
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Mailing manager
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Negotiated rates integration
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Data history
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Import API
                        <i class="fa fa-info-circle text-secondary ml-1" data-toggle="tooltip" data-placement="top"
                           title="" data-original-title="Use Space's API to insert event data into your project."></i>
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Two-factor authentication
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                </tbody>
            </table>
            <!-- End Individual Pricing Table Features -->

            <!-- Entertainment Pricing Table Features -->
            <table class="table table-striped table-borderless table-responsive-sm">
                <thead>
                <tr>
                    <th scope="col" class="py-5">
                        <span class="h4 font-weight-normal mb-0">Space Entertainment</span>
                    </th>
                    <th scope="col" class="py-5">
                        <span class="d-block font-weight-medium">Team</span>
                        <span class="d-block text-secondary font-weight-normal">$69/mo</span>
                        <a class="btn btn-xs btn-outline-primary py-1 px-2"
                           href="https://themes.getbootstrap.com/product/space-multipurpose-responsive-template/">Choose
                            Plan</a>
                    </th>
                    <th scope="col" class="py-5">
                        <span class="d-block font-weight-medium">Growth</span>
                        <span class="d-block text-secondary font-weight-normal">$99/mo</span>
                        <a class="btn btn-xs btn-primary py-1 px-2"
                           href="https://themes.getbootstrap.com/product/space-multipurpose-responsive-template/">Choose
                            Plan</a>
                    </th>
                    <th scope="col" class="py-5">
                        <span class="d-block font-weight-medium">Enterprise</span>
                        <span class="d-block text-secondary font-weight-normal">$129/mo</span>
                        <a class="btn btn-xs btn-primary py-1 px-2"
                           href="https://themes.getbootstrap.com/product/space-multipurpose-responsive-template/">Choose
                            Plan</a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Community support
                        <i class="fa fa-info-circle text-secondary ml-1" data-toggle="tooltip" data-placement="top"
                           title="" data-original-title="Get access to our premium community support."></i>
                    </th>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        400+ pages
                        <i class="fa fa-info-circle text-secondary ml-1" data-toggle="tooltip" data-placement="top"
                           title="" data-original-title="Space comes packed with more than 400 pages."></i>
                    </th>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        100+ header options
                        <i class="fa fa-info-circle text-secondary ml-1" data-toggle="tooltip" data-placement="top"
                           title="" data-original-title="Upon purchase you will get over 100 header options"></i>
                    </th>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Report Export API
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="font-weight-normal">
                        Two-factor authentication
                    </th>
                    <td><i class="fa fa-times text-muted font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                    <td><i class="fa fa-check text-purple font-size-14"></i></td>
                </tr>
                </tbody>
            </table>
            <!-- End Entertainment Pricing Table Features -->
        </div>
        <!-- End Pricing Table Section -->

        <!-- FAQ Section -->
        <div class="container space-2-bottom">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <h3 class="h4">Frequently Asked Questions</h3>
            </div>
            <!-- End Title -->

            <!-- FAQ -->
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="pr-md-4">
                        <h4 class="h6">Can I cancel at anytime?</h4>
                        <p>Yes, you can cancel anytime no questions are asked while you cancel but we would highly
                            appreciate if you will give us some feedback.</p>
                    </div>
                </div>

                <div class="col-md-6 mb-5">
                    <div class="pl-md-4">
                        <h4 class="h6">My team has credits. How do we use them?</h4>
                        <p>Once your team signs up for a subscription plan. enim eiusmod high life accusamus eoset
                            dignissimos.</p>
                    </div>
                </div>

                <div class="w-100"></div>

                <div class="col-md-6 mb-5">
                    <div class="pr-md-4">
                        <h4 class="h6">How does Space's pricing work?</h4>
                        <p>Our subscriptions are tiered. based on the number of people enim eiusmod high life accusamus
                            terry richardson ad squid.</p>
                    </div>
                </div>

                <div class="col-md-6 mb-5">
                    <div class="pl-md-4">
                        <h4 class="h6">How secure is Space?</h4>
                        <p>Protecting the data you trust to Space is our first priority. at vero eoset dignissimos
                            ducimus qui blanditiis.</p>
                    </div>
                </div>

                <div class="w-100"></div>

                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="pr-md-4">
                        <h4 class="h6">Do you offer discounts?</h4>
                        <p>We've built in discounts at each tier for teams. leggings occaecat craft beer farm-to-table.
                            raw denim aesthetic synth nesciunt.</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="pl-md-4">
                        <h4 class="h6">What is your refund policy?</h4>
                        <p>We do not offer refunds apart leggings occaecat craft beer farm-to-table. raw leggings
                            occaecat craft.</p>
                    </div>
                </div>
            </div>
            <!-- End FAQ -->
        </div>
        <!-- End FAQ Section -->

        <!-- Divider -->
        <div class="w-50 w-lg-35 mx-auto">
            <hr class="my-0">
        </div>
        <!-- End Divider -->

        <!-- Clients Section -->
        <div class="container space-2 space-3-bottom--lg">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <h3 class="h4">Trusted by the world's best companies</h3>
            </div>
            <!-- End Title -->

            <!-- Slick Carousel -->
            <div class="js-slick-carousel u-slick slick-initialized slick-slider" data-autoplay="true" data-speed="5000"
                 data-infinite="true" data-slides-show="6" data-responsive="[{
             &quot;breakpoint&quot;: 1200,
             &quot;settings&quot;: {
               &quot;slidesToShow&quot;: 4
             }
           }, {
             &quot;breakpoint&quot;: 992,
             &quot;settings&quot;: {
               &quot;slidesToShow&quot;: 4
             }
           }, {
             &quot;breakpoint&quot;: 768,
             &quot;settings&quot;: {
               &quot;slidesToShow&quot;: 3
             }
           }, {
             &quot;breakpoint&quot;: 576,
             &quot;settings&quot;: {
               &quot;slidesToShow&quot;: 3
             }
           }, {
             &quot;breakpoint&quot;: 480,
             &quot;settings&quot;: {
               &quot;slidesToShow&quot;: 2
             }
           }]">
                <div class="slick-list draggable">
                    <div class="slick-track"
                         style="opacity: 1; width: 4070px; transform: translate3d(-1110px, 0px, 0px);">
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="-6" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/paypal.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="-5" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/slack.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/samsung.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/airbnb.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/lenovo.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/spotify.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-current slick-active" data-slick-index="0"
                             aria-hidden="false" style="width: 185px; height: auto;" tabindex="0">
                            <img class="u-clients" src="/assets/img/clients/amazon.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-active" data-slick-index="1" aria-hidden="false"
                             style="width: 185px; height: auto;" tabindex="0">
                            <img class="u-clients" src="/assets/img/clients/google.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-active" data-slick-index="2" aria-hidden="false"
                             style="width: 185px; height: auto;" tabindex="0">
                            <img class="u-clients" src="/assets/img/clients/paypal.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-active" data-slick-index="3" aria-hidden="false"
                             style="width: 185px; height: auto;" tabindex="0">
                            <img class="u-clients" src="/assets/img/clients/slack.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-active" data-slick-index="4" aria-hidden="false"
                             style="width: 185px; height: auto;" tabindex="0">
                            <img class="u-clients" src="/assets/img/clients/samsung.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-active" data-slick-index="5" aria-hidden="false"
                             style="width: 185px; height: auto;" tabindex="0">
                            <img class="u-clients" src="/assets/img/clients/airbnb.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide" data-slick-index="6" aria-hidden="true"
                             style="width: 185px; height: auto;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/lenovo.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide" data-slick-index="7" aria-hidden="true"
                             style="width: 185px; height: auto;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/spotify.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="8" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/amazon.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="9" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/google.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="10" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/paypal.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="11" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/slack.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="12" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/samsung.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="13" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/airbnb.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="14" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/lenovo.png" alt="Image Description">
                        </div>
                        <div class="js-slide slick-slide slick-cloned" data-slick-index="15" aria-hidden="true"
                             style="width: 185px;" tabindex="-1">
                            <img class="u-clients" src="/assets/img/clients/spotify.png" alt="Image Description">
                        </div>
                    </div>
                </div>


            </div>
            <!-- End Slick Carousel -->
        </div>
        <!-- End Clients Section -->
    </main>
</template>
<script>
    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    export default {
        components: {
            VueSlickCarousel
        },
        data() {
            return {


                slickOptions: {
                    //options can be used from the plugin documentation
                    slidesToShow: 3,
                    infinite: true,
                    accessibility: true,
                    adaptiveHeight: true,
                    arrows: true,
                    dots: true,
                    draggable: true,
                    edgeFriction: 0.30,
                    swipe: true,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 1008,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                },


            }
        }
    }
</script>
<style lang="scss">

</style>
