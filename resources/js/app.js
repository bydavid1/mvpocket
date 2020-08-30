import Vue from 'vue'
import App from './App.vue';
import routes from './router/router'
import store from './store/store'
import axios from 'axios';

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$http = axios;
const token = localStorage.getItem('token')
if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = "Bearer" + token
}

Vue.router = routes

const app = new Vue({
    router: Vue.router,
    store: store,
    el: '#app',
    render: h => h(App)
});
