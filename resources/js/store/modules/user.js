
const state = {
    single: {}
}

// getters
const getters = {
    single: (state) => {
        return state.single
    },
}

// actions
const actions = {
    async update({ commit }, data) {
        commit('SET_SINGLE', data)
    },
}

// mutations
const mutations = {
    SET_SINGLE (state, data) {
        state.single = data
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
