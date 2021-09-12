<template>
    <div>

        <div style="position:sticky; top:30px;z-index:100;background:white;">
            <div class="row w-100 m-auto">
                <div class="col-12 col-sm-7">
                    <h4 class="text-sm-left text-center">Volume calculator </h4>
                </div>

                <div class="col-12 col-sm-5">
                    <p class="mt-2 text-sm-right text-center" style="line-height: 200%;">Total volume {{volumeCartTotalVolume.toFixed(2)}} <em
                        class="text-bold">m<sup>3</sup></em>  <a href="#reset" v-if="volumeCartTotalVolume>0" class="btn btn-link color-primary p-0 ml-2" @click="resetVolume"><i class="far fa-trash-alt"></i></a></p>

                </div>
            </div>

            <div class="row w-100 m-auto">
                <div class="col-12 col-sm-8 m-0 mb-2" v-if="!search_mode">
                    <!--                v-if="category.subcategories.length>0"-->


                    <VueSlickCarousel v-bind="settings" v-if="categories.length>0">
                        <div v-for="(sub, index) in categories" class="p-1" :key="index"
                             v-if="sub.subcategories.length>0">
                            <button class="btn btn-outline-primary w-100" style="min-width: 200px"
                                    @click="chooseSubcategory(sub.id)"
                                    :class="{'btn-primary text-white': active_category.id === sub.id }">{{sub.title}}
                            </button>
                        </div>
                    </VueSlickCarousel>

                </div>

                <div class="col-12" :class="{'col-sm-4':!search_mode}">
                    <div class="form-group w-100">
                        <div class="input-has-icon-right position-relative w-100 p-1">
                            <input v-model="search"
                                   type="search"
                                   class="form-control w-100"
                                   placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
        </div>


         <div class="row w-100 m-auto" v-if="filteredThings">


                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-2 p-1" :key="thing.id" v-for="thing in filteredThings">

                    <div class="card text-white" v-if="thing">

                        <img class="card-img inverted-img mt-7" v-lazy="thing.image" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title text-dark">{{(thing.title)}}</h5>

                        </div>
                        <div class="card-footer text-muted">
                            <div class="row">

                                <div class="col-5">
                                    <button class="btn btn-outline-primary w-100 p-1" @click="decrement(thing.id)">-
                                    </button>
                                </div>
                                <div class="col-2  d-flex justify-content-center align-items-center p-0">
                                    <span><strong>{{getQuantity(thing.id)}}</strong></span>
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-outline-primary w-100 p-1" @click="increment(thing)">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

    </div>
</template>
<script>
    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'


    export default {
        name: "InventoryForm",
        props: ['category'],
        data() {
            return {
                search: null,
                search_mode: false,
                active_category: null,
                settingsScroll: {
                    suppressScrollY: false,
                    suppressScrollX: false,
                    wheelPropagation: false
                },
                settings: {
                    "dots": false,
                    "arrows": true,
                    "focusOnSelect": true,
                    "infinite": true,
                    "speed": 500,
                    "slidesToShow": 5,
                    "slidesToScroll": 3,
                    "touchThreshold": 5,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 1008,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        }

                    ]
                },
                categories: [],
                subcategories: [],
                things: [],
            }
        },
        computed: {
            volume_items() {
                return this.$store.getters.volumeCart;
            },
            volumeCartTotalVolume() {
                return this.$store.getters.volumeCartTotalVolume;
            },
            filteredThings() {
                if (!this.search)
                    return this.things;

                let tmpThings = [];
                this.categories.forEach(category => {
                    category.subcategories.forEach(sub => {
                        if (sub.title.trim().toLowerCase().indexOf(this.search.trim().toLowerCase()) !== -1)
                            tmpThings.push(sub);
                    })
                })
                return tmpThings
            }
        },
        created() {
            this.loadCategories()

            if (window.location.search) {
                this.search = window.location.search.split('=')[1]
                setTimeout(()=>{
                    window.scrollTo(0, 0);
                }, 1000)

            }

        },
        methods: {
            resetVolume(){
                this.$store.dispatch("clearVolumeCart")
            },
            loadCategories() {
                axios.get('/api/get-volume-categories')
                    .then(response => {
                        this.categories = response.data.categories
                        this.active_category = this.categories[0];
                        this.things = this.active_category.subcategories;


                        console.log("categories", this.categories)
                        console.log("active_category", this.active_category)
                        console.log("things", this.things)


                        /*this.active_category = this.subcategories[0].id;*/
                    })
            },
            chooseSubcategory(id) {
                this.active_category = this.categories.find(item => item.id === id);
                this.things = this.active_category.subcategories;
            },

            increment(thing) {
                let index = this.volume_items.findIndex(item => item.item.id === thing.id);
                if (index > -1) {
                    this.$store.dispatch('incVolumeItemQuantity', thing.id);
                } else {
                    this.$store.dispatch('addVolumeItemToCart', thing);
                }
                this.$store.dispatch('editNewListing', {key: 'volume_items', value: this.volume_items});
                this.$store.dispatch('editNewListing', {key: 'summary_volume', value: this.volumeCartTotalVolume});
            },
            decrement(id) {
                let index = this.volume_items.findIndex(item => item.item.id === id);
                if (index > -1) {
                    this.$store.dispatch('decVolumeItemQuantity', id);
                    this.$store.dispatch('editNewListing', {key: 'volume_items', value: this.volume_items});
                    this.$store.dispatch('editNewListing', {key: 'summary_volume', value: this.volumeCartTotalVolume});
                }
            },
            getQuantity(id) {
                let index = this.volume_items.findIndex(item => item.item.id === id);
                if (index > -1) {
                    return this.volume_items[index].quantity;
                }
                return 0;
            }
        },
        components: {
            VueSlickCarousel
        }
    }
</script>


<style lang="scss">

    .scroll-area {
        position: relative;
        margin: auto;
        width: 100%;
        height: 500px;
    }

    .inverted-img {
        //filter: drop-shadow(4px 4px 0px #ca3b72 ) invert(1);

        //filter: drop-shadow(4px 4px 0px #8a3bca) invert(1) hue-rotate(45deg);

        filter: drop-shadow(4px 4px 0px #0e7100) invert(1) hue-rotate(
                113deg);
    }

</style>
