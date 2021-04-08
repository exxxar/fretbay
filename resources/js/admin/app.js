require('./bootstrap');

window.Vue = require('vue');

import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
import Notifications from 'vue-notification'
import VueCurrencyFilter from 'vue-currency-filter'
import 'lazysizes';


import VTooltip from 'v-tooltip'

Vue.use(VTooltip)

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(Notifications)

import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload, {
    preLoad: 1.3,
    error: "/images/common/icons/general/content-loader.gif",
    loading: "/images/common/icons/general/content-loader.gif" ,
    attempt: 1
})

//component
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
//pages
Vue.component('index-page', require('./pages/Index.vue').default);
Vue.component('login-page', require('./pages/Login.vue').default);
Vue.component('users-page', require('./pages/Users.vue').default);

const app = new Vue({
    el: '#app'
});
