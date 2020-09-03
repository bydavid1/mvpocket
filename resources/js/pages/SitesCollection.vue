<template>
    <div class="container">
        <div class="page-header mb-5">
            <h3>Guardados </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Colecciones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sitios guardados</li>
                </ol>
            </nav>
        </div>
        <div v-if="sites.length < 1">
            <Empty message="Aún no hay sitios" submessage="¡Busca un nuevo sitio!" btnmessage="Guardar sitio" :route="savepath"/>
        </div>
        <div v-else> 
            <router-link :to="savepath" class="btn btn-gradient-info btn-rounded mb-5 btn-block">
                <i class="mdi mdi-plus-box-multiple mr-1"></i>
                Agregar sitio
            </router-link>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4" v-for="site in sites" :key="site.id">
                <CardImage :title="site.title" :description="site.description" :url="site.url" 
                :image="site.image" :favorite="site.favorite" :privacy="site.public" :id="site.id" v-on:togglefav="togglefav"
                v-on:togglepublic="togglepublic"/>
            </div>
        </div>
    </div>
</template>

<script>
import CardImage from "../components/CardImage"
import Empty from "../components/EmptyIllustration"
export default {
    name: "SitesCollection",
    data () {
        return {
            sites: [],
            savepath: '/collections/'+ this.$route.params.id +'/site/add'
        }
    },
    created () {
        this.getSites()
    },
    methods : {
        getSites () {
            axios
            .get('/api/auth/collection/id/sites'.replace('id', this.$route.params.id))
            .then(response => {
                this.sites = response.data;
            });
        },
        togglefav (id) {
            axios.put('/api/auth/sites/' + id + '/togglefav', {'id' : this.id})
            .then(() => {
                this.getSites()
            })
            .catch(err => console.log(err))
        },
        togglepublic (id) {
            axios.put('/api/auth/sites/' + id + '/togglepublic', {'id' : this.id})
            .then(() => {
                this.getSites()
            })
            .catch(err => console.log(err))
        },
    },
    components:{
        CardImage,
        Empty
    },
}
</script>