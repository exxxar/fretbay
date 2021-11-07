<template>
    <main id="content" style="padding-top: 30px;">
        <!-- Description Section -->

        <div class="container p-0">
            <div class="row p-0">
                <div class="col-12 col-md-4 d-flex flex-column p-0">
                    <small class="ml-3">Order by</small>
                    <div class="d-flex justify-content-around ">
                        <a href="#" class="btn btn-link pt-0 d-flex align-items-center "
                           v-bind:class="{'text-primary':sort==='created_at'}"
                           @click="changeSort('created_at')">Payed At

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
                           autofocus="true" autocomplete="search" v-model="search">
                </div>
            </div>

            <hr>

            <div class="row m-0" v-if="payments.length>0">
                <div class="col-12 p-1" :key="item.id" v-for="item in filteredPayments">
                    <payment-item-component :item="item"/>
                </div>
                <div class="col-12 mt-2">
                    <payment-paginate-component/>
                </div>
            </div>

            <div class="row d-flex p-5 justify-content-center" v-if="filteredPayments.length===0">
                <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
            </div>
            <h4 class="text-center" v-if="filteredPayments.length===0">
                {{$trans('profile.page.no_payments')}}</h4>
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
            payments: function () {
                return this.$store.getters.payments;
            },
            sortPayments: function () {
                if (this.sort === '')
                    return this.payments

                return this.payments.sort((a, b) => {
                    if (a[this.sort] > b[this.sort]) {
                        return this.direction ? 1 : -1;
                    }
                    if (a[this.sort] < b[this.sort]) {
                        return this.direction ? -1 : 1;
                    }
                    return 0;
                })

            },
            filteredPayments: function () {
                if (this.search === '')
                    return this.sortPayments

                let tmp = this.sortPayments

                return tmp.filter(item => item.description.indexOf(this.search) !== -1
                    || ("" + item.title).indexOf(this.search) !== -1
                    || ("" + item.id).indexOf(this.search) !== -1
                )
            },
        },
        mounted() {
            this.$store.dispatch('loadPayments')
        },
        methods: {
            changeSort(name) {
                this.sort = name
                this.direction = !this.direction
            }
        }
    }
</script>
