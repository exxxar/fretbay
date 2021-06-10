const state = {
    listings: [],
    deleted_listings: [],
};

// getters
const getters = {
    listings: (state, getters, rootState) => {
        return state.listings;
    },
    deleted_listings: (state, getters, rootState) => {
        return state.deleted_listings;
    },
};

// actions
const actions = {
    async getListings({state, commit}) {
        return axios
            .get('/listings')
            .then(resp => {
                commit('setListings', resp.data.listings);
            })
    },
    loadListings({state, commit}) {
        return axios
            .get('/listing/get')
            .then(resp => {
                state.listings = resp.data.listings;
                state.deleted_listings = resp.data.deleted_listings;
            });
    },

    async removeListing({state, commit}, id) {
        let prod = state.listings.findIndex(x => x.id === id)

        if (prod >= 0) {
            let tmp = state.listings[prod];
            tmp.deleted_at = "-";
            state.listings.splice(prod, 1);
            state.deleted_listings.push(tmp)
        }
        return await axios
            .delete(`/listing/${id}`)
    },
    async forceDeleteListing({state, commit}, id) {
        return await axios
            .post(`/listing/forceDelete/${id}`)
    },
    async restoreListing({state, commit}, id) {
        let prod = state.deleted_listings.findIndex(x => x.id === id)

        let item = state.deleted_listings[prod];
        item.deleted_at = null;
        state.deleted_listings.splice(prod, 1)

        state.listings.push(item);

        return await axios
            .post(`/listing/restore/${id}`)
    },

    async saveListing({state, commit}, param) {
        return axios
            .put(`/listing/${param.id}`, {
                param: param.key,
                value: param.value
            });
    },
    async addListing({state, commit}, listing) {
        await axios
            .post('/listing').then(resp => {
                commit('addListing', resp.data.listing)
            })
    },
}

// mutations
const mutations = {
    setListings(state, payload) {
        state.listings=payload
    },
    addListing(state, payload) {
        state.listings.push(payload)
    },
    saveListing(state, payload) {
        let listing = state.listings.findIndex(x => x.id === payload.id)
        state.listings[listing] = payload;
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
