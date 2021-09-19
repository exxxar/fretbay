<template>
    <div>
        <div class="row d-flex">
            <div class="col-md-4">
                <a class="btn btn-link p-0" href="/find-transporter"><i class="fas fa-dolly"></i> Try to
                    <strong>find a transporter!</strong></a>
            </div>
        </div>
        <p v-if="orders.length>0">Count results: {{orders.length}} <i class="fas fa-boxes"></i></p>
        <hr>
        <order-item-component :key="index" v-for="(order,index) in orders" :order="order" v-on:update="selfUpdate"/>

        <div class="d-flex p-5 justify-content-center" v-if="orders.length===0">
            <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto"
                 style="max-width:300px;">
        </div>
        <h4 class="text-center" v-if="orders.length===0">No orders yet!</h4>

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
        methods:{
            selfUpdate(){
                this.$emit("update")
            }
        }


    }
</script>
