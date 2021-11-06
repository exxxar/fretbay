<template>
    <div class="container p-0 pt-3">
        <div class="row ">
            <div class="col-lg-12 mb-2 mb-lg-0" >
                <div class="row d-flex">
                    <div class="col-md-4">
                        <a class="btn btn-link p-0" href="/find-loads"><i class="fas fa-dolly"></i>
                            <strong>{{$trans('profile.page.find_loads')}}</strong></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4 d-flex flex-column">
                        <small class="ml-3">Order by</small>
                        <div class="d-flex justify-content-around ">
                            <a href="#" class="btn btn-link pt-0 d-flex align-items-center " v-bind:class="{'text-primary':sort==='id'}"
                               @click="changeSort('id')">Id

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

                            <a href="#" class="btn btn-link pt-0 d-flex align-items-center" v-bind:class="{'text-primary':sort==='title'}"
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
                            <a href="#" class="btn btn-link pt-0 d-flex align-items-center" v-bind:class="{'text-primary':sort==='description'}"
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

                            <a href="#" class="btn btn-link pt-0 d-flex align-items-center" v-bind:class="{'text-primary':sort==='price'}"
                               @click="changeSort('price')">Price
                                <p class="m-0 p-0 ml-1 " v-if="sort==='price'&&direction===false">
                                    <span>
                                         <i class="fas fa-sort-up"></i>
                                    </span>
                                </p>

                                <p class="m-0 p-0 ml-1" v-if="sort==='price'&&direction===true">
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
                               autofocus="true" autocomplete="false" v-model="search">
                    </div>
                </div>


                <p v-if="orders.length>0">{{$trans('profile.page.count_results')}}: {{filteredOrders.length}} <i class="fas fa-boxes"></i></p>
                <hr>
                <order-item-component :key="index" v-for="(order,index) in filteredOrders" :order="order" v-on:update="selfUpdate" v-if="orders.length>0"/>

                <div class="row" v-if="filteredOrders.length===0">
                    <div class="col-lg-12 mb-2 mb-lg-0" >
                        <div class="d-flex p-5 justify-content-center" >
                            <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
                        </div>
                        <h4 class="text-center">{{$trans('profile.page.no_orders')}}</h4>
                    </div>
                </div>

            </div>




            <order-paginate-component v-if="orders.length>0"/>
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
            orders: function () {
                return this.$store.getters.userOrders;
            },
            sortOrders() {
                if (this.sort === '')
                    return this.orders

                return this.orders.sort((a, b) => {
                    if (a[this.sort] > b[this.sort]) {
                        return this.direction ? 1 : -1;
                    }
                    if (a[this.sort] < b[this.sort]) {
                        return this.direction ? -1 : 1;
                    }
                    return 0;
                })

            },
            filteredOrders() {
                if (this.search === '')
                    return this.sortOrders

                let tmp = this.sortOrders

                return tmp.filter(item => item.title.indexOf(this.search) !== -1
                    || ("" + item.id).indexOf(this.search) !== -1
                    || ("" + item.description).indexOf(this.search) !== -1
                    || ("" + item.price).indexOf(this.search) !== -1
                )
            },
        },
        methods: {
            selfUpdate() {
                this.$emit("update")
            },
            changeSort(name) {
                this.sort = name
                this.direction = !this.direction
            }
        },
        mounted(){
            console.log("order=>",this.orders)
        }


    }
</script>
