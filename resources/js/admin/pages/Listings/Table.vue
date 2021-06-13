<template>
    <div>
        <b-row>
            <b-col lg="6" class="my-1">
                <b-form-group
                        label="Sorting"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="sortBySelect1"
                        class="mb-0"
                >
                    <b-input-group size="sm">
                        <b-form-select v-model="sortBy" id="sortBySelect1" :options="sortOptions" class="w-75">
                            <template v-slot:first>
                                <option value="">-- none --</option>
                            </template>
                        </b-form-select>
                        <b-form-select v-model="sortDesc" size="sm" :disabled="!sortBy" class="w-25">
                            <option :value="false">Asc</option>
                            <option :value="true">Desc</option>
                        </b-form-select>
                    </b-input-group>
                </b-form-group>
            </b-col>
            <b-col lg="6" class="my-1">
                <b-form-group
                        label="Search"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="filterInput"
                        class="mb-0"
                >
                    <b-input-group size="sm">
                        <b-form-input
                                v-model="filter"
                                type="search"
                                id="filterInput"
                                placeholder="Print to search"
                        />
                        <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-form-group>
            </b-col>
            <b-col sm="5" md="6" class="my-1">
                <b-form-group
                        label="On page"
                        label-cols-sm="6"
                        label-cols-md="4"
                        label-cols-lg="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="perPageSelect1"
                        class="mb-0"
                >
                    <b-form-select
                            v-model="perPage"
                            id="perPageSelect1"
                            size="sm"
                            :options="pageOptions"
                    />
                </b-form-group>
            </b-col>
            <b-col sm="7" md="6" class="my-1">
                <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                        align="fill"
                        size="sm"
                        class="my-0"
                />
            </b-col>
        </b-row>
        <b-table
                show-empty
                small
                stacked="md"
                :items="listings"
                :fields="fields"
                :current-page="currentPage"
                :per-page="perPage"
                :filter="filter"
                :filterIncludedFields="filterOn"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :sort-direction="sortDirection"
                @filtered="onFiltered"
                :busy="loading"
                class="stacked"
                empty-text="Нет записей для отображения"
                empty-filtered-text="Нет записей, соответствующих вашему запросу"
        >
<!--                  empty-text="Нет записей для отображения"
                empty-filtered-text="Нет записей, соответствующих вашему запросу"-->

            <template v-slot:cell(messages)="data">
               {{data.item.messages.length}}
            </template>


            <template v-slot:cell(action)="data">
                <b-input-group size="sm" class="w-100">
