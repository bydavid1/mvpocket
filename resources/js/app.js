import Vue from 'vue'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueRouter)
Vue.use(VueAxios, axios);
require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue';
import routes from './router/router'


const app = new Vue({
    router: routes,
    el: '#app',
    render: h => h(App)
});