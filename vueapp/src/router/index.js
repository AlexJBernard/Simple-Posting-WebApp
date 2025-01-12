import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import UserList from '../views/UserList.vue'
import TestView from '../views/TestView.vue'
import PostView from '../views/PostView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/users',
      name: 'users',
      component: UserList
    },
    {
      path: '/usersdb',
      name: 'usersdb',
      component: TestView
    },
    {
      path: '/posts',
      name: 'posts',
      component: PostView
    },
  ],
})

export default router
