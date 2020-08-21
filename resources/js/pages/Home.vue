<template>
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 103px;">
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
            <router-view></router-view>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</template>