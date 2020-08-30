<template>
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible" role="alert" v-show="hasError">
                    {{ errorresponse }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="add">
                    <div class="form-group">
                        <label>Ingresa la url</label>
                        <input type="text" class="form-control" placeholder="Type url" v-model="url">
                    </div>
                    <button class="btn btn-primary" type="submit">
                        <span v-if="load" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Inspeccionar sitio
                    </button>
                </form>
            </div>
        </div>
        <div v-show="site.showCard" class="col-md-5">
            <h5>Preview</h5>
            <CardImage :title="site.title" :description="site.description" :url="site.url" 
                :image="site.image"></CardImage>
                <button class="btn btn-success my-3" v-on:click="store">Guardar</button>
        </div>
    </div>
</template>

<script>
import CardImage from "../components/CardImage"
export default {
        name: "AddSite",
        data () {
            return {
                site: {
                    showCard: false,
                    title: "",
                    description: "",
                    url: "",
                    image: "",
                }, 
                url: "",
                errorresponse: "",
                hasError: false,
                load: false
            }
        },
        methods : {
            add () {
                this.load = true
                axios
                .get('/api/auth/fetchOpenGraph?url=' + this.url)
                .then(response => {
                    let data = response.data;
                    this.site.title = data.data.title;
                    this.site.description = data.data.description
                    this.site.image = data.data.image
                    this.site.url = this.url
                    this.site.showCard = true
                    this.hasError = false
                    this.load = false
                })
                .catch(error => { 
                    this.hasError = true 
                    this.errorresponse = error
                    this.site.showCard = false
                    this.load = false
                })
            },
            store () {
                axios
                .post('/api/auth/collection/'+ this.$route.params.id +'/site/store', this.site)
                .then(response => {
                    this.$router.push({name: 'sitescollection', params: this.$route.params.id})
                })
                .catch(error => { 
                    console.log(error)
                    this.hasError = true 
                    this.errorresponse = error
                })
            }
        },
        components:{
            CardImage
        },
}
</script>