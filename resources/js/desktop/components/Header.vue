<template>
    <header id="header" class="u-header u-header--modern u-header--bordered u-header--sticky-top-lg">
        <div class="u-header__section">
            <div id="logoAndNav" class="container-fluid">
                <!-- Nav -->
                <nav
                    class="js-mega-menu navbar navbar-expand-lg u-header__navbar hs-menu-initialized hs-menu-horizontal justify-content-center">

                    <!-- Logo -->
                    <div class="u-header__navbar-brand-wrapper">
                        <a class="navbar-brand u-header__navbar-brand" href="/" aria-label="Space">
                            <img class="u-header__navbar-brand-default w-100" style="object-fit: contain; height:50px;"
                                 v-lazy="'/assets/img/logo.png'" alt="Logo">
                            <img class="u-header__navbar-brand-mobile w-100" style="object-fit: contain; height:50px;"
                                 v-lazy="'/assets/img/logo.png'" alt="Logo">
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
                            <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                <a href="/find-transporter" class="nav-link u-header__nav-link">
                                    Request a quote
                                </a>
                            </li>

                            <!-- End  Request a quote -->

                            <!--  Find loads -->
                            <li class="nav-item hs-has-mega-menu u-header__nav-item" v-if="user">
                                <a href="/find-loads" class="nav-link u-header__nav-link" v-if="user.is_transporter">
                                    Find loads
                                </a>
                            </li>
                            <!-- End  Find loads -->


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Helps
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/find-loads" v-if="!user">I am a transporter</a>
                                    <a class="dropdown-item" href="/find-transporter">Search for a transporter</a>
                                    <a class="dropdown-item" href="/how-it-works">How does it work?</a>
                                    <a class="dropdown-item" href="/fequently-asked-questions">F.A.Q.</a>
                                    <a class="dropdown-item" href="/recruitment">Recruitment</a>
                                    <a class="dropdown-item" href="/contact-us">Contact Us</a>
                                    <a class="dropdown-item" href="/privacy">Privacy</a>
                                </div>
                            </li>


                            <li class="nav-item dropdown u-header__nav-item-btn" v-if="!user">
                                <a class="btn btn-primary dropdown-toggle" href="#" id="signupDropdown"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    SignUp
                                </a>
                                <div class="dropdown-menu" aria-labelledby="signupDropdown">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#signUp-transporter">I am
                                        a transporter</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#signUp-customer">I am
                                        looking for transporter</a>
                                </div>
                            </li>

                            <li class="nav-item u-header__nav-item-btn" v-if="!user">
                                <button type="button" class="btn btn-link" data-toggle="modal"
                                        data-target="#signIn">
                                    Sign In
                                </button>
                            </li>
                            <!-- End Button -->

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{currentLocale}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                    <a class="dropdown-item" v-for="lang in langOptions"
                                       @click="selectLang(lang.countryCode)" :href="'/locale/'+lang.countryCode">{{lang.countryName}}</a>

                                </div>
                            </li>

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
                                      class="js-focus-state input-group form u-header__search u-unfold--css-animation u-unfold--hidden fadeOut"
                                      style="animation-duration: 300ms;">
                                    <input class="form-control form__input" type="search" placeholder="Search Space">
                                    <div class="input-group-addon u-header__search-addon p-0">
                                        <button class="btn btn-primary u-header__search-addon-btn" type="button">
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
    import MainMenu from "./MainMenu";

    export default {
        components: {
            MainMenu
        },
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
        computed: {
            user: function () {
                return window.user;
            },
            currentLocale: function () {
                return this.langOptions.find(item => item.countryCode === window.locale).countryName
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
                console.log(window)
                localStorage.setItem('locale', lang)
                this.$lang.setLocale(lang);
                this.$moment.locale(lang);
                localize(lang);
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
            console.log("header!");


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


