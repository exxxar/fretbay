<template>
    <div class="container-fluid mb-2 top-wrap">
        <div class="container">
            <div class="row">
                <div class="steps-box d-flex align-items-center">
                    <ul class="steps d-flex">
                        <li class="done d-flex d-inline p-2" v-bind:class="{'active':(step===0)}"><span class="step-num align-self-center">1</span> <span
                            class="step-text">Choice of Category</span>
                        </li>
                        <li class="done d-flex d-inline p-2 " v-bind:class="{'active':(step===1)}"><span class="step-num align-self-center">2</span> <span
                            class="step-text">Add item / volume</span>
                        </li>
                        <li class="done d-flex d-inline p-2" v-bind:class="{'active':(step===2)}"><span class="step-num align-self-center">3</span> <span
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
        },
    }
</script>
<style lang="scss" scope>
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
    .steps-box{
        width: 100%;
        position:relative;
        padding:30px 0;
        height: 15px;
    }
</style>
