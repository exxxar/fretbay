require('./bootstrap');

window.Vue = require('vue');

import VueCurrencyFilter from 'vue-currency-filter';
import 'lazysizes';

import VTooltip from 'v-tooltip'
Vue.use(VTooltip);

import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

import Notifications from 'vue-notification'
Vue.use(Notifications);

import VueLazyload from 'vue-lazyload'
Vue.use(VueLazyload, {
    preLoad: 1.3,
    error: "/images/common/icons/general/content-loader.gif",
    loading: "/images/common/icons/general/content-loader.gif" ,
    attempt: 1
})

import VJsoneditor from 'v-jsoneditor'

Vue.use(VJsoneditor)

import JsonViewer from 'vue-json-viewer'

// Import JsonViewer as a Vue.js plugin
Vue.use(JsonViewer)


import Multiselect from 'vue-multiselect';
Vue.component('multiselect', Multiselect);

//component
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
//pages
Vue.component('index-page', require('./pages/Index.vue').default);
Vue.component('login-page', require('./pages/Login.vue').default);

Vue.component('languages-page', require('./pages/Languages/Index.vue').default);
Vue.component('languages-create-page', require('./pages/Languages/Create.vue').default);
Vue.component('languages-edit-page', require('./pages/Languages/Edit.vue').default);

Vue.component('translations-page', require('./pages/Translations/Index.vue').default);
Vue.component('translations-create-page', require('./pages/Translations/Create.vue').default);
Vue.component('translations-edit-page', require('./pages/Translations/Edit.vue').default);

Vue.component('objects-categories', require('./components/Objects/Categories.vue').default);
Vue.component('objects-types', require('./components/Objects/Types.vue').default);
Vue.component('objects-transport-types', require('./components/Objects/TransportTypes.vue').default);
Vue.component('objects-transport', require('./components/Objects/Transport.vue').default);
Vue.component('orders-page', require('./components/Orders.vue').default);

Vue.component('users-list', require('./components/Users/List.vue').default);
Vue.component('users-profiles', require('./components/Users/Profiles.vue').default);
Vue.component('users-roles', require('./components/Users/Roles.vue').default);
Vue.component('users-permissions', require('./components/Users/Permissions.vue').default);



//Section for Pages

//Users
Vue.component('users-index-page', require('./pages/Users/Index.vue').default);
Vue.component('users-create-page', require('./pages/Users/Create.vue').default);
Vue.component('users-edit-page', require('./pages/Users/Edit.vue').default);
Vue.component('users-show-page', require('./pages/Users/Show.vue').default);

Vue.component('users-debug-component', require('./components/Users/DebugUsersComponent.vue').default);

//Categories
Vue.component('categories-index-page', require('./pages/Categories/V2/Index.vue').default);
Vue.component('categories-create-page', require('./pages/Categories/V2/Create.vue').default);
Vue.component('categories-edit-page', require('./pages/Categories/V2/Edit.vue').default);
Vue.component('categories-show-page', require('./pages/Categories/V2/Show.vue').default);

Vue.component('categories-debug-component', require('./components/Categories/DebugCategoriesComponent.vue').default);

//Properties
Vue.component('properties-index-page', require('./pages/Properties/Index.vue').default);
Vue.component('properties-create-page', require('./pages/Properties/Create.vue').default);
Vue.component('properties-edit-page', require('./pages/Properties/Edit.vue').default);
Vue.component('properties-show-page', require('./pages/Properties/Show.vue').default);

Vue.component('properties-debug-component', require('./components/Properties/DebugPropertiesComponent.vue').default);

//Subcategories
Vue.component('subcategories-index-page', require('./pages/Subcategories/Index.vue').default);
Vue.component('subcategories-create-page', require('./pages/Subcategories/Create.vue').default);
Vue.component('subcategories-edit-page', require('./pages/Subcategories/Edit.vue').default);
Vue.component('subcategories-show-page', require('./pages/Subcategories/Show.vue').default);

