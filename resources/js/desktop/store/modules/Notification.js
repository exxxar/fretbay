const state = {
    notifications: [],

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
    notificationsPaginate: (state, getters, rootState) => {
        return state.paginate || null
    },
    notifications: (state, getters, rootState) => {
        return state.notifications;
    },

};

// actions
const actions = {
    nextNotificationPage({state, commit}, page) {
        commit('setNotificationCurrentPage', page);
    },
    async loadNotifications({state, commit}) {
        return axios
            .get(`/notifications/get?page=${state.paginate.current_page || 1}`)
            .then(resp => {
                commit('setNotifications', resp.data.notifications);

            })
    },


}

// mutations
const mutations = {
    setNotificationCurrentPage(state, payload) {
        state.paginate.current_page = payload
    },
    setNotifications(state, payload) {
        state.notifications = payload.data
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
