import Vue from "vue";
import VueRouter from "vue-router"; // We import /Vue router from /vue-router first.

Vue.use(VueRouter)

import Collection from "../pages/Collections";
import Explore from "../pages/Explore";
import FavCollections from "../pages/FavoriteCollections";
import AddCollection from "../pages/AddCollection";
import SitesCollection from "../pages/SitesCollection";
import FavoriteSites from "../pages/FavoriteSites";
import AddSite from "../pages/AddSite";
import Welcome from "../pages/Welcome";
import Home from "../pages/Home";
import Login from "../pages/auth/Login";
import Register from "../pages/auth/Register";
import store from "../store/store";

const router = new VueRouter({
  routes: [
    {
        path:"/",
        name: "welcome",
        component: Welcome
    },
    {
        path:"/login",
        name: "login",
        component: Login,
    },
    {
        path:"/register",
        name: "register",
        component: Register,
    },
    {
        path:"/home",
        name: "home",
        component: Home,
        meta: { 
            requiresAuth: true
        },
        children: [
            {
                path:"/",
                name: "collections",
                component: Collection,
            },
            {
                path:"/explore",
                name: "explore",
                component: Explore,
            },
            {
                path:"/collections/favorites",
                name: "favCollections",
                component: FavCollections,
            },
            {
                path:"/collections/add",
                name: "addcollection",
                component: AddCollection,
            },
            {
                path:"/collections/:id/sites",
                name: "sitescollection",
                component: SitesCollection,
            },
            {
                path:"/sites/favorites",
                name: "favoritesites",
                component: FavoriteSites,
            },
            {
                path:"/collections/:id/site/add",
                name: "addsite",
                component: AddSite,
            },
        ]
    },
  ],
});

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)){
        if(store.getters.isAuth){
            next()
            return
        }
        next('/login')
    }else{
        next()
    }
})

export default router // Next we create local registration of /router property, so we can import it within /app.js (our root /Vue instance)
