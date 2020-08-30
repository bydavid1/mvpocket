<template>
    <div class="c-container">
        <div class="flex-center position-ref full-height" style="background-image: url('images/3449401.jpg');">
            <div class="top-right links">
                <div v-if="isAuth">
                    <router-link to="/home">Home</router-link>
                </div>
                <div v-else>
                    <router-link to="/login">Login</router-link>
                    <router-link to="/register">Register</router-link>
                </div>
            </div>
            <div class="content">
                <div class="title m-b-sm">
                    My version pocket
                </div>
                <div class="subtitle m-b-md">
                    Don't forget your sites
                </div>
                <div class="m-b-lg">
                    <router-link to="/login" class="btn-sign">Goto login</router-link>
                </div>
                <img class="tech-logo" src="images/tech.png">
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    name: "Welcome",
    computed : {
        ...mapGetters([
            'isAuth'
        ])
    }
}
</script>

<style scoped>
    .c-container{
        background-color: #fff;
        color: #fff;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
        background-repeat: no-repeat;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .subtitle {
        font-size: 30px;
    }

    .links > div > a {
        color: #fff;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .m-b-sm {
        margin-bottom: 20px;
    }

    .m-b-lg {
        margin-bottom: 40px;
    }

    .btn-sign{
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        align-content: center;
        padding: 10px 20px;
        max-width: 400px;
        background-color: #fff;
        color: #000;
        border-radius: 4px;
        height: 60px;
        margin-bottom: 24px;
        height: 48px;
        position: relative;
        border: none;
    }

    .tech-logo{
        max-width: 15%;
    }

</style>