<template>
    <div class="card" style="cursor: pointer;">
        <div class="image-container">
            <div class="image-div" v-bind:style="{'background-image': 'url(' + image + ')','background-repeat' : 'no-repeat', 'background-size' : 'cover' }"></div>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ title }}</h4>
            <h5>{{ url }}</h5>
            <p class="card-text">
                {{ description }}
            </p> 
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
            default: 'https://freedesignfile.com/upload/2015/04/Colored-modern-material-deisng-vector-background-05.jpg'
        },
        url : {
            type: String,
            default: ''
        },
    }
}
</script>

<style>
    .image-container{
        width: 100%;
        height: 325px;
    }

    .image-div{
        width: 100%;
        height: 100%;
    }
</style>
