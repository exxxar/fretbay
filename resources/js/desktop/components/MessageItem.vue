<template>
    <div class="row">
        <div class="col-12">
            <chat-component :listing="item" :selected="payload"/>
        </div>
    </div>
</template>
<script>
    export default {
        props:["item","payload"]
    }
</script>
