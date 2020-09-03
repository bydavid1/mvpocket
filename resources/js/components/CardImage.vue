<template>
    <div class="card" style="cursor: pointer;">
        <div class="image-container">
            <div class="image-div" v-bind:style="{'background-image': 'url(' + image + ')','background-repeat' : 'no-repeat', 'background-size' : 'cover' }"></div>
        </div>
        <div class="card-body card-info">
            <h4 class="card-title">{{ title }}</h4>
            <h5>{{ url }}</h5>
            <p class="card-text">
                {{ description }}
            </p> 
        </div>
        <div class="card-footer">
            <div class="float-left">
                <i v-if="favorite != 0" class="mdi mdi-star-box mdi-24px text-warning"></i>
                <i v-if="privacy != 0" class="mdi mdi-earth-box mdi-24px text-success"></i>
            </div>
            <a class="float-right card-icon" id="options" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-horizontal mdi-24px"></i>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="options">
                <a class="dropdown-item text-primary py-2" @click="$emit('togglefav', id)">
                    <i :class="['mdi', isFavorite, 'mr-2', 'mdi-18px']"></i>Favorito
                </a>
                <a class="dropdown-item text-danger py-2">
                    <i class="mdi mdi-trash-can mdi-18px mr-2"></i>Eliminar
                </a>
                <a class="dropdown-item text-success py-2" @click="$emit('togglepublic', id)">
                    <i class="mdi mdi-earth mdi-18px mr-2"></i> {{ isPublic }}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardImage",
    props : {
        title : {
            type: String,
            default: 'Sin titulo'
        },
        description : {
            type: String,
            default: 'Sin descripcion'
        },
        image : {
            type: String,
            default: 'images/dashboard/01.jpg'
        },
        url : {
            type: String,
            default: ''
        },
        id : {

        },
        favorite : {
            type: Number,
            default: 0
        },
        privacy : {
            type: Number,
            default: 0
        },
    },
    computed : {
        isFavorite () {
            return this.favorite != 0 ? "mdi-star" : "mdi-star-outline"
        },
        isPublic () {
            return this.privacy != 0 ? "Hacer privado" : "Hacer publico"
        }
    },
}
</script>

<style>
    .image-container{
        width: 100%;
        height: 210px;
    }

    .card-info{
        height: 210px;
        overflow: hidden;
    }

    .image-div{
        width: 100%;
        height: 100%;
    }
</style>
