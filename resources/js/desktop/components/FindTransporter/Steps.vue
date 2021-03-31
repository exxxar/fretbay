<template>
    <div class="container-fluid mb-2 top-wrap">
        <div class="container">
            <div class="row">
                <div class="steps-box">
                    <ul class="steps d-flex">
                        <li class="done p-2" v-bind:class="{'active':(step===0)}"><span class="step-num"></span> <span
                            class="step-text">Choice of Category</span>
                        </li>
                        <li class="done p-2" v-bind:class="{'active':(step===1)}"><span class="step-num"></span> <span
                            class="step-text">Add item / volume</span>
                        </li>
                        <li class="done p-2" v-bind:class="{'active':(step===2)}"><span class="step-num"></span> <span
                            class="step-text">Address, Information / Photo</span>
                        </li>
                    </ul>
                </div>
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
        }
    }
</script>
<style lang="scss">
    .top-wrap {
        margin-top: 80px;
        background: #3D4E60;

        .done {
            color: lightgrey;

            &.active {
                color: white;
            }
        }

    }
</style>
