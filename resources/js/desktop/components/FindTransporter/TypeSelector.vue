<template>

    <div>
        <h3 class="mt-0 text-uppercase text-black content-box-title">Type of transport</h3>


        <ul class="row">
            <li v-for="category in categories" class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected===category.id)}"
                @click="selectType(category.id)">
                <label>
                    <span class="category-label-inner">
                        <span class="animated-icon">
                            <img :src="category.image" width="75px" height="75px" alt="">
                        </span>
                        <span>{{category.title}}</span>
                    </span>
                </label>
            </li>

        </ul>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                need_more: true,
                selected: '',
            }
        },
        computed: {
            categories() {
                return this.$store.getters.categories;
            },
        },
        methods: {
            selectType(type) {
                this.selected = type;
                this.$emit("select-type", this.selected)
            }
        }

    }
</script>
<style lang="scss">

    .btn-custom-white {
        min-width: 200px;

        color: #737480;
        background-color: #f8f8fa;
        transition: all 0.3s;

        border-radius: 50px;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 7px;
        padding-bottom: 7px;
        line-height: 1.42857;
        border-bottom: 4px solid rgba(0, 0, 0, 0.09);

    }



</style>
