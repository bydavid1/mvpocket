<template>
    <div>
        <div class="container">
            <div class="page-header mb-5">
                <h3> Colecciones </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Colleciones</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div v-if="collections == null">
            <h1>Aun no hay colecciones guardadas</h1>
            <router-link to="/collections/add" class="btn btn-gradient-success mb-3">Crear coleccion</router-link>
        </div>
        <div class="container" v-else>
            <router-link to="/collections/add" class="btn btn-gradient-success btn-rounded mb-5 btn-block">
                <i class="mdi mdi-plus-box-multiple mr-1"></i>
                Agregar nueva coleccion
            </router-link>
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
    name: "Collections",
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
            .get('/api/auth/collection')
            .then(response => {
                this.collections = response.data;
            })
            .catch(error => console.log(error.response.data));
        },
        togglefav (id) {
            axios.put('/api/auth/collection/' + id + '/togglefav')
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