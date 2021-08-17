<template>
    <div class="row pb-5 pt-5">
        <div class="col-lg-6 mb-9 mb-lg-0">
            <div class="card">
                <div class="card-body">

                    <div class="form-group row">
                        <div class="input-group p-2">
                            <input type="text" class="form-control"
                                   :placeholder="'Your bid price 1000 '+currentCurrency"
                                   aria-label="Text input with segmented dropdown button">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-primary">{{currentCurrency}}</button>
                                <button type="button"
                                        class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#dollar" @click="currentCurrency = '$'">$ (dollars
                                        USA)</a>
                                    <a class="dropdown-item" href="#euro" @click="currentCurrency = '€'">€ (Euro)</a>
                                    <a class="dropdown-item" href="#ruble" @click="currentCurrency = '₽'">₽ (Ruble)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6 class="text-center">Quote validity</h6>
                    <div class="form-group row d-flex justify-content-center">
                        <button class="btn ml-2 mb-2"
                                v-bind:class="{'btn-primary':quote_validity===item.id,'btn-outline-primary':quote_validity!==item.id}"
                                :key="item.id" v-for="item in quote_validity_list" @click="quote_validity = item.id">
                            {{item.title}}
                        </button>
                    </div>
                    <hr>
                    <h6 class="text-center">What type of transport is this?</h6>
                    <div class="form-group row d-flex justify-content-center">
                        <button class="btn ml-2 mb-2"
                                v-bind:class="{'btn-primary':type_of_transport===item.id,'btn-outline-primary':type_of_transport!==item.id}"
                                :key="item.id" v-for="item in type_of_transport_list"
                                @click="type_of_transport = item.id">
                            {{item.title}}
                        </button>
                    </div>

                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-sm-6">
                            <button class="btn btn-primary w-100">
                                Send a quote
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-9 mb-lg-0 quote-list" >

            <div class="card mb-2" v-for="item in quote_list">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4"><a class="w-100 text-center d-block"
                                              target="_blank"
                                              :href="'/profile/'+item.user_id">
                            {{item.user.profile.company_name}}</a>
                        </div>
                        <div class="col-4">
                            <p class="text-center m-0"> {{item.price}} {{item.currency}}</p>
                            <a href="#" class="w-100 text-center d-block"><small>See details</small></a>
                        </div>
                        <div class="col-4">
                            <p class="text-center m-0"> {{preparedQuoteStatus(item.status)}}</p>
                            <a href="#" class="w-100 btn btn-primary m-0 p-0 d-block"><small>Remove a quote</small></a>
                            <!-- <a href="#" class="btn btn-primary">Remove a quote</a>-->
                            <!--     <button class="btn btn-outline-warning w-100">Remove a quote</button>
                               -->


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        props: ["quotes"],
        data() {
            return {
                currentCurrency: '$',
                quote_validity: 2,
                type_of_transport: 2,
                quote_validity_list: [
                    {
                        id: 1,
                        title: '6 hours'
                    },
                    {
                        id: 2,
                        title: '12 hours'
                    },
                    {
                        id: 3,
                        title: '24 hours (1 day)'
                    },
                    {
                        id: 4,
                        title: '48 hours (2 day)'
                    },

                    {
                        id: 5,
                        title: '96 hours (4 day)'
                    }
                    ,
                    {
                        id: 6,
                        title: '144 hours (6 day)'
                    }
                ],
                type_of_transport_list: [

                    {
                        id: 1,
                        title: 'Grouping'
                    },
                    {
                        id: 2,
                        title: 'One way'
                    }
                    ,
                    {
                        id: 3,
                        title: 'Custom'
                    }
                ],
                quote_list: [
                    {
                        id: 1,
                        price: 1200,
                        currency: '$',
                        valid_until_date: new Date(),
                        additional_info: [],
                        status: 0,
                        listing_id: 1,
                        user_id: 1,
                        user: {
                            profile: {
                                company_name: 'Test company',
                            }
                        }
                    },

                ]
            }
        },

        mounted() {
            console.log("test quotes=>", this.quotes)
        }
        ,
        methods: {
            preparedQuoteStatus(status) {
                return "In progress"
            }
        }


    }
</script>
<style lang="scss">
    .quote-list {
        max-height: 500px;
        overflow-y: auto;
    }
</style>
