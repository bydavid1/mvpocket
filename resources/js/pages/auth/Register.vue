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
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form autocomplete="off" @submit.prevent="register"  method="post">
                                <div class="form-group">
                                    <input type="text" id="name" class="form-control" v-model="name" required placeholder="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" placeholder="user@example.com"
                                        v-model="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" class="form-control" v-model="password"
                                        required placeholder="password">
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> I agree to all Terms &
                                            Conditions </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                        <span v-if="loader" class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Registrar...
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a
                                        href="login.html" class="text-primary">Login</a>
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
    <!-- container-scroller -->
</template>

<script>
export default {
    name: "Register",
     data(){
            return {
                name : "",
                email : "",
                password : "",
                loader : false,
                alert : false,
                alertMsg : ""
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
            .then(() => this.$router.push('/home'))
            .catch(error => {
                this.alert = true
                this.alertMsg = error
            })

            this.loader =false
        }
    }
}
</script>
