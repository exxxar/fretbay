<template>

    <main id="content">
        <div class="container space-3-bottom--lg" style="margin-top: 130px;">
          <quotes-component :notfound="true"/>
        </div>

    </main>

</template>

<script>

    export default {


        computed: {

            user() {
                return window.user
            },
            listings: function () {
                return this.$store.getters.userListings;
            },
        },

        created() {

        },
        mounted() {
            this.$store.dispatch('getListings')
        },


    }
</script>

<style lang="scss">
    .bg-info {
        width: 50px;
        height: 50px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .item {
        background: white;
        border: 1px lightgray solid;
        padding: 0px;
        border-radius: 5px;
        margin-bottom: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .step {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        text-align: center;

        .step-num {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background: #21c87a;
            margin-bottom: 10px;
        }
    }

    .sticky-block {
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
    }

    .card-primary {
        border: 1px #21c87a solid;
    }

    .filter-card {
        height: 145px;

        img {
            height: 100px;
            object-fit: contain;
        }

        small {
            display: block;
            line-height: 100%;
        }
    }


    .slick-arrow {
        padding: 5px;
        width: 40px;
        height: 40px;

        border-radius: 7px;
        z-index: 100;
        display: flex;
        justify-content: center;
        align-items: center;

        &:before {
            color: #21c87a;
        }

        &.slick-next {
            right: 0;
        }

        &.slick-prev {
            left: 0;
        }
    }

</style>
