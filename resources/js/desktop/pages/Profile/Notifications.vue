<template>
    <main id="content" style="padding-top: 30px;">
        <!-- Description Section -->

        <div class="container p-2">
            <div class="row p-0 m-0">
                <div class="col-12 col-md-4 d-flex flex-column p-0">
                    <small class="ml-3">Order by</small>
                    <div class="d-flex justify-content-around ">
                        <a href="#" class="btn btn-link pt-0 d-flex align-items-center "
                           v-bind:class="{'text-primary':sort==='created_at'}"
                           @click="changeSort('created_at')">Notify At

                            <p class="m-0 p-0 ml-1 " v-if="sort==='created_at'&&direction===false">
                                    <span>
                                         <i class="fas fa-sort-up"></i>
                                    </span>
                            </p>

                            <p class="m-0 p-0 ml-1" v-if="sort==='created_at'&&direction===true">
                                    <span>
                                         <i class="fas fa-sort-down"></i>
                                    </span>
                            </p>

                        </a>

                        <a href="#" class="btn btn-link pt-0 d-flex align-items-center"
                           v-bind:class="{'text-primary':sort==='title'}"
                           @click="changeSort('title')">Title
                            <p class="m-0 p-0 ml-1 " v-if="sort==='title'&&direction===false">
                                    <span>
                                         <i class="fas fa-sort-up"></i>
                                    </span>
                            </p>

                            <p class="m-0 p-0 ml-1" v-if="sort==='title'&&direction===true">
                                    <span>
                                         <i class="fas fa-sort-down"></i>
                                    </span>
                            </p>
                        </a>
                        <a href="#" class="btn btn-link pt-0 d-flex align-items-center"
                           v-bind:class="{'text-primary':sort==='description'}"
                           @click="changeSort('description')">Description
                            <p class="m-0 p-0 ml-1 " v-if="sort==='description'&&direction===false">
                                    <span>
                                         <i class="fas fa-sort-up"></i>
                                    </span>
                            </p>

                            <p class="m-0 p-0 ml-1" v-if="sort==='description'&&direction===true">
                                    <span>
                                         <i class="fas fa-sort-down"></i>
                                    </span>
                            </p>
                        </a>


                    </div>
                </div>
                <div class="col-12 col-md-8 ">
                    <input type="search" class="form-control mb-2" name="search"
                           placeholder="Search..."
                           autofocus="true" autocomplete="new-notifications" v-model="search">
                </div>
            </div>

            <hr>

            <div class="row m-0" v-if="notifications.length>0">
                <div class="col-12 col-md-4 p-1" :key="item.id" v-for="item in filteredNotifications">
                    <notification-item-component :item="item"/>
                </div>
                <div class="col-12 mt-2">
                    <notification-paginate-component/>
                </div>
            </div>

            <div class="row d-flex p-5 justify-content-center" v-if="filteredNotifications.length===0">
                <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
            </div>
            <h4 class="text-center" v-if="filteredNotifications.length===0">
                {{$trans('profile.page.no_notifications')}}</h4>
        </div>


    </main>
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
            notifications: function () {
                return this.$store.getters.notifications;
            },
            sortNotifications: function () {
                if (this.sort === '')
                    return this.notifications

                return this.notifications.sort((a, b) => {
                    if (a[this.sort] > b[this.sort]) {
                        return this.direction ? 1 : -1;
                    }
                    if (a[this.sort] < b[this.sort]) {
                        return this.direction ? -1 : 1;
                    }
                    return 0;
                })

            },
            filteredNotifications: function () {
                if (this.search === '')
                    return this.sortNotifications

                let tmp = this.sortNotifications

                return tmp.filter(item => item.description.indexOf(this.search) !== -1
                    || ("" + item.title).indexOf(this.search) !== -1
                    || ("" + item.id).indexOf(this.search) !== -1
                )
            },
        },
        mounted() {
            this.$store.dispatch('loadNotifications')
        },
        methods: {
            changeSort(name) {
                this.sort = name
                this.direction = !this.direction
            }
        }
    }
</script>
