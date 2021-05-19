<template>
    <div class="container-fluid">
        <b-row>
            <b-col lg="6" class="my-1">
                <b-form-group
                    label="Сортировка"
                    label-cols-sm="3"
                    label-align-sm="right"
                    label-size="sm"
                    label-for="sortBySelect"
                    class="mb-0"
                >
                    <b-input-group size="sm">
                        <b-form-select v-model="sortBy" id="sortBySelect" :options="sortOptions" class="w-75">
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
                    label="Поиск"
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
                            placeholder="Введите для поиска"
                        ></b-form-input>
                        <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter = ''">Очистить</b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-form-group>
            </b-col>


            <b-col sm="5" md="6" class="my-1">
                <b-form-group
                    label="На странице"
                    label-cols-sm="6"
                    label-cols-md="4"
                    label-cols-lg="3"
                    label-align-sm="right"
                    label-size="sm"
                    label-for="perPageSelect"
                    class="mb-0"
                >
                    <b-form-select
                        v-model="perPage"
                        id="perPageSelect"
                        size="sm"
                        :options="pageOptions"
                    ></b-form-select>
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
                ></b-pagination>
            </b-col>
        </b-row>
        <b-table
            show-empty
            small
            stacked="md"
            :items="languages"
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
            empty-text="Нет записей для отображения"
            empty-filtered-text="Нет записей, соответствующих вашему запросу"
        >
            <template v-slot:cell(action)="data">
                <b-input-group size="sm">
                    <b-button @click="translations(data.item.local_name)" class="btn btn-info mr-1 mb-1">
                        <i class="fas fa-language"></i>
                    </b-button>
                </b-input-group>
            </template>
            <template v-slot:table-busy>
                <div class="text-center text-primary my-2">
                    <b-spinner class="align-middle"></b-spinner>
                    <strong>Загрузка...</strong>
                </div>
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        name: "Index",
        props: ['languages'],
        data() {
            return {
                sortBy: 'name',
                sortDesc: false,

                fields: [
                    {key: 'name', label: 'Название', sortable: true, sortDirection: 'desc'},
                    {key: 'locale_name', label: 'Алиас', sortable: true, sortDirection: 'desc'},
                    {key: 'action', label: 'Действия'},
                ],

                totalRows: 1,
                currentPage: 1,
                perPage: 5,
                pageOptions: [5, 10, 15, 25, 50, 100],
                sortDirection: 'asc',
                filter: null,
                filterOn: [],

                loading: false,
            }
        },
        computed: {
            sortOptions() {
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key}
                    })
            }
        },
        mounted() {

        },
        methods: {
            onFiltered(filteredItems) {
                this.totalRows = filteredItems.length;
                this.currentPage = 1
            },
            async remove(id) {
                let foundIndex = this.languages.findIndex(x => x.id === id);

                const response = await axios
                    .delete(`/admin/languages/destroy/${id}`)
                    .then(resp => {
                        this.languages.splice(foundIndex, 1);
                        this.sendMessage(resp.data.message)
                    });
            },
            translations(lang) {
              window.location = '/admin/languages/'+lang+'translations';
            },
            sendMessage(message) {
                this.$notify({
                    group: 'message',
                    type: 'success',
                    title: 'Языки',
                    text: message
                });
            },
        }
    }
</script>

<style scoped>

</style>
