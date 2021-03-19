const state = {
    article_items: JSON.parse(localStorage.getItem('ArticleCart')) || [
        {
            item: {
                id: 1,//uuid
                category_title: "",
                title: "",
                can_moving:null,
                accept_conveyors: null,
                is_fragile_goods: false,
                properties: [
                    {
                        key: 'estimated value',
                        value: 0,
                        units: '$'
                    },
                    {
                        key: 'make',
                        value: 'Test',
                    },
                    {
                        key: 'model',
                        value: 'Test',
                    },
                    {
                        key: 'length',
                        value: 0,
                        units: 'cm'
                    },
                    {
                        key: 'width',
                        value: 0,
                        units: 'cm'
                    },

                    {
                        key: 'height',
                        value: 0,
                        units: 'cm'
                    },
                    {
                        key: 'weight',
                        value: 0,
                        units: 'kg'
                    },

                    {
                        key: 'quantity',
                        value: 0,
                    },


                ]
            },
        }
    ],
}

// getters
const getters = {
    articleCart: (state, getters, rootState) => {
        return state.article_items;
    },
    articleCartTotalCount: (state, getters) => {
        return state.article_items.length
    },
}

// actions
const actions = {
    addArticleItemToCart({state, commit}, item) {
        commit('pushArticleItemToCart', item);
    },

    setArticleItemInCart({state, commit}, item) {
        commit('changeArticleItemInCart', item);
    },
    removeArticleItem({state, commit}, id) {
        commit('removeArticleItem', id);
    },
    clearArticleCart({state, commit}) {
        commit('clearAllArticleItems');
    }
}

// mutations
const mutations = {
    pushArticleItemToCart(state, item) {
        state.article_items.push({
            item,
        })

        localStorage.setItem('ArticleCart', JSON.stringify(state.article_items));
    },

    changeArticleItemInCart(state, item) {
        const cartItem = state.article_items.find(item => item.item.id === item.id)
        cartItem.item = item;
        localStorage.setItem('ArticleCart', JSON.stringify(state.article_items));
    },

    removeArticleItem(state, id) {
        let tmp = state.article_items.filter((item) => item.item.id !== id);
        state.article_items = tmp
        localStorage.setItem('ArticleCart', JSON.stringify(state.article_items));
    },

    clearAllArticleItems(state) {
        state.article_items = []
        localStorage.setItem('ArticleCart', JSON.stringify(state.article_items));
    },


}

export default {
    state,
    getters,
    actions,
    mutations
}
