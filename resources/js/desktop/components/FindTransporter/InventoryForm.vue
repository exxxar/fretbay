<template>
    <div>
        <div class="row">
            <div class="col-6">
                <h4>Volume calculator </h4>
            </div>

            <div class="col-2">
                <p class="mt-2">Total volume</p>
            </div>
            <div class="col-3">
                <div class="form-group ">
                    <div class="volume-field-wrap blue-field">
<!--                        <input type="text" class="form-control"-->
<!--                               placeholder="Your volume" autofocus="">-->
                        {{volumeCartTotalVolume.toFixed(2)}}
                        <em class="volume-unit text-bold">m<sup>3</sup></em>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-8" v-if="!search_mode">
<!--                v-if="category.subcategories.length>0"-->
                <splide ref="splider" :options="options">
<!--                    <splide-slide>-->
<!--                        <div class="subcategory" :class="{'active': active_subcategory }">All</div>-->
<!--                    </splide-slide>-->
                    <splide-slide v-for="(sub, index) in subcategories" :key="sub.id">
                        <div class="subcategory" @click="chooseSubcategory(index, sub.id)" :class="{'active': active_subcategory == sub.id }">{{sub.title}}</div>
                    </splide-slide>
<!--                    <splide-slide>-->
<!--                        <div class="subcategory" :class="{'active': active_subcategory }">Entrance</div>-->
<!--                    </splide-slide>-->
<!--                    <splide-slide>-->
<!--                        <div class="subcategory" >Bathroom</div>-->
<!--                    </splide-slide>-->
<!--                    <splide-slide>-->
<!--                        <div class="subcategory" @click="chooseSubcategory(2)">Living room</div>-->
<!--                    </splide-slide>-->
<!--                    <splide-slide>-->
<!--                        <div class="subcategory">Kitchen</div>-->
<!--                    </splide-slide>-->
<!--                    <splide-slide>-->
<!--                        <div class="subcategory">Chamber</div>-->
<!--                    </splide-slide>-->
<!--                    <splide-slide>-->
<!--                        <div class="subcategory" @click="chooseSubcategory(5)">Garden</div>-->
<!--                    </splide-slide>-->
                </splide>
<!--                <ul class="d-flex justify-content-around flex-wrap choose-inventory-type">-->
<!--                    <li class="active">Entrance</li>-->
<!--                    <li>Bathroom</li>-->
<!--                    <li>Living room</li>-->
<!--                    <li>Kitchen</li>-->
<!--                    <li>Chamber</li>-->
<!--                    <li>Garden</li>-->
<!--                </ul>-->

            </div>

            <div class="col-12" :class="{'col-sm-4':!search_mode}">
                <div class="form-group w-100">
                    <div class="input-has-icon-right position-relative w-100">
                        <input v-model="search"
                               @input="runSearch"
                               type="text"
                               class="form-control w-100"
                               placeholder="Search">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="inventory-list">
                    <li v-if="!search_mode" class="inventory-item-wrapper" v-for="thing in filteredThings">
                        <div class="inventory-item">
                            <img :src="thing.image" class="img-fluid" alt="">
                            <h6 class="text-center">{{thing.title}}</h6>
                        </div>
                        <div class="inventory-controls" >
                            <!--<button class="btn btn-primary rounded">-</button>-->
                            <a class="add-remove-count d-flex justify-content-center" @click="decrement(thing.id)">-</a>
                            <span>{{getQuantity(thing.id)}}</span>
                            <a class="add-remove-count d-flex justify-content-center" @click="increment(thing)">+</a>
                            <!--<button class="btn btn-primary rounded">+</button>-->
                        </div>
                    </li>
                    <li v-if="search_mode" class="inventory-item-wrapper" v-for="thing in search_results">
                        <div class="inventory-item">
                            <img :src="thing.image" class="img-fluid" alt="">
                            <h6 class="text-center">{{thing.title}}</h6>
                        </div>
                        <div class="inventory-controls" >
                            <a class="add-remove-count d-flex justify-content-center" @click="decrement(thing.id)">-</a>
                            <span>{{getQuantity(thing.id)}}</span>
                            <a class="add-remove-count d-flex justify-content-center" @click="increment(thing)">+</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>


