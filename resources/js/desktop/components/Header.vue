<template>
    <header id="header" class="u-header   u-header--modern u-header--bordered u-header--sticky-top-sm">
        <div class="u-header__section fixed-top">
            <div id="logoAndNav" class="container-fluid">
                <!-- Nav -->
                <nav
                    class="js-mega-menu navbar navbar-expand-lg u-header__navbar hs-menu-initialized hs-menu-horizontal justify-content-sm-center justify-content-between">
                    <!-- Logo -->
                    <div class="u-header__navbar-brand-wrapper d-flex d-sm-block justify-content-sm-center "
                         v-bind:class="{'justify-content-end':!user,'justify-content-center':user}"
                    >
                        <a @click="loading=true" class="navbar-brand u-header__navbar-brand p-2" href="/"
                           aria-label="Space" style="max-width: 100px;">
                            <img class="u-header__navbar-brand-default w-100" v-if="!loading"
                                 style="object-fit: contain; height:50px;"
                                 v-lazy="'/assets/img/logo.png'" alt="Logo">
                            <img class="u-header__navbar-brand-mobile w-100" v-if="!loading"
                                 style="object-fit: contain; height:50px;"
                                 v-lazy="'/assets/img/logo.png'" alt="Logo">

                            <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                                  aria-hidden="true"></span>


                        </a>
                    </div>
                    <!-- End Logo -->

                    <!-- Responsive Toggle Button -->
                    <button type="button" class="navbar-toggler btn u-hamburger u-header__hamburger"
                            aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar"
                            data-toggle="collapse" data-target="#navBar">
                        <span class="d-none d-sm-inline-block">Menu</span>
                        <span id="hamburgerTrigger" class="u-hamburger__box ml-3">
                                <span class="u-hamburger__inner"></span>
                        </span>
                    </button>
                    <!-- End Responsive Toggle Button -->

                    <!-- Navigation -->
                    <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse py-0">
                        <ul class="navbar-nav u-header__navbar-nav">

                            <!--  Request a quote -->
                            <li class="nav-item  u-header__nav-item">
                                <a href="/find-transporter" class="nav-link btn btn-link w-100 p-3 text-center">
                                    {{$trans('menu.item.request_a_quote')}}
                                </a>
                            </li>

                            <!-- End  Request a quote -->

                            <!--  Find loads -->
                            <li class="nav-item hs-has-mega-menu u-header__nav-item" v-if="user">
                                <a href="/find-loads" class="nav-link u-header__nav-link w-100 "
                                   v-if="user.is_transporter">
                                    {{$trans('menu.item.find_loads')}}
                                </a>
                            </li>
                            <!-- End  Find loads -->


                            <li class="nav-item dropdown">
                                <a class="nav-link btn btn-link p-3 dropdown-toggle w-100 " href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Helps
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item cursor-pointer" href="/find-loads" v-if="!user"> {{$trans('menu.item.i_am_a_transporter')}}</a>
                                    <a class="dropdown-item cursor-pointer" href="/find-transporter"> {{$trans('menu.item.search_for_a_transporter')}}</a>
                                    <a class="dropdown-item cursor-pointer" href="/how-it-works"> {{$trans('menu.item.how_does_it_work')}}</a>
                                    <a class="dropdown-item cursor-pointer" href="/fequently-asked-questions"> {{$trans('menu.item.faq')}}.</a>
                                    <!--        <a class="dropdown-item" href="/recruitment">Recruitment</a>-->
                                    <!--   <a class="dropdown-item cursor-pointer" href="/contact-us">Contact Us</a>-->
                                    <a class="dropdown-item cursor-pointer" href="/privacy"> {{$trans('menu.item.privacy')}}</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle p-3 btn btn-link" href="#" id="navbarDropdownMenuLink2"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{currentLocale}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                    <a class="dropdown-item" v-for="lang in langOptions"
                                       @click="selectLang(lang.locale_name)">{{lang.name}}</a>

                                </div>
                            </li>

                            <li class="nav-item dropdown u-header__nav-item-btn p-0 mb-1 mb-sm-0 mr-0 mr-sm-1"
                                v-if="!user">
                                <a class="btn btn-primary dropdown-toggle text-white w-100 " href="#"
                                   id="signupDropdown"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$trans('menu.item.sign_up')}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="signupDropdown">
                                    <a class="dropdown-item cursor-pointer" data-toggle="modal"
                                       data-target="#signUp-transporter"> {{$trans('menu.item.sign_up_transporter')}}</a>
                                    <a class="dropdown-item cursor-pointer" data-toggle="modal"
                                       data-target="#signUp-customer"> {{$trans('menu.item.sign_up_customer')}}</a>
                                </div>
                            </li>

                            <li class="nav-item u-header__nav-item-btn p-0" v-if="!user">
                                <button type="button" class="btn btn-link w-100 btn-outline-primary" data-toggle="modal"
                                        data-target="#signIn">
                                    {{$trans('menu.item.sign_in')}}
                                </button>
                            </li>
                            <!-- End Button -->



                            <!-- Search -->
                            <li class="nav-item u-header__navbar-icon u-header__navbar-v-divider">
                                <a class="btn btn-xs btn-icon btn-text-dark u-header__search-toggle"
                                   @click="toggleSearch"
                                   role="button" aria-haspopup="true" aria-expanded="false" aria-controls="search"
                                   data-unfold-target="#search" data-unfold-hide-on-scroll="false"
                                   data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300"
                                   data-unfold-animation-in="slideInUp">
                                    <i class="fa fa-search btn-icon__inner"></i>
                                </a>

                                <!-- Input -->
                                <form id="search"
                                      action="/find-transporter"
                                      method="get"
                                      class="js-focus-state input-group form u-header__search u-unfold--css-animation u-unfold--hidden fadeOut"
                                      style="animation-duration: 300ms;">
                                    <input class="form-control form__input" type="search" name="search"
                                           :placeholder="$trans('menu.text.search')">
                                    <div class="input-group-addon u-header__search-addon p-0">
                                        <button class="btn btn-primary u-header__search-addon-btn" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <!-- End Input -->
                            </li>
                            <!-- End Search -->
                        </ul>
                    </div>
                    <!-- End Navigation -->

                    <ul class="navbar-nav u-header__secondary-nav" v-if="user">

                        <!-- Account Signin -->
                        <li class="nav-item u-header__navbar-icon text-center">
                            <!-- Account Sidebar Toggle Button -->
                            <a class="btn btn-xs btn-icon btn-text-dark target-of-invoker-has-unfolds"
                               @click="toggleSidebar">
                                <i class="far fa-user-circle btn-icon__inner font-size-base"></i>

                            </a>
                            <!-- End Account Sidebar Toggle Button -->
                        </li>
                        <!-- End Account Signin -->
                    </ul>
                </nav>
                <!-- End Nav -->
            </div>
        </div>
    </header>
