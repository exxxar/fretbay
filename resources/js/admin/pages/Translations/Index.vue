<template>
    <div class="container-fluid">
        <control-block :fields="fields" :filterOn="filterOn" :total-rows="totalRows">
            <template v-slot:header>
                <div class="row w-100 mx-auto align-items-center">
                    <div class="col-12 col-sm-6 col-lg-4 p-0 px-sm-1">
                        <b-button variant="primary" class="mx-sm-1 my-1 w-100"
                                  v-b-modal.create-translation :disabled="loading"
                        >
                            Создать перевод
                        </b-button>
                    </div>
                </div>
            </template>
            <template v-slot:filters="slotProps">
                <b-col lg="6" class="my-1 px-1">
                    <b-form-group
                        label="Сравнить с"
                        label-cols-sm="3"
                        label-cols-xl="2"
                        label-cols-lg="3"
                        label-align-sm="right"
                        label-align-lg="center"
                        label-size="sm"
                        label-for="Compare"
                        class="mb-0"
                    >
                        <b-input-group size="sm">
                            <b-form-select
                                v-model="compare"
                                text-field="name"
                                value-field="locale_name"
                                id="Compare"
                                size="sm"
                                :options="compare_options"
                            ></b-form-select>
                            <b-input-group-append>
                                <b-button @click="compareWith">Сравнить</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>
                <b-col lg="6" class="my-1 px-1">
                    <b-form-group
                        label="Группа"
                        label-cols-sm="3"
                        label-cols-xl="2"
                        label-cols-lg="3"
                        label-align-sm="right"
                        label-align-lg="center"
                        label-size="sm"
                        label-for="group"
                        class="mb-0"
                    >
                        <b-input-group size="sm">
                            <b-form-select
                                v-model="current_group"
                                id="Compare"
                                size="sm"
                                :options="groups"
                            ></b-form-select>
                            <b-input-group-append>
                                <b-button @click="current_group=''">Сбросить</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </template>
            <template v-slot:main="slotProps">
                <b-card class="card-core">
                    <b-table
                        show-empty
                        small
                        stacked="md"
                        :items="translations"
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
                        <template v-slot:cell(action)="data">
                            <b-input-group size="sm" v-if="!itemInProcess(data.item.key)">
                                <b-button @click="edit(data.item)" class="btn-info mr-1 mb-1">
                                    <b-icon icon="pencil"/>
                                </b-button>
                                <b-button @click="remove(data.item)" class="btn btn-info mr-1 mb-1">
                                    <b-icon icon="trash"/>
                                </b-button>
                            </b-input-group>
                            <div class="row w-100 mx-auto align-items-center" v-if="itemInProcess(data.item.key)">
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
        <edit :translation="edit_translation"/>
        <create :language="language"/>
    </div>
</template>

<script>
    import Edit from "./Edit";
    import Create from "./Create";
    import ControlBlock from "../../components/ControlBlock";
    export default {
        name: "Index",
        props: ['language'],
        components:{ Edit, Create, ControlBlock },
        data() {
            return {
                sortBy: 'group',
                sortDesc: false,

                fields: [
                    {key: 'group', label: 'Название группы', sortable: true, sortDirection: 'desc'},
                    {key: 'key', label: 'Ключ', sortable: true, sortDirection: 'desc'},
                    {key: this.language, label: this.language, sortable: true, sortDirection: 'desc'},
                    {key: 'action', label: 'Действия'}
                ],

                totalRows: 1,
                currentPage: 1,
                perPage: 15,
                pageOptions: [5, 10, 15, 25, 50, 100],
                sortDirection: 'asc',
                filter: null,
                filterOn: [],

                loading: false,
                current_language:'',
                compare:'',
                compare_options: [],
                edit_translation: null,
                current_group: '',
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
            },
            translations() {
                if(this.current_group) {
                    let tmp = this.$store.getters.translations.filter(item => item.group === this.current_group);
                    this.totalRows = tmp.length;
                    return tmp
                }
                let tmp = this.$store.getters.translations;
                this.totalRows = tmp.length;
                return tmp
                // return this.$store.getters.translations;
            },
            groups() {
                return this.$store.getters.groups;
            },
        },

        mounted() {
            if (this.languages.length ===0 ) {
                this.$store.dispatch('getLanguages').then(() =>{
                    this.compare_options = this.languages.filter(item => item.locale_name !== this.language);
                    this.compare_options.unshift({ locale_name: '', name: 'Выберите язык' });
                    let index = this.languages.findIndex(item => item.locale_name === this.language);
                    this.current_language = this.languages[index];
                    this.fields = [
                        {key: 'group', label: 'Название группы', sortable: true, sortDirection: 'desc'},
                        {key: 'key', label: 'Ключ', sortable: true, sortDirection: 'desc'},
                        {key: this.current_language.locale_name, label: this.current_language.name, sortable: true, sortDirection: 'desc'},
                        {key: 'action', label: 'Действия'}
                    ];
                });
            }
            if (this.translations.length ===0 ) {
                this.loading = true;
                this.$store.dispatch('getTranslations').then(() => {
                    this.totalRows = this.translations.length;
                    if (this.groups.length ===0 ) {
                        this.$store.dispatch('getGroups');
                    }
                    this.loading = false;
                });
            }
        },
        methods: {
            onFiltered(filteredItems) {
                this.totalRows = filteredItems.length;
                this.currentPage = 1
            },
            async remove(item) {
                this.in_process.push(item.key);
                let payload = {
                    language: this.language,
                    group: item.group,
                    key: item.key,
                };
                await this.$store.dispatch('removeTranslation', payload).then(resp=> {
                    let index = this.in_process.findIndex( el => el === item.key);
                    this.in_process.splice(index, 1);
                    this.$store.commit('removeTranslation',payload);
                    this.sendMessage(resp.data.message);
                }).catch(error => {
                    let index = this.in_process.findIndex( el => el === item.key);
                    this.in_process.splice(index, 1);
                    this.sendMessage('Произошла ошибка', 'error');
                });
            },
            edit(item) {
                let modal = {
                    language: this.language,
                    group: item.group,
                    key: item.key,
                    value: item[this.language]
                };
                this.edit_translation = JSON.parse(JSON.stringify(modal));
                this.$nextTick(() => {
                    this.$bvModal.show("edit-translation");
                })
            },
            compareWith() {
                if(this.compare) {
                    let index = this.languages.findIndex(item => item.name === this.compare);
                    this.fields = [
                        {key: 'group', label: 'Название группы', sortable: true, sortDirection: 'desc'},
                        {key: 'key', label: 'Ключ', sortable: true, sortDirection: 'desc'},
                        {key: this.current_language.locale_name, label: this.current_language.name, sortable: true, sortDirection: 'desc'},
                        {key: this.languages[index].locale_name, label: this.languages[index].name, sortable: true, sortDirection: 'desc'},
                        {key: 'action', label: 'Действия'}
                    ];
                }
                else {
                    this.fields = [
                        {key: 'group', label: 'Название группы', sortable: true, sortDirection: 'desc'},
                        {key: 'key', label: 'Ключ', sortable: true, sortDirection: 'desc'},
                        {key: this.current_language.locale_name, label: this.current_language.name, sortable: true, sortDirection: 'desc'},
                        {key: 'action', label: 'Действия'}
                    ];
                }
            },
            itemInProcess(key) {
                return this.in_process.findIndex(item => item === key) >= 0;
            },
            sendMessage(message, type='success') {
                this.$notify({
                    group: 'info',
                    type: type,
                    title: 'Перевод',
                    text: message
                });
            },
        }
    }
</script>

<style scoped>

</style>
