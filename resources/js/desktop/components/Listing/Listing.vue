<template>
    <div>
        <div class="row d-flex">
            <div class="col-md-4">
                <a class="btn btn-link p-0" href="/find-transporter"><i class="fas fa-dolly"></i>
                    <span v-html="$trans('profile.page.find_a_transporter')"></span>

                </a>
            </div>
            <div class="col-12">

                <div class="row">
                    <div class="col-12 col-md-4 d-flex flex-column">
                        <small class="ml-3">Order by</small>
                        <div class="d-flex justify-content-around ">
                            <a href="#" class="btn btn-link pt-0 d-flex align-items-center " v-bind:class="{'text-primary':sort==='id'}"
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

                            <a href="#" class="btn btn-link pt-0 d-flex align-items-center" v-bind:class="{'text-primary':sort==='message_count'}"
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
                            <a href="#" class="btn btn-link pt-0 d-flex align-items-center" v-bind:class="{'text-primary':sort==='quote_count'}"
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
                    <div class="col-12 col-md-7 ">
                        <input type="search" class="form-control mb-2" name="search"
                               placeholder="Search..."
                               value="" autocomplete="off" v-model="preSearch" >
                    </div>

                    <div class="col-12 col-md-1 ">
                        <button class="btn btn-outline-primary w-100" @click="find"><i class="fas fa-search"></i></button>
                    </div>
                </div>


            </div>
        </div>
        <p v-if="listings.length>0">{{$trans('profile.page.count_results')}}: {{filteredListings.length}} <i
            class="fas fa-boxes"></i></p>
        <hr>
        <listing-item-component :key="index" v-for="(listing,index) in filteredListings"
                                :listing="listing"
                                v-on:update="selfUpdate"
        />
        <div class="d-flex p-5 justify-content-center" v-if="filteredListings.length===0">
            <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto"
                 style="max-width:300px">
        </div>
        <h4 class="text-center" v-if="filteredListings.length===0">{{$trans('profile.page.no_listings')}}</h4>

        <div class="mb-9"></div>

        <listing-paginate-component/>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                preSearch: '',
                search: '',
                sort: '',
                direction: false,
            }
        },

        computed: {
            sortListing() {
                if (this.sort === '')
                    return this.listings

                return this.listings.sort((a, b) => {
                    if (a[this.sort] > b[this.sort]) {
                        return this.direction ? 1 : -1;
                    }
                    if (a[this.sort] < b[this.sort]) {
                        return this.direction ? -1 : 1;
                    }
                    return 0;
                })

            },
            filteredListings() {
                if (this.search === '')
                    return this.sortListing

                let tmp = this.sortListing

                return tmp.filter(item => item.additional_info.indexOf(this.search) !== -1
                    || ("" + item.id).indexOf(this.search) !== -1
                    || ("" + item.summary_volume).indexOf(this.search) !== -1
                )
            },
            listings: function () {
                return this.$store.getters.listings;
            },
        },
        methods: {
            find(){
              this.search = this.preSearch
            },
            selfUpdate() {
                this.$emit("update")
            },
            changeSort(name) {
                this.sort = name
                this.direction = !this.direction
            }
        }


    }
</script>
