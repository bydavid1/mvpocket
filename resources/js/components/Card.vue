<template>
    <div class="card" style="cursor: pointer;">
        <div class="card-body">
            <h5 class="card-title">{{ title }}</h5>
            <p class="card-text">
                {{ description }}
            </p> 
            <router-link :to="'/collections/'+ id +'/sites'" class="card-link">Ver coleccion</router-link>
            <router-link to="" class="card-link text-danger">Eliminar coleccion</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    props : ['title', 'description', 'id']
}
</script>