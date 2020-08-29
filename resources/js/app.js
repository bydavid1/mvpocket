import Vue from 'vue'

Vue.use(VueAxios, axios);
require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue';
import routes from './router/router'
import store from './store/index'

Vue.router = routes

const app = new Vue({
    router: Vue.router,
    store: store,
    el: '#app',
    render: h => h(App)
});
