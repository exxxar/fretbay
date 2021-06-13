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
                    user: {
                        name: "User name",
                        email: "vue",
                        password: "vue",
                        phone: "123",
                        profile: {
                            company_name: "vue",
                            type: "vue",
                            first_name: "vue",
                            second_name: "vue",
                            telephone_number_1: "vue",
                            telephone_number_2: "vue",
                            country: "vue",
                            city: "vue",
                            region: "vue",
                            postal: "vue",
                            areas_of_expertise: "vue",
                        }
                    },

                },
                options: {
                    mode: 'code'
                }

            }
        },

        methods: {
            submit() {

                this.message = null;

                axios.post("/admin/users/add", this.json)
                    .then(resp => {
                        this.sendMessage("Success user create!")
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
                    title: 'Users',
                    text: message
                });
            },


        }
    }
</script>

