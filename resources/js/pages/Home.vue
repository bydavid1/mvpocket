<template>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a  href="#"><img src="images/logo.png" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo.png"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0"
                                placeholder="Search projects">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="images/avatars/pic-1.png" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{ username }} <i class="mdi mdi-menu-down text-primary ml-2"></i></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" @click="logout">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </button>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-plus-box-multiple"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav mt-5">
                    <li class="nav-item">
                        <router-link to="/home" class="nav-link">
                            <span class="menu-title">Home</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/home" class="nav-link">
                            <span class="menu-title">Collecciones</span>
                            <i class="mdi mdi-buffer menu-icon"></i>
                        </router-link>
                    </li>
                    <li class="nav-item sidebar-actions">
                        <span class="nav-link">
                            <div class="mt-4">
                                <div class="border-bottom">
                                    <p class="text-secondary">Favoritos<i class="mdi mdi-star menu-icon float-right"></i></p>
                                </div>
                                <ul class="gradient-bullet-list mt-4">
                                    <li>
                                        <router-link to="/collections/favorites">
                                            <span class="menu-title">Collecciones</span>
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="/home">
                                            <span class="menu-title">Sitios</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </span>
                    </li>
                    <li class="nav-item sidebar-actions">
                        <span class="nav-link">
                            <div class="border-bottom">
                                <h6 class="text-secondary mb-3">Acciones</h6>
                            </div>
                            <button class="btn btn-block btn-lg btn-gradient-dark btn-rounded mt-4">+ Add site</button>
                        </span>
                    </li>
                    <li class="nav-item sidebar-actions">
                        <span class="nav-link">
                            <div class="border-bottom">
                                <p class="text-secondary">Informacion</p>
                            </div>
                        </span>
                    </li>
                    <li class="nav-item">
                        <router-link to="/home" class="nav-link">
                            <span class="menu-title">Acerca de</span>
                            <i class="mdi menu-icon mdi-information"></i>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/home" class="nav-link">
                            <span class="menu-title">Codigo</span>
                            <i class="mdi menu-icon mdi-github"></i>
                        </router-link>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <router-view></router-view>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a
                                href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights
                            reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
</template>

<script>
    export default {
        name : "Home",
        data () {
            return {
                username : ""
            }
        },
        methods : {
            logout () {
                this.$store.dispatch('logout')
                .then(() =>  this.$router.push('/') )
            }
        },
        created () {
            axios
            .post('/api/auth/me')
            .then(response => {
                this.username = response.data.name
            });
        }
    }
        
</script>
