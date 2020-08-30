<template>
    <div class="container">
        <div v-if="sites.length == 0">
            <h1>Aun no hay sitios guaradados</h1>
            <router-link :to="savepath" class="btn btn-success mb-3">Guardar sitio</router-link>
        </div>
        <div class="container" v-else>
            <router-link :to="savepath" class="btn btn-success mb-3">Agregar sitio</router-link>
            <div class="row">
                <div class="col-md-6" v-for="site in sites" :key="site.id">
                    <CardImage :title="site.title" :description="site.description" :url="site.url" :image="site.image"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CardImage from "../components/CardImage"
export default {
    name: "SitesCollection",
    data () {
        return {
            sites: [],
            savepath: '/collections/'+ this.$route.params.id +'/site/add'
        }
    },
    created () {
        axios
        .get('/api/auth/collection/id/sites'.replace('id', this.$route.params.id))
        .then(response => {
            this.sites = response.data;
        });
    },
    components:{
        CardImage
    },
}
</script>