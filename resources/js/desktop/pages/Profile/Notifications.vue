<template>
    <main id="content">
        <!-- Description Section -->
        <div class="container space-1 space-3--md">
            <div class="row">
                <div class="col-12">
                    <h2>Notifications</h2>
                    <notification-item-component :key="item.id" :item="item" v-for="item in notifications"/>
                </div>
                <div class="col-12 mt-2">
                    <notification-paginate-component/>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
    export default {
        computed:{
            notifications: function () {
                return this.$store.getters.notifications;
            },
        },
        mounted() {
            this.$store.dispatch('loadNotifications')
        }
    }
</script>
