<template>
    <div :class="['card', 'bg-gradient-' + theme, 'card-img-holder', 'text-white']">
        <div class="card-body">
            <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">{{ title }}</h4>
            <a class="float-right card-icon" id="options" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-horizontal text-white mdi-36px"></i>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="options">
                <a class="dropdown-item text-primary" @click="$emit('togglefav', id)">
                    <i :class="['mdi', isfavorite, 'mr-2', 'mdi-18px']"></i>Favorito
                </a>
                <div class="dropdown-divider"></div>
                    <h6 class="px-3 py-1 mb-0">Tema</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" @click="$emit('toggletheme', id, 'danger')">
                    <i class="mdi mdi-brightness-1 mdi-18px mr-2"></i>Sunset
                </a>
                <a class="dropdown-item text-info" @click="$emit('toggletheme', id, 'info')">
                    <i class="mdi mdi-brightness-1 mdi-18px mr-2"></i>Blue sky
                </a>
                <a class="dropdown-item text-success" @click="$emit('toggletheme', id, 'success')">
                    <i class="mdi mdi-brightness-1 mdi-18px mr-2"></i>Green garden
                </a>
                <a class="dropdown-item text-warning" @click="$emit('toggletheme', id, 'warning')">
                    <i class="mdi mdi-brightness-1 mdi-18px mr-2"></i>Yellow
                </a>
                <a class="dropdown-item text-dark" @click="$emit('toggletheme', id, 'dark')">
                    <i class="mdi mdi-brightness-1 mdi-18px mr-2"></i>Dark
                </a>
                <a class="dropdown-item text-primary" @click="$emit('toggletheme', id, 'primary')">
                    <i class="mdi mdi-brightness-1 mdi-18px mr-2"></i>Purple
                </a>
            </div>
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
        theme : {
            type : String,
            default : "danger"
        }
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