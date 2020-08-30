<template>
    <div class="container mt-5">
        <div class="card card-success">
            <h5 class="card-header">Registro</h5>
            <div class="card-body">
                <form autocomplete="off" @submit.prevent="register"  method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" v-model="name" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                        <span class="help-block"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Registrar...
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
     data(){
            return {
                name : "",
                email : "",
                password : "",
                loader : false
            };
        },
    methods: {
        register(){   
            this.loader = true

            let data = {
                name : this.name,
                email : this.email,
                password : this.password
            }

            this.$store.dispatch('register', data)
            .then(() => this.$router.push('/'))
            .catch(err => console.log('root function:' + err))

            this.loader =false
        }
    }
}
</script>
