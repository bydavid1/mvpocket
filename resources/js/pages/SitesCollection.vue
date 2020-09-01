<template>
    <div class="container">
        <div class="page-header">
            <h3 class="page-title">Guardados </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Colecciones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sitios guardados</li>
                </ol>
            </nav>
        </div>
        <div v-if="sites.length == 0">
            <h1>Aun no hay sitios guaradados</h1>
            <router-link :to="savepath" class="btn btn-success mb-3">Guardar sitio</router-link>
        </div>
        <div v-else> 
            <router-link :to="savepath" class="btn btn-gradient-info btn-rounded mb-5 btn-block">
                <i class="mdi mdi-plus-box-multiple mr-1"></i>
                Agregar sitio
            </router-link>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4" v-for="site in sites" :key="site.id">
                <CardImage :title="site.title" :description="site.description" :url="site.url" :image="site.image"/>
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