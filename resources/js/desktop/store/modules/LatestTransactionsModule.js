export default {
    state: {
        latestTransactionsModule: JSON.parse(localStorage.getItem("LatestTransactionsModule")) || [
            {
                id: 1,
                title: "Example",
                img: "",
                position: 0,//позиция сортировки

            }
        ]

    },

    getters: {
        latestTransactionsModule(state) {
            return state.latestTransactionsModule;
        },
    },
    actions: {
        getLatestTransactionsModuleAction({commit}, payload) {
            axios.get('get-latest-transactions').then((response) => {
                commit('getLatestTransactions', response.data);
            });
        },
    },
    mutations: {
        getLatestTransactions(state, payload) {
            state.latestTransactionsModule = payload;
            localStorage.setItem("LatestTransactionsModule", JSON.stringify(state.latestTransactionsModule));
        },
    }
};
