import Vue from 'vue'
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);
require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue';
import routes from './router/router'

Vue.router = routes

const app = new Vue({
    router: Vue.router,
    el: '#app',
    render: h => h(App)
});
