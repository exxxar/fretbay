require('./bootstrap');

window.Vue = require('vue');

import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
import Notifications from 'vue-notification'
import VueCurrencyFilter from 'vue-currency-filter'
import 'lazysizes';


import VTooltip from 'v-tooltip'

Vue.use(VTooltip)
// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
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
Vue.component('languages-page', require('./pages/Languages/Index.vue').default);
Vue.component('languages-create-page', require('./pages/Languages/Create.vue').default);
Vue.component('languages-edit-page', require('./pages/Languages/Edit.vue').default);
Vue.component('translations-page', require('./pages/Translations/Index.vue').default);
Vue.component('translations-create-page', require('./pages/Translations/Create.vue').default);
Vue.component('translations-edit-page', require('./pages/Translations/Edit.vue').default);
Vue.component('objects-categories', require('./components/objects/Categories.vue').default);
Vue.component('objects-types', require('./components/objects/Types.vue').default);
Vue.component('objects-transport-types', require('./components/objects/TransportTypes.vue').default);
Vue.component('objects-transport', require('./components/objects/Transport.vue').default);

const app = new Vue({
    el: '#app'
});
