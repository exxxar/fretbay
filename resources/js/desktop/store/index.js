import Vue from 'vue';
import Vuex from 'vuex';


import ArticleCart from './modules/ArticleCart'
import VolumeCart from './modules/VolumeCart'

import Category from "./modules/Category";
import Subcategory from "./modules/Subcategory";
import Thing from "./modules/Thing";
import Step from "./modules/Step";

Vue.use(Vuex);

export default new Vuex.Store({
    namespaced: true,
    modules: {
         ArticleCart, VolumeCart, Category, Subcategory, Thing, Step
    }
})
