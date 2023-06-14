import { createRouter, createWebHistory } from 'vue-router'
import NProgress from 'nprogress';

import GuestLayout from '../layouts/Guest.vue'
import AuthenticatedLayout from '../layouts/Authenticated.vue'

import Home from '../components/home/Index.vue';

import Login from '../components/auth/Login.vue';

import Flights from '../components/pages/Flights.vue';
import Hotels from '../components/pages/Hotels.vue';
import Contact from '../components/pages/Contact.vue';
import Support from '../components/pages/Support.vue';
import Profile from '../components/pages/Profile.vue';


const routes = [
    {
      path: '/',
      redirect: { name: 'home'},
      component: GuestLayout,
      children: [
          {
            path: '/home',
            name: 'home',
            component: Home,
            meta: { title: 'Home' }
          },
          {
            path: '/flights',
            name: 'flights',
            component: Flights,
            meta: { title: 'Flights' }
          },
          {
            path: '/hotels',
            name: 'hotels',
            component: Hotels,
            meta: { title: 'Hotels' }
          },
          {
            path: '/support',
            name: 'support',
            component: Support,
            meta: { title: 'Support' }
          },
          {
            path: '/contact',
            name: 'contact',
            component: Contact,
            meta: { title: 'Contact' }
          },
          {
            path: '/login',
            name: 'login',
            component: Login,
            meta: { title: 'Login' }
          }
        ]
    },
    {
      path: '/auth',
      component: AuthenticatedLayout,
      children: [
          {
            path: '/profile',
            name: 'profile',
            component: Profile,
            meta: { title: 'Profile' }
          }
        ]
    }
  ]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  NProgress.start();
  next();
});

router.afterEach(() => {
  NProgress.done();
});

export default router;