export default {
    state: {
        languages: [],
        groups:[],
    },
    getters: {
        languages(state) {
            return state.languages;
        },
        groups(state) {
            return state.groups;
        },
    },
    mutations: {
        addLanguage(state, payload) {
            state.languages.push(payload)
        },
        setLanguages(state, payload) {
            state.languages = payload
        },
        saveLanguage(state, payload) {
            let language = state.languages.findIndex(item => item.id === payload.id);
            Vue.set(state.languages, language, payload)
            // state.languages[language] = payload;
        },
        removeLanguage(state, payload) {
            let language = state.languages.findIndex(item => item.id === payload.id);
            if (language >= 0) {
                state.languages.splice(language, 1);
            }
        },
        setGroups(state, payload) {
            state.groups = payload
        },
    },
    actions: {
        async getLanguages({commit}) {
            try {
                await axios({
                    method: 'get',
                    url: '/admin/languages/get',
                    data: {},
                })
                    .then((response) => {
                        // commit('setLanguages', response.data.content)
                        commit('setLanguages', response.data.languages)
                    });
            } catch (error) {
                console.log(error);
                throw error
            }
        },
        async getLanguage({commit}, payload) {
            await axios.get('/admin/languages/'+ payload.id, payload);
        },
        async addLanguage({commit}, payload) {
            try{
                return await axios.post('/admin/languages/store', payload)
                    // .then((response) => {
                    //     commit('addLanguage', response.data.language)
                    // });
            } catch (error) {
                console.log(error);
                throw error
            }
        },
        async updateLanguage({commit}, payload) {
            return await axios.post('/admin/languages/update', payload)
                // .then((response) => {
                //     commit('saveLanguage', response.data.language)
                // });
        },
        async removeLanguage({commit}, payload) {
            return await axios.post('/admin/languages/remove', payload)
        },
        async getGroups({commit}) {
            try {
                await axios({
                    method: 'get',
                    url: '/admin/languages/groups',
                    data: {},
                })
                    .then((response) => {
                        commit('setGroups', response.data.groups)
                    });
            } catch (error) {
                console.log(error);
                throw error
            }
        },
        async syncLanguages() {
            try{
                return await axios.post('/admin/languages/sync');
            } catch (error) {
                console.log(error);
                throw error
            }
        }
    }
};
