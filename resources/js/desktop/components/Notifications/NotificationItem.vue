<template>
    <div class="card mb-2 " v-bind:class="getClassByType()">
        <div class="card-body p-2">
            <div class="row m-0 d-flex align-items-center">
                <div class="col-2 d-flex justify-content-center  font-size-32 h-100">
                    <i class="fas fa-info-circle text-primary" v-if="this.item.type===0"></i>
                    <i class="fas fa-exclamation-circle text-white" v-if="this.item.type===1"></i>
                    <i class="fas fa-exclamation-circle text-primary" v-if="this.item.type===2"></i>
                    <i class="fab fa-ubuntu text-white" v-if="this.item.type===3"></i>
                </div>
                <div class="col-10">

                    <div class="row">
                        <div class="col-12"> <p>{{item.title}}</p></div>
                        <div class="col-12">  <p>{{item.description}}</p></div>
                        <div class="col-12"><p class="mb-0">{{item.created_at | moment("from", "now", true) }}</p></div>
                    </div>

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
