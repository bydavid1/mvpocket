<template>
    <div class="card" style="cursor: pointer;">
        <div class="image-container">
            <div class="image-div" v-bind:style="{'background-image': 'url(' + image + ')','background-repeat' : 'no-repeat', 'background-size' : 'cover' }"></div>
        </div>
        <div class="card-body card-info px-4 py-4">
            <h4 class="card-title">{{ title.substring(0 ,32) }}</h4>
            <a class="text-gray" :href="url" target="_blank">{{ extractDomain }}</a>
            <p class="card-text mt-2">
                {{ description.substring(0 ,150) }}
            </p> 
        </div>
        <div class="card-footer bg-white p-1">
            <div class="float-left">
                <button class="btn bg-transparent btn-sm"><i class="mdi mdi-18px mdi-arrow-down-drop-circle-outline mr-1"></i>Guardar (soon)</button>
            </div>
            <div class="float-right h-100">
                <a class="card-icon mr-2 mt-1 float-right" id="options" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-horizontal mdi-24px"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
let psl = require('psl');
export default {
    name: "ExploreCard",
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
    },
    computed : {
        extractDomain () {
            var hostname;
            var cUrl = this.url;
            //find & remove protocol (http, ftp, etc.) and get hostname

            if (cUrl.indexOf("//") > -1) {
                hostname = cUrl.split('/')[2];
            }
            else {
                hostname = cUrl.split('/')[0];
            }

            //find & remove port number
            hostname = hostname.split(':')[0];
            //find & remove "?"
            hostname = hostname.split('?')[0];

            return psl.get(hostname);
        }
    }
}
</script>

<style>
    .image-container{
        width: 100%;
        height: 200px;
    }

    .card-info{
        height: 100px;
        overflow: hidden;
    }

    .image-div{
        width: 100%;
        height: 100%;
    }
</style>
