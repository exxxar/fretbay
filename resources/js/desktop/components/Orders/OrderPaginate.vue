<template>
    <!-- Pagination -->
    <nav aria-label="Page navigation" v-if="paginate">
        <ul class="pagination" v-if="paginate.length>0">

            <li class="page-item" v-if="paginate.current_page>1">
                <a class="page-link" href="#" aria-label="First" @click="goToPage(1)">
                    <span aria-hidden="true">«</span>
                </a>
            </li>

            <li class="page-item" v-for="page in filteredPaginate"
                :class="{'active':page===paginate.current_page}"><a class="page-link" href="#"
                                                                    @click="goToPage(page)">{{page}}</a></li>


            <li class="page-item" v-if="paginate.current_page!=paginate.last_page">
                <a class="page-link" href="#" aria-label="Last" @click="goToPage(paginate.last_page)">
                    <span aria-hidden="true">»</span>
                </a>
            </li>

        </ul>
    </nav>
    <!-- End Pagination -->
</template>

<script>
    export default {
        computed: {
            filteredPaginate: function () {


                let last_page = this.paginate.last_page
                let current_page = this.paginate.current_page
                let total = this.paginate.total
                let per_page = this.paginate.per_page
                let pages = []


                let min = Math.max(current_page - 5, 1)
                let max = Math.min(current_page + 5, last_page + 1)

                for (let i = min; i < max; i++)
                    pages.push(i)

                return pages;
            },
            paginate: function () {
                return this.$store.getters.listingsPaginate
            }
        },
        mounted() {
            this.$store.dispatch("getOrders")
            //this.goToPage(1)
        },
        methods: {
            goToPage(page) {
                this.$store.dispatch("nextOrderPage", page)
                this.$store.dispatch("getOrders")

            }
        }

    }
</script>
