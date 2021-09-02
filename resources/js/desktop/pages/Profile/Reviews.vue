<template>
    <div>
        <customer-reviews-component v-if="user.is_customer"/>
        <transporter-reviews-component v-if="user.is_transporter"/>
    </div>
</template>
<script>
    export default {
        computed: {
            user: function () {
                return window.user;
            }
        }
    }
</script>
