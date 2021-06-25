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

</style>
