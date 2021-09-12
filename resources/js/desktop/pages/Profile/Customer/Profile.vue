<template>
    <div class="container" style="padding-top: 20px;min-height:100vh;">
        <div class="main-body">

            <ul class="nav nav-tabs mb-2 w-100 d-flex flex-nowrap customer-menu" id="myTab"  role="tablist">
                <li class="nav-item profile-nav-item" @click="loadActiveListing">
                    <a class="btn btn-outline-primary d-block active" id="listings-active-tab" data-toggle="tab" href="#listings-active" role="tab"
                       aria-controls="listings-active" aria-selected="true"><i class="fas fa-boxes"></i> Active listings</a>
                </li>

                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary  d-block" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="true"><i class="fas fa-user"></i> Profile</a>
                </li>


                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                       aria-controls="reviews" aria-selected="true"><i class="far fa-comment-dots"></i> Reviews</a>
                </li>



                <li class="nav-item profile-nav-item" @click="loadArchiveListing">
                    <a class="btn btn-outline-primary d-block" id="listings-archive-tab" data-toggle="tab" href="#listings-archive" role="tab"
                       aria-controls="listings-archive" aria-selected="true"><i class="fas fa-archive"></i> Archive listings</a>
                </li>

                <li class="nav-item profile-nav-item" @click="loadOrders">
                    <a class="btn btn-outline-primary d-block" id="orders-tab" data-toggle="tab" href="#orders" role="tab"
                       aria-controls="orders" aria-selected="true"><i class="far fa-handshake"></i> Orders</a>
                </li>

                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab"
                       aria-controls="notifications" aria-selected="true"><i class="far fa-flag"></i> Notifications</a>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">


                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img v-lazy="user.avatar" alt="Admin" class="rounded-circle avatar-img"
                                             width="150">
                                        <div class="mt-3">
                                            <h4>{{user.name}}</h4>
                                            <p class="text-secondary mb-1">{{user.created_at}}</p>
                                            <p class="text-muted font-size-sm">{{fullAddress}}</p>
                                            <p class="text-muted font-size-sm" v-if="profile.company_name.length>0">
                                                {{profile.company_name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-md-8">
                            <slot name="any-error"></slot>

                            <div class="card mb-3" v-if="!editMode">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{fullName}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{user.email}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone number 1</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{profile.telephone_number_1}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone number 2</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{profile.telephone_number_2}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{fullAddress}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn btn-info " v-if="!editMode" @click="editMode=true" href="#">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form class="card  mb-3" v-if="editMode" action="/customer/profile/update" method="post"
                                  enctype="multipart/form-data">

                                <input name="_method" type="hidden" value="PUT">


                                <slot name="csrf"></slot>

                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Avatar</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="avatar" class="form-control">
                                            <p class="small"><strong>Old:</strong> {{user.avatar}}</p>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">First Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="first_name" class="form-control"
                                                   :value="profile.first_name" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Second name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="second_name" class="form-control"
                                                   :value="profile.second_name" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" name="email" class="form-control" :value="user.email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone number 1</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="tel" name="telephone_number_1" class="form-control"
                                                   :value="profile.telephone_number_1">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone number 2</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="tel" name="telephone_number_2" class="form-control"
                                                   :value="profile.telephone_number_2">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="address" class="form-control"
                                                   :value="profile.address">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Region</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="region" class="form-control"
                                                   :value="profile.region">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">City</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="city" class="form-control" :value="profile.city">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Postal</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="postal" class="form-control"
                                                   :value="profile.postal">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                            <button class="btn btn-outline-blue" @click="editMode=false">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <customer-reviews-component/>
                </div>

                <div class="tab-pane fade  show active" id="listings-active" role="tabpanel" aria-labelledby="listings-active-tab">
                    <div class="row d-flex">
                        <div class="col-md-4">
                            <a class="btn btn-link p-0" href="/find-transporter"><i class="fas fa-dolly"></i> Try to <strong>find a transporter!</strong></a>
                        </div>
                    </div>
                    <p v-if="listings.length>0">Count results: {{listings.length}} <i class="fas fa-boxes"></i></p>
                    <hr>
                    <listing-item-component :key="index" v-for="(listing,index) in listings" :listing="listing"/>
                    <div class="d-flex p-5 justify-content-center"  v-if="listings.length===0">
                        <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="filter: drop-shadow(8px 4px 0px #21c87a);">
                    </div>
                    <h4 class="text-center" v-if="listings.length===0">No listing yet!</h4>

                    <div class="mb-9"></div>

                    <listing-paginate-component/>
                </div>

                <div class="tab-pane fade" id="listings-archive" role="tabpanel" aria-labelledby="listings-archive-tab">

                    <div class="row d-flex">
                        <div class="col-md-4">
                            <a class="btn btn-link p-0" href="/find-transporter"><i class="fas fa-dolly"></i> Try to <strong>find a transporter!</strong></a>
                        </div>
                    </div>
                    <p v-if="listings.length>0">Count results: {{listings.length}} <i class="fas fa-boxes"></i></p>
                    <hr>
                    <listing-item-component :key="index" v-for="(listing,index) in listings" :listing="listing"/>
                    <div class="d-flex p-5 justify-content-center"  v-if="listings.length===0">
                        <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="filter: drop-shadow(8px 4px 0px #21c87a);">
                    </div>
                    <h4 class="text-center" v-if="listings.length===0">No listing yet!</h4>

                    <div class="mb-9"></div>

                    <listing-paginate-component/>
                </div>

                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">

                    <div class="row d-flex">
                        <div class="col-md-4">
                            <a class="btn btn-link p-0" href="/find-transporter"><i class="fas fa-dolly"></i> Try to <strong>find a transporter!</strong></a>
                        </div>
                    </div>
                    <p v-if="userOrders.length>0">Count results: {{userOrders.length}} <i class="fas fa-boxes"></i></p>
                    <hr>
                    <order-item-component  :key="index" v-for="(order,index) in userOrders" :order="order"/>

                    <div class="d-flex p-5 justify-content-center"  v-if="userOrders.length===0">
                        <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto" style="filter: drop-shadow(8px 4px 0px #21c87a);">
                    </div>
                    <h4 class="text-center" v-if="userOrders.length===0">No orders yet!</h4>

                    <order-paginate-component/>
                </div>

                <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                    <notifications-page/>
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
        data() {
            return {
                editMode: false,
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
            }
        },
        computed: {
                listings: function () {
                    return this.$store.getters.listings;
                },

            userOrders: function () {
                return this.$store.getters.userOrders;
            },

            fullAddress() {
                return this.profile.country + ","
                    + this.profile.region + ","
                    + this.profile.address;

            },

            fullName() {
                return this.profile.first_name + " "
                    + this.profile.second_name;

            },

            profile() {
                return this.user.profile
            },
            user() {
                return window.user
            }
        },
        mounted(){
          this.loadActiveListing()
        },
        methods:{
            loadOrders(){
                this.$store.dispatch('getOrders');
            },
            loadActiveListing(){
                this.$store.dispatch('getActiveListings');
            },
            loadArchiveListing(){
                this.$store.dispatch('getArchiveListings');
            }
        },
        components:{
            VueSlickCarousel
        }
    }
</script>

<style lang="scss" scoped>
    .avatar-img {
        min-height: 200px;
        object-fit: contain;
    }

    .profile-nav-item {
        min-width: 159px;
        text-align: center;
        /* width: auto; */
        margin-bottom: 0;
        padding: 3px;
        a {
            font-size: 12px;
        }
    }

    .customer-menu {
        overflow-x: auto;
        position: sticky;
        top: 65px;
        background: white;
        z-index: 100;
        padding: 8px 0px;
    }

    .nav-link.active {
        color: #21c87a !important;
    }
</style>
