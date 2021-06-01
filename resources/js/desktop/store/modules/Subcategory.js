const state = {
    subcategories: [],
    deleted_subcategories: [],
};

// getters
const getters = {
    subcategories: (state, getters, rootState) => {
        return state.subcategories;
    },
    deleted_subcategories: (state, getters, rootState) => {
        return state.deleted_subcategories;
    },
};

// actions
const actions = {
    loadData({state, commit}) {
        return axios
            .get('/subcategory/get')
            .then(resp => {
                state.subcategories = resp.data.subcategories;
                state.deleted_subcategories = resp.data.deleted_subcategories;
            });
    },

    async removeSubcategory({state, commit}, id) {
        let prod = state.subcategories.findIndex(x => x.id === id)

        if (prod >= 0) {
            let tmp = state.subcategories[prod];
            tmp.deleted_at = "-";
            state.subcategories.splice(prod, 1);
            state.deleted_subcategories.push(tmp)
        }
        return await axios
            .delete(`/subcategory/${id}`)
    },
    async forceDeleteSubcategory({state, commit}, id) {
        return await axios
            .post(`/subcategory/forceDelete/${id}`)
    },
    async restoreSubcategory({state, commit}, id) {
        let prod = state.deleted_subcategories.findIndex(x => x.id === id)

        let item = state.deleted_subcategories[prod];
        item.deleted_at = null;
        state.deleted_subcategories.splice(prod, 1)

        state.subcategories.push(item);

        return await axios
            .post(`/subcategory/restore/${id}`)
    },

    async saveSubcategory({state, commit}, param) {
        return axios
            .put(`/subcategory/${param.id}`, {
                param: param.key,
                value: param.value
            });
    },
    async addSubcategory({state, commit}, subcategory) {
        await axios
            .post('/subcategory').then(resp => {
                commit('addSubcategory', resp.data.subcategory)
            })
    },
    async addSubcategoryThing ({state, commit}, tag) {
        return await axios.post('/subcategory/addSubcategory',tag)
    },
    async removeSubcategoryThing ({state, commit}, data) {
        await axios.post('/subcategory/removeThing', data).then(resp => {
        });
    },
}

// mutations
const mutations = {
    addSubcategory(state, payload) {
        state.subcategories.push(payload)
    },
    saveSubcategory(state, payload) {
        let subcategory = state.subcategories.findIndex(x => x.id === payload.id)
        state.subcategories[subcategory] = payload;
    },
    addSubcategoryThing(state, payload) {
        let subcategory = state.subcategories.findIndex(x => x.id === payload.subcategory_id)
        let item = state.subcategories[subcategory];
        item.things.push(payload)
    },
    removeSubcategoryThing(state, payload) {
        let subcategory = state.subcategories.findIndex(x => x.id === payload.subcategory_id)
        let thing = state.subcategories[subcategory].things.findIndex(x => x.id === payload.thing_id)
        if( thing !== -1) {
            state.subcategories[subcategory].things.splice(thing, 1);
        }
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
