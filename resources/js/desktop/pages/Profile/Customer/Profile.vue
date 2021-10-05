<template>
    <div class="container" style="padding-top: 20px;min-height:100vh;">
        <div class="main-body">

            <vue-custom-scrollbar class="w-100 customer-menu mt-2" :settings="settingsScroll">
                <ul class="nav nav-tabs mb-2 w-100 d-flex flex-nowrap ">
                    <li class="nav-item profile-nav-item" @click="loadActiveListing">
                        <a class="btn btn-outline-primary d-block active" id="listings-active-tab" data-toggle="tab"
                           href="#listings-active" role="tab"
                           aria-controls="listings-active" aria-selected="true"><i class="fas fa-boxes"></i> Active
                            listings</a>
                    </li>

                    <li class="nav-item profile-nav-item">
                        <a class="btn btn-outline-primary  d-block" id="profile-tab" data-toggle="tab" href="#profile"
                           role="tab"
                           aria-controls="profile" aria-selected="true"><i class="fas fa-user"></i> Profile</a>
                    </li>


                    <li class="nav-item profile-nav-item">
                        <a class="btn btn-outline-primary d-block" id="reviews-tab" data-toggle="tab"
                           @click="loadReviews"
                           href="#reviews"
                           role="tab"
                           aria-controls="reviews" aria-selected="true"><i class="far fa-comment-dots"></i> Reviews</a>
                    </li>


                    <li class="nav-item profile-nav-item" @click="loadArchiveListing">
                        <a class="btn btn-outline-primary d-block" id="listings-archive-tab" data-toggle="tab"
                           href="#listings-archive" role="tab"
                           aria-controls="listings-archive" aria-selected="true"><i class="fas fa-archive"></i> Archive
                            listings</a>
                    </li>

                    <li class="nav-item profile-nav-item" @click="loadRemovedListing">
                        <a class="btn btn-outline-primary d-block" id="listings-removed-tab" data-toggle="tab"
                           href="#listings-removed" role="tab"
                           aria-controls="listings-active" aria-selected="true"><i class="fas fa-trash-alt"></i> Removed
                            listings</a>
                    </li>

                    <li class="nav-item profile-nav-item" @click="loadActiveOrders">
                        <a class="btn btn-outline-primary d-block" id="orders-active-tab" data-toggle="tab"
                           href="#orders-active"
                           role="tab"
                           aria-controls="orders-active" aria-selected="true"><i class="far fa-handshake"></i>Active
                            Orders</a>
                    </li>

                    <li class="nav-item profile-nav-item" @click="loadArchiveOrders">
                        <a class="btn btn-outline-primary d-block" id="orders-archive-tab" data-toggle="tab"
                           href="#orders-archive"
                           role="tab"
                           aria-controls="orders-archive" aria-selected="true"><i class="fas fa-archive"></i>Archive
                            Orders</a>
                    </li>

                    <li class="nav-item profile-nav-item"
                        @click="loadNotifications">
                        <a class="btn btn-outline-primary d-block" id="notifications-tab" data-toggle="tab"
                           href="#notifications" role="tab"
                           aria-controls="notifications" aria-selected="true"><i class="far fa-flag"></i> Notifications
                        </a>
                    </li>

                    <li class="nav-item profile-nav-item">
                        <a class="btn btn-outline-primary d-block" id="settings-tab" data-toggle="tab"
                           href="#settings" role="tab"
                           aria-controls="settings" aria-selected="true"><i class="fas fa-user-cog"></i> Settings
                        </a>
                    </li>
                </ul>
            </vue-custom-scrollbar>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img v-lazy="user.avatar" alt="Admin" class=" avatar-img"
                                             style="border-radius: 5px;"
                                             width="150">
                                        <div class="mt-3">
                                            <h4>{{user.name}}</h4>
                                            <p class="text-secondary mb-1">{{user.created_at}}</p>
                                            <p class="text-muted font-size-sm" v-if="fullAddress">{{fullAddress}}</p>
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

                <div class="tab-pane fade  show active" id="listings-active" role="tabpanel"
                     aria-labelledby="listings-active-tab">
                    <listing-component v-on:update="loadActiveListing"/>
                </div>

                <div class="tab-pane fade" id="listings-archive" role="tabpanel" aria-labelledby="listings-archive-tab">
                    <listing-component v-on:update="loadArchiveListing"/>
                </div>

                <div class="tab-pane fade" id="listings-removed" role="tabpanel" aria-labelledby="listings-removed-tab">
                    <listing-component v-on:update="loadRemovedListing"/>
                </div>

                <div class="tab-pane fade" id="orders-active" role="tabpanel" aria-labelledby="orders-active-tab">
                    <orders-component v-on:update="loadActiveOrders"/>
                </div>

                <div class="tab-pane fade" id="orders-archive" role="tabpanel" aria-labelledby="orders-archive-tab">
                    <orders-component v-on:update="loadArchiveOrders"/>
                </div>

                <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                    <notifications-page/>
                </div>

                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    <profile-customer-settings-page/>
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

    import vueCustomScrollbar from 'vue-custom-scrollbar'
    import "vue-custom-scrollbar/dist/vueScrollbar.css"

    export default {
        data() {
            return {
                editMode: false,
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
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                },
            }
        },
        computed: {


            fullAddress() {

                return this.profile.postal + "," +
                    +this.profile.country + "," +
                    +this.profile.city;

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
        mounted() {

            /*

                       setTimeout(()=>{
                           this.loadActiveListing()
                       }, 1500)
            */
            this.loadActiveListing()
            $(document).on("click", ".nav-item", () => {
                window.scroll(0, 0)
            })
        },
        methods: {

            loadNotifications() {
                this.$store.dispatch('loadNotifications')
            },
            loadActiveOrders() {
                this.$store.dispatch('getActiveOrders');
            },
            loadArchiveOrders() {
                this.$store.dispatch('getArchiveOrders');
            },
            loadReviews() {
                this.$store.dispatch('loadReviews');
            },
            loadRemovedListing() {
                this.$store.dispatch('clearListing')
                this.$store.dispatch('getRemovedListings');
            },
            loadActiveListing() {
                this.$store.dispatch('clearListing')
                this.$store.dispatch('getActiveListings');
            },
            loadArchiveListing() {
                this.$store.dispatch('clearListing')
                this.$store.dispatch('getArchiveListings');
            }
        },
        components: {
            VueSlickCarousel, vueCustomScrollbar
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
