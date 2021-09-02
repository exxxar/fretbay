<template>

    <main id="content">
        <!-- Description Section -->
        <div class="container space-1 space-3--md">
            <div class="row pb-5 pt-5" v-if="favorites.length>0">
                <h2>Your favorite quotes</h2>
                <div class="col-lg-12  mb-9 mb-lg-0">
                    <small style="color:lightgray;">Results {{favorites.length}}</small>


                    <listing-item-component :listing="favorite.listing" :key="favorite.id" v-for="favorite in favorites" v-if="favorite"/>


                    <div class="mb-9"></div>

                    <favorites-paginate-component/>
                </div>

                <div class="col-lg-12 mb-9 mb-lg-0 d-flex justify-content-center flex-wrap"
                     v-if="favorites.length===0">
                    <img v-lazy="'/images/tagBackgrounds.png'" style="width: 100%; height:300px; object-fit: contain;"
                         alt="">
                    <h3 class="text-center">Nothing to display</h3>
                    <div class="d-flex justify-content-center w-100 row">
                        <div class="col-12 col-sm-6">
                            <a href="/find-transporter" class="btn btn-outline-success w-100 mb-1">Request a quote
                            </a>


                        </div>

                    </div>
                </div>
            </div>
            <div class="row pb-5 pt-5" v-else>
                <h1>Empty list</h1>
            </div>
        </div>
    </main>
</template>
<script>
    export default {
        computed: {

            favorites: function () {
                return this.$store.getters.favorites;
            },

            user() {
                return window.user
            },


        },

        mounted() {
            this.$store.dispatch("loadFavorites")
            //this.goToPage(1)
        },


    }
</script>
