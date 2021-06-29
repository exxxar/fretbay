<template>
    <main id="content">
        <!-- Hero Section -->
        <div class="d-lg-flex bg-img-hero gradient-overlay-half-dark-v3"
             style="background-image: url('/assets/img/1920x1080/img36.jpg');">
            <div
                class="container d-lg-flex align-items-lg-center flex-lg-wrap height-100vh--lg space-2 space-4-top--md space-3-bottom--md">
                <div class="w-md-60 mb-9">
                    <span class="d-block lead text-white mb-2">Thinking the way forward with affordable price.</span>
                    <h1 class="display-4 font-size-48--md-down text-white font-weight-medium">
                        Delivering the world what matters,
                        <span class="border-bottom border-3 pb-1">
              <strong class="u-text-animation u-text-animation--typing">conveniently.</strong><span class="typed-cursor"
                                                                                                    style="animation-iteration-count: infinite;">|</span>
            </span>
                    </h1>
                </div>

                <!-- Search Form -->
                <form class="js-validate w-100" novalidate="novalidate" action="/find-transporter" method="get">
                    <div class="row mb-7">
                        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                            <!-- Input -->
                            <label class="d-block text-white font-weight-medium text-uppercase">Place of
                                departure</label>
                            <div class="input-group form">
                                <div class="input-group-prepend form__prepend">
                  <span class="input-group-text form__text">
                    <i class="fas fa-map-marker-alt text-purple" id="keywordInputAddon"></i>
                  </span>
                                </div>
                                <input type="text" class="form-control form__input" placeholder="Enter city"
                                       aria-label="Enter city" aria-describedby="keywordInputAddon">
                            </div>
                            <!-- End Input -->
                        </div>

                        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                            <!-- Input -->
                            <label class="d-block text-white font-weight-medium text-uppercase">Arrival point</label>
                            <div class="input-group form">
                                <div class="input-group-prepend form__prepend">
                  <span class="input-group-text form__text">
                    <i class="fas fa-map-marker-alt text-primary" id="locationInputAddon"></i>
                  </span>
                                </div>
                                <input type="text" class="form-control form__input" placeholder="Enter destination"
                                       aria-label="Enter destination" aria-describedby="locationInputAddon">
                            </div>
                            <!-- End Input -->
                        </div>

                        <div class="col-lg-2 align-self-lg-end">
                            <button type="submit" class="btn btn-block btn-primary transition-3d-hover">Get a Quote
                            </button>
                        </div>
                    </div>

                    <p class="small text-white">or just call us at +1 707 112 82 82</p>
                </form>
                <!-- End Search Form -->
            </div>
        </div>
        <!-- End Hero Section -->

        <div class="container space-2 space-3--md">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <span class="u-label u-label--sm u-label--purple mb-3">Latest transactions</span>
                <h2>Work we do and service we provide</h2>
                <p>We put at your disposal a wide range of services that can solve the logistics needs of your company,
                    regardless of the size and sector to which it belongs.</p>
            </div>
            <!-- End Title -->
            <div class="row">
                <div class="col-lg-4">
                    <top-movers-component/>
                </div>
                <div class="col-lg-8">
                    <latest-transactions-component/>
                </div>
            </div>

        </div>

        <!-- Our Work Section -->
        <div class="container space-2 space-3--md">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <span class="u-label u-label--sm u-label--purple mb-3">Our work</span>
                <h2>Work we do and service we provide</h2>
                <p>We put at your disposal a wide range of services that can solve the logistics needs of your company,
                    regardless of the size and sector to which it belongs.</p>
            </div>
            <!-- End Title -->

            <div class="row justify-content-lg-between">
                <div class="col-md-7">
                    <!-- Gallery -->
                    <div class="row mx-gutters-2 mb-9 mb-md-0">
                        <div class="col-6 mb-3">
                            <img class="img-fluid" src="/assets/img/700x700/img5.jpg" alt="Image Description">
                        </div>

                        <div class="col-4 align-self-end mb-3">
                            <img class="img-fluid" src="/assets/img/500x450/img4.jpg" alt="Image Description">
                        </div>

                        <div class="w-100"></div>

                        <div class="col-10 offset-2">
                            <img class="img-fluid" src="/assets/img/900x450/img11.jpg" alt="Image Description">
                        </div>
                    </div>
                    <!-- End Gallery -->
                </div>

                <div class="col-md-5 col-lg-4">
                    <h3 class="h5">Self-service</h3>

                    <!-- Icon Blocks -->
                    <a class="media align-items-center mb-4" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/location-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            Track &amp; trace
                        </div>
                    </a>
                    <!-- End Icon Blocks -->

                    <!-- Icon Blocks -->
                    <a class="media align-items-center mb-4" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/request-quote-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            Get a quote
                        </div>
                    </a>
                    <!-- End Icon Blocks -->

                    <!-- Icon Blocks -->
                    <a class="media align-items-center mb-4" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/file-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            Purchase order management
                        </div>
                    </a>
                    <!-- End Icon Blocks -->

                    <!-- Icon Blocks -->
                    <a class="media align-items-center mb-4" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/mouse-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            Online booking
                        </div>
                    </a>
                    <!-- End Icon Blocks -->

                    <!-- Icon Blocks -->
                    <a class="media align-items-center" href="#">
            <span class="u-icon u-icon--md u-icon--shadow rounded-circle p-2 mr-3">
              <img class="img-fluid" src="/assets/svg/components/box-dark-icon.svg" alt="Image Description">
            </span>
                        <div class="media-body">
                            Warehouse management
                        </div>
                    </a>
                    <!-- End Icon Blocks -->
                </div>
            </div>
        </div>
        <!-- End Our Work Section -->

        <!-- Features -->
        <div class="container">
            <div class="border-top border-bottom space-2 space-3--md">
                <!-- Title -->
                <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
                    <span class="u-label u-label--sm u-label--purple mb-3">Step-by-step</span>
                    <h2>How it works</h2>
                    <p>Global services using any means of transport, with regular lines or customized projects, customs
                        management and logistics.</p>
                </div>
                <!-- End Title -->

                <div class="card-deck d-block d-lg-flex">
                    <!-- Card -->
                    <div class="card shadow-sm overflow-hidden mb-3 mb-lg-0">
                        <div class="card-body p-5 pr-9">
                            <span class="h1 text-primary">01.</span>
                            <h3 class="h5 font-weight-medium">Request Quote</h3>
                            <p>Request quotes from our 10k+ rated transport providers.</p>
                        </div>
                        <div class="card-footer border-top-0 p-5 pr-9">
                            <a class="font-weight-medium" href="#">Explore more</a>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card shadow-sm overflow-hidden mb-3 mb-lg-0">
                        <div class="card-body p-5 pr-9">
                            <span class="h1 text-primary">02.</span>
                            <h3 class="h5 font-weight-medium">Compare price</h3>
                            <p>Compare prices and read previous customer feedback to pick the right delivery quote for
                                you.</p>
                        </div>
                        <div class="card-footer border-top-0 p-5 pr-9">
                            <a class="font-weight-medium" href="#">Explore more</a>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card shadow-sm overflow-hidden">
                        <div class="card-body p-5 pr-9">
                            <span class="h1 text-primary">03.</span>
                            <h3 class="h5 font-weight-medium">Choose provider</h3>
                            <p>Sit back and relax while your item is safely delivered by your chosen transport
                                provider.</p>
                        </div>
                        <div class="card-footer border-top-0 p-5 pr-9">
                            <a class="font-weight-medium" href="#">Explore more</a>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
        <!-- End Features -->

        <!-- Service Section -->
        <div class="container space-2 space-3--md">
            <div class="row justify-content-lg-between">
                <div class="col-md-6 col-lg-5 mb-7 mb-md-0">
                    <!-- Title -->
                    <div class="mb-9">
                        <span class="u-label u-label--sm u-label--purple mb-3">We are a family, not a workforce.</span>
                        <h2>Space International</h2>
                        <p>Global services using any means of transport, with regular lines or customized projects,
                            customs management and logistics.</p>
                    </div>
                    <!-- End Title -->

                    <!-- Icon Blocks -->
                    <div class="media mb-6">
                        <img class="max-width-8 mr-3" src="/assets/svg/components/return-dark-icon.svg"
                             alt="Image Description">
                        <div class="media-body">
                            <h2 class="h5 font-weight-medium">Reliable</h2>
                            <p>Track your item online in your account and using the handy notification system.</p>
                        </div>
                    </div>
                    <!-- End Icon Blocks -->

                    <!-- Icon Blocks -->
                    <div class="media mb-6">
                        <img class="max-width-8 mr-3" src="/assets/svg/components/rocket-dark-icon.svg"
                             alt="Image Description">
                        <div class="media-body">
                            <h3 class="h5 font-weight-medium">Fast &amp; convenient</h3>
                            <p>Find out the final price online and place an order in less than a minute.</p>
                        </div>
                    </div>
                    <!-- End Icon Blocks -->
                </div>

                <div class="col-md-6 col-lg-5">
                    <!-- Card -->
                    <div class="card bg-img-hero py-7 px-5 mb-4 ie-d-block"
                         style="background-image: url(/assets/svg/shapes/shape4.svg);">
                        <div class="media align-items-center">
                            <img class="max-width-10 mr-3" src="/assets/svg/components/bag-with-money-yellow-icon.svg"
                                 alt="Image Description">
                            <div class="media-body">
                                <h4 class="h3 text-warning mb-0"><strong>$3000</strong></h4>
                                <p class="mb-0">value of freight booked daily</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card bg-img-hero py-7 px-5 mb-4 ie-d-block"
                         style="background-image: url(/assets/svg/shapes/shape5.svg);">
                        <div class="media align-items-center">
                            <img class="max-width-10 mr-3" src="/assets/svg/components/request-quote-blue-icon.svg"
                                 alt="Image Description">
                            <div class="media-body">
                                <h4 class="h3 text-blue mb-0"><strong>525</strong></h4>
                                <p class="mb-0">number of quotes generated weekly</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card bg-img-hero py-7 px-5 ie-d-block"
                         style="background-image: url(/assets/svg/shapes/shape6.svg);">
                        <div class="media align-items-center">
                            <img class="max-width-10 mr-3" src="/assets/svg/components/team-red-icon.svg"
                                 alt="Image Description">
                            <div class="media-body">
                                <h4 class="h3 text-danger mb-0"><strong>4750</strong></h4>
                                <p class="mb-0">number of vendors monthly</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
        <!-- End Service Section -->

        <!-- Testimonials Section -->
        <div class="bg-light">
            <div class="container space-2 space-3--md">
                <!-- Title -->
                <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                    <span class="u-label u-label--sm u-label--purple mb-3">Testimonials</span>
                    <h2>What people say about us</h2>
                    <p>We put at your disposal a wide range of services that can solve the logistics needs of your
                        company, regardless of the size and sector to which it belongs.</p>
                </div>
                <!-- End Title -->

                <!-- Clients -->
                <div class="text-center mx-auto mb-5">
                    <div class="d-inline-flex justify-content-center">
                        <div class="mx-4">
                            <img class="u-clients" src="/assets/img/clients/airbnb.png" alt="Image Description">
                        </div>
                        <div class="mx-4">
                            <img class="u-clients" src="/assets/img/clients/google.png" alt="Image Description">
                        </div>
                        <div class="mx-4">
                            <img class="u-clients" src="/assets/img/clients/slack.png" alt="Image Description">
                        </div>
                    </div>
                </div>
                <!-- End Clients -->

                <!-- Slick Carousel -->

                <VueSlickCarousel v-bind="slickOptions">
                    <div>
                        <div class="card text-center border-0 shadow-xs slider-custom-slide">
                            <div class="card-body p-5">
                                <div class="mb-4">
                                    <p class="mb-0">I have been doing business with Space Shipping for a couple
                                        of years. We send an antifreeze type solution to China for various
                                        construction projects.</p>
                                </div>
                                <div class="u-sm-avatar mx-auto mb-2">
                                    <img class="img-fluid rounded-circle" src="/assets/img/100x100/img1.jpg"
                                         alt="Image Description">
                                </div>
                                <h4 class="h6 mb-0">Maria Muszynska</h4>
                            </div>
                        </div>
                    </div>
                    <div><!-- Testimonials -->
                        <div class="card text-center border-0 shadow-xs slider-custom-slide">
                            <div class="card-body p-5">
                                <div class="mb-4">
                                    <p class="mb-0">We look forward to continue working with Space Shipping for
                                        our freight forwarding and customs brokerage needs in the future.</p>
                                </div>
                                <div class="u-sm-avatar mx-auto mb-2">
                                    <img class="img-fluid rounded-circle" src="/assets/img/100x100/img2.jpg"
                                         alt="Image Description">
                                </div>
                                <h4 class="h6 mb-0">Massalha Shady</h4>
                            </div>
                        </div>
                        <!-- End Testimonials -->
                    </div>
                    <div>      <!-- Testimonials -->
                        <div class="card text-center border-0 shadow-xs slider-custom-slide">
                            <div class="card-body p-5">
                                <div class="mb-4">
                                    <p class="mb-0">I have found the Space Shipping rates are always
                                        competitive, but it is their service that adds the extra value for me in
                                        every way.</p>
                                </div>
                                <div class="u-sm-avatar mx-auto mb-2">
                                    <img class="img-fluid rounded-circle" src="/assets/img/100x100/img3.jpg"
                                         alt="Image Description">
                                </div>
                                <h4 class="h6 mb-0">Mark McManus</h4>
                            </div>
                        </div>
                        <!-- End Testimonials -->
                    </div>
                    <div> <!-- Testimonials -->
                        <div class="card text-center border-0 shadow-xs slider-custom-slide">
                            <div class="card-body p-5">
                                <div class="mb-4">
                                    <p class="mb-0">My experience with Space Shipping has been of good service
                                        and compliance. They are always checking status and following up all our
                                        shipments.</p>
                                </div>
                                <div class="u-sm-avatar mx-auto mb-2">
                                    <img class="img-fluid rounded-circle" src="/assets/img/100x100/img4.jpg"
                                         alt="Image Description">
                                </div>
                                <h4 class="h6 mb-0">Alex Pottorf</h4>
                            </div>
                        </div>
                        <!-- End Testimonials -->
                    </div>
                </VueSlickCarousel>


            </div>
        </div>
        <!-- End Testimonials Section -->

        <!-- FAQ Section -->
        <div class="container space-2 space-3--md">
            <div class="row justify-content-lg-between">
                <div class="col-md-6 col-lg-5 mb-7 mb-md-0">
                    <!-- Title -->
                    <div class="mb-9">
                        <span class="u-label u-label--sm u-label--purple mb-3">FAQ</span>
                        <h2>Have a question about your next move?</h2>
                    </div>
                    <!-- End Title -->

                    <!-- Contact Info -->
                    <div class="media align-items-center mb-5">
                        <img class="max-width-7 mr-3" src="/assets/svg/components/contacts-dark-icon.svg"
                             alt="Image Description">
                        <div class="media-body">
                            <span class="d-block text-secondary small text-uppercase">Phone</span>
                            <a class="text-dark" href="mailto:hello@example.com">+1 122 899 00 00</a>
                        </div>
                    </div>
                    <!-- End Contact Info -->

                    <!-- Contact Info -->
                    <div class="media align-items-center">
                        <img class="max-width-7 mr-3" src="/assets/svg/components/email-dark-icon.svg"
                             alt="Image Description">
                        <div class="media-body">
                            <span class="d-block text-secondary small text-uppercase">Email</span>
                            <a class="text-dark" href="mailto:hello@example.com">hello@example.com</a>
                        </div>
                    </div>
                    <!-- End Contact Info -->
                </div>

                <div class="col-md-6">
                    <!-- Accordion -->
                    <div id="basicsAccordion">
                        <div class="card border-0 mb-3">
                            <div class="card-header card-collapse__header" id="basicsHeadingOne">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn"
                                        data-toggle="collapse" data-target="#basicsCollapseOne" aria-expanded="true"
                                        aria-controls="basicsCollapseOne">
                                        Where is my parcel?

                                        <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseOne" class="collapse show" aria-labelledby="basicsHeadingOne"
                                 data-parent="#basicsAccordion">
                                <div class="card-body card-collapse__body px-0">
                                    We give every parcel its own parcel number. You can use this number to track your
                                    parcel in the Parcel Navigator or in our app, and if necessary change the delivery
                                    to a different day or place.
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 mb-3">
                            <div class="card-header card-collapse__header" id="basicsHeadingTwo">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                        data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false"
                                        aria-controls="basicsCollapseTwo">
                                        When will my parcel be delivered?

                                        <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo"
                                 data-parent="#basicsAccordion">
                                <div class="card-body card-collapse__body px-0">
                                    As a rule domestic parcels are delivered within two days from the start of the
                                    order. With international parcels the delivery time depends on the country of
                                    destination. You will find all the information about your parcel in the Parcel
                                    Navigator and the DPD App.
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 mb-3">
                            <div class="card-header card-collapse__header" id="basicsHeadingThree">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                        data-toggle="collapse" data-target="#basicsCollapseThree" aria-expanded="false"
                                        aria-controls="basicsCollapseThree">
                                        How can I change the place or day of delivery?

                                        <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseThree" class="collapse" aria-labelledby="basicsHeadingThree"
                                 data-parent="#basicsAccordion">
                                <div class="card-body card-collapse__body px-0">
                                    As the consignee you decide when or where we deliver the parcel. You can choose from
                                    four redirection options in order to have your parcel delivered the way it suits you
                                    best.
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 mb-3">
                            <div class="card-header card-collapse__header" id="basicsHeadingFour">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                        data-toggle="collapse" data-target="#basicsCollapseFour" aria-expanded="false"
                                        aria-controls="basicsCollapseFour">
                                        Where do I find the parcel number?

                                        <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseFour" class="collapse" aria-labelledby="basicsHeadingFour"
                                 data-parent="#basicsAccordion">
                                <div class="card-body card-collapse__body px-0">
                                    As an online shipper you will find the parcel number in the order archive and in the
                                    confirmation of order in your mailbox. If you have purchased the parcel label at a
                                    Pickup parcelshop, you will find the parcel number on the receipt which is issued.
                                    As the consignee, for each shipment you will normally receive an email with the
                                    parcel number. If we failed to locate you at home when the delivery was made, you
                                    will also find the parcel number on the parcel notification card we leave in your
                                    letterbox.
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 mb-3">
                            <div class="card-header card-collapse__header" id="basicsHeadingFive">
                                <h5 class="mb-0">
                                    <button
                                        class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                        data-toggle="collapse" data-target="#basicsCollapseFive" aria-expanded="false"
                                        aria-controls="basicsCollapseFive">
                                        Where is the nearest Pickup parcelshop to me?

                                        <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseFive" class="collapse" aria-labelledby="basicsHeadingFive"
                                 data-parent="#basicsAccordion">
                                <div class="card-body card-collapse__body px-0">
                                    Our <a href="#">Pickup parcelshop finder</a> will enable you to find the Pickup
                                    parcelshops in your area. Choose your preferences from 6,000 Pickup parcelshops in
                                    Germany and 28,000 throughout Europe.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
        <!-- End FAQ Section -->

        <!-- CTA Section -->
        <div class="bg-purple text-white">
            <div class="container space-1">
                <div class="row justify-content-lg-between align-items-lg-center">
                    <div class="col-lg-5">
                        <h3 class="h4 mb-0">Track &amp; trace</h3>
                        <p class="lead text-white mb-0">Enter your Tracking number to track your delivery.</p>
                    </div>

                    <div class="col-lg-5">
                        <!-- Input -->
                        <div class="input-group form">
                            <div class="input-group-prepend form__prepend">
                                <span class="input-group-text form__text">
                                  <i class="fas fa-truck-loading text-purple" id="keywordInputAddon"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control form__input" placeholder="1283791HJK128"
                                   aria-label="1283791HJK128" aria-describedby="keywordInputAddon">
                        </div>
                        <!-- End Input -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End CTA Section -->
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
                    slidesToShow: 2,
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
<style>
    .slider-custom-slide {
        min-height: 300px;
    }
</style>
