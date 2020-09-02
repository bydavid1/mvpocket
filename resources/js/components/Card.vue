<template>
    <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
            <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">{{ title }}</h4>
            <i :class="['mdi', isfavorite, 'mdi-36px', 'float-right' , 'card-icon']" @click="$emit('togglefav', id)"></i>
            <h6 class="card-text">{{ description }}</h6>
            <div class="mt-4">
                <router-link :to="'/collections/'+ id +'/sites'" class="btn bg-white btn-sm">Ver coleccion</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    props : {
        title : {
            type: String,
            default: 'Sin titulo'
        },
        description : {
            type: String,
            default: 'Sin descripcion'
        },
        id : {

        },
        favorite : {
            type: Number,
            default: 0
        },
    },
    computed : {
        isfavorite () {
            return this.favorite != 0 ? "mdi-heart" : "mdi-heart-outline"
        }
    },
}
</script>

<style scoped>
    .card-icon{
        cursor: pointer;
        position: relative;
        right: 0px;
        top: 0px;
    }
</style>