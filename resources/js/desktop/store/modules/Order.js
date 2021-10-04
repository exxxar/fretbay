const state = {
    orders: [],
    deleted_orders: [],
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
    ordersPaginate: (state, getters, rootState) => {
        return state.paginate || null
    },
    userOrders: (state, getters, rootState) => {
       /* if (window.user)
            return state.orders.filter(item => item.user_id === window.user.id)
        else
            return [];*/

       return state.orders
    },
    orders: (state, getters, rootState) => {
        return state.orders;
    },
    deleted_orders: (state, getters, rootState) => {
        return state.deleted_orders;
    },
};

// actions
const actions = {
    nextOrderPage({state, commit}, page) {
        commit('setOrderCurrentPage', page);
    },
    async getActiveOrders({state, commit}) {
        return axios
            .get(`/orders/active?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setOrders', resp.data.orders || []);
            })
    },
    async getArchiveOrders({state, commit}) {
        return axios
            .get(`/orders/archive?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setOrders', resp.data.orders || []);
            })
    },
    async getOrders({state, commit}) {
        return axios
            .get(`/orders/list?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setOrders', resp.data.orders);
            })
    },
    async getFilteredOrders({state, commit}, filter) {

        return axios
            .post(`/orders/filtered?page=${state.paginate.current_page || 1}`, filter)
            .then(resp => {
                commit('setOrders', resp.data.orders);
            })
    },
    loadOrders({state, commit}) {
        return axios
            .get('/orders/get')
            .then(resp => {
                state.orders = resp.data.orders;
                state.deleted_orders = resp.data.deleted_orders;
            });
    },

    async removeOrder({state, commit}, id) {
        let prod = state.orders.findIndex(x => x.id === id)

        if (prod >= 0) {
            let tmp = state.orders[prod];
            tmp.deleted_at = "-";
            state.orders.splice(prod, 1);
            state.deleted_orders.push(tmp)
        }
        return await axios
            .delete(`/orders/${id}`)
    },
    async forceDeleteOrder({state, commit}, id) {
        return await axios
            .post(`/orders/forceDelete/${id}`)
    },
    async restoreOrder({state, commit}, id) {
        let prod = state.deleted_orders.findIndex(x => x.id === id)

        let item = state.deleted_orders[prod];
        item.deleted_at = null;
        state.deleted_orders.splice(prod, 1)

        state.orders.push(item);

        return await axios
            .post(`/orders/restore/${id}`)
    },

    async addOrder({state, commit}, order) {
        return await axios
            .post('/orders/accept', order, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
            });
    },
}

// mutations
const mutations = {
    setOrderCurrentPage(state, payload) {
        state.paginate.current_page = payload
    },
    setOrders(state, payload) {
        state.orders = payload.data
        state.paginate = payload
        delete state.paginate.data;

    },
    addOrder(state, payload) {
        state.orders.push(payload)
    },
    saveOrder(state, payload) {
        let order = state.orders.findIndex(x => x.id === payload.id)
        state.orders[order] = payload;
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
