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
            <button class="btn btn-outline-info" type="submit">Create new user</button>
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
                    title: '',
                    articles: [],
                    place_of_loading: [],
                    place_of_delivery: [],
                    shipping_date_from: '',
                    shipping_date_to: '',
                    unshipping_date_from: '',
                    unshipping_date_to: '',
                    messages: [],
                    additional_info: '',
                    images: [],
                    status: '',
                },
                options: {
                    mode: 'code'
                }

            }
        },

        methods: {
            submit() {

                this.message = null;

                axios.post("/admin/listings/add", this.json)
                    .then(resp => {
                        this.sendMessage("Success Listing create!")
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
                    title: 'Listings',
                    text: message
                });
            },


        }
    }
</script>

