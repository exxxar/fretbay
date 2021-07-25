const state = {
    favorites: [],

    paginate: {
        first_page_url: null,
        from: 1,
        last_page: 1,
        last_page_url: null,
        next_page_url: null,
        path: null,
        per_page: 10,
        prev_page_url: null,
        to: 5,
        total: 5,
        current_page: 1
    }
};

// getters
const getters = {
    favoritesPaginate: (state, getters, rootState) => {
        return state.paginate || null
    },

    favorites: (state, getters, rootState) => {
        return state.favorites;
    },

};

// actions
const actions = {
    nextFavoritePage({state, commit}, page) {
        commit('setFavoriteCurrentPage', page);
    },
    async loadFavorites({state, commit}) {
        return axios
            .get(`/listing/favorites/get?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setFavorites', resp.data.favorites);

            })
    },


}

// mutations
const mutations = {
    setFavoriteCurrentPage(state, payload) {
        state.paginate.current_page = payload
    },
    setFavorites(state, payload) {
        state.favorites = payload.data
        state.paginate = payload
        delete state.paginate.data;

    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
