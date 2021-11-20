<template>
    <div class="container p-0 pt-3">
        <div class="row d-flex">
            <div class="col-12 mt-2 pr-1 pb-2 pl-1">
                <a class="btn btn-link p-0" href="/find-loads"><i class="fas fa-dolly"></i>
                    <strong>{{$trans('profile.page.find_loads')}}!</strong></a>
            </div>
        </div>
        <div class="col-12 p-0">

            <div class="row p-0">
                <div class="col-12 col-md-6 d-flex flex-column p-0">
                    <small class="ml-3">Order by</small>
                    <div class="d-flex justify-content-around ">
                        <a href="#" class="btn btn-link pt-0 d-flex align-items-center "
                           v-bind:class="{'text-primary':sort==='id'}"
                           @click="changeSort('id')">Ref

                            <p class="m-0 p-0 ml-1 " v-if="sort==='id'&&direction===false">
                                    <span>
                                         <i class="fas fa-sort-up"></i>
                                    </span>
                            </p>

                            <p class="m-0 p-0 ml-1" v-if="sort==='id'&&direction===true">
                                    <span>
                                         <i class="fas fa-sort-down"></i>
                                    </span>
                            </p>

                        </a>

                        <a href="#" class="btn btn-link pt-0 d-flex align-items-center"
                           v-bind:class="{'text-primary':sort==='message_count'}"
                           @click="changeSort('message_count')">Messages
                            <p class="m-0 p-0 ml-1 " v-if="sort==='message_count'&&direction===false">
                                    <span>
                                         <i class="fas fa-sort-up"></i>
                                    </span>
                            </p>

                            <p class="m-0 p-0 ml-1" v-if="sort==='message_count'&&direction===true">
                                    <span>
                                         <i class="fas fa-sort-down"></i>
                                    </span>
                            </p>
                        </a>
                        <a href="#" class="btn btn-link pt-0 d-flex align-items-center"
                           v-bind:class="{'text-primary':sort==='quote_count'}"
                           @click="changeSort('quote_count')">Quotes
                            <p class="m-0 p-0 ml-1 " v-if="sort==='quote_count'&&direction===false">
                                    <span>
                                         <i class="fas fa-sort-up"></i>
                                    </span>
                            </p>

                            <p class="m-0 p-0 ml-1" v-if="sort==='quote_count'&&direction===true">
                                    <span>
                                         <i class="fas fa-sort-down"></i>
                                    </span>
                            </p>
                        </a>

                        <a href="#" class="btn btn-link pt-0 d-flex align-items-center"
                           v-bind:class="{'text-primary':sort==='summary_volume'}"
                           @click="changeSort('summary_volume')">Volume
                            <p class="m-0 p-0 ml-1 " v-if="sort==='summary_volume'&&direction===false">
                                    <span>
                                         <i class="fas fa-sort-up"></i>
                                    </span>
                            </p>

                            <p class="m-0 p-0 ml-1" v-if="sort==='summary_volume'&&direction===true">
                                    <span>
                                         <i class="fas fa-sort-down"></i>
                                    </span>
                            </p>
                        </a>

                    </div>
                </div>
                <div class="col-12 col-md-6 ">
                    <input type="search" class="form-control mb-2" name="search"
                           placeholder="Search..."
                           autofocus="true" autocomplete="false" v-model="search">
                </div>
            </div>


        </div>
        <p v-if="favorites.length>0">{{$trans('profile.page.count_results')}}: {{sortFavorites.length}} <i
            class="fas fa-boxes"></i></p>

        <hr>
        <div class="row pb-5 pt-2" v-if="sortFavorites.length>0">
            <div class="col-lg-12  mb-9 mb-lg-0 p-0">

                <listing-item-component :listing="favorite.listing" :key="favorite.id" v-for="favorite in sortFavorites"
                                        v-if="favorite"/>
                <div class="mb-9"></div>

                <favorites-paginate-component/>
            </div>

            <div class="col-lg-12 mb-9 mb-lg-0 d-flex justify-content-center flex-wrap"
                 v-if="sortFavorites.length===0">
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
            <div class="d-flex p-5 justify-content-center" v-if="sortFavorites.length===0">
                <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
            </div>
            <h4 class="text-center" v-if="sortFavorites.length===0"> {{$trans('profile.page.no_favorites')}}</h4>
        </div>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                search: '',
                sort: '',
                direction: false,
            }
        },
        computed: {
            favorites: function () {
                return this.$store.getters.favorites.filter(item=>item.status === true);
            },
            user() {
                return window.user
            },
            sortFavorites() {
                if (this.sort === '')
                    return this.favorites

                return this.favorites.sort((a, b) => {
                    if (a.listing[this.sort] > b.listing[this.sort]) {
                        return this.direction ? 1 : -1;
                    }
                    if (a.listing[this.sort] < b.listing[this.sort]) {
                        return this.direction ? -1 : 1;
                    }
                    return 0;
                })

            },
            filteredFavorites() {
                if (this.search === '')
                    return this.sortFavorites

                let tmp = this.sortFavorites

                return tmp.filter(item => item.listing.additional_info.indexOf(this.search) !== -1
                    || ("" + item.listing.id).indexOf(this.search) !== -1
                    || ("" + item.listing.summary_volume).indexOf(this.search) !== -1
                )
            },
        },
        mounted() {
            this.$store.dispatch("loadFavorites").then(() => {
                console.log(this.favorites)
            })
        },
        methods: {
            changeSort(name) {
                this.sort = name
                this.direction = !this.direction
            }
        }
    }
</script>
