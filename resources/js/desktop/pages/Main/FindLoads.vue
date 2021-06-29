<template>

    <main id="content">
        <!-- Hero Section -->
        <div class="container space-2 space-3-top--lg">
            <h1>Blog - Classic left sidebar</h1>
            <p class="lead">Our duty towards you is to share our experience we're reaching in our work path with you.</p>
        </div>
        <!-- End Hero Section -->

        <!-- News Blog Content -->
        <div class="container space-3-bottom--lg">
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-9 mb-lg-0">

                    <div class="card shadow-sm border-0 mb-4 px-4" v-for="(n, i) in 10">
                        <div class="card-body d-md-flex justify-content-between align-items-center py-4 px-0">
                            <div class="media align-items-center mb-5 mb-md-0">
                                <a class="u-md-avatar mr-3" href="#">
                                    <img class="img-fluid rounded-circle" v-lazy="'/assets/img/160x160/img4.jpg'" alt="Image Description">
                                </a>
                                <div class="media-body text-nowrap">
                                    <a class="small text-uppercase text-secondary letter-spacing-0_06 mb-1" href="#">Mapbox</a>
                                    <h3 class="h5 mb-0"><a href="#">UI/UX Designer</a></h3>
                                </div>
                            </div>

                            <div class="text-md-right text-secondary">
                                <small class="d-block mb-2 mb-md-1">June 23, 2019</small>
                                <a class="d-flex align-items-center text-secondary" href="#">
                                    <i class="svg-icon svg-icon-xs text-secondary mt-n1 mr-2">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                    </i>
                                    <span>Cleveland, Ohio</span>
                                </a>
                            </div>
                        </div>

                        <div class="card-footer d-md-flex justify-content-between align-items-center px-0">
                            <div class="mb-4 mb-md-0">
                                <a class="u-label u-label--xs u-label--primary text-uppercase letter-spacing-0_06 mr-2 mb-2" href="#">Part-time</a>
                                <a class="u-label u-label--xs u-label--primary text-uppercase letter-spacing-0_06 mr-2 mb-2" href="#">UI/UX designer</a>
                                <a class="u-label u-label--xs u-label--primary text-uppercase letter-spacing-0_06 mr-2 mb-2" href="#">$25k-$35k</a>
                            </div>

                            <a class="d-flex align-items-center font-weight-bold mb-2" href="#infoModal" data-toggle="modal">
                                <span>Details</span>
                                <i class="svg-icon svg-icon-xs text-primary mt-n1 ml-2">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                                        </g>
                                    </svg>
                                </i>
                            </a>
                        </div>
                    </div>




                    <div class="mb-9"></div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">12</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Pagination -->
                </div>

                <div class="col-lg-3 order-lg-1">
                    <!-- Search Input -->
                    <form class="js-focus-state input-group input-group-sm form form--sm mb-7">
                        <input type="text" class="form-control form__input" name="search" placeholder="Search Space" aria-label="Search Space">
                        <span class="input-group-append form__append">
              <button type="submit" class="btn btn-primary">Go</button>
            </span>
                    </form>
                    <!-- End Search Input -->

                    <!-- Instagram -->
                    <div class="mb-7">
                        <h3 class="h5 mb-3">Instagram</h3>

                        <div class="border rounded p-4">
                            <!-- Instafeed -->
                            <div id="instaFeed" class="js-instagram row mx-gutters-2"></div>
                            <!-- End Instafeed -->
                        </div>
                    </div>
                    <!-- End Instagram -->

                    <!-- Recent Posts -->
                    <div class="mb-7">
                        <h3 class="h5 mb-3">Recent posts</h3>

                        <div class="border rounded p-4">
                            <!-- Recent Posts List -->
                            <ul class="list-unstyled">
                                <li class="py-1"><a class="text-secondary" href="#">Remote workers, here's how to dodge distractions</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="py-1"><a class="text-secondary" href="#">Create your adventure</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="py-1"><a class="text-secondary" href="#">How to change careers or start a home-based business?</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="py-1"><a class="text-secondary" href="#">Classic design principles</a></li>
                            </ul>
                            <!-- End Recent Posts List -->
                        </div>
                    </div>
                    <!-- End Recent Posts -->

                    <!-- Categories -->
                    <div class="mb-7">
                        <h3 class="h5 mb-3">Categories</h3>

                        <div class="border rounded p-4">
                            <!-- Categories List -->
                            <ul class="list-unstyled">
                                <li class="py-1"><a class="text-secondary" href="#">Design</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="py-1"><a class="text-secondary" href="#">Art</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="py-1"><a class="text-secondary" href="#">Graphic</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="py-1"><a class="text-secondary" href="#">WordPress</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="py-1"><a class="text-secondary" href="#">HTML/CSS</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="py-1"><a class="text-secondary" href="#">SASS</a></li>
                            </ul>
                            <!-- End Categories List -->
                        </div>
                    </div>
                    <!-- End Categories -->
                </div>
            </div>
        </div>
        <!-- End News Blog Content -->
    </main>

</template>

<script>
    // import './resources/sass/desktop/find-loads.module.scss'
    export default {
        data() {
            return {}
        },

        computed: {
            categories() {
                return this.$store.getters.categories;
            },
            user() {
                return window.user
            },
            listings: function () {
                return this.$store.getters.listings;
            },
        },
        mounted() {
            this.$store.dispatch('getListings');
            this.$store.dispatch("getCategories");

        }

    }
</script>

<style lang="scss" scoped>
    .bg-info {
        width: 50px;
        height: 50px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .item {
        background: white;
        border: 1px lightgray solid;
        padding: 0px;
        border-radius: 5px;
        margin-bottom: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
