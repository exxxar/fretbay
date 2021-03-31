export default {
    state: {
        topMoversModule: JSON.parse(localStorage.getItem("TopMoversModule")) || [

        ]

    },

    getters: {
        topMoversModule(state) {
            return state.topMoversModule;
        },
    },
    actions: {
        getTopMoversAction({commit}, payload) {
            axios.get('get-top-movers').then((response) => {
                commit('getTopMovers', response.data);
            });
        },
    },
    mutations: {
        getTopMovers(state, payload) {
            state.topMoversModule = payload;
            localStorage.setItem("TopMoversModule", JSON.stringify(state.topMoversModule));
        },
    }
};
