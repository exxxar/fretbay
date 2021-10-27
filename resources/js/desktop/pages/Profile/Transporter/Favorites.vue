<template>

    <main id="content" style="padding-top: 30px;">
        <!-- Description Section -->
        <div class="container p-1">
            <div class="row d-flex">
                <div class="col-12 mt-2 pr-3 pb-2 pl-3">
                    <a class="btn btn-link p-0" href="/find-loads"><i class="fas fa-dolly"></i>
                        <strong>{{$trans('profile.page.find_loads')}}!</strong></a>
                </div>
            </div>
            <p v-if="favorites.length>0">{{$trans('profile.page.count_results')}}: {{favorites.length}} <i
                class="fas fa-boxes"></i></p>

            <div class="row pb-5 pt-2" v-if="favorites.length>0">
                <div class="col-lg-12  mb-9 mb-lg-0 p-0">

                    <listing-item-component :listing="favorite.listing" :key="favorite.id" v-for="favorite in favorites"
                                            v-if="favorite"/>
                    <div class="mb-9"></div>

                    <favorites-paginate-component/>
                </div>

                <div class="col-lg-12 mb-9 mb-lg-0 d-flex justify-content-center flex-wrap"
                     v-if="favorites.length===0">
                    <img v-lazy="'/images/tagBackgrounds.png'" style="width: 100%; height:300px; object-fit: contain;"
                         alt="">
                    <h3 class="text-center">{{$trans('profile.page.no_favorites')}}</h3>
                    <div class="d-flex justify-content-center w-100 row">
                        <div class="col-12 col-sm-6">
                            <a href="/find-transporter" class="btn btn-outline-success w-100 mb-1">
                                {{$trans('profile.favorites.a_1')}}
                            </a>


                        </div>

                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center pb-5 pt-5" v-else>
                <div class="d-flex p-5 justify-content-center" v-if="favorites.length===0">
                    <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
                </div>
                <h4 class="text-center" v-if="favorites.length===0"> {{$trans('profile.page.no_favorites')}}</h4>
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
        },
    }
</script>
