<template>
    <div>
        <div class="row" v-if="message">
            <div class="col-12">
                <div class="alert alert-primary" role="alert">
                    {{message}}
                </div>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                <input type="search" placeholder="Search" class="form-control" v-model="search">
                <p style="color:lightgray;font-size:10px;">Всего записей
                    {{filteredJsonData!=null?filteredJsonData.length:0}}</p>
            </div>
            <div class="col-2">
                <input type="number" v-model="selected_id" class="form-control" placeholder="Enter Id">
            </div>
            <div class="col-6">
                <div class="btn-group" role="group" aria-label="Basic example">

                    <a href="/admin/reviews/add" class="btn btn-secondary">Create</a>
                    <button type="button" class="btn btn-secondary" @click="update()">Edit</button>
                    <button type="button" class="btn btn-secondary" @click="show()">Show</button>
                    <button type="button" class="btn btn-secondary" @click="remove()">Remove</button>
                    <button type="button" v-if="need_restore" class="btn btn-secondary" @click="restore()">Restore</button>
                </div>
            </div>
        </div>
        <div class="row mb-2" v-if="needPagination">
            <div class="col-12">
                <div class="btn-group" role="group" aria-label="Basic example">

                    <a class="btn btn-secondary" :href="pages.first_page_url"
                       v-if="pages.first_page_url">First</a>

                    <a class="btn btn-secondary" :href="pages.prev_page_url" v-if="pages.prev_page_url">Prev</a>
                    <a class="btn btn-secondary" :href="pages.next_page_url" v-if="pages.next_page_url">Next</a>

                    <a class="btn btn-secondary" :href="pages.last_page_url" v-if="pages.last_page_url">Last</a>
                </div>
            </div>
        </div>
        <json-viewer
            :value="filteredJsonData"
            :expand-depth=5
            copyable
            boxed
            sort></json-viewer>

    </div>
</template>
<script>

    export default {
        props: ["items","need_restore"],
        data() {
            return {
                message: null,
                loading: false,
                jsonData: [],
                search: null,
                selected_id: null,

                pages: {
                    first_page_url: null,
                    last_page_url: null,
                    next_page_url: null,
                    prev_page_url: null,
                }
            }
        },

        watch: {
            selected_id: function (newVal, oldVal) {
                this.message = null;
            }
        },
        computed: {
            needPagination() {
                return !(this.pages.first_page_url === this.pages.last_page_url)
            },
            filteredJsonData() {
                if (!this.search)
                    return this.jsonData.data

                let tmp = [];

                this.jsonData.data.forEach(item => {

                    this.search = this.search.trim().toLowerCase();

                    if (item.id == this.search ||
                        item.name.trim().toLowerCase().indexOf(this.search) !== -1 ||
                        item.email.trim().toLowerCase().indexOf(this.search) !== -1 ||
                        item.profile.company_name.trim().toLowerCase().indexOf(this.search) !== -1
                    )
                        tmp.push(item);
                })

                return tmp;
            },
        },

        mounted() {

            let tmp = JSON.parse(this.items)

            this.jsonData = tmp

            this.pages.first_page_url = tmp.first_page_url
            this.pages.last_page_url = tmp.last_page_url
            this.pages.next_page_url = tmp.next_page_url
            this.pages.prev_page_url = tmp.prev_page_url

        },
        methods: {
            update() {
                if (!this.selected_id || this.selected_id === "") {
                    this.sendMessage("Не указан ID")
                    return;
                }

                window.location.href = `/admin/orders/edit/${this.selected_id}`
            },
            show() {
                if (!this.selected_id || this.selected_id === "") {
                    this.sendMessage("Не указан ID")
                    return;
                }

                window.location.href = `/admin/orders/show/${this.selected_id}`
            },
            restore() {
                if (!this.selected_id || this.selected_id === "") {
                    this.sendMessage("Не указан ID")
                    return;
                }

                window.location.href = `/admin/orders/restore/${this.selected_id}`
            },
            remove() {
                if (!this.selected_id || this.selected_id === "") {
                    this.sendMessage("Не указан ID")
                    return;
                }

                axios.delete(`/admin/orders/delete/${this.selected_id}`)
                    .then(resp => {
                        document.location.reload();
                    }).catch((e) => {
                    this.message = e.response.data.message
                    this.sendMessage(this.message, 'error');
                })
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