Vue.component('subcategories-debug-component', require('./components/Subcategories/DebugSubcategoriesComponent.vue').default);

//Reviews
Vue.component('reviews-index-page', require('./pages/Reviews/Index.vue').default);
Vue.component('reviews-create-page', require('./pages/Reviews/Create.vue').default);
Vue.component('reviews-edit-page', require('./pages/Reviews/Edit.vue').default);
Vue.component('reviews-show-page', require('./pages/Reviews/Show.vue').default);

Vue.component('reviews-debug-component', require('./components/Reviews/DebugReviewsComponent.vue').default);

//Roles

Vue.component('roles-index-page', require('./pages/Roles/Index.vue').default);
Vue.component('roles-show-page', require('./pages/Roles/Show.vue').default);
Vue.component('roles-debug-component', require('./components/Roles/DebugRolesComponent.vue').default);
//Permissions

Vue.component('permissions-index-page', require('./pages/Permissions/Index.vue').default);
Vue.component('permissions-debug-component', require('./components/Permissions/DebugPermissionsComponent.vue').default);

//Things
Vue.component('things-index-page', require('./pages/Things/Index.vue').default);
Vue.component('things-create-page', require('./pages/Things/Create.vue').default);
Vue.component('things-edit-page', require('./pages/Things/Edit.vue').default);
Vue.component('things-show-page', require('./pages/Things/Show.vue').default);

Vue.component('things-debug-component', require('./components/Things/DebugThingsComponent.vue').default);

//Listings
Vue.component('listings-index-page', require('./pages/Listings/Index.vue').default);
Vue.component('listings-create-page', require('./pages/Listings/Create.vue').default);
Vue.component('listings-edit-page', require('./pages/Listings/Edit.vue').default);
Vue.component('listings-show-page', require('./pages/Listings/Show.vue').default);

Vue.component('listings-debug-component', require('./components/Listings/DebugListingsComponent.vue').default);

//Vehicles
Vue.component('vehicles-index-page', require('./pages/Vehicles/Index.vue').default);
Vue.component('vehicles-create-page', require('./pages/Vehicles/Create.vue').default);
Vue.component('vehicles-edit-page', require('./pages/Vehicles/Edit.vue').default);
Vue.component('vehicles-show-page', require('./pages/Vehicles/Show.vue').default);

Vue.component('vehicles-debug-component', require('./components/Vehicles/DebugVehiclesComponent.vue').default);


//Orders
Vue.component('orders-index-page', require('./pages/Orders/Index.vue').default);
Vue.component('orders-create-page', require('./pages/Orders/Create.vue').default);
Vue.component('orders-edit-page', require('./pages/Orders/Edit.vue').default);
Vue.component('orders-show-page', require('./pages/Orders/Show.vue').default);

Vue.component('orders-debug-component', require('./components/Orders/DebugOrdersComponent.vue').default);

//Verifications
Vue.component('verifications-index-page', require('./pages/Verifications/Index.vue').default);
Vue.component('verifications-create-page', require('./pages/Verifications/Create.vue').default);
Vue.component('verifications-edit-page', require('./pages/Verifications/Edit.vue').default);
Vue.component('verifications-show-page', require('./pages/Verifications/Show.vue').default);

Vue.component('verifications-debug-component', require('./components/Verifications/DebugVerificationsComponent.vue').default);

//Verifications
Vue.component('quotes-index-page', require('./pages/Quotes/Index.vue').default);
Vue.component('quotes-create-page', require('./pages/Quotes/Create.vue').default);
Vue.component('quotes-edit-page', require('./pages/Quotes/Edit.vue').default);
Vue.component('quotes-show-page', require('./pages/Quotes/Show.vue').default);

Vue.component('quotes-debug-component', require('./components/Quotes/DebugQuotesComponent.vue').default);

const app = new Vue({
    el: '#app'
});
