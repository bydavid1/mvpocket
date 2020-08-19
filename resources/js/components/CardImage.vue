<template>
    <div class="card" style="cursor: pointer;">
          <img class="card-img-top" :src="image" style="max-width: 500px, max-height: 300px" alt="Card image cap">
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