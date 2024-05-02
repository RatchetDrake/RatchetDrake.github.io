import Vue from 'vue'
import VueRouter from 'vue-router'

import TableauVue from '@/views/TableauVue.vue'
import ClickMe from '@/views/ClickMe.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: TableauVue
  }, 
  {
    path: '/clickme',
    name: 'clickme',
    component: ClickMe
  }
]

const router = new VueRouter({
  routes
})

export default router
