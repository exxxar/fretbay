<template>
    <div>
<!--        <confirm-modal v-bind="confirm_modal" :confirm="handleConfirm"/>-->
        <b-card class="shadow core-card">
            <slot name="header" v-bind:params="params">
            </slot>
            <b-row class="w-100 mx-auto align-items-center">
                <b-col lg="6" class="my-1 px-1 text-truncate">
                    <b-form-group
                            label="Сортировка"
                            label-cols-sm="3"
                            label-cols-xl="2"
                            label-cols-lg="3"
                            label-align-sm="right"
                            label-align-lg="center"
                            label-size="sm"
                            label-for="sortBySelect1"
                            class="mb-0"
                    >
                        <b-input-group size="sm">
                            <b-form-select v-model="params.sortBy" id="sortBySelect1" :options="params.sortOptions" class="w-75">
                                <template v-slot:first>
                                    <option value="">-- none --</option>
                                </template>
                            </b-form-select>
                            <b-form-select v-model="params.sortDesc" size="sm" :disabled="!params.sortBy" class="w-25">
                                <option :value="false">Asc</option>
                                <option :value="true">Desc</option>
                            </b-form-select>
                        </b-input-group>
                    </b-form-group>
                </b-col>

                <b-col lg="6" class="my-1  px-1">
                    <b-form-group
                            label="Поиск"
                            label-cols-sm="3"
                            label-cols-xl="2"
                            label-cols-lg="3"
                            label-align-sm="right"
                            label-size="sm"
                            label-for="filterInput"
                            class="mb-0"
                    >
                        <b-input-group size="sm">
                            <b-form-input
                                    v-model="params.filter"
                                    type="search"
                                    id="filterInput"
                                    placeholder="Введите для поиска"
                                    debounce="500"
                            />
                            <b-input-group-append>
                                <b-button :disabled="!params.filter" @click="params.filter = ''">Очистить</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>

                <b-col v-if="!no_pagination" sm="5" md="6" class="my-1 px-1">
                    <b-form-group
                            label="На странице"
                            label-cols-xl="2"
                            label-cols-sm="6"
                            label-cols-md="4"
                            label-cols-lg="3"
                            label-align-sm="right"
                            label-align-lg="center"
                            label-size="sm"
                            label-for="perPageSelect1"
                            class="mb-0"
                    >
                        <b-form-select
                                v-model="params.perPage"
                                id="perPageSelect1"
                                size="sm"
                                :options="params.pageOptions"
                        />
                    </b-form-group>
                </b-col>

                <b-col v-if="!no_pagination" sm="7" md="6" class="my-1 px-1">
                    <b-pagination
                            v-model="params.currentPage"
                            :total-rows="totalRows"
                            :per-page="params.perPage"
                            align="fill"
                            size="sm"
                            class="my-0"
                    />
                </b-col>
                <slot name="filters" v-bind:params="params">
                </slot>
            </b-row>
        </b-card>
        <slot name="main" v-bind:params="params">
        </slot>
    </div>
</template>

<script>
    // import ConfirmModal from "./ConfirmModal";
    export default {
        name: "ControlBlock",
        components: {
            // ConfirmModal
        },
        props: {
            totalRows: {
                type: Number,
                // required: true,
                default: 0
            },
            no_pagination: {
                type: Boolean,
                default: false
            },
            fields: {
                type: Array,
                required: true,
                default: function(){
                    return [];
                }
            },
            filterOn: {
                type: Array,
                required: true,
                default: function(){
                    return [];
                }
            },
        },
        data() {
            return {
                params: {
                    sortBy: '',
                    sortDesc: false,
                    // totalRows: 1,
                    currentPage: 1,
                    perPage: 100,
                    sortDirection: 'asc',
                    filter: null,
                    pageOptions: [15, 25, 50, 100, 200, 500],
                    sortOptions: [],
                    filterOptions:[]
                }
            }
        },
        mounted() {
            this.makeSortOptions();
            this.makeFilterOptions();
        },
        computed: {
            // confirm_modal() {
            //     return this.$store.getters.confirm_modal;
            // },
            // info_modal() {
            //     return this.$store.getters.info_modal;
            // },
        },
        watch: {
            totalRows: function(newVal, oldVal) {
                this.totalRows = newVal;
            }
        },
        methods: {
            makeSortOptions() {
               this.params.sortOptions = this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key}
                    })
            },
            makeFilterOptions() {
                if(this.filterOn.length>0) {
                    this.params.filterOptions = this.filterOn
                        .filter(f => f.sortable)
                        .map(f => {
                            return  f.key
                        })
                }
                else {
                    this.params.filterOptions = this.fields
                        .filter(f => f.sortable)
                        .map(f => {
                            return  f.key
                        })
                }
            },

            // confirm(info) {
            //     this.$store.commit('setConfirm', info);
            //
            //     this.$nextTick(function () {
            //         this.$store.commit('showModal', this)
            //         // this.showConfirmModal();
            //     });
            // },
            // handleConfirm() {
            //     if (this.confirm_modal){
            //         if(this.confirm_modal.method_params) {
            //             this.$parent[this.confirm_modal.method_name](this.confirm_modal.method_params);
            //         }
            //         else {
            //             this.$parent[this.confirm_modal.method_name]();
            //         }
            //     }
            // },
            // showConfirmModal() {
            //     if(this.confirm_modal.id) {
            //         this.$bvModal.show(this.confirm_modal.id);
            //     }
            //     else {
            //         this.$bvModal.show('confirm-modal')
            //     }
            // },
            // hideConfirmModal() {
            //     if(this.confirm_modal.id) {
            //         this.$bvModal.hide(this.confirm_modal.id);
            //     }
            //     else {
            //         this.$bvModal.hide('confirm-modal')
            //     }
            // },
        }
    }
</script>

<style scoped>
    .core-card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.05);
        border-radius: .375rem;
    }
    .shadow {
        transition: all .15s ease;
        box-shadow: 0 0 2rem 0 rgba(136,152,170,.15)!important;
    }
</style>
