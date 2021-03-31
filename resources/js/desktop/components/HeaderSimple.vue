<template>
    <header class="simple-nav">
        <main-menu/>
    </header>
</template>
<script>
    import MainMenu from "./MainMenu";

    export default {
        components: {
            MainMenu
        }
    }
</script>

<style lang="scss">
    .simple-nav {
        background-color: rgba(73, 89, 115, 0.9) !important;
        position: fixed;
        top: 0;
        left: 0;
        height: 80px;
        z-index:9999;
        width:100%;

        #logo {

            background: none;
        }
    }
</style>
