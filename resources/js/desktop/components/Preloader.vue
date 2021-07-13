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


            window.eventBus.$on("preloader", () =>{
                this.is_hidden = false;
                let timeout = setTimeout(() => {
                    this.is_hidden = true;
                    clearTimeout(timeout);
                }, this.time)
            });
        },
        name: "Preloader"
    }
</script>

<style lang="scss">
    .page-loader {
        width:100%;
        height: 100vh;
        z-index: 10000000;
        position: fixed;
        top: 0px;
        left:0px;
        background:white;
        display:flex;
        justify-content:center;
        align-items:center;
    }
</style>
