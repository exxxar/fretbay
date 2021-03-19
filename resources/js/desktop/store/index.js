import Vue from 'vue';
import Vuex from 'vuex';

import TypeOfTransportModule from './modules/TypeOfTransportModule'
import TypeOfObjectModule from './modules/TypeOfObjectModule'
import ArticleCart from './modules/ArticleCart'
import VolumeCart from './modules/VolumeCart'
import VehicleModule from './modules/VehicleModule'

/*
import tourModule from './modules/tourModule';
import aviaModule from './modules/aviaModule';
import storiesModule from './modules/storiesModule';
*/


Vue.use(Vuex);

export default new Vuex.Store({
    namespaced: true,
    modules: {
        TypeOfTransportModule, TypeOfObjectModule, ArticleCart, VolumeCart, VehicleModule
    }
})
