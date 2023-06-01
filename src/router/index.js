import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'home',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '@/views/HomePage.vue')
  },
  {
    path: '/menu',
    name: 'menu',
    component: () => import('@/views/MenuPage.vue')
  },
  {
    path: '/cronogram',
    name: 'cronogram',
    component: () => import('@/views/SchedulePage.vue')
  },
  {
    path: '/userData',
    name: 'userData',
    component: () => import('@/views/UserDataPage.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
