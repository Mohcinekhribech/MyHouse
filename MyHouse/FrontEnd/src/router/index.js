import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/Pages/HomeView.vue'
import SingleHouse from '@/views/Pages/SingleHouseView.vue'
import ownerDashboard from '@/views/Dashboard/ownerDashboardView.vue'
import messagesView from '@/views/Pages/MessagesView.vue'
import loginView from '@/views/Forms/LoginForm.vue'
import registerView from '@/views/Forms/RegisterForm.vue'
import addForm from '@/views/Forms/AddForm.vue'
import RentView from '@/views/Pages/RentView.vue'
import BuyView from '@/views/Pages/BuyView.vue'
import houseInfoDashboard from '@/views/Dashboard/house-info-dashboard.vue'
import updateRoom from '@/views/Dashboard/update-room-dashboard.vue'
import messagesDashboard from '@/views/Dashboard/messages-dashboard.vue'
// import superAdminDashboard from '@/views/Dashboard/super-admin-dashboard.vue'
import updateHouses from '@/views/Dashboard/update-Houses.vue'
import { userStore } from '../stores/userStore'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/Rent',
    name: 'Rent',
    component : RentView
  },
  {
    path: '/Buy',
    name: 'Buy',
    component : BuyView
  },
  {
    path: '/house/:id',
    name: 'SingleHouse',
    component: SingleHouse
  },
  {
    path: '/Dashboard',
    name : 'ownerDashboard',
    component : ownerDashboard,
    meta :{isOwner:true}
  },
  {
    path :'/messages',
    name:'Messages',
    component: messagesView,
    meta :{isAuth:true}

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
    path : '/Dashboard/houses/add',
    name:'addForm',
    component:addForm,
    meta :{isOwner:true}
  },
  {
    path : '/Dashboard/houses/update/:id',
    name:'updateHouses',
    component:updateHouses,
    meta :{isOwner:true}
  },
  {
    path : '/Dashboard/messages',
    name:'messagesDashboard',
    component:messagesDashboard,
    meta :{isOwner:true}
  }
  ,
  {
    path : '/Dashboard/houses/info/:id',
    name:'houseInfoDashboard',
    component:houseInfoDashboard,
    meta :{isOwner:true}
  },
  // {
  //   path : '/Dashboard/Admin',
  //   name:'houseInfoDashboard',
  //   component:superAdminDashboard,
  //   meta :{isSuperAdmin:true}
  // },
  {
    path : '/Dashboard/houses/Rooms/:id',
    name:'updateRoom',
    component:updateRoom,
    meta :{isOwner:true}
  }
]


const router = createRouter({
  history: createWebHistory(),
  routes
})
router.beforeEach((to, from, next) => {
  console.log(userStore().token)  
  if (to.matched.some(record => record.meta.isOwner)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!(userStore().role=='owner')) {
      next({
        path: '/login'
      })
    } else {
      next()
    }
  } else if (to.matched.some(record => record.meta.isAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!(userStore().role && userStore().userId && userStore().token)) {
      next({
        path: '/login'
      })
    } else {
      next()
    }
  } else {
    next() // make sure to always call next()!
  }

  
})

export default router