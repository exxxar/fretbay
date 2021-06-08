const state = {
    step: 0,
    listing:{
        title:'',
        mode:'',
        category:'',
        moving_package:'',
        thing:'',
        volume:'',
        articles:[],
        volume_items:[],
        place_of_loading:'',
        place_of_delivery:'',
        shipping_date_from:'',
        shipping_date_to:'',
        unshipping_date_from:'',
        unshipping_date_to:'',
        messages:[],
        additional_info:'',
        images:[],
        status:'',
    }
};

// getters
const getters = {
    step: (state, getters, rootState) => {
        return state.step;
    },
    listing: (state, getters, rootState) => {
        return state.listing;
    },
};
// actions
const actions = {
    setStep({state, commit}, step) {
        commit('setStep', step);
    },
    editNewListing({state, commit}, param) {
        commit('editNewListing', param);
    },
};
// mutations
const mutations = {
    setStep(state, payload) {
        state.step = payload;
    },
    editNewListing(state, payload) {
        state.listing[payload.key] = payload.value;
    },
};
export default {
    state,
    getters,
    actions,
    mutations
}
