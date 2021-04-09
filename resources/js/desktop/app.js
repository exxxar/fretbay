/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';

Vue.use(Vuex);

import store from './store';

window.eventBus = new Vue();

import Notifications from 'vue-notification'

Vue.use(Notifications)

import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload, {
    preLoad: 1.3,
    error: "/images/common/icons/general/content-loader.gif",
    loading: "/images/common/icons/general/content-loader.gif" ,
    attempt: 1
})


Vue.component('preloader-component', require('../desktop/components/Preloader.vue').default);
Vue.component('footer-component', require('../desktop/components/Footer.vue').default);
Vue.component('header-content-component', require('../desktop/components/HeaderContent.vue').default);
Vue.component('header-simple-component', require('../desktop/components/HeaderSimple.vue').default);
Vue.component('latest-transactions-component', require('../desktop/components/LatestTransactions.vue').default);
Vue.component('top-movers-component', require('../desktop/components/TopMovers.vue').default);
Vue.component('modals-component', require('../desktop/components/Modals.vue').default);
Vue.component('system-notification-component', require('../desktop/components/SystemNotification.vue').default);


//pages for users
Vue.component('index-page', require('../desktop/pages/Index.vue').default);
Vue.component('register-page', require('../desktop/pages/Register.vue').default);

Vue.component('register-transporter-page', require('../desktop/pages/RegisterTransporter.vue').default);
Vue.component('register-user-page', require('../desktop/pages/RegisterUser.vue').default);
Vue.component('login-page', require('../desktop/pages/Login.vue').default);
Vue.component('contact-us-page', require('../desktop/pages/ContactUs.vue').default);
Vue.component('company-move-page', require('../desktop/pages/CompanyMove.vue').default);
Vue.component('find-loads-page', require('../desktop/pages/FindLoads.vue').default);
Vue.component('find-transporter-page', require('../desktop/pages/FindTransporter.vue').default);
Vue.component('how-it-work-page', require('../desktop/pages/HowItWork.vue').default);
Vue.component('recruitment-page', require('../desktop/pages/Recruitment.vue').default);
Vue.component('fight-the-black-market-page', require('../desktop/pages/FightTheBlackMarket.vue').default);
Vue.component('reviews-page', require('../desktop/pages/Reviews.vue').default);
Vue.component('search-transporter-mover-carrier-page', require('../desktop/pages/SearchTransporterMoverCarrier.vue').default);
Vue.component('benefits-transporter-mover-carrier-page', require('../desktop/pages/BenefitsTransporterMoverCarrier.vue').default);
Vue.component('search-transporter-mover-carrier-page', require('../desktop/pages/SearchTransporterMoverCarrier.vue').default);
Vue.component('fequently-asked-questions-page', require('../desktop/pages/FrequentlyAskedQuestions.vue').default);
Vue.component('privacy-policy-page', require('../desktop/pages/PrivacyPolicy.vue').default);
Vue.component('who-we-are-page', require('../desktop/pages/WhoWeAre.vue').default);
Vue.component('quality-charter-page', require('../desktop/pages/QualityCharter.vue').default);
Vue.component('fraud-prevention-page', require('../desktop/pages/FraudPrevention.vue').default);
Vue.component('tips-moving-page', require('../desktop/pages/TipsMoving.vue').default);
Vue.component('ebay-sellers-page', require('../desktop/pages/EbaySellers.vue').default);




const app = new Vue({
    store,
    el: '#app',
});
