export default {
    state: {
        typeOfTransportModule: JSON.parse(localStorage.getItem("TypeOfTransportModule")) || [
            {
                id: 1,
                title: "Example",
                img: "",
                position: 0,//позиция сортировки

            }
        ]

    },

    getters: {
        typeOfTransportModule(state) {
            return state.typeOfTransportModule;
        },
    },
    actions: {
        getTypeOfTransportAction({commit}, payload) {
            axios.get('get-type-of-transport').then((response) => {
                commit('getTypeOfTransport', response.data);
            });
        },
    },
    mutations: {
        getTypeOfTransport(state, payload) {
            state.typeOfTransportModule = payload;
            localStorage.setItem("TypeOfTransportModule", JSON.stringify(state.typeOfTransportModule));
        },
    }
};
