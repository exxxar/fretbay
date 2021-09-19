<template>
    <div class="container mt-2" style="min-height: 100vh;">

        <vue-custom-scrollbar class="w-100 mt-2 customer-menu" :settings="settingsScroll">

            <ul class="nav nav-tabs mb-2 w-100 d-flex flex-nowrap ">
                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block active " id="profile-tab" data-toggle="tab"
                       href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i
                        class="fas fa-user"></i> Profile</a>
                </li>
                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block" id="company-tab" data-toggle="tab" href="#company"
                       role="tab" aria-controls="company" aria-selected="false"><i class="far fa-building"></i> Company</a>
                </li>
                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block" id="documents-tab" data-toggle="tab" href="#documents"
                       role="tab" aria-controls="documents" aria-selected="false"><i class="far fa-file-word"></i>
                        Documents</a>
                </li>
                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block" id="vehicle-tab" data-toggle="tab" href="#vehicles"
                       role="tab" aria-controls="vehicles" aria-selected="false"><i class="fas fa-truck"></i>
                        Vehicles</a>
                </li>
                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block" id="favorites-tab" data-toggle="tab" href="#favorites"
                       role="tab" aria-controls="favorites" aria-selected="false"><i class="fas fa-thumbs-up"></i>
                        Favorites</a>
                </li>

                <li class="nav-item profile-nav-item" @click="loadOrders">
                    <a class="btn btn-outline-primary d-block" id="orders-tab" data-toggle="tab" href="#orders"
                       role="tab" aria-controls="orders" aria-selected="false"><i class="fas fa-truck"></i>
                        Orders</a>
                </li>
                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block" id="notifications-tab" data-toggle="tab"
                       href="#notifications" role="tab" aria-controls="notifications" aria-selected="false"><i
                        class="far fa-bell"></i> Notifications</a>
                </li>
                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block" id="settings-tab" data-toggle="tab" href="#settings"
                       role="tab" aria-controls="settings" aria-selected="false"><i class="fas fa-user-cog"></i>
                        Settings</a>
                </li>

                <li class="nav-item profile-nav-item">
                    <a class="btn btn-outline-primary d-block" id="reviews-tab" data-toggle="tab" href="#reviews"
                       role="tab" aria-controls="reviews" aria-selected="false"><i class="far fa-comment"></i>
                        Reviews</a>
                </li>
            </ul>
        </vue-custom-scrollbar>
        <div class="tab-content" id="myTabContent" v-if="user">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <profile-my-account-page/>
            </div>
            <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                <profile-my-company-page/>
            </div>
            <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                <profile-legal-documents-page/>
            </div>
            <div class="tab-pane fade" id="vehicles" role="tabpanel" aria-labelledby="vehicles-tab">
                <profile-my-vehicles-page/>
            </div>

            <div class="tab-pane fade" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
                <favorites-page/>
            </div>


            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">

                <div class="row d-flex">
                    <div class="col-md-4">
                        <a class="btn btn-link p-0" href="/find-loads"><i class="fas fa-dolly"></i> Try to
                            <strong>find loads!</strong></a>
                    </div>
                </div>
                <p v-if="userOrders.length>0">Count results: {{userOrders.length}} <i class="fas fa-boxes"></i></p>
                <hr>
                <order-item-component :key="index" v-for="(order,index) in userOrders" :order="order"/>

                <div class="d-flex p-5 justify-content-center" v-if="userOrders.length===0">
                    <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto"
                         style="filter: drop-shadow(8px 4px 0px #21c87a);">
                </div>
                <h4 class="text-center" v-if="userOrders.length===0">No orders yet!</h4>

                <order-paginate-component/>
            </div>

            <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                <notifications-page/>
            </div>

            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <profile-transporter-settings-page/>
            </div>

            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <transporter-reviews-component/>
            </div>


        </div>
        <div class="row w-100 mx-auto  gutters-sm" v-if="!user">
            <div class="col-12 col-md-4">
                <b-card>
                    <b-skeleton-img></b-skeleton-img>
                    <div class="mt-3">
                        <b-skeleton animation="wave" width="85%"></b-skeleton>
                        <b-skeleton animation="wave" width="55%"></b-skeleton>
                        <b-skeleton animation="wave" width="70%"></b-skeleton>
                    </div>
                </b-card>
            </div>
            <div class="col-12 col-md-8">
                <b-card>
                    <b-skeleton animation="wave" width="85%"></b-skeleton>
                    <b-skeleton animation="wave" width="55%"></b-skeleton>
                    <b-skeleton animation="wave" width="70%"></b-skeleton>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import vueCustomScrollbar from 'vue-custom-scrollbar'
    import "vue-custom-scrollbar/dist/vueScrollbar.css"
    import AddressInput from "../../../components/AddressInfoForm/AddressInput";
    import DatePicker from "vue2-datepicker";
    import VueSlider from "vue-slider-component";
    import VueSlickCarousel from "vue-slick-carousel";

    export default {
        components: {
            vueCustomScrollbar
        },
        data() {
            return {
                settingsScroll: {
                    suppressScrollY: false,
                    suppressScrollX: false,
                    wheelPropagation: false
                },
                editMode: false
            }
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            userOrders: function () {
                return this.$store.getters.userOrders;
            },

        },
        created() {
            this.$store.dispatch('getUser');
        },
        mounted() {

        },
        methods: {
            loadOrders()
            {
                this.$store.dispatch('getOrders');
            },
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


    .scroll-area {
        position: relative;
        margin: auto;
        width: 100%;
        height: 80vh;
    }

</style>
