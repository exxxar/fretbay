<template>
    <div class="row">
        <div class="col-lg-12 mb-2 mb-lg-0 " v-if="orders.length>0">
            <div class="row d-flex">
                <div class="col-md-4">
                    <a class="btn btn-link p-0" href="/find-loads"><i class="fas fa-dolly"></i> Try to
                        <strong>find loads!</strong></a>
                </div>
            </div>
            <p v-if="orders.length>0">Count results: {{orders.length}} <i class="fas fa-boxes"></i></p>
            <hr>
            <order-item-component :key="index" v-for="(order,index) in orders" :order="order" v-on:update="selfUpdate"/>
        </div>


        <div class="col-lg-12 mb-2 mb-lg-0" v-else>
            <div class="d-flex p-5 justify-content-center" v-if="orders.length===0">
                <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
            </div>
            <h4 class="text-center">No orders yet!</h4>
        </div>

        <order-paginate-component/>
    </div>
</template>
<script>
    export default {
        computed: {
            orders: function () {
                return this.$store.getters.userOrders;
            },
        },
        methods: {
            selfUpdate() {
                this.$emit("update")
            }
        },
        mounted(){
            console.log("order=>",this.orders)
        }


    }
</script>
