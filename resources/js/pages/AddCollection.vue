<template>
    <div class="container">
        <div class="page-header">
            <h3 class="page-title">Agregar sitio </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Colecciones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar collecion</li>
                </ol>
            </nav>
        </div>
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
                        <input type="text" class="form-control" placeholder="Type name" v-model="collection.name" required>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" placeholder="Type descripiton" v-model="collection.description" required>
                    </div>
                    <button type="submit" class="btn btn-gradient-info btn-rounded" >
                        <i class="mdi mdi-plus-box-multiple"></i>
                        Guardar coleccion</button>
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
                    name: "",
                    description: ""
                },
                errorresponse: "",
                hasError: false,
            }
        },
        methods : {
            add () {
                console.log("collection: " + this.collection)
                axios
                .post('/api/auth/collection/store', this.collection)
                .then(response => {
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