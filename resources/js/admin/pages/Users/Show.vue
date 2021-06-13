<template>
    <form class="row w-100 m-auto justify-content-center align-items-center">
        <div class="col-12 mb-2" v-if="message">
            <div class="alert alert-primary" role="alert" style="word-break: break-all">
                {{message}}
            </div>
        </div>
        <div class="col-12 mb-2">
            <json-viewer
                :value="json"
                :expand-depth=5
                copyable
                boxed
                sort></json-viewer>
        </div>

    </form>
</template>

<script>
    export default {
        name: "Show",
        props: ['item'],
        data() {
            return {
                message: null,
                json: {
                },

                options: {
                    mode: 'code'
                }

            }
        },
        mounted() {
            this.json = JSON.parse(this.item)
        },
        computed: {},
        methods: {
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


