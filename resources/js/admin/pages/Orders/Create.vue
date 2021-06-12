<template>
    <form class="row w-100 m-auto justify-content-center align-items-center" v-on:submit.prevent="submit">
        <div class="col-12 mb-2" v-if="message">
            <div class="alert alert-primary" role="alert" style="word-break: break-all">
                {{message}}
            </div>
        </div>
        <div class="col-12 mb-2">
            <v-jsoneditor v-model="json" :options="options" :plus="false" height="400px"
                          @error="onError"></v-jsoneditor>
        </div>

        <div class="col-12">
            <button class="btn btn-outline-info" type="submit">Create new review</button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "Create",
        data() {
            return {
                message: null,
                json: {
                    title: '',//Название заказа
                    description: '',//Описание заказа
                    price: 0,//Сумма заказа
                    summary_delivery_range: 0,///Суммарное расстояние доставки

                    properties: [],///Параметры груза
                    shipping_date_from: '',//Дата погрузки c
                    shipping_date_to: '',///Дата погрузки по
                    unshipping_date_from: '',//Дата разгрузки с
                    unshipping_date_to: '',//Дата разгрузки по
                    comment: '',//Комментарий к заказу
                    shipping_points_from: [],//Точки, с которых груз забрать
                    shipping_delivery_address: [],//Точка, на которую груз выгрузить

                    additional_properties: [],//Дополнительные параметры

                },
                options: {
                    mode: 'code'
                }

            }
        },

        methods: {
            submit() {

                this.message = null;

                axios.post("/admin/orders/add", this.json)
                    .then(resp => {
                        this.sendMessage("Success orders create!")
                    }).catch((e) => {


                    this.sendMessage(e.response.data.message, 'error');
                })
            },
            onError() {
                console.log('error')
            },
            sendMessage(message, type = 'success') {

                this.message = message
                this.$notify({
                    group: 'info',
                    type: type,
                    title: 'Orders',
                    text: message
                });
            },


        }
    }
</script>

