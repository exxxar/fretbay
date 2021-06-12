<template>
    <b-container fluid="lg">
        <b-tabs content-class="mt-3">
            <b-tab title="Active" active>
                <subcategories-debug-component :items="items"/>
            </b-tab>
            <b-tab title="Deleted">
                <subcategories-debug-component :items="deleted_items"/>
            </b-tab>
        </b-tabs>

    </b-container>
</template>

<script>
    export default {
        props: ["items", "deleted_items"],


    }
</script>

