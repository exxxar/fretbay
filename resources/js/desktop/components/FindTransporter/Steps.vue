<template>
    <div class="container">
        <div class="row m-0">

            <div class="col-12" style="max-width:100%; overflow: auto;">
                <ol class="row breadcrumb p-0" style="background: transparent;" >
                    <li class="breadcrumb-item" v-bind:class="{'active':(step>=0)}"><a href="#" @click="setStep(0)">
                        {{$trans('request_a_quote.breadcrumbs.a_1')}}</a></li>
                    <li class="breadcrumb-item" v-bind:class="{'active':(step>=1)}"><a href="#" @click="setStep(1)"> {{$trans('request_a_quote.breadcrumbs.a_2')}}</a></li>
                    <li class="breadcrumb-item" v-bind:class="{'active':(step>=2)}"> {{$trans('request_a_quote.breadcrumbs.a_3')}}</li>
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
