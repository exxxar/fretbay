<template>
    <main id="content" style="padding-top: 30px;">
        <!-- Description Section -->
        <div class="container p-0" v-if="notifications.length>0">
            <div class="row m-0">
                <div class="col-12 p-1">
                    <notification-item-component :key="item.id" :item="item" v-for="item in notifications"/>
                </div>
                <div class="col-12 mt-2">
                    <notification-paginate-component/>
                </div>
            </div>
        </div>
        <div class="container" v-else>
            <div class="d-flex p-5 justify-content-center"  v-if="notifications.length===0">
                <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="max-width:300px;">
            </div>
            <h4 class="text-center" v-if="notifications.length===0">{{$trans('profile.page.no_notifications')}}</h4>
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
