<template>
    <div>
        <p></p>
    </div>
</template>
<script>
    export default {
        props:["slug"],
        methods:{
            prepareLangTitle(title) {
                return typeof title === 'object' ?
                    Object.entries(title).find(item => item[0] === window.locale)[1] :
                    title;
            },
        }
    }
</script>
