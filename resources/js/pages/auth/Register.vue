<template>
    <div class="container mt-5">
        <div class="card card-success">
            <h5 class="card-header">Registro</h5>
            <div class="card-body">
                <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
                    <div class="form-group" v-bind:class="{ 'has-error': error && errors.name }">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" v-model="name" required>
                        <span class="help-block" v-if="error && errors.name">{{ errors.name }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': error && errors.email }">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                        <span class="help-block" v-if="error && errors.email">{{ errors.email }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': error && errors.password }">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                        <span class="help-block" v-if="error && errors.password">{{ errors.password }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
            };
        },
    methods: {
        register(){
            let data = {
                name : this.name,
                email : this.email,
                password : this.password
            }

            this.$store.dispatch('register', data)
            .then(() => this.$route.push('/'))
            .catch(err => console.log(err))
        }
    }
}
</script>
