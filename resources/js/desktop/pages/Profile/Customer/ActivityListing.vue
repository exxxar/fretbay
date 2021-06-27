<template>
    <div class="clearfix offer-page">
        <div class="content-left">
            <div class="job-info-top">
                <div class="job-info-top-row">
                    <div class="">
                        <a href="#" class="btn page-back-btn visible-xs">
                            <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/arrow-back.svg" alt="">Back
                        </a>
                    </div>
                    <div class="text-sm-right">
                        <span class="views-info"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/eye-gray.svg" alt="">Views: <span class="text-bold"> 150</span></span>
                        <span class="date-info">Posted on: <span class="text-bold">10/06/2021</span></span>
                        <span class="date-info listing-expiry text-danger">Expires in <span class="text-bold">19 days</span></span>
                    </div>
                </div>
            </div>
            <div class="content-box mb-10">
                <div class="content-box-padding">
                    <h3 class="mt-0 with-category-icon category-2">
                        Déménagement 1.75m<sup>3</sup>
                        <span class="reference-number">
                            Reference : <span class="text-bold">426167</span>
                        </span>
                    </h3>
                </div>
                <div class="map-wrapper">
                    <div class="mapboxgl-map"><img src="https://img2.labirint.ru/rcimg/414d3a0ad1b792592b2dad1d32b2378b/960x540/books51/508700/ph_1.jpg?1612279589" alt=""></div>
                    <div class="clearfix map-bottom">
                        <p class="pull-right">
                            <span class="map-distance">
                                <span class="fa fa-map-marker"></span>
                                202km
                            </span>
                            <span class="fa fa-clock-o"></span>
                            1h58
                        </p>
                    </div>
                </div>
                <div class="job-info with-markers">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="info-loading">
                                <h4 class="address text-bold">19270 Ussac</h4>
                                <div>
                                    Between the <span class="text-bold">11/06</span> and the <span class="text-bold">18/06</span>
                                </div>
                                <div>
                                    <span class="text-bold">Warehouse</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-delivery">
                                <h4 class="address text-bold">19270 Ussac</h4>
                                <div>
                                    Between the <span class="text-bold">11/06</span> and the <span class="text-bold">18/06</span>
                                </div>
                                <div>
                                    <span class="text-bold">House</span>
                                </div>
                                <div>
                                    Need a furniture lift? <span class="text-bold">No</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-box content-box-padding mb-10">
                <div>
                    <h4 class="text-bold mt-0 mb-15">Photos</h4>
                    <ul class="related-images list-unstyled clearfix">
                        <li><img src="https://fretbay.com/global/media/listings/thumbs/1623310357E7Ba_0.jpeg" alt=""></li>
                        <li><img src="https://fretbay.com/global/media/listings/thumbs/16233103585t20_1.jpeg" alt=""></li>
                        <li><img src="https://fretbay.com/global/media/listings/thumbs/1623310358AGEu_2.jpeg" alt=""></li>
                    </ul>
                </div>
                <div class="demenagement-info mb-10">
                    <span class="volume h4">Volume : <span class="text-bold">1.75m <sup>3</sup></span></span>
                    <ul class="volume-articles tags list-inline">
                        <li class="title">Inventory</li>
                        <li>Office desk : 1</li>
                        <li>Chair : 1</li>
                        <li>Living : 1</li>
                    </ul>
                    <h4 class="formula">
                        Package : <span class="text-bold">Truck with driver</span>
                    </h4>
                    <div class="alert custom-alert mb-0 formula-info">
                        <p>
                            You do the cardboarding, dismantling of furniture and protection of fragile objects. You provide the necessary people to load and unload. The mover will only come with the truck and will help you load and unload the truck.
                        </p>
                    </div>
                </div>
                <div class="other-detail">
                    <h4 class="text-bold">Information supplémentaire</h4>
                    <p>Chargement à effectuer heures ouvrables</p>
                </div>
            </div>
        </div>
        <div class="content-right">
            <div class="inner-wrapper-sticky">
                <div class="tabs-wrapper bid-tabs">
                    <div class="tab-links-wrapper">
                        <ul class="nav nav-tabs tab-links text-bold">
                            <li class="link-devis active">
                                <a href="#">Quote (2)</a>
                            </li>
                            <li class="link-msg">
                                <a href="#">Messages (0)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content content-box">
                        <div class="tab-pane tab-content-1 active">
                            <div class="first-screen custom-active">
                                <div class="login-wrapper">
                                    <h4 class="carrier-title text-center">
                                        I am a transporter, would like to offer my services.
                                    </h4>
                                    <div class="box-primary clearfix">
                                        <h4 class="text-bold">Not registered yet?</h4>
                                        <p>Registration is fast and free of charge</p>
                                        <a href="#" class="pull-sm-right btn btn-primary">Register</a>
                                    </div>
                                    <div class="box-primary clearfix">
                                        <h4 class="text-bold">Already registered</h4>
                                        <p>Log-in and submit your quote</p>
                                        <a href="#" class="pull-sm-right btn btn-theme">Click here</a>
                                    </div>
                                </div>
                                <ul class="bids-list list-unstyled">
                                    <offer-transporter></offer-transporter>
                                    <offer-transporter></offer-transporter>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import OfferTransporter from "../../../components/OfferTransporter";
    export default {
        components: {
            'offer-transporter': OfferTransporter
        }
    }
</script>
