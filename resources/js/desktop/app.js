/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';

Vue.use(Vuex);

import store from './store';

window.eventBus = new Vue();

import Notifications from 'vue-notification'

import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask)

Vue.use(Notifications)

import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload, {
    preLoad: 1.3,
    error: "/images/common/icons/general/content-loader.gif",
    loading: "/images/common/icons/general/content-loader.gif",
    attempt: 1
})

//components
Vue.component('preloader-component', require('../desktop/components/Preloader.vue').default);
Vue.component('footer-component', require('../desktop/components/Footer.vue').default);
Vue.component('header-content-component', require('../desktop/components/HeaderContent.vue').default);
Vue.component('header-simple-component', require('../desktop/components/HeaderSimple.vue').default);
Vue.component('header-customer-profile-component', require('../desktop/components/HeaderCustomerProfile.vue').default);
Vue.component('header-transporter-profile-component', require('../desktop/components/HeaderTransporterProfile.vue').default);
Vue.component('latest-transactions-component', require('../desktop/components/LatestTransactions.vue').default);
Vue.component('top-movers-component', require('../desktop/components/TopMovers.vue').default);
Vue.component('modals-component', require('../desktop/components/Modals.vue').default);
Vue.component('system-notification-component', require('../desktop/components/SystemNotification.vue').default);

Vue.component('how-it-work-slider-component', require('../desktop/components/Slider/HowItWorkSlider.vue').default);
Vue.component('profile-menu-component', require('../desktop/components/Profile/ProfileMenu.vue').default);

//auth
Vue.component('login-page', require('./pages/Auth/Login.vue').default);
Vue.component('register-page', require('./pages/Auth/Register.vue').default);
Vue.component('register-transporter-page', require('./pages/Auth/RegisterTransporter.vue').default);
Vue.component('register-customer-page', require('../desktop/pages/Auth/RegisterCustomer.vue').default);

//main pages
Vue.component('index-page', require('../desktop/pages/Index.vue').default);
Vue.component('find-loads-page', require('../desktop/pages/FindLoads.vue').default);
Vue.component('find-transporter-page', require('../desktop/pages/FindTransporter.vue').default);
Vue.component('how-it-work-page', require('../desktop/pages/HowItWork.vue').default);
Vue.component('who-we-are-page', require('../desktop/pages/WhoWeAre.vue').default);

Vue.component('profile-personal-info-page', require('./pages/Profile/PersonalInfo.vue').default);
Vue.component('profile-customer-activity-listing-page', require('../desktop/pages/Profile/Customer/ActivityListing.vue').default);
Vue.component('profile-customer-listings-page', require('../desktop/pages/Profile/Customer/Listings.vue').default);

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
Vue.component('profile-settings-page', require('./pages/Profile/Transporter/Settings.vue').default);

//other pages (not needed)
Vue.component('contact-us-page', require('../desktop/pages/ContactUs.vue').default);
Vue.component('company-move-page', require('../desktop/pages/CompanyMove.vue').default);

Vue.component('recruitment-page', require('../desktop/pages/Recruitment.vue').default);
Vue.component('fight-the-black-market-page', require('../desktop/pages/FightTheBlackMarket.vue').default);
Vue.component('reviews-page', require('../desktop/pages/Reviews.vue').default);
Vue.component('search-transporter-mover-carrier-page', require('../desktop/pages/SearchTransporterMoverCarrier.vue').default);
Vue.component('benefits-transporter-mover-carrier-page', require('../desktop/pages/BenefitsTransporterMoverCarrier.vue').default);
Vue.component('search-transporter-mover-carrier-page', require('../desktop/pages/SearchTransporterMoverCarrier.vue').default);
Vue.component('fequently-asked-questions-page', require('../desktop/pages/FrequentlyAskedQuestions.vue').default);
Vue.component('privacy-policy-page', require('../desktop/pages/PrivacyPolicy.vue').default);

Vue.component('quality-charter-page', require('../desktop/pages/QualityCharter.vue').default);
Vue.component('fraud-prevention-page', require('../desktop/pages/FraudPrevention.vue').default);
Vue.component('tips-moving-page', require('../desktop/pages/TipsMoving.vue').default);
Vue.component('ebay-sellers-page', require('../desktop/pages/EbaySellers.vue').default);

require('lang.js');
import VueLang from '@eli5/vue-lang-js'
// get the data source
import translations from '../vue-translations.js';

Vue.use(VueLang, {
    messages: translations, // Provide locale file
    // locale: 'en', // Set locale
    fallback: 'en' // Set fallback locale
});



const app = new Vue({
    store,
    el: '#app',
});


if (localStorage.getItem('locale')) {
    app.$lang.setLocale(localStorage.getItem('locale'));
} else {
    app.$lang.setLocale('en');
}
