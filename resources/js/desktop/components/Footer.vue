<template>
    <footer class="bg-dark">
        <div class="container space-2">
            <div class="row justify-content-md-between">
                <div class="col-sm-6 col-12 col-md-3 col-lg-2 order-lg-3 mb-7 mb-lg-0">
                    <h3 class="h6 text-white mb-3"> {{ $trans('menu.section.about') }}</h3>

                    <!-- List Group -->
                    <div class="list-group list-group-flush list-group-transparent">
                        <a class="list-group-item list-group-item-action"
                           href="/who-we-are">{{ $trans('menu.item.who_we_are') }}</a>
                        <a class="list-group-item list-group-item-action"
                           href="/how-it-works">{{ $trans('menu.item.how_does_it_work') }}</a>
                        <a class="list-group-item list-group-item-action"
                           href="/fequently-asked-questions">{{ $trans('menu.item.faq') }}</a>
                        <!--                <a class="list-group-item list-group-item-action" href="/find-transporter">Search for a transporter</a>
                                        <a class="list-group-item list-group-item-action" href="/find-loads">Search for a loads</a>
                                        <a class="list-group-item list-group-item-action" href="/benefits-transporter-mover-carrier">I am a transporter</a>
                                        <a class="list-group-item list-group-item-action" href="/recruitment">Recruitment</a>-->
                    </div>
                    <!-- End List Group -->
                </div>

                <div class="col-sm-6 col-12 col-md-3 col-lg-2 order-lg-4 mb-7 mb-lg-0">
                    <h3 class="h6 text-white mb-3"> {{ $trans('menu.section.custom_service') }}</h3>

                    <!-- List Group -->
                    <div class="list-group list-group-flush list-group-transparent">
                        <!--           <a class="list-group-item list-group-item-action" href="/reviews">Customer testimonials</a>
                                   <a class="list-group-item list-group-item-action" href="/quality-charte">Quality charter</a>-->
                        <a class="list-group-item list-group-item-action"
                           href="/privacy">{{ $trans('menu.item.privacy') }}</a>
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
                    <h3 class="h6 text-white mb-3">{{ $trans('menu.section.social') }}</h3>

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
                        <img src="/assets/img/logo-white.png" class="d-none d-sm-block" alt="Logo"
                             style="width: 100px; max-width: 100%;object-fit: cover;">
                        <img src="/assets/img/logo-white.png" class="d-block d-sm-none" alt="Logo"
                             style="width: 100%; max-width: 100%; max-height:100px;object-fit: cover;">
                    </a>
                    <!-- End Logo -->

                    <!-- Language -->
                    <div class="btn-group d-block position-relative mb-4 mb-lg-auto">
                        <div class="dropdown w-100">
                            <button class="btn btn-outline-primary dropdown-toggle w-100" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                {{ currentLocale }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" v-for="lang in langOptions"
                                   :href="'/locale/'+lang.locale_name">{{ lang.name }}</a>
                            </div>
                        </div>

                    </div>
                    <!-- End Language -->

                    <p class="small text-muted mt-5">{{ $trans('menu.text.all_rights_reserved') }}.</p>
                </div>
            </div>
        </div>

        <div class="container d-block d-md-none fixed-bottom bottom-menu" style="z-index: 1000">
            <div class="row d-flex align-items-center h-100" v-if="!user.is_guest">
                <div class="col-3 bottom-menu-item">
                    <a href="/" class="d-flex flex-column justify-content-between align-items-center">
                        <span><i class="fas fa-home"></i></span>
                        <small class="text-uppercase font-weight-bold">Home</small>
                    </a>
                </div>


                <div class="col-3 bottom-menu-item" v-if="user.is_transporter">
                    <a href="/find-loads" class="d-flex flex-column justify-content-between align-items-center">
                        <span><i class="fas fa-truck-loading"></i></span>
                        <small class="text-uppercase font-weight-bold">Find loads</small>
                    </a>
                </div>
                <div class="col-3 bottom-menu-item" v-if="user.is_customer">
                    <a href="/find-transporter"
                       class="d-flex flex-column justify-content-between align-items-center">
                        <span><i class="fas fa-truck"></i></span>
                        <small class="text-uppercase font-weight-bold">Find transporter</small>
                    </a>
                </div>

                <div class="col-3 bottom-menu-item">
                    <a :href="(user.is_customer?'/customer':'/transporter')+'/profile/notifications'"
                       class="d-flex flex-column justify-content-between align-items-center">
                        <i class="fas fa-flag"></i>
                        <small class="text-uppercase font-weight-bold">Notifications</small>
                    </a>
                </div>


                <div class="col-3"></div>
            </div>

            <div class="row d-flex align-items-center h-100" v-else>
                <div class="col-3 bottom-menu-item">
                    <a href="/" class="d-flex flex-column justify-content-between align-items-center">
                        <span><i class="fas fa-home"></i></span>
                        <small class="text-uppercase font-weight-bold">Main</small>
                    </a>
                </div>

                <div class="col-3 bottom-menu-item">
                    <a href="/find-transporter"
                       class="d-flex flex-column justify-content-between align-items-center">
                        <span><i class="fas fa-truck"></i></span>
                        <small class="text-uppercase font-weight-bold">Find transporter</small>
                    </a>
                </div>

                <div class="col-3 bottom-menu-item">
                    <a href="/find-loads"
                       class="d-flex flex-column justify-content-between align-items-center">
                        <i class="fas fa-shipping-fast"></i>
                        <small class="text-uppercase font-weight-bold">Find loads</small>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
import {localeChanged, localize} from "vee-validate";

export default {
    data() {
        return {
            langOptions: [
                {
                    locale_name: "en",
                    name: "English"
                },
                {
                    locale_name: "fr",
                    name: "Français"
                },
                {
                    locale_name: "ru",
                    name: "Русский"
                }
            ]
        }
    },
    mounted() {
        axios({
            method: 'get',
            url: '/locales',
            data: {},
        }).then((response) => {
            this.langOptions = response.data.languages;
        });
    },
    computed: {
        user: function () {
            return window.user
        },
        currentLocale: function () {
            let index = this.langOptions.findIndex(item => item.locale_name === window.locale);
            if (index < 0) {
                this.selectLang(this.langOptions[0].locale_name);
                return this.langOptions[0].name;
            }
            return this.langOptions[index].name
        }
    },
    methods: {
        selectLang(lang) {
            localStorage.setItem('locale', lang)
            this.$lang.setLocale(lang);
            this.$moment.locale(lang);
            localize(lang);
            localeChanged();
            window.location.href = `/locale/${lang}`
        }
    }
}
</script>

<style lang="scss">
.bottom-menu {
    height: 55px;
    border-top: 1px #e8e8e8 solid;
    width: 100%;
    box-shadow: 0px 0px 3px 0px #dbdbdb;
    background: white;

    .bottom-menu-item {
        height: 100%;
        padding: 10px 0px;

        a {
            height: 100%;

            svg,
            span {
                color: green;
                font-size: larger;
            }
        }
    }

    i {
        color: #21c87a;
        margin-bottom: 5px;
    }

    small {
        font-size: 8px;
        text-align: center;
        line-height: 100%;

    }
}
</style>
