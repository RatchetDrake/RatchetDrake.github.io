import Vue from 'vue'
import VueRouter from 'vue-router'
import InscriptionView from '../views/InscriptionView.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/register',
    name: 'inscription',
    component: InscriptionView
  }
]

const router = new VueRouter({
  routes
})

export default router
