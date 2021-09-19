<template>
    <footer class="bg-dark">
        <div class="container space-2">
            <div class="row justify-content-md-between">
                <div class="col-sm-6 col-12 col-md-3 col-lg-2 order-lg-3 mb-7 mb-lg-0">
                    <h3 class="h6 text-white mb-3">About</h3>

                    <!-- List Group -->
                    <div class="list-group list-group-flush list-group-transparent">
                        <a class="list-group-item list-group-item-action" href="/who-we-are">Who we are</a>
                        <a class="list-group-item list-group-item-action" href="/how-it-works">How does it work?</a>
                        <a class="list-group-item list-group-item-action" href="/fequently-asked-questions">Frequently asked questions</a>
        <!--                <a class="list-group-item list-group-item-action" href="/find-transporter">Search for a transporter</a>
                        <a class="list-group-item list-group-item-action" href="/find-loads">Search for a loads</a>
                        <a class="list-group-item list-group-item-action" href="/benefits-transporter-mover-carrier">I am a transporter</a>
                        <a class="list-group-item list-group-item-action" href="/recruitment">Recruitment</a>-->
                    </div>
                    <!-- End List Group -->
                </div>

                <div class="col-sm-6 col-12 col-md-3 col-lg-2 order-lg-4 mb-7 mb-lg-0">
                    <h3 class="h6 text-white mb-3"> Customer Service</h3>

                    <!-- List Group -->
                    <div class="list-group list-group-flush list-group-transparent">
             <!--           <a class="list-group-item list-group-item-action" href="/reviews">Customer testimonials</a>
                        <a class="list-group-item list-group-item-action" href="/quality-charte">Quality charter</a>-->
                        <a class="list-group-item list-group-item-action" href="/privacy">Privacy</a>
                      <!--  <a class="list-group-item list-group-item-action" href="/contact-us">Contact us</a>-->
                    </div>
                    <!-- End List Group -->
                </div>

               <!-- <div class="col-6 col-md-3 col-lg-2 order-lg-5 mb-7 mb-lg-0">
                    <h3 class="h6 text-white mb-3">Our tips</h3>

                    &lt;!&ndash; List Group &ndash;&gt;
                    <div class="list-group list-group-flush list-group-transparent">
                        <a class="list-group-item list-group-item-action" href="/tips-moving">Moving advices</a>
                        <a class="list-group-item list-group-item-action" href="/company-move">Company move</a>
                        <a class="list-group-item list-group-item-action" href="/movers">Movers</a>
                        <a class="list-group-item list-group-item-action" href="/ebay-sellers">eBay Sellers</a>
                        <a class="list-group-item list-group-item-action" href="/fraud-prevention">Scam Prevention</a>
                    </div>
                    &lt;!&ndash; End List Group &ndash;&gt;
                </div>-->

                <div class="col-sm-6 col-12 col-md-3 col-lg-2 order-lg-6 mb-7 mb-lg-0">
                    <h3 class="h6 text-white mb-3">Social</h3>

                    <!-- List -->
                    <div class="list-group list-group-flush list-group-transparent">
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="fab fa-facebook-f min-width-3 text-center mr-2"></i>
                            Facebook
                        </a>
                       <!-- <a class="list-group-item list-group-item-action" href="#">
                            <i class="fab fa-twitter min-width-3 text-center mr-2"></i>
                            Twitter
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="fab fa-dribbble min-width-3 text-center mr-2"></i>
                            Dribbble
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="fab fa-github min-width-3 text-center mr-2"></i>
                            GitHub
                        </a>-->
                    </div>
                    <!-- End List -->
                </div>

                <div class="col-lg-4 order-lg-1  d-flex align-items-sm-start align-items-center flex-column">
                    <!-- Logo -->
                    <a class="d-inline-block mb-5" href="/" aria-label="AlloTrans">
                        <img src="/assets/img/logo-white.png" class="d-none d-sm-block" alt="Logo" style="width: 100px; max-width: 100%;object-fit: cover;">
                        <img src="/assets/img/logo-white.png" class="d-block d-sm-none" alt="Logo" style="width: 100%; max-width: 100%; max-height:100px;object-fit: cover;">
                    </a>
                    <!-- End Logo -->

                    <!-- Language -->
                    <div class="btn-group d-block position-relative mb-4 mb-lg-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{currentLocale}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" v-for="lang in langOptions" :href="'/locale/'+lang.countryCode">{{lang.countryName}}</a>

                            </div>
                        </div>

                    </div>
                    <!-- End Language -->

                    <p class="small text-muted">All rights reserved. © AlloTrans. 2021.</p>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
    export default {
        data() {
            return {
                langOptions: [
                    {
                        countryCode: "en",
                        countryName: "English"
                    },
                    {
                        countryCode: "fr",
                        countryName: "Français"
                    },
                    {
                        countryCode: "ru",
                        countryName: "Русский"
                    }
                ]
            }
        },
        computed:{
          currentLocale:function(){
              return this.langOptions.find(item=>item.countryCode===window.locale).countryName
          }
        },
        methods:{
            selectLang(lang){
                window.location.href=`/setlocal/${lang}`
            }
        }
    }
</script>
