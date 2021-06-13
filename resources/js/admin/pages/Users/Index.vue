<template>
    <b-container fluid="lg">



        <b-tabs content-class="mt-3">
            <b-tab title="Active" active>
                <users-debug-component :items="items"/>

                <b-table
                    :items="preparedData"
                    :fields="fields"
                    :sort-by.sync="sortBy"
                    :sort-desc.sync="sortDesc"
                    responsive="sm"
                ></b-table>

            </b-tab>
            <b-tab title="Deleted">
                <users-debug-component :items="deleted_items"/>
            </b-tab>
        </b-tabs>

    </b-container>
</template>

<script>
    export default {
        props: ["items", "deleted_items"],
        computed:{
            preparedData(){
                let tmp = JSON.parse(this.items)
                return tmp.data
            }
        },
        data(){
            return {
                sortBy: 'email',
                sortDesc: false,
                fields: [
                    { key: 'email', sortable: true },
                    { key: 'name', sortable: true },
                    { key: 'phone', sortable: true },
                ],
            }
        }


    }
</script>

