
const state = {
    all: [],
}

// getters
const getters = {
    all: (state) => {
        return state.all
    },
}

// actions
const actions = {
    getAll({commit}) {
        axios.get('api/products')
        .then(res => res.data.products)
        .then(res => {
            commit('SET_ALL', res)
        })
    }
}

// mutations
const mutations = {
    SET_ALL (state, data) {
        state.all = data
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
