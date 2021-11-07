const state = {
    payments: [],

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
    paymentsPaginate: (state, getters, rootState) => {
        return state.paginate || null
    },
    payments: (state, getters, rootState) => {
        return state.payments;
    },

};

// actions
const actions = {
    nextPaymentPage({state, commit}, page) {
        commit('setPaymentCurrentPage', page);
    },
    async loadPayments({state, commit}) {
        return axios
            .get(`/payments/get?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setPayments', resp.data.payments);

            })
    },


}

// mutations
const mutations = {
    setPaymentCurrentPage(state, payload) {
        state.paginate.current_page = payload
    },
    setPayments(state, payload) {
        state.payments = payload.data
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
