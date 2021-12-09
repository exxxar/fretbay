<template>
    <form v-on:submit.prevent="submit">

    </form>
</template>
<script>
    export default {
        props:["slug"],
        methods:{
            submit(){

            },
            prepareLangTitle(title) {
                return typeof title === 'object' ?
                    Object.entries(title).find(item => item[0] === window.locale)[1] :
                    title;
            },
        }
    }
</script>
