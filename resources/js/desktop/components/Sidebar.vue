<template>
    <!-- Panel Sidebar Navigation -->
    <aside id="sidebar" class="u-sidebar u-unfold--css-animation u-unfold--hidden" aria-labelledby="sidebarNavToggler">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="u-sidebar--panel__footer-offset">
                    <!-- Toggle Button -->
                    <div class="d-flex align-items-center border-bottom py-4 px-5">
                        <h4 class="h5 mb-0">Account</h4>

                        <button type="button" class="close u-sidebar__close ml-auto" @click="close()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- End Toggle Button -->

                    <!-- Content -->
                    <div class="js-scrollbar u-sidebar__body" >
                        <div class="u-sidebar__content py-5">
                            <!-- Title -->
                            <div class="py-2 px-5">
                                <h4 class="text-uppercase text-muted font-size-13 mb-0" v-if="user.is_admin">Admin menu</h4>
                                <h4 class="text-uppercase text-muted font-size-13 mb-0" v-if="user.is_customer">Customer menu</h4>
                                <h4 class="text-uppercase text-muted font-size-13 mb-0" v-if="user.is_transporter">Transporter menu</h4>
                            </div>
                            <!-- End Title -->

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

                            <!-- List -->
                            <ul class="list-unstyled font-size-14 mb-5" v-if="!user.is_admin">
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       :href="profileLink">
                                        <img class="max-width-3 mr-3" src="/assets/svg/components/id-card-regular.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>Profile</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       :href="user.is_transporter?'/transporter/profile/notifications':'/customer/profile/notifications'">
                                        <img class="max-width-3 mr-3" src="/assets/svg/components/bell-regular.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>Notifications</span>
                                        </div>
                                    </a>
                                </li>

                                <li v-if="user.is_transporter">
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5"
                                       href="/transporter/profile/favorites">
                                        <img class="max-width-3 mr-3" src="/assets/svg/components/thumbs-up-solid.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>Favorites</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                                        <img class="max-width-4 mr-3" src="/assets/svg/components/touch-dark-icon.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>My company</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="/customer/profile/listings">
                                        <img class="max-width-4 mr-3" src="/assets/svg/components/team-dark-icon.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>My quotes </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                                        <img class="max-width-4 mr-3" src="/assets/svg/components/email-dark-icon.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>My messages</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                                        <img class="max-width-4 mr-3"
                                             src="/assets/svg/components/projects-dark-icon.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>My loadings</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                                        <img class="max-width-4 mr-3"
                                             src="/assets/svg/components/projects-dark-icon.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>My evaluations</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- End List -->

                            <!-- Title -->
                            <div class="py-2 px-5">
                                <h4 class="text-uppercase text-muted font-size-13 mb-0">Other</h4>
                            </div>
                            <!-- End Title -->

                            <!-- List -->
                            <ul class="list-unstyled font-size-14 mb-0">
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                                        <img class="max-width-4 mr-3"
                                             src="/assets/svg/components/calendar-dark-icon.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>Settings</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="/logout">
                                        <img class="max-width-4 mr-3" src="/assets/svg/components/cog-dark-icon.svg"
                                             alt="Image Description">
                                        <div class="media-body">
                                            <span>Logout</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- End List -->
                        </div>
                    </div>
                    <!-- End Content -->
                </div>

                <!-- Footer -->
                <footer class="u-sidebar__footer u-sidebar__footer--panel py-4 px-5">
                    <!-- List -->
                    <ul class="list-inline font-size-14 mb-0">
                        <li class="list-inline-item">
                            <a class="u-sidebar--panel__link pr-2" href="../pages/privacy.html">Privacy</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="u-sidebar--panel__link px-2" href="../pages/terms.html">Terms</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="u-sidebar--panel__link pl-2" href="../pages/help.html">
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
            }
        },
        methods: {
            close() {
                $("#sidebar").toggleClass("u-unfold--hidden");
            }
        }
    }
</script>
