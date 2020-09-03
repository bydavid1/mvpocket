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
        <div v-if="sites.length == 0">
            <h1>Aun no hay favoritos guardados</h1>
        </div>
        <div v-else class="row">
            <div class="col-md-4 mb-4" v-for="site in sites" :key="site.id">
                <CardImage :title="site.title" :description="site.description" :url="site.url"
                 :image="site.image" :favorite="site.favorite" :privacy="site.public" :id="site.id" v-on:togglefav="togglefav"/>
            </div>
        </div>
    </div>
</template>

<script>
import CardImage from "../components/CardImage"
export default {
    name: "FavoriteSites",
    data () {
        return {
            sites: [],
        }
    },
    created () {
        this.getSites()
    },
    methods : {
        getSites () {
            axios
            .get('/api/auth/collection/sites/favorites')
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
    },
    components:{
        CardImage
    },
}
</script>
