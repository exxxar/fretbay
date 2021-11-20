<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <h5>Templates</h5>

            </div>
        </div>
    </div>
</template>

<script>

export default {
    computed: {
        templates: function () {
            return [
                {
                    title: "Mail template",
                    message: "Message data",
                    created_at: "12.04.2022 09:30",
                    updated_at: "12.04.2022 09:30"
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>
