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
                        <input type="text" class="form-control"
                               placeholder="Your volume" autofocus="">
                        <em class="volume-unit text-bold">m<sup>3</sup></em>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-8">
<!--                v-if="category.subcategories.length>0"-->
                <splide ref="splider" :options="options">
<!--                    <splide-slide>-->
<!--                        <div class="subcategory" :class="{'active': active_subcategory }">All</div>-->
<!--                    </splide-slide>-->
<!--                    <splide-slide v-for="(sub, index) in category.subcategories" :key="sub.id">-->
<!--                        <div class="subcategory" :class="{'active': active_subcategory }">{{sub.title}}</div>-->
<!--                    </splide-slide>-->
                    <splide-slide>
                        <div class="subcategory" :class="{'active': active_subcategory }">Entrance</div>
                    </splide-slide>
                    <splide-slide>
                        <div class="subcategory" >Bathroom</div>
                    </splide-slide>
                    <splide-slide>
                        <div class="subcategory" @click="chooseSubcategory(2)">Living room</div>
                    </splide-slide>
                    <splide-slide>
                        <div class="subcategory">Kitchen</div>
                    </splide-slide>
                    <splide-slide>
                        <div class="subcategory">Chamber</div>
                    </splide-slide>
                    <splide-slide>
                        <div class="subcategory" @click="chooseSubcategory(5)">Garden</div>
                    </splide-slide>
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

            <div class="col-4">
                <div class="form-group ">
                    <div class="input-has-icon-right position-relative">
                        <input type="text"
                               class="form-control"
                               placeholder="Search" required="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="inventory-list">
                    <li class="inventory-item-wrapper" v-for="thing in 8">
                        <div class="inventory-item">
                            <img src="https://fretbay.com/en/assets/images/common/icons/volume/96h.svg?v=0.0.0" class="img-fluid" alt="">
                            <h6 class="text-center">Parasol</h6>
                        </div>
                        <div class="inventory-controls " >
                            <!--<button class="btn btn-primary rounded">-</button>-->
                            <a class="add-remove-count d-flex justify-content-center">-</a>
                            <span>1</span>
                            <a class="add-remove-count d-flex justify-content-center">+</a>
                            <!--<button class="btn btn-primary rounded">+</button>-->
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
        // props: ['category'],
        data() {
            return {
                active_subcategory: 0,
                options: {
                    type     : 'slide',
                    rewind   : false,
                    trimSpace: true,
                    autoWidth: true,
                    pagination:false,
                    focus: 'center',
                    updateOnMove: true,
                },
            }
        },
        methods: {
            chooseSubcategory(slide) {
                this.$refs.splider.go(slide);
                console.log(slide)
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

