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
            <button class="btn btn-outline-info" type="submit">Update user</button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "Edit",
        props: ['item'],
        data() {
            return {
                message: null,
                json: {
                    user: null
                },


                options: {
                    mode: 'code'
                }

            }
        },
        mounted() {
            this.json.user = JSON.parse(this.item)
        },
        computed: {},
        methods: {
            submit() {
                this.message = null;
                axios.put(`/admin/users/edit/${this.json.user.id}`, this.json)
                    .then(resp=>{
                        this.sendMessage("Success user update!")
                    }).catch((e)=>{
                    this.sendMessage(e.response.data.message, 'error');
                })
            },
            onError() {
                console.log('error')
            },
            sendMessage(message) {
                this.message = message

                this.$notify({
                    group: 'info',
                    type: 'success',
                    title: 'Users',
                    text: message
                });
            },

        }

    }
</script>


