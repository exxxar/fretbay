import Vue from 'vue';
import Vuex from 'vuex';

import TypeOfTransportModule from './modules/TypeOfTransportModule'
import TypeOfObjectModule from './modules/TypeOfObjectModule'
import ArticleCart from './modules/ArticleCart'
import VolumeCart from './modules/VolumeCart'
import VehicleModule from './modules/VehicleModule'
import Category from "./modules/Category";
import Subcategory from "./modules/Subcategory";
import Thing from "./modules/Thing";
import Step from "./modules/Step";

Vue.use(Vuex);

export default new Vuex.Store({
    namespaced: true,
    modules: {
        TypeOfTransportModule, TypeOfObjectModule, ArticleCart, VolumeCart, VehicleModule, Category, Subcategory, Thing, Step
    }
})
