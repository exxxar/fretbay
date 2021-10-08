const state = {
    reviews: [],
    completed_orders_without_comment: [],
    deleted_reviews: [],
    review_types: [
        {
            id: 0,
            data: '<i class="far fa-angry"></i>',
            description: 'You were dissatisfied with the work of the carrier'
        },
        {
            id: 1,
            data: '<i class="far fa-meh"></i>',
            description: 'You are neutral about the work of the carrier'
        },
        {
            id: 2,
            data: '<i class="far fa-smile"></i>',
            description: 'You liked the quality of the carrier\'s services'
        }
    ],
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
    completedOrdersWithoutComment: (state, getters, rootState) => {
        return state.completed_orders_without_comment
    },
    reviewTypes: (state, getters, rootState) => {
        return state.review_types
    },
    reviewsPaginate: (state, getters, rootState) => {
        return state.paginate || null
    },
    reviews: (state, getters, rootState) => {
        return state.reviews;
    },
    deleted_reviews: (state, getters, rootState) => {
        return state.deleted_reviews;
    },
};

// actions
const actions = {
    nextReviewPage({state, commit}, page) {
        commit('setReviewCurrentPage', page);
    },
    async getOrdersWithoutReviews({state, commit}) {
        axios.get("/orders/without_review").then(resp => {
            commit('setOrdersWithoutReviews', resp.data.orders || []);

        })
    },
    async getActiveReviews({state, commit}) {
        return axios
            .get(`/reviews/active?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setReviews', resp.data.reviews || []);
            })
    },
    async getArchiveReviews({state, commit}) {
        return axios
            .get(`/reviews/archive?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setReviews', resp.data.reviews || []);
            })
    },
    async getReviews({state, commit}) {
        return axios
            .get(`/reviews/list?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setReviews', resp.data.reviews);
            })
    },
    async getFilteredReviews({state, commit}, filter) {

        return axios
            .post(`/reviews/filtered?page=${state.paginate.current_page || 1}`, filter)
            .then(resp => {
                commit('setReviews', resp.data.reviews);
            })
    },
    loadReviews({state, commit}) {
        return axios
            .get('/reviews/list')
            .then(resp => {
                state.reviews = resp.data.reviews;
                state.deleted_reviews = resp.data.deleted_reviews;
            });
    },

    async removeReview({state, commit}, id) {
        let prod = state.reviews.findIndex(x => x.id === id)

        if (prod >= 0) {
            let tmp = state.reviews[prod];
            tmp.deleted_at = "-";
            state.reviews.splice(prod, 1);
            state.deleted_reviews.push(tmp)
        }
        return await axios
            .delete(`/reviews/${id}`)
    },
    async forceDeleteReview({state, commit}, id) {
        return await axios
            .post(`/reviews/forceDelete/${id}`)
    },
    async restoreReview({state, commit}, id) {
        let prod = state.deleted_reviews.findIndex(x => x.id === id)

        let item = state.deleted_reviews[prod];
        item.deleted_at = null;
        state.deleted_reviews.splice(prod, 1)

        state.reviews.push(item);

        return await axios
            .post(`/reviews/restore/${id}`)
    },

    async addReview({state, commit}, review) {
        return await axios.post('/reviews/add', review)
    },
}

// mutations
const mutations = {
    setReviewCurrentPage(state, payload) {
        state.paginate.current_page = payload
    },
    setReviews(state, payload) {
        state.reviews = payload.data
        state.paginate = payload
        delete state.paginate.data;

    },
    setOrdersWithoutReviews(state, payload) {
        state.completed_orders_without_comment = payload;
    },
    addReview(state, payload) {
        state.reviews.push(payload)
    },
    saveReview(state, payload) {
        let review = state.reviews.findIndex(x => x.id === payload.id)
        state.reviews[review] = payload;
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
