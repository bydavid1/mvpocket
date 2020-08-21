import Vue from "vue";
import VueRouter from "vue-router"; // We import /Vue router from /vue-router first.

Vue.use(VueRouter) 

import Collection from "../pages/Collections";
import AddCollection from "../pages/AddCollection";
import SitesCollection from "../pages/SitesCollection";
import AddSite from "../pages/AddSite";
import Welcome from "../pages/Welcome";
import Login from "../pages/auth/Login";
import Register from "../pages/auth/Register";

const router = new VueRouter({ 
  mode: "history",// Then we register route for User management module.
  routes: [
    {
        path:"/",
        name: "welcome",
        component: Welcome
    },
    {
        path:"/login",
        name: "login",
        component: Login
    },
    {
        path:"/register",
        name: "register",
        component: Register
    },
    {
        path:"/collections",
        name: "collections",
        component: Collection
    },
    {
        path:"/collections/add",
        name: "addcollection",
        component: AddCollection
    },
    {
        path:"/collections/:id/sites",
        name: "sitescollection",
        component: SitesCollection
    },
    {
        path:"/collections/:id/site/add",
        name: "addsite",
        component: AddSite
    },
  ],
}); 

export default router // Next we create local registration of /router property, so we can import it within /app.js (our root /Vue instance)