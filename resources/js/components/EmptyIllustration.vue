<template>
    <div class="content-wrapper d-flex align-items-center text-center error-page">
        <div class="row flex-grow">
            <div class="col-lg-7 mx-auto">
                <img src="images/illustration.svg" alt="empty">
                <div class="row align-items-center d-flex flex-row mt-5">
                    <div class="col-lg-6 text-lg-right pr-lg-4">
                        <h2 class="display-1 mb-0">Vacío</h2>
                    </div>
                    <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                        <h2>{{ message }}</h2>
                        <h4 class="font-weight-light">{{ submessage }}</h4>
                        <router-link :to="route" class="btn btn-gradient-success btn-rounded mt-3">{{ btnmessage }}</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name : "Empty",
    props : ['message', 'submessage', 'btnmessage', 'route']
}
</script>