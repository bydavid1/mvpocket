<template>
    <div class="container" style="margin-top: 30px">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible" role="alert" v-show="hasError">
                    {{ errorresponse }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="add">
                    <div class="form-group">
                        <label>Nombre de la coleccion</label>
                        <input type="text" class="form-control" placeholder="Type name" v-model="collection.name">
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" placeholder="Type descripiton" v-model="collection.description">
                    </div>
                    <button type="submit" class=" btn btn-primary" >Guardar coleccion</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
        name: "AddCollection",
        data () {
            return {
                collection: {
                    name: "Collection example",
                    description: "This is an description about this collection"
                },
                errorresponse: "",
                hasError: false,
            }
        },
        methods : {
            add () {
                console.log("collection: " + this.collection)
                this.axios
                .post('http://localhost:8000/api/collection/store', this.collection)
                .then(response => {
                    console.log(response.data)
                    this.$router.push({name: 'collections'})
                })
                .catch(error => { 
                    this.hasError = true 
                    this.errorresponse = error
                })
            },
        }
}
</script>