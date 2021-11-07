<template>
    <div class="card mb-2 " v-bind:class="getClassByType()">
        <div class="card-body p-2">


            <div class="row">
                <div class="col-12"><p><span class="badge badge-success">{{item.success?"Payed":"Not payed"}}</span> {{item.title}} (payed by {{item.type}}) <strong>{{item.amount}}
                    {{item.currency}}</strong></p>
                </div>

                <div class="col-12"><p>{{item.description}}</p></div>
                <div class="col-12"><p class="mb-0">{{item.created_at | moment("from", "now", true) }}</p></div>

                <div class="col-12" v-if="!item.success">
                    <button class="btn btn-primary">Try pay against!</button>
                </div>
            </div>


        </div>
    </div>
</template>
<script>
    export default {
        props: ["item"],
        data() {
            return {
                types: [
                    {
                        type: 0,
                        name: "bg-light"
                    },
                    {
                        type: 1,
                        name: "bg-danger"
                    },
                    {
                        type: 2,
                        name: "bg-error"
                    },
                    {
                        type: 3,
                        name: "bg-success"
                    },
                ]
            }
        },
        computed: {
            prepareLink: function () {
                return ([
                    '#',
                    '/single/message/',
                    '/single/listing/',
                    '/single/quote/',
                    '/single/order/',
                    '/customer/profile/',
                    '/transporter/profile/',
                    '/single/review/',
                    '/single/notification/',

                ][this.item.object_type] || '#') + this.item.object_id;
            }
        },
        methods: {

            getClassByType() {
                let tmp = this.types.find(item => item.type === this.item.type)

                if (!tmp)
                    return ""

                return tmp.name
            }
        }
    }
</script>
