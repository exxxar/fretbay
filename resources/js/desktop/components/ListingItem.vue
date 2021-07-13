<template>
    <div class="card shadow-sm border-0 mb-4 px-4">
        <div class="card-header d-flex justify-content-between">

            <div class="counters">
                   <span v-if="listing.messages" class="mr-2">  {{listing.messages.length}} <i
                       class="fas fa-envelope"></i></span>
                <span v-if="listing.quotes">  {{listing.quotes.length}} <i class="fas fa-gavel"></i></span>
                <span v-else>  0 <i class="fas fa-gavel"></i></span>
                <span class="badge badge-primary"><small>{{listing.status||"In progress"}}</small></span>
                <span class="badge badge-purple" v-if="user&&listing.user_id==user.id"><small>Your</small></span>
            </div>
            <a class="d-flex align-items-center font-weight-bold" target="_blank" :href="'/listing/'+listing.id">

                <span>Details</span>
                <i class="svg-icon svg-icon-xs text-primary mt-n1 ml-2">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <rect fill="#000000" opacity="0.3"
                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) "
                                  x="11" y="5" width="2" height="14" rx="1"></rect>
                            <path
                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                fill="#000000"
                                transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                        </g>
                    </svg>
                </i>
            </a>
        </div>
        <div class="card-body d-md-flex justify-content-between align-items-center py-4 px-0 flex-wrap">

            <div class="media align-items-center mb-5 mb-md-0">
                <a class="u-md-avatar custom-avatar mr-3" href="#" v-if="listing.images.length>0">
                    <img class="img-fluid rounded-circle"  v-lazy="listing.images[0].path"
                         :alt="listing.images[0].name">
                </a>
                <div class="media-body text-nowrap">
                    <h3 class="h5 mb-0">
                        {{listing.category.title||"Empty"}}
                        <span v-if="listing.category.mode ==='calculator'">
                                                  {{listing.summary_volume}}  <em
                            class="volume-unit text-bold">m<sup>3</sup></em>
                                            </span>

                    </h3>
                </div>
            </div>

            <div
                class="text-md-right text-secondary d-flex flex-column justify-content-center align-items-end">
                <p class="mb-0" style="font-size: 12px; color: #8e949a">Publication time</p>
                Since {{listing.updated_at | moment("from", "now", true)}}

                <small> Load between
                    <strong style="color: #0fb15d">
                        {{listing.shipping_date_from | moment('DD.MM')}}
                    </strong>

                    and

                    <strong style="color: #0fb15d">
                        {{listing.shipping_date_to | moment('DD.MM')}}
                    </strong>
                </small>

                <small> Delivered between
                    <strong style="color: #0fb15d">
                        {{listing.unshipping_date_from | moment('DD.MM')}}
                    </strong> and
                    <strong style="color: #0fb15d">
                        {{listing.unshipping_date_to | moment('DD.MM')}}
                    </strong>
                </small>
            </div>


            <div class="row w-100 mt-5">
                <div class="col-4">
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

                    <strong>Place of loading:</strong>
                </div>
                <div class="col-8">
                    <a class="d-flex align-items-center text-secondary" href="#">


                        {{listing.place_of_loading.place_name}}

                    </a>
                </div>

                <div class="col-4">

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

                    <strong>Place of delivery:</strong>
                </div>
                <div class="col-8">
                    <a class="d-flex align-items-center text-secondary" href="#">


                        {{listing.place_of_delivery.place_name}}
                    </a>
                </div>

                <div class="col-4" v-if="listing.distance>0">
                    <p class="ml-5 p-2">Distance <strong>{{listing.distance}}</strong> km</p>
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
                    {{property.title||"Empty"}}: {{listing.articles[0].properties[property.slug].value}}
                </a>

                <div class="row w-100 mx-auto my-2">
                    <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);">
                        {{listing.category.title||"Empty"}}
                    </div>
                    <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                         v-if="listing.category.mode ==='calculator'"
                    >
                        {{listing.summary_volume}} <em class="volume-unit text-bold">m<sup>3</sup></em>
                    </div>

                    <strong class="w-100 mt-2 p-2"
                            v-if="listing.category.mode ==='article' && listing.articles.length>1">{{listing.articles.length}}
                        articles:</strong>


                    <div class="row mt-2 w-100" v-if="listing.category.mode ==='article' && listing.articles.length>=1">

                        <div class="col-3"
                             v-for="property in listing.category.properties"
                        >
                            <a href="" class="badge badge-warning" v-for="item in listing.articles"> {{item.title||"Empty"}}:
                                <strong>{{item.properties[property.slug].value}}</strong>
                                <small>
                                    {{property.title||"Empty"}}
                                </small>
                            </a>
                        </div>
                    </div>

                    <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                         v-if="listing.category.mode ==='grid'"
                    >
                        {{listing.subcategory.title||"Empty"}}
                    </div>
                    <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                         v-if="listing.category.mode ==='grid'&&listing.thing"
                    >
                       {{listing.thing.title||"Empty"}}
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>
<script>
    export default {
        props: ["listing"],
        computed:{
            user:function () {
                return window.user
            }
        },
        mounted() {
            console.log("listing=>",this.listing)
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
