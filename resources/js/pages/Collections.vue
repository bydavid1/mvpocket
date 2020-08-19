<template>
    <div>
        <div v-if="collections == null">
            <h1>Aun no hay colecciones guardadas</h1>
            <router-link to="/collections/add" class="btn btn-success mb-3">Crear coleccion</router-link>
        </div>
        <div class="container" v-else>
            <router-link to="/collections/add" class="btn btn-success mb-3">Agregar nueva coleccion</router-link>
            <div class="row">
                <div class="col-md-6" v-for="collection in collections" :key="collection.id">
                    <Card :title="collection.name" :description="collection.description" :id="collection.id"/>
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
        this.axios
        .get('http://127.0.0.1:8000/api/collection')
        .then(response => {
            this.collections = response.data;
        });
    },
    components:{
        Card
    },
}
</script>