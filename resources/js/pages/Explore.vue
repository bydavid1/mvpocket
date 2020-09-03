<template>
    <div class="container">
        <div class="page-header mb-5">
            <h3>Explorar </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Explorar</a></li>
                </ol>
            </nav>
        </div>
        <div v-if="sites.length == 0">
            <h1>No pudimos encontrar sitios</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-4 mb-4" v-for="site in sites" :key="site.id">
                <ExploreCard :title="site.title" :description="site.description" :url="site.url" 
                    :image="site.image"  :id="site.id"/>
            </div>
        </div>
    </div>
</template>

<script>
import ExploreCard from "../components/ExploreCard"
export default {
    name: "Explore",
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
            .get('/api/auth/explore')
            .then(response => {
                this.sites = response.data;
            });
        },
    },
    components:{
        ExploreCard
    },
}
</script>