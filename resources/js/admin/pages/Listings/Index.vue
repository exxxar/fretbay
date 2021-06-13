<template>
    <b-container fluid="lg">

        <b-row class="m-auto w-100 h-100 align-items-center">
            <b-button variant="primary" class="mt-2 mb-2 float-right" :href="'admin/listings/create'">
                Create listing
            </b-button>
        </b-row>
        <b-tabs content-class="mt-3">
            <b-tab title="Active" active>
                <listing-table
                    :listings="listings"
                    :loading="loading"
                    :rows="listings_totalRows"
                />
            </b-tab>
            <b-tab title="Deleted">
                <listing-table
                    :listings="deleted_listings"
                    :loading="loading"
                    :rows="deleted_listings_totalRows"
                />
            </b-tab>
        </b-tabs>
<!--        <b-row class="m-auto w-100 h-100 align-items-center justify-content-center" v-else>-->
<!--            <div class="text-center text-primary my-2">-->
<!--                <b-spinner class="align-middle"/>-->
<!--                <strong>Loading...</strong>-->
<!--            </div>-->
<!--        </b-row>-->
    </b-container>
</template>

<script>
    import ListingTable from '~/pages/Listings/Table'

    export default {
        components: {
            ListingTable
        },
        data() {
            return {
                loading: false,
            }
        },
        computed: {
            listings: function () {
                return this.$store.getters.listings;
            },
            deleted_listings: function () {
                return this.$store.getters.deleted_listings;
            },
            listings_totalRows: function () {
                return this.$store.getters.listings_totalRows;
            },
            deleted_listings_totalRows: function () {
                return this.$store.getters.deleted_listings_totalRows;
            },
        },
        created() {
        },
        mounted() {
            this.loading = true;
            this.$store.dispatch('loadDataListing').then(() => {
                this.loading=false;
            });
        },
        methods:{
            sendMessage(message, type='success') {
                this.$notify({
                    group: 'info',
                    type: type,
                    title: 'Listings',
                    text: message
                });
            },

        }

    }
</script>

<style>
    .custom-select option {
        color: black !important;
    }
    input[type="file"]{
        opacity: 0;
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }
    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px;
        position: relative;
        cursor: pointer;
    }
    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 50px 50px 50px;
    }
</style>
