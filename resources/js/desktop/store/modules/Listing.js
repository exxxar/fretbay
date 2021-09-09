const state = {
    listings: [],
    deleted_listings: [],
    paginate: {
        first_page_url: null,
        from: 1,
        last_page: 1,
        last_page_url: null,
        next_page_url: null,
        path: null,
        per_page: 15,
        prev_page_url: null,
        to: 5,
        total: 5,
        current_page: 1
    }
};

// getters
const getters = {
    listingsPaginate: (state, getters, rootState) => {
        return state.paginate || null
    },
    userListings: (state, getters, rootState) => {
        if (window.user)
            return state.listings.filter(item => item.user_id === window.user.id)
        else
            return [];
    },
    listings: (state, getters, rootState) => {
        return state.listings;
    },
    deleted_listings: (state, getters, rootState) => {
        return state.deleted_listings;
    },
};

// actions
const actions = {
    nextListingPage({state, commit}, page) {
        commit('setListingCurrentPage', page);
    },
    async getActiveListings({state, commit}) {
        return axios
            .get(`/listing/active?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setListings', resp.data.listings || []);
            })
    },
    async getArchiveListings({state, commit}) {
        return axios
            .get(`/listing/archive?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setListings', resp.data.listings || []);
            })
    },
    async getListings({state, commit}) {
        return axios
            .get(`/api/listings?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setListings', resp.data.listings);
            })
    },
    async getFilteredListings({state, commit}, filter) {

        return axios
            .post(`/api/listings/filtered?page=${state.paginate.current_page || 1}`, filter)
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
        return await axios
            .post('/api/listing', listing, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
            });
    },
}

// mutations
const mutations = {
    setListingCurrentPage(state, payload) {
        state.paginate.current_page = payload
    },
    setListings(state, payload) {
        state.listings = payload.data
        state.paginate = payload
        delete state.paginate.data;

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
