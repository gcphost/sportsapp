import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {path: '/', component: require('./views/teams/index.vue')},
        {path: '/team/create', component: require('./views/teams/create.vue')},
        {path: '/team/:id/create', component: require('./views/players/create.vue')},
        {path: '/player/:playerId', component: require('./views/players/create.vue')},
        {path: '/team/:id', component: require('./views/teams/item.vue')},
    ]
})

export default router