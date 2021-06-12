const state = {
    properties: [],
    deleted_properties: [],
};

// getters
const getters = {
    properties: (state, getters, rootState) => {
        return state.properties;
    },
    deleted_properties: (state, getters, rootState) => {
        return state.deleted_properties;
    },
};

// actions
const actions = {
    async getProperties({state, commit}) {
        return axios
            .get('/properties')
            .then(resp => {
                commit('setProperties', resp.data.properties);
            })
    },
    loadProperties({state, commit}) {
        return axios
            .get('/property/get')
            .then(resp => {
                state.properties = resp.data.properties;
                state.deleted_properties = resp.data.deleted_properties;
            });
    },

    async removeProperty({state, commit}, id) {
        let prod = state.properties.findIndex(x => x.id === id)

        if (prod >= 0) {
            let tmp = state.properties[prod];
            tmp.deleted_at = "-";
            state.properties.splice(prod, 1);
            state.deleted_properties.push(tmp)
        }
        return await axios
            .delete(`/property/${id}`)
    },
    async forceDeleteProperty({state, commit}, id) {
        return await axios
            .post(`/property/forceDelete/${id}`)
    },
    async restoreProperty({state, commit}, id) {
        let prod = state.deleted_properties.findIndex(x => x.id === id)

        let item = state.deleted_properties[prod];
        item.deleted_at = null;
        state.deleted_properties.splice(prod, 1)

        state.properties.push(item);

        return await axios
            .post(`/property/restore/${id}`)
    },

    async saveProperty({state, commit}, param) {
        return axios
            .put(`/property/${param.id}`, {
                param: param.key,
                value: param.value
            });
    },
    async addProperty({state, commit}, property) {
        await axios
            .post('/property').then(resp => {
                commit('addProperty', resp.data.property)
            })
    },
}

// mutations
const mutations = {
    setProperties(state, payload) {
        state.properties=payload
    },
    addProperty(state, payload) {
        state.properties.push(payload)
    },
    saveProperty(state, payload) {
        let property = state.properties.findIndex(x => x.id === payload.id)
        state.properties[property] = payload;
    },

}

export default {
    state,
    getters,
    actions,
    mutations
}
