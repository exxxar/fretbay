<template>
    <div class="container">
        <div class="row">

            <div class="col-12">
                <ol class="row breadcrumb p-0" style="background: transparent;">
                    <li class="breadcrumb-item" v-bind:class="{'active':(step>=0)}"><a href="#" @click="setStep(0)">Choice
                        of Category</a></li>
                    <li class="breadcrumb-item" v-bind:class="{'active':(step>=1)}"><a href="#" @click="setStep(1)">Add
                        item / volume</a></li>
                    <li class="breadcrumb-item" v-bind:class="{'active':(step>=2)}">Address, Information / Photo</li>
                </ol>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        computed: {
            step() {
                return this.$store.getters.step;
            }
        },
        methods: {
            setStep(step) {
                if (this.step >= step) {
                    this.$store.dispatch("setStep", step)
                    window.scrollTo(0, 0);
                }
            }
        }
    }
</script>
<style lang="scss" scope>
    .breadcrumb-item {
        a {
            color: gray;
        }

        &.active {
            color: #21c87a;

            a {
                color: #21c87a;
            }
        }
    }
</style>