<!--        <div class="row d-flex justify-content-end mt-2 w-100">-->
<!--            <div class="col-2">-->
<!--                <button class="btn btn-custom-danger">Back</button>-->
<!--            </div>-->
<!--            <div class="col-3">-->
<!--                <button class="btn btn-custom-white">Next</button>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>
<script>
    export default {
        name: "InventoryForm",
        props: ['category'],
        data() {
            return {
                search:'',
                search_results: [],
                search_options: {
                    // minMatchCharLength: 1,
                    shouldSort: false,
                    threshold: 0.2,
                    keys: [
                        'title',
                    ]
                },
                search_mode:false,
                active_subcategory: '',
                options: {
                    type     : 'slide',
                    rewind   : false,
                    trimSpace: true,
                    autoWidth: true,
                    pagination:false,
                    focus: 'center',
                    updateOnMove: true,
                },
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
                return this.things.filter(item => {item.subcategory_id === this.active_subcategory})
            }
        },
        created() {
            this.subcategories = this.category.subcategories;
            this.active_subcategory = this.subcategories[0].id;
            this.things = this.category.things;
        },
        methods: {
            chooseSubcategory(slide, id) {
                this.$refs.splider.go(slide);
                this.active_subcategory = id;
                console.log(slide)
            },
            runSearch() {
                if(this.search.trim()=='')
                {
                    this.search_results = [];
                    this.search_mode = false;
                }
                else {
                    this.$search(this.search, this.things, this.search_options).then(result => {
                        this.search_results = result;
                    });
                    this.search_mode = true;
                }
            },
            increment(thing) {
                let index = this.volume_items.findIndex(item => item.item.id === thing.id);
                if ( index > -1)
                {
                    this.$store.dispatch('incVolumeItemQuantity', thing.id);
                }
                else {
                    this.$store.dispatch('pushVolumeItemToCart', thing);
                }
                this.$store.dispatch('editNewListing', {key:'volume_items', value: this.volume_items});
            },
            decrement(id) {
                let index = this.volume_items.findIndex(item => item.item.id === id);
                if ( index > -1)
                {
                    this.$store.dispatch('decVolumeItemQuantity', id);
                    this.$store.dispatch('editNewListing', {key:'volume_items', value: this.volume_items});
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
        }
    }
</script>

<style lang="scss">
    .splide {
        padding: 0 1.5em;
    }
    .splide__arrow svg {
        width: 1.5em;
        height: 1.5em;
    }
    .splide__arrow--prev {
        left: 0em;
    }
    .splide__arrow--next {
        right: 0em;
    }


    .volume-field-wrap.blue-field input {
        background: #def0ff;
    }
    .subcategory{
        padding:10px;
    }
    .subcategory:hover,
    .subcategory:hover .active {
        background: #3490dc;
        color: white;
        transition:.3s;
        cursor:pointer;
    }
    .choose-inventory-type {
        li {
            padding:10px;
        }

        li:hover,
        .active {
            background: #3490dc;
            color: white;
            transition:.3s;
            cursor:pointer;
        }
        .subcategory:hover,
        .subcategory .active {
            background: #3490dc;
            color: white;
            transition:.3s;
            cursor:pointer;
        }
    }

    .inventory-list {
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;

        .inventory-item-wrapper {
            width:20%;
            padding:5px;
            box-sizing: border-box;
            min-height: 100px;
            cursor: pointer;

            .inventory-item {
                padding: 10px;
                border-radius: 5px;

            }

            .inventory-controls {
                display: flex;
                justify-content: space-between;
                align-items:center;
                height:40px;
                border-radius:0px 0px 5px 5px;

                &>* {
                    display: none;
                }

                button {
                    background: #89b2f2;
                    border:1px solid #89b2f2;

                    &:active,
                    &:focus {
                        outline:none;
                    }
                }

                span {
                    color:white;
                }
            }

            &:hover {
                .inventory-item {
                    background: #e8f1ff;


                }

                .inventory-controls {
                    background: #89b2f2;
                    &>* {
                        display: block;
                    }

                    button {
                        background: #89b2f2;
                        border:1px solid #89b2f2;

                    }

                    span {
                        color:white;
                    }
                }
            }
        }
    }
    .slick-prev::before, .slick-next::before {
        color:#3490dc !important;
    }
    .slick-prev{
        left: -8px !important;
        opacity: 1 !important;
    }
    .slick-next{
        right: -8px !important;
        opacity: 1 !important;
    }
    .slick-list {
        margin-left: 1.2rem !important;
        margin-right: 1.2rem !important;
    }
</style>

