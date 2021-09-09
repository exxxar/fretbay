<template>
    <div class="card shadow-sm border-0 mb-4 px-4">
        <div class="card-header d-flex justify-content-between">

        </div>
        <div class="card-body d-md-flex justify-content-between align-items-center py-4 px-0 flex-wrap">
            <md-steppers :md-active-step.sync="status" md-vertical md-linear>
                <md-step id="first" md-label="Begin mission" md-description="Optional" :md-editable="false"
                         :md-done.sync="first">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <md-button class="md-raised md-primary" @click="setDone('first', 'second')">Continue</md-button>
                </md-step>

                <md-step id="second" md-label="Loading" md-description="Optional" :md-error="secondStepError"
                         :md-editable="false" :md-done.sync="second">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <md-button class="md-raised md-primary" @click="setDone('second', 'third')">Continue</md-button>
                    <md-button class="md-raised md-primary" @click="setError()">Set error!</md-button>
                </md-step>

                <md-step id="third" md-label="Shipping" md-description="Optional" :md-editable="false"
                         :md-done.sync="third">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <md-button class="md-raised md-primary" @click="setDone('third', 'four')">Continue</md-button>
                </md-step>

                <md-step id="four" md-label="Unloading" md-description="Optional" :md-editable="false"
                         :md-done.sync="four">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <md-button class="md-raised md-primary" @click="setDone('four', 'five')">Continue</md-button>
                </md-step>

                <md-step id="five" md-label="Complete" md-description="Optional" :md-editable="false"
                         :md-done.sync="five">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloribus eveniet quaerat modi
                        cumque quos sed, temporibus nemo eius amet aliquid, illo minus blanditiis tempore, dolores
                        voluptas dolore placeat nulla.</p>
                    <md-button class="md-raised md-primary" @click="setDone('five')">Done</md-button>
                </md-step>
            </md-steppers>
        </div>

        <div class="card-footer d-md-flex justify-content-between align-items-center px-0">


        </div>
    </div>
</template>
<script>


    export default {

        props: ["order"],

        data() {
            return {
                active: 'third',
                first: true,
                second: true,
                third: false,
                four: false,
                five: false,
                secondStepError: null
            }
        },
        computed: {

            status() {
                return ["first", "second", "third", "four", "five"][this.order.status] || "first"
            },
            user: function () {
                return window.user
            },


        },
        methods: {

            setDone(id, index) {
                this[id] = true

                this.secondStepError = null

                if (index) {
                    this.active = index
                }
            },
            setError() {
                this.secondStepError = 'This is an error!'
            }
        },
        mounted() {

        }
    }


</script>
<style lang="scss">

    .custom-avatar {
        display: flex;

        width: 70px;
        height: 70px;

        img {
            border: 5px #3fca83 solid;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }


</style>
