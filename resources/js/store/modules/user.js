
const state = {
    single: {
        name: '',
        checklist: []
    }
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
    async setChecklist({ commit }, data) {
        commit('SET_CHECKLIST', data)
    },
}

// mutations
const mutations = {
    SET_SINGLE (state, data) {
        state.single.name = data
    },
    SET_CHECKLIST(state, data) {
        state.single.checklist = data
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
