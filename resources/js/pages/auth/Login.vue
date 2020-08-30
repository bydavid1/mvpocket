<template>
    <div class="container mt-5">
        <div class="card card-success">
            <h5 class="card-header">Registro</h5>
            <div class="card-body">
                <form autocomplete="off" @submit.prevent="login" method="post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" v-model="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Iniciar sesion...
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data () {
        return {
            email : "",
            password : "",
            loader : false
        }
    },
    methods : {
        login : function () {
            this.loader = true
            let email = this.email
            let password = this.password
            this.$store.dispatch('login', {email, password})
            .then(() => this.$router.push('/'))
            .catch(err => console.log(err))
            this.loader = false
        }
    }
}
</script>
