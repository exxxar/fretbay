export default {
    state: {
        vehicleModule: JSON.parse(localStorage.getItem("VehicleModule")) || [
            {
                id: 1,
                title: "Example",
            }
        ]

    },

    getters: {
        vehicleModule(state) {
            return state.vehicleModule;
        },
    },
    actions: {
        getVehiclesAction({commit}, payload) {
            axios.get('get-vehicles').then((response) => {
                commit('getVehicles', response.data);
            });
        },
    },
    mutations: {
        getVehicles(state, payload) {
            state.typeOfObjectModule = payload;
            localStorage.setItem("VehicleModule", JSON.stringify(state.vehicleModule));
        },
    }
};
