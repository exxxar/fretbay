<template>
    <div class="container mb-2">
        <h2>Vehicles</h2>
        <wizard :steps="2" ref="grid_wizard">
            <template v-slot:step_0>
                <ul class="row m-0 p-0" v-if="subcategories">
                    <li v-for="subcategory in subcategories" class="col-md-3 col-6 custom-grid-list mb-2"
                        v-bind:class="{'active':(selected_subcategory===subcategory.id)}"
                        @click="selectSubcategory(subcategory.id)">
                        <div class="card">
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <p>{{subcategory.title}}</p>
                            </div>

                        </div>

                    </li>
                </ul>


            </template>
            <template v-slot:step_1>
                <ul class="row m-0 p-0" v-if="filteredThings">
                    <li v-for="thing in filteredThings" class="col-md-3 col-6 custom-grid-list mb-2"
                        v-bind:class="{'active':(selected_thing===thing.id)}"
                        @click="selectThing(thing.id)">

                        <div class="card">
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <p>{{thing.title}}</p>
                            </div>

                        </div>

                    </li>
                </ul>

                <article-form-page :category="category" v-else/>
            </template>

            <template v-slot:step_2>
                <article-form-page :category="category" />
            </template>

            <template v-slot:footer>
                <div class="row d-flex justify-content-end mt-2 w-100">
                    <div class="col-6 col-sm-2">
                        <button class="btn btn-outline-blue w-100" @click="prevStep">Back</button>
                    </div>
                    <div class="col-6 col-sm-3">
                        <button class="btn btn-outline-primary w-100" @click="nextStep">Next</button>
                    </div>
                </div>
            </template>
        </wizard>

    </div>
</template>

<script>
    import Wizard from "./Wizard";
    import ArticleFormPage from '../../components/FindTransporter/ArticleFormPage'
    export default {
        name: "Grid",
        components: {
            Wizard,ArticleFormPage
        },
        props: ['category'],
        data() {
            return {
                selected_subcategory: '',
                subcategory: '',
                selected_thing: '',
                thing: '',
                subcategories: [],
                things: []
                // step:0
            }
        },
        created() {
            this.$store.dispatch('editNewListing', {key: 'title', value: this.category.title})
            this.subcategories = this.category.subcategories;
            this.things = this.category.things;
            if (this.subcategories.length < 0) {
                this.$refs.grid_wizard.nextStep();
            }
        },
        computed: {
            filteredThings() {
                return this.things.filter(item =>
                    item.subcategory_id === this.selected_subcategory
                )
            }
        },
        methods: {

            nextStep() {
                console.log("this.filteredThings.length",this.filteredThings.length)
                if (this.$refs.grid_wizard.current_step === 1||this.filteredThings.length===0) {
                    this.$store.dispatch('setStep', 2)
                } else {

                    this.$refs.grid_wizard.nextStep();
                }

                if (this.filteredThings.length===0)
                    this.$refs.grid_wizard.nextStep();


                window.scrollTo(0, 0);
            },
            prevStep() {
                if (this.$refs.grid_wizard.current_step === 0) {
                    this.$store.dispatch('setStep', 0)
                } else {
                    this.$refs.grid_wizard.current_step = 0


                    window.scrollTo(0, 0);
                  /*  if (this.subcategories.length > 0) {
                        this.$refs.grid_wizard.prevStep();
                    } else {
                        this.$store.dispatch('setStep', 0)
                    }*/
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
                let index = this.subcategories.findIndex(subcategory => subcategory.id === id);
                this.subcategory = this.subcategories[index];
                this.$store.dispatch('editNewListing', {key: 'subcategory_id', value: id});
                this.$store.dispatch('editNewListing', {key: 'subcategory', value: this.subcategory});
            },
            selectThing(id) {
                this.selected_thing = id;
                let index = this.things.findIndex(thing => thing.id === id);
                this.thing = this.things[index];
                this.$store.dispatch('editNewListing', {key: 'thing_id', value: id});
                this.$store.dispatch('editNewListing', {key: 'thing', value: this.thing});
            }
        }
    }
</script>

<style lang="scss" scoped>
    .custom-grid-list {

        line-height: 100%;
        list-style: none;
        text-align: center;

        cursor: pointer;

        &.active {
            .card {
                border:2px #21c87a solid;
            }
        }

    .card {
        height: 100px;
    }

    }
</style>
