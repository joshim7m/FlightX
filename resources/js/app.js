import './bootstrap';
import { createApp } from 'vue';

import router from './routes/index'

import NProgress from 'nprogress';
import 'nprogress/nprogress.css';



const app = createApp({})
  app.use(router)
  app.mount('#app')