const state = {
    user: '',
    vehicles:[],
    documents:{},
    first_activation_steps: JSON.parse(localStorage.getItem("first_activation_steps")) || {
        step1:false,
        step2:false,
        step3:false,
        step4:false,
        step5:false,
    }
};

// getters
const getters = {
    user: (state, getters, rootState) => {
        return state.user;
    },
    vehicles: (state, getters, rootState) => {
        return state.vehicles;
    },
    documents: (state, getters, rootState) => {
        return state.documents;
    },
    profile: (state, getters, rootState) => {
        return state.user.profile;
    },
    first_activation_steps: (state, getters, rootState) => {
        return state.first_activation_steps;
    },
};

// actions
const actions = {
    async getUser({state, commit}) {
        return await axios
            .get('/auth/user')
            .then(resp => {
                commit('setUser', resp.data.user);
                commit('setVehicles', resp.data.vehicles);
                commit('setDocuments', resp.data.documents);
            })
    },

    setUser({state, commit}, payload) {
        commit('setUser', payload);
    },
    saveUser({state, commit}, payload) {
        commit('saveUser', payload);
    },
    setProfile({state, commit}, payload) {
        commit('setProfile', payload);
    },
    saveProfile({state, commit}, payload) {
        commit('saveProfile', payload);
    },
    setVehicles({state, commit}, payload) {
        commit('setVehicles', payload);
    },
    setVehicle({state, commit}, payload) {
        commit('setVehicle', payload);
    },
    addVehicle({state, commit}, payload) {
        commit('addVehicle', payload);
    },
    removeVehicle({state, commit}, payload) {
        commit('removeVehicle', payload);
    },
    saveVehicle({state, commit}, payload) {
        commit('saveVehicle', payload);
    },

    setDocuments({state, commit}, payload) {
        commit('setDocuments', payload);
    },
    // async saveUser({state, commit}, param) {
    //     return axios
    //         .put(`/listing/${param.id}`, {
    //             param: param.key,
    //             value: param.value
    //         });
    // },
    setStep({state, commit}, payload) {
        commit('setStep', payload);
    }
}

// mutations
const mutations = {
    setUser(state, payload) {
        state.user = payload
    },
    saveUser(state, payload) {
        state.user[payload.key] = payload.value
    },
    setProfile(state, payload) {
        state.user.profile = payload;
    },
    saveProfile(state, payload) {
        state.user.profile[payload.key] = payload.value
    },
    setVehicles(state, payload) {
        // state.user.profile.vehicles = payload;
        state.vehicles = payload;
    },
    setVehicle(state, payload) {
        // let index = state.user.profile.vehicles.findIndex(item => item.id == payload.id);
        // state.user.profile.vehicles[index] = payload;
        let index1 = state.vehicles.findIndex(item => item.id == payload.id);
        // state.vehicles[index1] = payload;
        Vue.set(state.vehicles, index1, payload);
        console.log('state.vehicles[index1]', state.vehicles[index1], index1)
    },
    addVehicle(state, payload) {
        // state.user.profile.vehicles.push(payload);
        state.vehicles.push(payload);
    },
    removeVehicle(state, payload) {
        // let index = state.user.profile.vehicles.findIndex(item => item.id === payload);
        // state.user.profile.vehicles.splice(index, 1);
        let index = state.vehicles.findIndex(item => item.id === payload);
        state.vehicles.splice(index, 1);
    },
    saveVehicle(state, payload) {
        // let index = state.user.profile.vehicles.findIndex(item => item.id == payload.id);
        // state.user.profile.vehicles[index][payload.key] = payload.value;
        let index = state.vehicles.findIndex(item => item.id == payload.id);
        state.vehicles[index][payload.key] = payload.value;
    },

    setDocuments(state, payload) {
        state.documents = {};
        payload.forEach(item => {
            if(item.type == 1) {
                state.documents['company_info']=item.document;
                state.documents.company_info.is_approved = item.is_approved;
                state.documents.company_info.id = item.id;
                state.documents.company_info.is_created = true;
            }
            if(item.type == 2) {
                state.documents['manager_card']=item.document;
                state.documents.manager_card.is_approved = item.is_approved;
                state.documents.manager_card.id = item.id;
                state.documents.manager_card.is_created = true;
            }
            if(item.type == 3) {
                state.documents['transport_license']=item.document;
                state.documents.transport_license.id = item.id;
                state.documents.transport_license.is_approved = item.is_approved;
                state.documents.transport_license.is_created = true;
            }
            if(item.type == 4) {
                state.documents['certificate_insurance']=item.document;
                state.documents.certificate_insurance.id = item.id;
                state.documents.certificate_insurance.is_approved = item.is_approved;
                state.documents.certificate_insurance.is_created = true;
            }
        });
        if(!state.documents.company_info)
        {
            state.documents.company_info = {
                id:'',
                manager_first_name:'',
                manager_last_name:'',
                id_number:'',
                creation_date:'',
                company_name:'',
                address:'',
                city:'',
                postal_code:'',
                country:'',
                document_images:[],
                comment:'',
                new_images:[],
                deleted_images:[],
                front_image:'',
                back_image:'',
                is_created: false
            };
        }
        if(!state.documents.manager_card)
        {
            state.documents.manager_card = {
                id:'',
                id_card_number:'',
                issue_date:'',
                expiry_date:'',
                document_images:[],
                comment:'',
                new_images:[],
                deleted_images:[],
                is_created: false
            }
        }
        if(!state.documents.transport_license)
        {
            state.documents.transport_license = {
                id:'',
                license_number:'',
                issue_date:'',
                expiry_date:'',
                document_images:[],
                comment:'',
                new_images:[],
                deleted_images:[],
                is_created: false
            }
        }
        if(!state.documents.certificate_insurance) {
            state.documents.certificate_insurance = {
                id:'',
                insurance_company:'',
                amount_insured:'',
                start_date:'',
                end_date:'',
                document_images:[],
                comment:'',
                new_images:[],
                deleted_images:[],
                is_created: false
            }
        }
    },

    setStep(state, payload) {
        state.first_activation_steps[payload.key] = payload.value;
        localStorage.setItem("first_activation_steps", JSON.stringify(state.first_activation_steps));
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
