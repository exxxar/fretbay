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
            <button class="btn btn-outline-info" type="submit">Create new verifications</button>
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
                    title:'',
                    document_number:'',
                    type:0,
                    documents:[],
                    images:[],
                    comment:[],
                    additional_properties:[],
                    is_approved:false,
                    profile_id:null,
                    issue_date:'',
                    expire_date:'',

                },
                options: {
                    mode: 'code'
                }

            }
        },

        methods: {
            submit() {

                this.message = null;

                axios.post("/admin/verifications/add", this.json)
                    .then(resp => {
                        this.sendMessage("Success verifications create!")
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
                    title: 'Verifications',
                    text: message
                });
            },


        }
    }
</script>

