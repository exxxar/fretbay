export default {
    state: {
        translations: [],
    },
    getters: {
        translations(state) {
            return state.translations;
        },
    },
    mutations: {
        addTranslation(state, payload) {
            let translation = state.translations.findIndex(item => item.key === payload.key && item.group === payload.group );
            if (translation >= 0) {
                Vue.set(state.translations[translation], payload.language, payload.value)
            }
            else {
                state.translations.push(payload)
            }
        },
        setTranslations(state, payload) {
            state.translations = payload
        },
        saveTranslation(state, payload) {
            let translation = state.translations.findIndex(item => item.key === payload.key);
            Vue.set(state.translations[translation], payload.language, payload.value)
        },
        removeTranslation(state, payload) {
            let translation = state.translations.findIndex(item => item.key === payload.key);
            if (translation >= 0) {
                state.translations.splice(translation, 1);
            }
        },

    },
    actions: {
        async getTranslations({commit}) {
            try {
                await axios.get('/admin/languages/translations')
                    .then((response) => {
                        // commit('setTranslations', response.data.content)
                        commit('setTranslations', response.data.translations)
                    });
            } catch (error) {
                console.log(error);
                throw error
            }
        },
        // async getTranslation({commit}, payload) {
        //     await axios.get('/admin/languages/translations/translations/'+ payload.id, payload);
        // },
        async addTranslation({commit}, payload) {
            try{
                return await axios.post('/admin/languages/translations/store', payload)
                    // .then((response) => {
                    //     commit('addTranslation', payload)
                    // });
            } catch (error) {
                console.log(error);
                throw error
            }
        },
        async updateTranslation({commit}, payload) {
            return await axios.post('/admin/languages/translations/update', payload)
                // .then((response) => {
                //     commit('saveTranslation', payload)
                // });
        },
        async removeTranslation({commit}, payload) {
            return await axios.post('/admin/languages/translations/remove', payload);
                // .then((response) => {
                //     commit('removeTranslation', response.data)
                // });
        },
        async syncTranslation({commit}) {
            return await axios.post('/admin/languages/translations/sync')
                // .then((response) => {
                //     // commit('saveTranslation', payload)
                // });
        },
    }
};
