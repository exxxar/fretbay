<template>
    <div class="row pb-5 pt-5" v-if="listings.length>0">
        <h2>Your quotes</h2>
        <div class="col-lg-12  mb-9 mb-lg-0">
            <small style="color:lightgray;">Results {{listings.length}}</small>
            <listing-item-component :key="index" v-for="(listing,index) in listings" :listing="listing"/>

            <div class="mb-9"></div>

            <listing-paginate-component/>
        </div>

        <div class="col-lg-12 mb-9 mb-lg-0 d-flex justify-content-center flex-wrap" v-if="listings.length===0&&notfound">
            <img v-lazy="'/images/tagBackgrounds.png'" style="width: 100%; height:300px; object-fit: contain;" alt="">
            <h3 class="text-center">Nothing to display</h3>
            <div class="d-flex justify-content-center w-100 row">
                <div class="col-12 col-sm-6">
                    <a href="/find-transporter" class="btn btn-outline-success w-100 mb-1">Request a quote
                    </a>


                </div>

            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:{
            notfound: {
                type:Boolean,
                default: false,
            }

        },
        data() {
            return {
                need_more: true,
                selected: '',
            }
        },
        computed: {

            listings: function () {
                return this.$store.getters.userListings;
            },

            user() {
                return window.user
            },


        },

        mounted() {
            this.$store.dispatch('getListings')
        },


    }
</script>
