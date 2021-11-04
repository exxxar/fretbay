<template>
    <section class="container" style="padding-top: 30px;">
        <!--
           <customer-reviews-component v-if="type==3"/>
           <transporter-reviews-component v-if="type==4"/>
   -->
        <listing-item-component :listing="item" :details="false" v-if="type=='listing'&&item"/>

        <message-item-component :item="item" :payload="payload" v-if="(type=='listing'||type=='message')&&item"/>

        <order-item-component :order="item" v-if="type=='order'&&item"/>
        <notification-item-component :item="item" v-if="type=='notification'&&item"/>
        <transporter-reviews-component v-if="type=='review'&&item"/>
        <quote-item-component v-if="type=='quote'&&item"/>


        <div class="d-flex p-5 justify-content-center" v-if="!item">
            <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto"
                 style="max-width:300px">
        </div>
        <h4 class="text-center" v-if="!item">{{$trans('profile.page.no_data')}}</h4>

    </section>
</template>
<script>
    export default {
        props: ["type", "index"],
        data() {
            return {
                item: null,
                payload: null
            }
        },
        mounted() {
            console.log(this.type, this.index)
            this.loadItem()
        },
        methods: {
            loadItem() {
                axios.get(`/data/${this.type}/${this.index}`).then((resp) => {
                    this.item = resp.data.item
                    this.payload = resp.data.payload
                })
            }
        }
    }
</script>
