<template>
    <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
            <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">{{ title }}<i
                    class="mdi mdi-buffer mdi-24px float-right"></i>
            </h4>
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
    props : ['title', 'description', 'id']
}
</script>