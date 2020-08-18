<template>
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
        <h4>Sitios</h4>
    </div>
</template>

<script>
export default {
    name: "SitesCollection",
    created () {
        this.axios
        .get('http://127.0.0.1:8000/api/collection/sites' + $route.params.id)
        .then(response => {
            console.log(response.data)
            this.collections = response.data;
        });
    }
}
</script>