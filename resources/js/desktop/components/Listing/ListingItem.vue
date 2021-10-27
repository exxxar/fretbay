<template>
    <div class="card shadow-sm border-0 mb-2 px-2" v-if="listing">
        <div class="card-header d-flex justify-content-between">


            <div class="counters">
                <a class="btn btn-link m-0 p-0" v-if="(user.is_transporter||user.id===listing.user_id)&&details"
                   :href="'/listing/'+listing.id"

                > <span class="mr-5 text-bold">№{{preparedId}}</span>
                </a>
                <span class="mr-5 text-bold" v-else>№{{preparedId}}</span>
                <span class="mr-2">  {{ this.listing.message_count}}
                <i class="fas fa-envelope"></i></span>

                <span>  {{ listing.quote_count}}<i class="fas fa-gavel"></i></span>


            </div>


            <div class="like">
                <button class="btn btn-link m-0 p-0" v-if="isTranspoter">
                    <span v-if="!isLiked" @click="like"><img v-lazy="'/assets/svg/shapes/heart.svg'" style="width:20px;"
                                                             alt=""></span>
                    <span v-if="isLiked" @click="dislike"><img v-lazy="'/assets/svg/shapes/heart-solid.svg'"
                                                               style="width:20px;" alt=""></span>
                </button>
            </div>

            <div class="counters">
                <span class="badge badge-primary"><small>{{listing.status||$trans('profile.listing.in_progress')}}</small></span>
                <span class="badge badge-purple" v-if="user&&listing.user_id==user.id"><small>{{$trans('profile.listing.your')}}</small></span>
            </div>


        </div>
        <div class="card-body d-md-flex justify-content-between align-items-center py-1 px-1 flex-wrap">

            <div class="media align-items-center mb-1 mb-md-0">


                <a class="u-md-avatar custom-avatar mr-3" href="#" v-if="listing.images.length>0">
                    <img class="img-fluid rounded-circle" v-lazy="listing.images[0].path"
                         :alt="listing.images[0].name">
                </a>
                <div class="media-body text-nowrap">
                    <h3 class="h5 mb-0">
                        <a class="btn btn-link"
                           v-if="(user.is_transporter||user.id===listing.user_id)&&details"
                           :href="'/listing/'+listing.id"

                        > {{prepareLangTitle(listing.category.title)||"Empty"}}
                        </a>
                        <span v-else>      {{prepareLangTitle(listing.category.title)||"Empty"}}</span>
                        <span v-if="listing.category.mode ==='calculator'">
                                                  {{listing.summary_volume}}  <em
                            class="volume-unit text-bold">m<sup>3</sup></em>
                                            </span>

                    </h3>
                </div>
            </div>

            <div
                class="text-md-right text-left align-items-sm-end text-secondary d-flex flex-column justify-content-center align-items-start">
                <p class="mb-0" style="font-size: 12px; color: #8e949a">{{$trans('profile.listing.publication_at')}}</p>
                 {{listing.created_at | moment('DD.MM.YYYY HH:mm') }}


            </div>


            <div class="row w-100 mt-1 m-0">
                <div class="col-sm-4 col-12 mt-2 mt-sm-0 p-0">
                    <i class="svg-icon svg-icon-xs text-secondary mt-n1 mr-2">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path
                                    d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
                    </i>

                    <strong>{{$trans('profile.listing.place_of_loading')}}:</strong>
                </div>
                <div class="col-sm-8 col-12 p-0">
                    <a class="d-flex align-items-center text-secondary" href="#">


                        <strong class="mr-2">{{listing.place_of_loading.postal}},</strong>
                        {{listing.place_of_loading.place_name}}

                    </a>

                    <small> {{$trans('profile.listing.load_between')}}
                        <strong style="color: #0fb15d">
                            {{listing.shipping_date_from | moment('DD.MM')}}
                        </strong>

                        and

                        <strong style="color: #0fb15d">
                            {{listing.shipping_date_to | moment('DD.MM')}}
                        </strong>
                    </small>
                </div>

                <div class="col-sm-4 col-12 mt-2 mt-sm-0 p-0">

                    <i class="svg-icon svg-icon-xs text-secondary mt-n1 mr-2 ">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path
                                    d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
                    </i>

                    <strong>{{$trans('profile.listing.place_of_delivery')}}:</strong>
                </div>
                <div class="col-sm-8 col-12 p-0">
                    <a class="d-flex align-items-center text-secondary" href="#">


                        <strong class="mr-2"> {{listing.place_of_delivery.postal}},</strong>
                        {{listing.place_of_delivery.place_name}}
                    </a>

                    <small> {{$trans('profile.listing.delivered_between')}}
                        <strong style="color: #0fb15d">
                            {{listing.unshipping_date_from | moment('DD.MM')}}
                        </strong> and
                        <strong style="color: #0fb15d">
                            {{listing.unshipping_date_to | moment('DD.MM')}}
                        </strong>
                    </small>
                </div>

                <div class="col-sm-4 col-12 pl-0" v-if="listing.distance>0">
                    <p class="ml-sm-5 ml-0 p-sm-2 p-0 mt-2 mt-sm-0">{{$trans('profile.listing.distance')}} <strong>{{listing.distance}}</strong> km
                    </p>
                    <p class="ml-sm-5 ml-0 p-sm-2 p-0 mt-2 mt-sm-0" v-if="listing.additional_info">{{$trans('profile.listing.description')}}: <em>{{listing.additional_info}}</em>
                    </p>
                </div>


                <div class="col-12 pl-0" v-if="listing.moving_package">
                    <p class="ml-sm-5 ml-0 p-sm-2 p-0 mt-2 mt-sm-0"><strong>{{listing.moving_package}}</strong></p>
                </div>

                <div class="col-12 p-2" v-if="images.length>0">
                    <VueSlickCarousel v-bind="settings">
                        <div :key="index" v-for="(item, index) in images" class="gallery-img p-2"
                             @click="imageIndex=index">
                            <div class="card" style="max-width: 150px;">
                                <div class="card-body p-2">
                                    <img v-lazy="item" alt="" class="w-100">
                                </div>
                            </div>
                        </div>
                    </VueSlickCarousel>
                    <vue-gallery-slideshow
                        v-if="images"
                        :images="images"
                        :index="imageIndex"
                        @close="imageIndex = null"/>

                </div>


                <div class="col-12 pl-0 pr-0 d-flex justify-content-between">

                    <div class="btn-group" v-if="listing.user_id===user.id">
                        <button class="btn btn-outline-danger" v-if="!listing.deleted_at"
                                data-toggle="modal" :data-target="'#removeModal-'+listing.id+modalPrefix"

                        ><i
                            class="far fa-trash-alt"></i>
                        </button>
                        <button class="btn btn-outline-danger"
                                data-toggle="modal" :data-target="'#archiveModal-'+listing.id+modalPrefix"

                                v-if="listing.is_active&&!listing.deleted_at">
                            <i class="fas fa-archive"></i>
                        </button>
                        <button class="btn btn-outline-danger"
                                @click="restoreListing"
                                v-if="listing.deleted_at">
                            <i class="fas fa-trash-restore"></i>
                        </button>



                    </div>



                </div>

            </div>
        </div>

        <div class="card-footer d-md-flex justify-content-between align-items-center px-0">
            <div class="mb-4 mb-md-0">

                <a class="u-label u-label--xs u-label--primary text-uppercase letter-spacing-0_06 mr-2 mb-2"
                   href="#"
                   v-if="listing.category.mode ==='article' && listing.articles.length===1"
                   v-for="property in listing.category.properties"
                >
                    {{prepareLangTitle(property.title)||"Empty"}}:
                    {{listing.articles[0].properties[property.slug].value}}
                </a>

                <div class="row w-100 mx-auto my-2">
                    <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);">
                        {{prepareLangTitle(listing.category.title)||"Empty"}}
                    </div>

                    <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                         v-if="listing.category.mode ==='calculator'"
                    >
                        {{listing.summary_volume}} <em class="volume-unit text-bold">m<sup>3</sup></em>
                    </div>

                    <strong class="w-100 mt-2 p-2"
                            v-if="listing.category.mode ==='article' && listing.articles.length>1">{{listing.articles.length}}
                        {{$trans('profile.listing.articles')}}:</strong>


                    <div class="d-flex space-between flex-wrap mt-2 w-100"
                         v-if="listing.category.mode ==='article' && listing.articles.length>=1">

                        <div
                            v-for="property in listing.category.properties"
                        >
                            <a href="" class="badge badge-primary mr-2 mb-2" v-for="item in listing.articles">
                                {{prepareLangTitle(item.title)||"Empty"}}:
                                <strong>{{item.properties[property.slug].value}}</strong>
                                <small>
                                    {{prepareLangTitle(property.title)||"Empty"}}
                                </small>
                            </a>
                        </div>
                    </div>

                    <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                         v-if="listing.category.mode ==='grid'"
                    >
                        {{prepareLangTitle(listing.subcategory.title)||"Empty"}}
                    </div>
                    <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                         v-if="listing.category.mode ==='grid'&&listing.thing"
                    >
                        {{prepareLangTitle(listing.thing.title)||"Empty"}}
                    </div>
                </div>
            </div>


        </div>

        <!-- Modal -->
        <div class="modal fade" :id="'removeModal-'+listing.id+modalPrefix" data-backdrop="static" data-keyboard="false" tabindex="-1" :aria-labelledby="'removeModal-'+listing.id" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="quoteModalHeader">{{$trans('profile.listing.h5_1')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-6"><button class="btn btn-danger w-100" data-dismiss="modal" @click="removeListing">{{$trans('profile.listing.button_1')}}</button></div>
                            <div class="col-6"><button data-dismiss="modal" aria-label="Close" class="btn btn-secondary w-100">{{$trans('profile.listing.button_2')}}</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" :id="'archiveModal-'+listing.id+modalPrefix" data-backdrop="static" data-keyboard="false" tabindex="-1" :aria-labelledby="'archiveModal-'+listing.id" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="quoteModalHeader2">{{$trans('profile.listing.h5_2')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-6"><button class="btn btn-danger w-100" data-dismiss="modal" @click="archiveListing">{{$trans('profile.listing.button_3')}}</button></div>
                            <div class="col-6"><button data-dismiss="modal" aria-label="Close" class="btn btn-secondary w-100">{{$trans('profile.listing.button_2')}}</button></div>
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
    import VueGallerySlideshow from 'vue-gallery-slideshow'
    import { v4 as uuidv4 } from 'uuid';
    export default {
        props: {
            listing: Object,
            details: {
                type: Boolean,
                required: false,
                default: true
            },
        },


        components: {
            VueSlickCarousel, VueGallerySlideshow
        },
        data() {
            return {
                modalPrefix: null,
                imageIndex: null,

                tmp_favorites: [],
                settings: {
                    "dots": false,
                    "arrows": true,
                    "focusOnSelect": false,
                    "infinite": true,
                    "speed": 500,
                    "slidesToShow": 6,
                    "slidesToScroll": 4,
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
            }
        },
        computed: {

            user: function () {
                return window.user
            },
            images() {
                let tmp = []

                if (!this.listing.images)
                    return tmp;

                this.listing.images.forEach(item => {
                    tmp.push(item.path)
                })

                return tmp;
            },
            isLiked() {

                let tmp = [...this.tmp_favorites, ...this.user.favorites]

                if (tmp.length === 0)
                    return false;

                let t = tmp.filter(item => item.listing_id === this.listing.id);
                return t.length > 0;

            },
            isTranspoter() {
                if (!window.user)
                    return false

                return this.user.is_transporter || false;
            },
            preparedId: function () {
                let tmp = "" + this.listing.id;

                while (tmp.length < 6)
                    tmp = "0" + tmp;

                return tmp;
            }

        },
        created(){
          this.modalPrefix = uuidv4()
        },
        methods: {
            removeListing() {
                axios.delete("/listing/" + this.listing.id).then(resp => {
                    this.$emit("update")
                });
            },
            archiveListing() {
                axios.get("/listing/archive/" + this.listing.id).then(resp => {
                    this.$emit("update")
                });
            },
            restoreListing() {
                axios.get("/listing/restore/" + this.listing.id).then(resp => {
                    this.$emit("update")
                });
            },
            prepareLangTitle(title) {
                return typeof title === 'object' ?
                    Object.entries(title).find(item => item[0] === window.locale)[1] :
                    title;
            },
            like() {
                if (!this.isLiked)
                    this.tmp_favorites.push({
                        listing_id: this.listing.id
                    })

                axios.post("/listing/favorites/add", {
                    "listing_id": this.listing.id
                }).then(resp => {

                }).catch(()=>{
                    if (this.isLiked) {
                        this.user.favorites = this.user.favorites.filter((item) => {
                                return item.listing_id !== this.listing.id
                            }
                        )

                        this.tmp_favorites = this.tmp_favorites.filter((item) => {
                                return item.listing_id !== this.listing.id
                            }
                        )
                    }
                })
            },
            dislike() {

                if (this.isLiked) {
                    this.user.favorites = this.user.favorites.filter((item) => {
                            return item.listing_id !== this.listing.id
                        }
                    )

                    this.tmp_favorites = this.tmp_favorites.filter((item) => {
                            return item.listing_id !== this.listing.id
                        }
                    )
                }

                axios.post("/listing/favorites/remove", {
                    "listing_id": this.listing.id
                }).then(resp => {

                })
            }
        },
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

    .vgs__container__img {
        height: 100% !important;
    }

    .slick-slide {
        .gallery-img {
            img {
                display: block;
                max-height: 200px;
                object-fit: cover;
            }
        }
    }

</style>
