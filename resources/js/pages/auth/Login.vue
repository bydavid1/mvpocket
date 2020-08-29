<template>
    <div class="container mt-5">
        <div class="card card-success">
            <h5 class="card-header">Registro</h5>
            <div class="card-body">
                <div class="alert alert-danger" v-if="error">
                    <p>There was an error, unable to sign in with those credentials.</p>
                </div>
                <form autocomplete="off" @submit.prevent="login" method="post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" v-model="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
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
            password : ""
        }
    },
    methods : {
        login : function () {
            let email = this.email
            let password = this.password
            this.$store.dispatch('login', {email, password})
            .then(() => this.$router.push('/'))
            .catch(err => console.log(err))
        }
    }
}
</script>
