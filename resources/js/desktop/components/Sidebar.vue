<template>
    <!-- Panel Sidebar Navigation -->
    <aside id="sidebar" class="u-sidebar u-unfold--css-animation u-unfold--hidden" aria-labelledby="sidebarNavToggler">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="u-sidebar--panel__footer-offset">
                    <!-- Toggle Button -->
                    <div class="d-flex align-items-center border-bottom py-4 px-5">
                        <img v-lazy="user.avatar" class="mr-5"
                             style="width:50px;height:50px; border-radius: 50%; object-fit: cover;" alt="">

                        <h4 class="h5 mb-0">{{$trans('profile.sidebar.accounts')}}</h4>

                        <button type="button" class="close u-sidebar__close ml-auto" @click="close()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="border-bottom py-4 px-5">
                        <p><a v-if="user.is_transporter" :href="'/profile/'+user.id">{{user.name}} </a></p>

                        <em class="text-uppercase text-muted font-size-13 mb-0 mt-0" v-if="user.is_admin">{{$trans('profile.sidebar.em_3')}}</em>
                        <em class="text-uppercase text-muted font-size-13 mb-0 mt-0" v-if="user.is_customer">{{$trans('profile.sidebar.em_1')}}</em>
                        <em class="text-uppercase text-muted font-size-13 mb-0 mt-0" v-if="user.is_transporter">
                            {{$trans('profile.sidebar.em_2')}}</em>
                    </div>

                    <div class="border-bottom p-2">

                        <div class="alert alert-primary" role="alert"
                             v-if="user.profile.is_documents_approved&&user.is_transporter">
                            You are approval to show Messages and do Qoutes
                        </div>

                        <div class="alert alert-warning w-100" role="alert" v-else-if="user.is_transporter">
                            You are not approved to view Messages and make Quotes. Please add <a target="_blank" href="/transporter/profile/transporter-wizard/start">Documents</a> in profile
                        </div>


                    </div>

                    <!-- End Toggle Button -->

                    <!-- Content -->
                    <div class="js-scrollbar u-sidebar__body">
                        <div class="u-sidebar__content py-2">


                            <ul class="list-unstyled font-size-14 mb-5" v-if="user.is_admin">
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       href="/v-admin/users">
                                        <img class="max-width-4 mr-3" src="/assets/svg/components/finance-dark-icon.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>Users</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       href="/v-admin/roles">
                                        <img class="max-width-4 mr-3" src="/assets/svg/components/finance-dark-icon.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>Roles</span>
                                        </div>
                                    </a>
                                </li>

                            </ul>

                            <ul class="list-unstyled font-size-14 mb-5" v-if="user.is_transporter">
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       href="/find-loads">
                                        <img class="max-width-3 mr-3" src="/assets/svg/components/id-card-regular.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>{{$trans('profile.sidebar.find_loads')}}</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>


                            <ul class="list-unstyled font-size-14 mb-5" v-if="user.is_customer">
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       href="/find-transporter">
                                        <img class="max-width-3 mr-3" src="/assets/svg/components/id-card-regular.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>{{$trans('profile.sidebar.find_a_transporter')}}</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <!-- List -->
                            <ul class="list-unstyled font-size-14 mb-5" v-if="!user.is_admin">
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       :href="profileLink">
                                        <img class="max-width-3 mr-3" src="/assets/svg/components/id-card-regular.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>{{$trans('profile.sidebar.profile')}}</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       :href="user.is_transporter?'/transporter/profile/notifications':'/customer/profile/notifications'">
                                        <img class="max-width-3 mr-3" src="/assets/svg/components/bell-regular.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>{{$trans('profile.sidebar.notifications')}}</span>
                                        </div>
                                    </a>
                                </li>

                                <li v-if="user.is_transporter">
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       href="/transporter/profile/favorites">
                                        <img class="max-width-3 mr-3" src="/assets/svg/components/thumbs-up-solid.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>{{$trans('profile.sidebar.favorites')}}</span>
                                        </div>
                                    </a>
                                </li>


                            </ul>

                            <ul class="list-unstyled font-size-14 mb-5">
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="/logout">
                                        <img class="max-width-4 mr-3"
                                             src="/assets/svg/components/sign-out-alt-solid.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>{{$trans('profile.sidebar.logout')}}</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <!-- End Content -->
                </div>

                <!-- Footer -->
                <footer class="u-sidebar__footer u-sidebar__footer--panel py-4 px-5">
                    <!-- List -->
                    <ul class="list-inline font-size-14 mb-0">
                        <li class="list-inline-item">
                            <a class="u-sidebar--panel__link pr-2"
                               href="/privacy">{{$trans('profile.sidebar.privacy')}}</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="u-sidebar--panel__link px-2" href="/terms">{{$trans('profile.sidebar.terms')}}</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="u-sidebar--panel__link pl-2" href="/fequently-asked-questions">
                                <i class="fa fa-info-circle"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- End List -->
                </footer>
                <!-- End Footer -->
            </div>
        </div>
    </aside>
    <!-- End Panel Sidebar Navigation -->
</template>
<script>
    export default {
        computed: {
            user() {
                return window.user
            },
            profileLink() {
                return window.user.is_transporter ? "/transporter/profile" : "/customer/profile"
            },
            notifications: function () {
                return this.$store.getters.notifications;
            },
        },
        mounted() {
            this.$store.dispatch('loadNotifications')
        },
        methods: {
            close() {
                $("#sidebar").toggleClass("u-unfold--hidden");
            }
        }
    }
</script>

<style lang="scss">
.u-sidebar__footer {
    position: sticky !important;
}

.u-sidebar {
    z-index: 9999 !important;
}
</style>