</template>

<script>

    import { localize, localeChanged } from "vee-validate";
    export default {

        data() {
            return {
                loading: false,
                searchText: null,
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
        computed: {
            user: function () {
                return window.user;
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
            toggleSearch() {
                $("#search").toggleClass("u-unfold--hidden  ");
            },
            toggleSidebar() {
                $("#sidebar").toggleClass("u-unfold--hidden");
            },
            selectLang(lang) {
                localStorage.setItem('locale', lang)
                this.$lang.setLocale(lang);
                this.$moment.locale(lang);
                localize(lang);
                localeChanged();
                window.location.href = `/locale/${lang}`
            },
            sendMessage(message, type = 'success') {
                this.$notify({
                    group: 'info',
                    type: type,
                    title: 'Оповещение',
                    text: message
                });
            },

        },
        mounted() {
            axios({
                method: 'get',
                url: '/locales',
                data: {},
            }).then((response) => {
                    this.langOptions = response.data.languages;
            });
            if (this.user)
                pusher.subscribe('notification-event-channel-' + this.user.id)
                    .bind('notification-event', (data) => {
                        this.sendMessage(data.event.description, ["success", "warning", "error"][data.event.type])
                    })
                    .bind('notification-quote-event', (data) => {
                        this.sendMessage("Quote update")
                    })


        }
    }
</script>




