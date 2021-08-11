const state = {
    categories: [],
    deleted_categories: [],
};

// getters
const getters = {
    categories: (state, getters, rootState) => {

        // for (let index in state.categories)
        // {
        //     state.categories[index].title = Object.entries(state.categories[index].title).find(item=>item[0]===window.locale)[1];
        // }

        return state.categories
    },
    deleted_categories: (state, getters, rootState) => {
        return state.deleted_categories;
    },
};

// actions
const actions = {
    async getCategories({state, commit}) {
        let locale = localStorage.getItem('locale') || 'en';
        return axios
            .get('/api/categories/'+locale)
            .then(resp => {
                commit('setCategories', resp.data.categories);
            })
    },
    loadCategories({state, commit}) {
        return axios
            .get('/category/get')
            .then(resp => {
                state.categories = resp.data.categories;
                state.deleted_categories = resp.data.deleted_categories;
            });
    },

    async removeCategory({state, commit}, id) {
        let prod = state.categories.findIndex(x => x.id === id)

        if (prod >= 0) {
            let tmp = state.categories[prod];
            tmp.deleted_at = "-";
            state.categories.splice(prod, 1);
            state.deleted_categories.push(tmp)
        }
        return await axios
            .delete(`/category/${id}`)
    },
    async forceDeleteCategory({state, commit}, id) {
        return await axios
            .post(`/category/forceDelete/${id}`)
    },
    async restoreCategory({state, commit}, id) {
        let prod = state.deleted_categories.findIndex(x => x.id === id)

        let item = state.deleted_categories[prod];
        item.deleted_at = null;
        state.deleted_categories.splice(prod, 1)

        state.categories.push(item);

        return await axios
            .post(`/category/restore/${id}`)
    },

    async saveCategory({state, commit}, param) {
        return axios
            .put(`/category/${param.id}`, {
                param: param.key,
                value: param.value
            });
    },
    async addCategory({state, commit}, category) {
        await axios
            .post('/category').then(resp => {
                commit('addCategory', resp.data.category)
            })
    },
    async addCategorySubcategory ({state, commit}, tag) {
        return await axios.post('/category/addSubcategory',tag)
    },
    async removeCategorySubcategory({state, commit}, data) {
        await axios.post('/category/removeSubcategory', data).then(resp => {
        });
    },
}

// mutations
const mutations = {
    setCategories(state, payload) {
        state.categories=payload
    },
    addCategory(state, payload) {
        state.categories.push(payload)
    },
    saveCategory(state, payload) {
        let category = state.categories.findIndex(x => x.id === payload.id)
        state.categories[category] = payload;
    },
    addCategorySubcategory(state, payload) {
        let category = state.categories.findIndex(x => x.id === payload.category_id)
        let item = state.categories[category];
        item.subcategories.push(payload)
    },
    removeCategorySubcategory(state, payload) {
        let category = state.categories.findIndex(x => x.id === payload.category_id)
        let subcategory = state.categories[category].subcategories.findIndex(x => x.id === payload.subcategory_id)
        if( subcategory !== -1) {
            state.categories[category].subcategories.splice(subcategory, 1);
        }
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
