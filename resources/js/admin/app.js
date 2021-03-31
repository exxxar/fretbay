require('./bootstrap');

window.Vue = require('vue');

//component
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
//pages
Vue.component('index-page', require('./pages/Index.vue').default);
Vue.component('login-page', require('./pages/Login.vue').default);


const app = new Vue({
    el: '#app'
});
