<template>
    <div>
        <div v-if="collections == null">
            <h1>Aun no hay colecciones guaradadas</h1>
            <router-link to="/collections/add" style="margin-top: 10px; margin-bottom: 10px" class="btn btn-success">Crear coleccion</router-link>
        </div>
        <div class="container" v-else>
            <router-link to="/collections/add" style="margin-top: 10px; margin-bottom: 10px" class="btn btn-success">Agregar nueva coleccion</router-link>
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
        console.log('entro')
        this.axios
        .get('http://127.0.0.1:8000/api/collection')
        .then(response => {
            console.log(response.data)
            this.collections = response.data;
        });
    },
    components:{
        Card
    },
}
</script>