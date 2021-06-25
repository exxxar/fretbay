<template>
    <div class="container">
        <div class="row">

            <div class="col-12">
                <ol class="breadcrumb p-0" style="background: transparent;">
                    <li class="breadcrumb-item" v-bind:class="{'active':(step===0)}"><a href="#">Choice of Category</a></li>
                    <li class="breadcrumb-item" v-bind:class="{'active':(step===1)}"><a href="#">Add item / volume</a></li>
                    <li class="breadcrumb-item " v-bind:class="{'active':(step===2)}" >Address, Information / Photo</li>
                </ol>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        props: {
            step: {
                type: Number,
                default: 0
            }
        },
    }
</script>
<style lang="scss" scope>

</style>
