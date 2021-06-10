const state = {
    volume_items: [
        // {
        //     item: {
        //         id: 1,
        //         title: "",
        //         img: "",
        //         volume: 0,
        //         weight: 0,
        //         object_category_id: null,
        //         position: 0,
        //         is_active: 0
        //     },
        //     quantity: 1
        // }
    ],
}

// getters
const getters = {
    volumeCart: (state, getters, rootState) => {
        return state.volume_items;
    },
    volumeCartTotalCount: (state, getters) => {
        if (state.volume_items.length === 0)
            return 0;

        let sum = 0;
        state.volume_items.forEach((item) => {
            sum += item.quantity
        });
        return sum
    },
    volumeCartTotalVolume: (state, getters) => {
        if (state.volume_items.length === 0)
            return 0;

        let sum = 0;
        state.volume_items.forEach((item) => {
            sum += item.item.volume*item.quantity
        });
        return sum
    },
    volumeCartTotalWeight: (state, getters) => {
        if (state.volume_items.length === 0)
            return 0;

        let sum = 0;
        state.volume_items.forEach((item) => {
            sum += item.item.weight
        });
        return sum
    },
};

// actions
const actions = {
    addVolumeItemToCart({state, commit}, item) {
        commit('pushVolumeItemToCart', item);
        //localStorage.setItem('vuejs__store_go', JSON.stringify(state.go_items));
    },
    incVolumeItemQuantity({state, commit}, id) {
        commit('incrementVolumeItemQuantity', id);
        // localStorage.setItem('vuejs__store_go', JSON.stringify(state.go_items));
    },
    decVolumeItemQuantity({state, commit}, id) {
        commit('decrementVolumeItemQuantity', id);
        // localStorage.setItem('vuejs__store_go', JSON.stringify(state.go_items));
    },
    removeVolumeItem({state, commit}, id) {
        commit('removeVolumeItem', id);
        // localStorage.setItem('vuejs__store_go', JSON.stringify(state.go_items));
    },
    clearVolumeCart({state, commit}) {
        commit('clearAllVolumeItems');
        /// localStorage.setItem('vuejs__store_go', JSON.stringify(state.go_items));
    }
}

// mutations
const mutations = {
    pushVolumeItemToCart(state, item) {
        const cartItem = state.volume_items.find(item => item.item.id === item.id)
        if (!cartItem)
            state.volume_items.push({
                item,
                quantity: 1,
            });
        else
            cartItem.quantity++;

        // localStorage.setItem('VolumeCart', JSON.stringify(state.volume_items));
    },

    incrementVolumeItemQuantity(state, id) {
        const cartItem = state.volume_items.find(item => item.item.id === id)
        cartItem.quantity++;
        // localStorage.setItem('VolumeCart', JSON.stringify(state.volume_items));
    },

    decrementVolumeItemQuantity(state, id) {
        const cartItem = state.volume_items.find(item => item.item.id === id)
        if (cartItem.quantity > 0)
        {
            cartItem.quantity--;
        }
        else {
            this.dispatch('removeVolumeItem', cartItem.id)
        }

        // localStorage.setItem('VolumeCart', JSON.stringify(state.volume_items));
    },
    removeVolumeItem(state, id) {
        let tmp = state.volume_items.filter((item) => item.item.id !== id);
        state.volume_items = tmp
        // localStorage.setItem('VolumeCart', JSON.stringify(state.volume_items));
    },

    clearAllVolumeItems(state) {
        state.volume_items = [];
        // localStorage.setItem('VolumeCart', JSON.stringify(state.volume_items));
        //commit('setCartItems',tmp)
    },


}

export default {
    state,
    getters,
    actions,
    mutations
}
