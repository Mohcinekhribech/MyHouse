import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import SingleHouse from '../views/SingleHouseView.vue'
import ownerDashboard from '../views/ownerDashboardView.vue'
import messagesView from '../views/MessagesView.vue'
import loginView from '../views/Forms/LoginForm.vue'
import registerView from '../views/Forms/RegisterForm.vue'
import addHouse from '../views/Forms/AddHouseForm.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/single',
    name: 'SingleHouse',
    component: SingleHouse
  },
  {
    path: '/Dashboard',
    name : 'ownerDashboard',
    component : ownerDashboard
  },
  {
    path :'/messages',
    name:'Messages',
    component: messagesView
  },
  {
    path :'/login',
    name:'login',
    component: loginView
  },
  {
    path : '/register',
    name:'register',
    component: registerView
  },
  {
    path : '/houses/add',
    name:'houseAdd',
    component:addHouse
  }
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router