<template>
    <div>
        <div class="row d-flex">
            <div class="col-md-4">
                <a class="btn btn-link p-0" href="/find-transporter"><i class="fas fa-dolly"></i> Try to
                    <strong>find a transporter!</strong></a>
            </div>
        </div>
        <p v-if="listings.length>0">Count results: {{listings.length}} <i class="fas fa-boxes"></i></p>
        <hr>
        <listing-item-component :key="index" v-for="(listing,index) in listings"
                                 :listing="listing"
                                 v-on:update="selfUpdate"
        />
        <div class="d-flex p-5 justify-content-center" v-if="listings.length===0">
            <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto"
                 style="max-width:300px">
        </div>
        <h4 class="text-center" v-if="listings.length===0">No listing yet!</h4>

        <div class="mb-9"></div>

        <listing-paginate-component/>
    </div>
</template>
<script>
    export default {
        computed: {
            listings: function () {
                return this
                    .$store.getters.listings;
            },
        },
        methods:{
            selfUpdate(){
                this.$emit("update")
            }
        }


    }
</script>
