import Vue from "vue";
import VueRouter from "vue-router"; // We import /Vue router from /vue-router first.

Vue.use(VueRouter) 

import Collection from "./pages/Collections";
import AddCollection from "./pages/AddCollection";
import SitesCollection from "./pages/SitesCollection";

const router = new VueRouter({ 
  mode: "history",// Then we register route for User management module.
  routes: [
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
        path:"/collections/sites/:id",
        name: "sitescollection",
        component: SitesCollection
    },
  ],
}); 

export default router // Next we create local registration of /router property, so we can import it within /app.js (our root /Vue instance)