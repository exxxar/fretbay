<template>
    <div>
        <div v-for="(step, index) in steps" :key="index">
            <slot
                v-if="current_step === index"
                :name="`step_${index}`"
                :step="step"
            />
        </div>
        <slot name="footer">
<!--            :prevStep="prevStep" :nextStep="nextStep"-->
<!--            <div class="row d-flex justify-content-end mt-2 w-100">-->
<!--                <div class="col-12 col-sm-2">-->
<!--                    <button class="btn btn-custom-danger" @click="prevStep">Back</button>-->
<!--                </div>-->
<!--                <div class="col-12 col-sm-3">-->
<!--                    <button class="btn btn-custom-white" @click="nextStep">Next</button>-->
<!--                </div>-->
<!--            </div>-->
        </slot>
    </div>
</template>

<script>
    export default {
        name: "Wizard",
        props: {
            steps: [Number, Array]
        },
        data() {
            return {
                current_step: 0,
                // step_count: 0
            }
        },
        computed: {
            step_count() {
                if (typeof this.steps === 'number') {
                    return this.steps;
                }
                return this.steps.length;
            }
        },
        methods: {
            nextStep() {
                if(this.current_step !== this.step_count-1)
                {
                    this.current_step++
                    window.scrollTo(0, 0);

                }
            },
            prevStep() {
                if(this.current_step !== 0)
                {
                    this.current_step--

                    window.scrollTo(0, 0);
                }
            },
        }
    }
</script>

<style scoped>

</style>
