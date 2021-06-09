<template>
    <header class="simple-nav" style="overflow: hidden">
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
body {
    background-color: #f3f3f3;
}

.simple-nav {
    background-color: rgba(73, 89, 115, 0.9) !important;
    position: fixed;
    top: 0;
    left: 0;
    height: 80px;
    z-index: 9999;
    width: 100%;

    #logo {

        background: none;
    }
}

.main-logo {
    width: 50px;
    height: 70px;
}

.logo__list li a {
    padding: 0px 20px;
}
</style>
