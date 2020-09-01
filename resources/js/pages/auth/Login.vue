<template>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="alert alert-danger alert-dismissible" v-if="alert">
                            {{ alertMsg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <h3>MVPOCKET</h3>
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form autocomplete="off" @submit.prevent="login" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="user@example.com"
                                        v-model="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" v-model="password" required placeholder="password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                        <span v-if="loader" class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Iniciar sesion...
                                    </button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a
                                        href="register.html" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</template>

<script>
export default {
    name: "Login",
    data () {
        return {
            email : "",
            password : "",
            loader : false,
            alert : false,
            alertMsg : ""
        }
    },
    methods : {
        login : function () {
            this.loader = true
            let email = this.email
            let password = this.password
            this.$store.dispatch('login', {email, password})
            .then(() => this.$router.push('/home'))
            .catch((error) => {
                console.log(error)
                this.alert = true
                this.alertMsg = error
            })
            this.loader = false
        }
    }
}
</script>
