import VueRouter from 'vue-router'

function load(component) {
    return require(`../views/${component}.vue`)
}

const routes = [
    {
        path: '/',
        component: load('index')
    },
    {
        path: '/products',
        component: load('products')
    },
    {
        path: '/comparatives',
        component: load('comparatives')
    },
    // {
    //     path: '/login',
    //     meta: {
    //         layout: 'login'
    //     },
    //     component: load('login'),
    // },
    // {
    //     path: '/register',
    //     meta: {
    //         layout: 'login'
    //     },
    //     component: load('register'),
    // },

]

const router = new VueRouter({
    linkActiveClass: "active", // active class for non-exact links.
    linkExactActiveClass: "", // active class for *exact* links.
    routes // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
    if(to.path == '/logout') {
        localStorage.removeItem('token')
        localStorage.removeItem('token_expires')
        next({ path: '/login' })
    }
    if(to.meta && to.meta.auth && !localStorage.getItem('token')) next({ path: 'login' })
    next()
})

export default router