<!--                    <b-button @click="data.toggleDetails" class="w-100 btn btn-travel mr-1 mb-1 btn-travel">-->
<!--                        {{ data.detailsShowing ? 'Collapse' : 'Expand' }}-->
<!--                    </b-button>-->

                    <b-button v-if="data.item.is_active" @click="changeIsActive(false, data.item,'is_active')" class="btn btn-info w-100 mr-1 mb-1"
                              :disabled="data.item.id===null">
                        Деактивировать
                    </b-button>
                    <b-button v-else @click="changeIsActive(true, data.item,'is_active')" class="btn btn-info w-100 mr-1 mb-1"
                              :disabled="data.item.id===null">
                        Активировать
                    </b-button>
                    <b-button
                            v-if="data.item.deleted_at==null"
                            @click="remove(data.item.id)"
                            class="btn btn-info w-100 mr-1 mb-1"
                            :disabled="data.item.id===null"
                    >
                       Удалить
                    </b-button>
                    <b-button
                            v-if="data.item.deleted_at==null"
                            @click="edit(data.item.id)"
                            class="btn btn-info w-100 mr-1 mb-1"
                            :disabled="data.item.id===null"
                    >
                        Редактировать
                    </b-button>
                    <b-button
                            v-else
                            @click="restore(data.item.id)"
                            class="btn btn-info w-100 mr-1 mb-1"
                            :disabled="data.item.id===null"
                    >
                       Восстановить
                    </b-button>
                    <b-button v-if="data.item.deleted_at!=null" @click="destroy(data.item.id)" class="btn btn-info w-100 mr-1 mb-1"
                              :disabled="data.item.id===null">
                        Удалить
                    </b-button>
                </b-input-group>
            </template>
            <template v-slot:table-busy>
                <div class="text-center text-primary my-2">
                    <b-spinner class="align-middle"/>
                    <strong>Loading...</strong>
                </div>
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        name: "Table",
        props: {
            listings: {
                type: Array,
                required: true,
                default: function(){
                    return [];
                }
            },
            loading: {
                type: Boolean,
                default: true
            },
            rows: {
                type:Number
            }
        },
        data() {
            return {
                sortBy: 'title',
                sortDesc: false,

                totalRows: 1,
                currentPage: 1,
                perPage: 5,
                sortDirection: 'asc',
                filter: null,
                filterOn: [],

                pageOptions: [5, 10, 15, 25, 50, 100],

                fields: [
                    {key: 'id', label: 'ID', sortable: true, sortDirection: 'desc'},
                    {key: 'created_at', label: 'Date', sortable: true, sortDirection: 'desc'},
                    {key: 'title', label: 'Название', sortable: true, sortDirection: 'desc'},
                    {key: 'category.title', label: 'Category', sortable: true, sortDirection: 'desc'},
                    {key: 'place_of_loading.place_name', label: 'Place of loading', sortable: true, sortDirection: 'desc'},
                    {key: 'place_of_delivery.place_name', label: 'Place of delivery', sortable: true, sortDirection: 'desc'},
                    {key: 'messages', label: 'Сообщения', sortable: true, sortDirection: 'desc'},
                    {key: 'action', label: 'Действия'}
                ],
                in_process: [],
            }
        },
        mounted() {
            // this.totalRows = this.listings.length;
            this.totalRows = this.rows;
        },
        computed: {
            sortOptions() {
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key}
                    })
            },
        },
        methods: {
            sendMessage(message) {
                this.$notify({
                    group: 'info',
                    type: 'success',
                    title: 'Listings',
                    text: message
                });
            },
            edit(id) {
                window.location.href = `/admin/listings/edit/${id}`;
            },
            remove(id) {
                this.$store.dispatch('removeListing', id)
                    .then(resp => {
                        this.sendMessage(resp.data.message);
                        this.totalRows = this.listings.length
                });
            },
            restore(id) {
                this.$store.dispatch('restoreListing', id)
                    .then(resp => {
                        this.sendMessage(resp.data.message);
                        this.totalRows = this.listings.length
                    });
            },
            destroy(id) {
                this.$store.dispatch('forceDeleteListing', id).then(resp => {
                    this.sendMessage(resp.data.message);
                    this.totalRows = this.listings.length
                })
            },
            changeIsActive(value, item, key){
                item.is_active = value;
                this.save(value, item.id, key)
            },
            save(value, id, key) {
                this.$store.dispatch('saveListing', {
                    id: id,
                    key: key,
                    value: value
                }).then(resp => {
                    this.$store.commit('saveListing', resp.data.product);
                    this.sendMessage(resp.data.message);
                });
            },
            onFiltered(filteredItems) {
                this.totalRows = filteredItems.length;
                this.currentPage = 1
            },

        }
    }
</script>

<style scoped>
@media screen and (min-width: 991.98px) {
    .min {
        min-width: 300px !important;
    }
}
@media (max-width: 900px) {
    .stacked {
        display: block;
        width: 100%;
    }
    .stacked > tbody, .stacked > tbody > tr, .stacked > tbody > tr > td, .stacked > tbody > tr > th {
        display: block;
    }
    .stacked > tbody > tr > [data-label]::before {
        content: attr(data-label);
        width: 40%;
        float: left;
        text-align: right;
        overflow-wrap: break-word;
        font-weight: bold;
        font-style: normal;
        padding: 0 calc(1rem / 2) 0 0;
        margin: 0;
    }
    .stacked > tbody > tr > [data-label]::after {
        display: block;
        clear: both;
        content: "";
    }
}

</style>
