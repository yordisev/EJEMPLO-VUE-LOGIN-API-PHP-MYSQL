import Vue from 'vue'
import VueRouter from 'vue-router'
import Inicio from '../views/Inicio.vue'
import Login from '../views/Login.vue'
import Usuarios from '../views/Usuarios.vue'
import Personas from '../views/Personas.vue'

Vue.use(VueRouter)

const routes = [{
        path: '/',
        name: 'Login',
        component: Login
    },
    {
        path: '/inicio',
        name: 'inicio',
        component: Inicio,
        meta: { requiresAuth: true }
    },
    {
        path: '/usuarios',
        name: 'usuarios',
        component: Usuarios,
        meta: { requiresAuth: true }
    },
    {
        path: '/personas',
        name: 'personas',
        component: Personas,
        meta: { requiresAuth: true }
    },
]

const router = new VueRouter({
    routes
})


function existToken() {
    var peticiontoken = localStorage.getItem("tokenautorizacion");
    return peticiontoken;

}

router.beforeEach(async(to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
    if (requiresAuth && !(await existToken())) {
        next('/')
    } else {
        next()
    }
});


export default router