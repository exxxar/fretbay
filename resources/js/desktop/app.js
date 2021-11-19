/**
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'

require('./bootstrap');

window.Vue = require('vue');

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/black-green-light.css'

Vue.use(VueMaterial)

import Vuex from 'vuex';

Vue.use(Vuex);

import store from './store';

window.eventBus = new Vue();

import Notifications from 'vue-notification'

Vue.use(Notifications)

import VueTheMask from 'vue-the-mask'

Vue.use(VueTheMask)

import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload, {
    preLoad: 1.3,
    error: "/images/common/icons/general/content-loader.gif",
    loading: "/images/common/icons/general/content-loader.gif",
    attempt: 1
})


import vSelect from "vue-select";

Vue.component("v-select", vSelect);

import "vue-select/dist/vue-select.css";


Vue.component('listing-component', require('./components/Listing/Listing.vue').default);
Vue.component('orders-component', require('./components/Orders/Orders.vue').default);

//components
Vue.component('preloader-component', require('../desktop/components/Preloader.vue').default);

Vue.component('listing-item-component', require('./components/Listing/ListingItem.vue').default);

Vue.component('order-item-component', require('./components/Orders/OrderItem.vue').default);
Vue.component('listing-paginate-component', require('./components/Listing/ListingPaginate.vue').default);
Vue.component('order-paginate-component', require('./components/Orders/OrderPaginate.vue').default);
Vue.component('footer-component', require('../desktop/components/Footer.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('sidebar-component', require('./components/Sidebar.vue').default);
Vue.component('signin-component', require('./components/Modals/SignIn.vue').default);
Vue.component('signup-transporter-component', require('./components/Modals/SignUpTransporter.vue').default);
Vue.component('signup-customer-component', require('./components/Modals/SignUpCustomer.vue').default);
Vue.component('chat-component', require('./components/Listing/Chat.vue').default);
Vue.component('quotes-component', require('./components/Listing/Quotes.vue').default);
Vue.component('notification-item-component', require('./components/Notifications/NotificationItem.vue').default);
Vue.component('payment-item-component', require('./components/Payments/PaymentItem.vue').default);
Vue.component('simple-notification-item-component', require('./components/Notifications/SimpleNotificationItem.vue').default);
Vue.component('notification-paginate-component', require('./components/Notifications/NotificationPaginate.vue').default);
Vue.component('payment-paginate-component', require('./components/Payments/PaymentPaginate.vue').default);
Vue.component('favorites-paginate-component', require('./components/FavoritePaginate.vue').default);

Vue.component('text-callback-form-component', require('./components/TextCallbackForm.vue').default);
Vue.component('voice-callback-form-component', require('./components/VoiceCallbackForm.vue').default);

Vue.component('latest-transactions-component', require('../desktop/components/LatestTransactions.vue').default);
Vue.component('top-movers-component', require('../desktop/components/TopMovers.vue').default);
Vue.component('modals-component', require('../desktop/components/Modals.vue').default);
Vue.component('system-notification-component', require('./components/Notifications/SystemNotification.vue').default);

Vue.component('how-it-work-slider-component', require('../desktop/components/Slider/HowItWorkSlider.vue').default);

Vue.component('customer-reviews-component', require('../desktop/components/Reviews/CustomersReviews.vue').default);
Vue.component('transporter-reviews-component', require('../desktop/components/Reviews/TransporterReviews.vue').default);
Vue.component('review-item-component', require('../desktop/components/Reviews/ReviewItem.vue').default);
Vue.component('message-item-component', require('../desktop/components/MessageItem.vue').default);
Vue.component('quote-item-component', require('../desktop/components/Listing/QuoteItem').default);
Vue.component('single-page', require('../desktop/pages/Main/SinglePage.vue').default);
//auth


Vue.component('login-page', require('./pages/Auth/Login.vue').default);
Vue.component('recovery-page', require('./pages/Auth/Recovery.vue').default);
Vue.component('register-transporter-page', require('./pages/Auth/RegisterTransporter.vue').default);
Vue.component('register-customer-page', require('../desktop/pages/Auth/RegisterCustomer.vue').default);

Vue.component('reviews-page', require('../desktop/pages/Profile/Reviews.vue').default);

//main pages
Vue.component('index-page', require('./pages/Main/Index.vue').default);
Vue.component('notifications-page', require('./pages/Profile/Notifications.vue').default);
Vue.component('payments-page', require('./pages/Profile/Payments.vue').default);
Vue.component('favorites-page', require('./pages/Profile/Transporter/Favorites.vue').default);
Vue.component('listing-page', require('./pages/Main/Listing.vue').default);
Vue.component('find-loads-page', require('./pages/Main/FindLoads.vue').default);
Vue.component('find-transporter-page', require('./pages/Main/FindTransporter.vue').default);
Vue.component('how-it-work-page', require('./pages/Support/HowItWork.vue').default);
Vue.component('who-we-are-page', require('./pages/Support/WhoWeAre.vue').default);

Vue.component('profile-page', require('./pages/Main/Profile.vue').default);
Vue.component('pricing-page', require('./pages/Support/Pricing.vue').default);
Vue.component('profile-transporter-page', require('./pages/Profile/Transporter/Profile.vue').default);


Vue.component('transporter-registration-form-component', require('./components/Auth/TransporterRegistrationForm.vue').default);
Vue.component('customer-registration-form-component', require('./components/Auth/CustomerRegistrationForm.vue').default);
Vue.component('login-form-component', require('./components/Auth/LoginForm.vue').default);
Vue.component('recovery-form-component', require('./components/Auth/RecoveryPasswordForm.vue').default);


Vue.component('profile-personal-info-page', require('./pages/Profile/PersonalInfo.vue').default);


Vue.component('profile-transporter-wizard-start-page', require('./pages/Profile/Transporter/ProfileWizardStart.vue').default);
Vue.component('profile-transporter-wizard-step-1-page', require('./pages/Profile/Transporter/ProfileWizardStep1.vue').default);
Vue.component('profile-transporter-wizard-step-2-page', require('./pages/Profile/Transporter/ProfileWizardStep2.vue').default);
Vue.component('profile-transporter-wizard-step-3-page', require('./pages/Profile/Transporter/ProfileWizardStep3.vue').default);
Vue.component('profile-transporter-wizard-step-4-page', require('./pages/Profile/Transporter/ProfileWizardStep4.vue').default);
Vue.component('profile-transporter-wizard-step-5-page', require('./pages/Profile/Transporter/ProfileWizardStep5.vue').default);
//На редактирование профиля перевозчика
Vue.component('profile-my-account-page', require('./pages/Profile/Transporter/MyAccount.vue').default);
Vue.component('profile-my-company-page', require('./pages/Profile/Transporter/MyCompany.vue').default);
Vue.component('profile-legal-documents-page', require('./pages/Profile/Transporter/LegalDocuments.vue').default);
Vue.component('profile-my-vehicles-page', require('./pages/Profile/Transporter/MyVehicles.vue').default);
Vue.component('profile-transporter-settings-page', require('./pages/Profile/Transporter/Settings.vue').default);
Vue.component('profile-customer-settings-page', require('./pages/Profile/Customer/Settings.vue').default);
//Профиль заказчика
Vue.component('profile-customer-page', require('./pages/Profile/Customer/Profile.vue').default);


//other pages (not needed)
Vue.component('contact-us-page', require('./pages/Main/ContactUs.vue').default);
Vue.component('company-move-page', require('./pages/Support/CompanyMove.vue').default);

Vue.component('recruitment-page', require('./pages/Support/Recruitment.vue').default);
Vue.component('fight-the-black-market-page', require('./pages/Support/FightTheBlackMarket.vue').default);
Vue.component('reviews-page', require('./pages/Support/Reviews.vue').default);
Vue.component('search-transporter-mover-carrier-page', require('./pages/Support/SearchTransporterMoverCarrier.vue').default);
Vue.component('benefits-transporter-mover-carrier-page', require('./pages/Support/BenefitsTransporterMoverCarrier.vue').default);
Vue.component('search-transporter-mover-carrier-page', require('./pages/Support/SearchTransporterMoverCarrier.vue').default);
Vue.component('fequently-asked-questions-page', require('./pages/Support/FrequentlyAskedQuestions.vue').default);
Vue.component('privacy-policy-page', require('./pages/Support/PrivacyPolicy.vue').default);
Vue.component('terms-page', require('./pages/Support/Terms.vue').default);

Vue.component('quality-charter-page', require('./pages/Support/QualityCharter.vue').default);
Vue.component('fraud-prevention-page', require('./pages/Support/FraudPrevention.vue').default);
Vue.component('tips-moving-page', require('./pages/Support/TipsMoving.vue').default);
Vue.component('ebay-sellers-page', require('./pages/Support/EbaySellers.vue').default);

//payments
Vue.component('card-input-component', require('./components/Payments/CardInput').default);
Vue.component('card-cvc-component', require('./components/Payments/CardCVC').default);
Vue.component('card-month-component', require('./components/Payments/CardMonth').default);
Vue.component('card-year-component', require('./components/Payments/CardYear').default);

require('lang.js');
import VueLang from '@eli5/vue-lang-js'
// get the data source
import translations from '../vue-translations.json';

Vue.use(VueLang, {
    messages: translations, // Provide locale file
    // locale: 'en', // Set locale
    fallback: 'fr' // Set fallback locale
});

// import VueSlickCarousel from 'vue-slick-carousel'
// import 'vue-slick-carousel/dist/vue-slick-carousel.css'
// import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
// Vue.component('slick',  VueSlickCarousel);

import VueSplide from '@splidejs/vue-splide';
import '@splidejs/splide/dist/css/themes/splide-sea-green.min.css';

Vue.use(VueSplide);

import {ValidationProvider, extend, ValidationObserver, localize, localeChanged} from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import en from 'vee-validate/dist/locale/en.json';
import fr from 'vee-validate/dist/locale/fr.json';
import ru from 'vee-validate/dist/locale/ru.json';
// install rules and localization
Object.keys(rules).forEach(rule => {
    extend(rule, rules[rule]);
});
localize({
    en,
    fr,
    ru
});

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

import Fuse from 'fuse.js'

Vue.prototype.$search = function (term, list, options) {
    return new Promise(function (resolve, reject) {
        var run = new Fuse(list, options);
        var results = run.search(term);
        let arr = [];
        results.forEach(item => {
            arr.push(item.item)
        });
        resolve(arr)
    })
}
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
/*import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'*/
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

const moment = require('moment');
// require('moment/locale/en');
Vue.use(require('vue-moment'), {
    moment
});

import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect);
import "vue-multiselect/dist/vue-multiselect.min.css"

const app = new Vue({
    store,
    el: '#app',
});


if (localStorage.getItem('locale')) {
    app.$lang.setLocale(localStorage.getItem('locale'));
    app.$moment.locale(localStorage.getItem('locale'));
    localize(localStorage.getItem('locale'));
    localeChanged();
} else {
    localStorage.setItem('locale', 'fr');
    app.$lang.setLocale('fr');
    app.$moment.locale('fr');
    localize('fr');
    localeChanged();
}




