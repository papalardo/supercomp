
const state = {
    comparatives: [],
}

// getters
const getters = {
    all: (state) => {
        return state.comparatives
    },
}

// actions
const actions = {
    async search({ commit }, data) {
        commit('SET_ALL', [])

        await axios.post('api/comparate', { checklist: data })
        .then(res => res.data)
        .then(res => {
            res.products = _.toArray(res.products)
            res.products.map(e => {
                e.doesntHave = _.toArray(e.doesntHave);
            })
            commit('SET_ALL', res.products)
        })
    },
}

// mutations
const mutations = {
    SET_ALL (state, data) {
        state.comparatives = data
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
