<template>
    <div class="page-loader" v-if="!is_hidden">
        <img src="/images/common/icons/general/content-loader.gif" alt="preloader">
    </div>
</template>

<script>
    export default {
        props: {
            time: {
                type: Number,
                default: 1000,
            }
        },
        data() {
            return {
                is_hidden: false,
            }
        },
        mounted() {
            let timeout = setTimeout(() => {
                this.is_hidden = true;
                clearTimeout(timeout);
            }, this.time)
        },
        name: "Preloader"
    }
</script>

<style lang="scss">
    .page-loader {
        position: fixed;
        background: rgba(255, 255, 255, 0.96);
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100vh;
        z-index: 99999;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
