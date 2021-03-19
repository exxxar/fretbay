export default {
    state: {
        typeOfObjectModule: JSON.parse(localStorage.getItem("TypeOfObjectModule")) || [
            {
                id: 1,
                title: "Example",
                img: "",
                position: 0,//позиция сортировки

            }
        ]

    },

    getters: {
        typeOfObjectModule(state) {
            return state.typeOfObjectModule;
        },
    },
    actions: {
        getTypeOfObjectAction({commit}, payload) {
            axios.get('get-type-of-object').then((response) => {
                commit('getTypeOfObject', response.data);
            });
        },
    },
    mutations: {
        getTypeOfObject(state, payload) {
            state.typeOfObjectModule = payload;
            localStorage.setItem("TypeOfObjectModule", JSON.stringify(state.typeOfObjectModule));
        },
    }
};
