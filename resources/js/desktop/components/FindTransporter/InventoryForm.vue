<template>
    <div>
        <div class="row w-100 m-auto">
            <div class="col-12 col-sm-7">
                <h4>Volume calculator </h4>
            </div>

            <div class="col-12 col-sm-5">
                <p class="mt-2" style="float: right">Total volume  {{volumeCartTotalVolume.toFixed(2)}} <em class="text-bold">m<sup>3</sup></em></p>
            </div>
        </div>

        <div class="row w-100 m-auto">
            <div class="col-12 col-sm-8" v-if="!search_mode">
<!--                v-if="category.subcategories.length>0"-->

                <VueSlickCarousel v-bind="settings" v-if="categories.length>0">
                    <div v-for="(sub, index) in categories" class="p-1" :key="sub.id" v-if="sub.subcategories.length>0">
                        <button class="btn btn-outline-primary w-100" style="min-width: 200px" @click="chooseSubcategory(sub.id)"
                                :class="{'btn-primary text-white': active_category.id === sub.id }">{{prepareLangTitle(sub.title)}}</button>
                    </div>
                </VueSlickCarousel>

            </div>

            <div class="col-12" :class="{'col-sm-4':!search_mode}">
                <div class="form-group w-100">
                    <div class="input-has-icon-right position-relative w-100">
                        <input v-model="search"
                               type="text"
                               class="form-control w-100"
                               placeholder="Search">
                    </div>
                </div>
            </div>
        </div>

        <div class="row w-100 m-auto">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-2"  v-for="thing in filteredThings">

                <div class="card text-white">
                    <img class="card-img" v-lazy="thing.image" alt="Card image">
                    <div class="card-img-overlay">
                        <h5 class="card-title text-dark">{{prepareLangTitle(thing.title)}}</h5>

                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">

                            <div class="col-4">
                                <button class="btn btn-outline-primary w-100" @click="decrement(thing.id)">-</button>
                            </div>
                            <div class="col-4  d-flex justify-content-center align-items-center">
                                <span><strong>{{getQuantity(thing.id)}}</strong></span>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-outline-primary w-100"  @click="increment(thing)">+</button>
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
                search:null,
                search_mode: false,
                active_category: null,
                settings:{
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
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                },
                categories:[],
                subcategories:[],
                things:[],
            }
        },
        computed:{
            volume_items() {
                return this.$store.getters.volumeCart;
            },
            volumeCartTotalVolume() {
                return this.$store.getters.volumeCartTotalVolume;
            },
            filteredThings() {
                if ( !this.search)
                    return this.things;

                let tmpThings = [];
                this.categories.forEach(category=>{
                    category.subcategories.forEach(sub=>{
                        if ( this.prepareLangTitle(sub.title).trim().toLowerCase().indexOf(this.search.trim().toLowerCase())!==-1)
                            tmpThings.push(sub);
                    })
                })
                return tmpThings
            }
        },
        created() {
            this.loadCategories();
        },
        methods: {
            prepareLangTitle(title) {
                console.log("lang=>",Object.entries(title).find(item => item[0] === window.locale)[1])
                return typeof title === 'object' ?
                    Object.entries(title).find(item => item[0] === window.locale)[1] :
                    title;
            },
            loadCategories(){
              axios.get('/api/get-volume-categories')
              .then(response=>{
                  console.log(response)
                  this.categories = response.data.categories
                  this.active_category = this.categories[0];
                  this.things =  this.active_category.subcategories;


                  console.log("categories",this.categories)
                  console.log("active_category",this.active_category)
                  console.log("things",this.things)



                  this.active_category = this.subcategories[0].id;
              })
            },
            chooseSubcategory(id) {
                this.active_category =  this.categories.find(item=>item.id===id);
                this.things =  this.active_category.subcategories;
            },

            increment(thing) {
                let index = this.volume_items.findIndex(item => item.item.id === thing.id);
                if ( index > -1)
                {
                    this.$store.dispatch('incVolumeItemQuantity', thing.id);
                }
                else {
                    this.$store.dispatch('addVolumeItemToCart', thing);
                }
                this.$store.dispatch('editNewListing', {key:'volume_items', value: this.volume_items});
                this.$store.dispatch('editNewListing', {key:'summary_volume', value: this.volumeCartTotalVolume});
            },
            decrement(id) {
                let index = this.volume_items.findIndex(item => item.item.id === id);
                if ( index > -1)
                {
                    this.$store.dispatch('decVolumeItemQuantity', id);
                    this.$store.dispatch('editNewListing', {key:'volume_items', value: this.volume_items});
                    this.$store.dispatch('editNewListing', {key:'summary_volume', value: this.volumeCartTotalVolume});
                }
            },
            getQuantity(id) {
                let index = this.volume_items.findIndex(item => item.item.id === id);
                if ( index > -1)
                {
                    return this.volume_items[index].quantity;
                }
                return 0;
            }
        },
        components:{
            VueSlickCarousel
        }
    }
</script>



