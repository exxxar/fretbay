<template>
    <div class="container-fluid">
        <control-block :fields="fields" :filterOn="filterOn" :total-rows="totalRows">
            <template v-slot:header>
                <div class="row w-100 mx-auto align-items-center">
                    <div class="col-12 col-sm-6 col-lg-4 p-0 px-sm-1">
                        <b-button variant="primary" class="mx-sm-1 my-1 w-100"
                                  v-b-modal.create-language :disabled="loading"
                        >
                            Создать язык
                        </b-button>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 p-0 px-sm-1">
                        <b-button variant="primary" class="mx-sm-1 my-1 w-100"
                                  @click="syncLanguages" :disabled="loading"
                        >
                            Синхронизировать языки
                        </b-button>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 p-0 px-sm-1">
                        <b-button variant="primary" class="mx-sm-1 my-1 w-100"
                                  @click="syncTranslations" :disabled="loading"
                        >
                            Синхр. ключи переводов
                        </b-button>
                    </div>
                </div>
            </template>
            <template v-slot:main="slotProps">
                <b-card class="card-core">
                    <b-table
                        show-empty
                        small
                        stacked="md"
                        :items="languages"
                        :current-page="slotProps.params.currentPage"
                        :per-page="slotProps.params.perPage"
                        :fields="fields"
                        :filter="slotProps.params.filter"
                        :sort-by.sync="slotProps.params.sortBy"
                        :sort-desc.sync="slotProps.params.sortDesc"
                        :sort-direction="slotProps.params.sortDirection"
                        @filtered="onFiltered"
                        :busy="loading"
                        empty-text="Нет записей для отображения"
                        empty-filtered-text="Нет записей, соответствующих вашему запросу"
                    >
                        <template v-slot:cell(is_active)="data">
                            <b-form-checkbox
                                id="is_active"
                                v-model="data.item.is_active"
                                name="check-button"
                                switch
                                disabled
                            >
                            </b-form-checkbox>
                        </template>
                        <template v-slot:cell(action)="data">
                            <b-input-group size="sm" v-if="!itemInProcess(data.item.locale_name)">
                                <b-button @click="edit(data.item)" class="btn-info mr-1 mb-1" :disabled="loading">
                                    <b-icon icon="pencil"></b-icon>
                                </b-button>
                                <b-button @click="remove(data.item)" class="btn btn-info mr-1 mb-1" :disabled="loading">
                                    <b-icon icon="trash"></b-icon>
                                </b-button>
                                <b-button @click="translations(data.item.locale_name)" class="btn-info mr-1 mb-1" :disabled="loading">
                                    <b-icon icon="chevron-right"></b-icon>
                                </b-button>
                            </b-input-group>
                            <div class="row w-100 mx-auto align-items-center" v-if="itemInProcess(data.item.locale_name)">
                                <b-spinner class="text-primary align-middle"/>
                            </div>
                        </template>
                        <template v-slot:table-busy>
                            <div class="text-center text-primary my-2">
                                <b-spinner class="align-middle"></b-spinner>
                                <strong>Загрузка...</strong>
                            </div>
                        </template>
                    </b-table>
                </b-card>
            </template>
        </control-block>
        <edit :language="edit_language"/>
        <create/>
    </div>
</template>

<script>
    import Edit from './Edit.vue'
    import Create from "./Create";
    import ControlBlock from "../../components/ControlBlock";
    export default {
        name: "Index",
        components: {
            Edit, Create, ControlBlock
        },
        // props: ['languages'],
        data() {
            return {
                sortBy: 'name',
                sortDesc: false,

                fields: [
                    {key: 'name', label: 'Название', sortable: true, sortDirection: 'desc'},
                    {key: 'locale_name', label: 'Алиас', sortable: true, sortDirection: 'desc'},
                    {key: 'is_active', label: 'Активность', sortable: true, sortDirection: 'desc'},
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
                edit_language: null,
                in_process:[]
            }
        },
        computed: {
            sortOptions() {
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key}
                    })
            },
            languages() {
                return this.$store.getters.languages;
            }
        },
        mounted() {
            if (this.languages.length ===0 ) {
                this.loading = true;
                this.$store.dispatch('getLanguages').then(() => {
                    this.totalRows = this.languages.length;
                    this.$store.dispatch('getGroups');
                    this.loading = false;
                });
            }
        },
        methods: {
            onFiltered(filteredItems) {
                this.totalRows = filteredItems.length;
                this.currentPage = 1;
            },
            async remove(item) {
                this.in_process.push(item.locale_name);
               await this.$store.dispatch('removeLanguage', {language: item.locale_name, id: item.id } )
                    .then(resp => {
                        let index = this.in_process.findIndex( el => el === item.locale_name);
                        this.in_process.splice(index, 1);
                        this.$store.commit('removeLanguage', item);
                        this.sendMessage(resp.data.message);
                    }).catch(error => {
                       let index = this.in_process.findIndex( el => el === item.locale_name);
                       this.in_process.splice(index, 1);
                       this.sendMessage('Произошла ошибка', 'error');
                   });
            },
            edit(item) {
                this.edit_language = JSON.parse(JSON.stringify(item));
                this.$nextTick(() => {
                    this.$bvModal.show("edit-language");
                })
            },
            translations(lang) {
                window.location = '/admin/languages/'+lang+'/translations';
            },
            syncLanguages() {
                this.loading = true;
                this.$store.dispatch('syncLanguages')
                    .then(resp => {
                        this.$store.commit('setLanguages', resp.data.languages);
                        this.sendMessage(resp.data.message);
                        this.loading = false;
                    }).catch(error => {
                    this.loading = false;
                    this.sendMessage('Произошла ошибка', 'error');
                });
            },
            syncTranslations() {
                this.loading = true;
                this.$store.dispatch('syncTranslation').then(resp => {
                    this.loading = false;
                    this.sendMessage(resp.data.message);
                }).catch(error => {
                    this.loading = false;
                    this.sendMessage('Произошла ошибка', 'error');
                });
            },
            itemInProcess(key) {
                return this.in_process.findIndex(item => item === key) >= 0;
            },
            sendMessage(message, type='success') {
                this.$notify({
                    group: 'info',
                    type: type,
                    title: 'Языки',
                    text: message
                });
            },
        }
    }
</script>

<style scoped>

</style>
