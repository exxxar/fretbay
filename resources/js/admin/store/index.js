import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import languages from './modules/languages'
import translations from './modules/translations'


export default new Vuex.Store({
    namespaced: true,
    modules: {
        languages, translations,
    }
})
