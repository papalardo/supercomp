import Vue from 'vue'
import Vuex from 'vuex'
import VuexPersist from 'vuex-persist'

// Territory
import user from './modules/user'
import products from './modules/products'
import comparatives from './modules/comparatives'

Vue.use(Vuex)

const vuexPersist = new VuexPersist({
  key: 'my-app',
  storage: localStorage
})

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        user,
        products,
        comparatives,
    },
    plugins: [vuexPersist.plugin],
    strict: debug,
    // plugins: debug ? [createLogger()] : []
})
