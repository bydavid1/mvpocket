<template>
    <div>
        <div class="container">
            <div class="page-header mb-5">
                <h3> Colecciones favoritas </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Colleciones</li>
                        <li class="breadcrumb-item active" aria-current="page">Favorites</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div v-if="collections.length < 1" class="container">
            <h1>Aun no hay favoritos guardados</h1>
        </div>
        <div class="container" v-else>
            <div class="row">
                <div class="col-md-6 stretch-card grid-margin" v-for="collection in collections" :key="collection.id">
                    <Card :title="collection.name" :description="collection.description" :id="collection.id" :favorite="collection.favorite" 
                    :theme="collection.theme.name" v-on:togglefav="togglefav" v-on:toggletheme="toggletheme" class="mb-4"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Card from "../components/Card"
export default {
    name: "FavoriteCollections",
    data () {
        return {
            collections: [],
        }
    },
    created() {
        this.getCollections()
    },
    components:{
        Card
    },

    methods : {
        getCollections () {
            axios
            .get('/api/auth/collection/favorites')
            .then(response => {
                this.collections = response.data;
            })
            .catch(error => console.log(error.response.data));
        },
        togglefav (id) {
            axios.put('/api/auth/collection/' + id + '/togglefav', {'id' : this.id})
            .then(() => {
                this.getCollections()
            })
            .catch(err => console.log(err))
        },
        toggletheme (id, theme) {
            axios.put('/api/auth/collection/' + id + '/toggletheme', {'theme' : theme})
            .then(() => {
                this.getCollections()
            })
            .catch(err => console.log(err.response.data))
        }
    }
}
</script>