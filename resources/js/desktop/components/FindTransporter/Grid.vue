<template>
    <div>
        <wizard :steps="2" ref="grid_wizard">
            <template v-slot:step_0>
                <ul class="row">
                    <li v-for="subcategory in subcategories" class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected_subcategory===subcategory.id)}"
                        @click="selectSubcategory(subcategory.id)">
                        <label>
                    <span class="category-label-inner">
                        <span class="animated-icon">
                            <img :src="subcategory.image" width="75px"
                                 height="75px" alt="">
                        </span>
                        <span>{{subcategory.title}}</span>
                    </span>
                        </label>
                    </li>
                </ul>
            </template>
            <template v-slot:step_1>
                <ul class="row">
                    <li v-for="thing in filteredThings" class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected_thing===thing.id)}"
                        @click="selectThing(thing.id)">
                        <label>
                        <span class="category-label-inner">
                            <span class="animated-icon">
                                <img :src="thing.image" width="75px"
                                     height="75px" alt="">
                            </span>
                            <span>{{thing.title}}</span>
                        </span>
                        </label>
                    </li>
                </ul>
            </template>
            <template v-slot:footer>
                <div class="row d-flex justify-content-end mt-2 w-100">
                    <div class="col-12 col-sm-2">
                        <button class="btn btn-custom-danger" @click="prevStep">Back</button>
                    </div>
                    <div class="col-12 col-sm-3">
                        <button class="btn btn-custom-white" @click="nextStep">Next</button>
                    </div>
                </div>
            </template>
        </wizard>
<!--        <ul class="row" v-if="step === 0 && subcategories.length>0">-->
<!--            <li v-for="subcategory in subcategories" class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected_subcategory===0)}"-->
<!--                @click="selectSubcategory(subcategory.id)">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img :src="subcategory.image" width="75px"-->
<!--                                 height="75px" alt="">-->
<!--                        </span>-->
<!--                        <span>{{subcategory.title}}</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <ul class="row" v-if="step === 1">-->
<!--            <li v-for="thing in things" class="col-md-3 col-6 transport-category" v-bind:class="{'active':(selected_thing===0)}"-->
<!--                @click="selectThing(thing.id)">-->
<!--                <label>-->
<!--                    <span class="category-label-inner">-->
<!--                        <span class="animated-icon">-->
<!--                            <img :src="thing.image" width="75px"-->
<!--                                 height="75px" alt="">-->
<!--                        </span>-->
<!--                        <span>{{thing.title}}</span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </li>-->
<!--        </ul>-->
    </div>
</template>

<script>
    import Wizard from "./Wizard";
    export default {
        name: "Grid",
        components:{
            Wizard
        },
        props:['category'],
        data() {
            return {
                selected_subcategory:'',
                selected_thing:'',
                subcategories:[],
                things:[]
                // step:0
            }
        },
        created() {
            this.subcategories = this.category.subcategories;
            this.things = this.category.things;
            if(this.subcategories.length < 0) {
                this.$refs.grid_wizard.nextStep();
            }
        },
        computed: {
            filteredThings() {
                return this.things.filter(item=>
                    item.subcategory_id === this.selected_subcategory
                )
            }
        },
        methods: {
            nextStep() {
                if(this.$refs.grid_wizard.current_step === 1)
                {
                    this.$store.dispatch('setStep', 2)
                }
                else {
                    this.$refs.grid_wizard.nextStep();
                }
            },
            prevStep() {
                if(this.$refs.grid_wizard.current_step === 0)
                {
                    this.$store.dispatch('setStep', 0)
                }
                else {
                    if(this.subcategories.length > 0) {
                        this.$refs.grid_wizard.prevStep();
                    }
                    else {
                        this.$store.dispatch('setStep', 0)
                    }
                }
                // if(this.current_step === 0)
                // {
                //     if(this.inventory_mode === true)
                //     {
                //         this.inventory_mode = false;
                //     }
                //     else {
                //         this.$store.dispatch('setStep', 0)
                //     }
                // }
                // else {
                //     this.current_step--
                // }
            },
            selectSubcategory(id) {
                // this.step = 1;
               this.selected_subcategory = id;
            },
            selectThing(id) {
                this.selected_thing = id;
                this.$store.dispatch('editNewListing', {key:'thing', value: id})
            }
        }
    }
</script>

<style scoped>

</style>
