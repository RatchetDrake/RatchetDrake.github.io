import Vue from 'vue'
import VueRouter from 'vue-router'

import TableauVue from '@/views/TableauVue.vue'
import ClickMe from '@/views/ClickMe.vue'
import ParaVue from '@/views/ParaVue.vue'
import AlouetteVue from '@/views/AlouetteVue.vue'
import UnixVue from '@/views/UnixVue.vue'


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
  },
  {
    path: '/paravue',
    name: 'paravue',
    component: ParaVue
  },
  {
    path: '/alouettevue',
    name: 'alouettevue',
    component: AlouetteVue
  },
  {
    path: '/unixvue',
    name: 'unixvue',
    component: UnixVue
  },
  
  
]


const router = new VueRouter({
  routes
})

export default router
