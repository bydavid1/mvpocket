<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary mb-5" >
            <div class="container">
                <a class="navbar-brand" href="#">My version pocket</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <router-link to="/home" class="nav-link">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/collections" class="nav-link">Colecciones</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/collections" class="nav-link">Favoritos</router-link>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

                <!-- Content Wrapper. Contains page content -->
        <div class="container mb-5" style="min-height: 103px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Bienvenido</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
                    <div class="collapse navbar-collapse">
                        <div class="navbar-nav">
                            <router-link to="/collections" class="nav-item nav-link">Ver todas tus colecciones</router-link>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name : "Home",
    }
</script>
