<template>
    <main id="content">
        <!-- Description Section -->
        <div class="container space-1 pt-5 pb-2">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary w-100"
                                v-if="user.is_transporter||user.id===listing.user_id"
                                data-toggle="modal" data-target="#quoteModal">
                            <i class="fas fa-gavel"></i>
                        </button>


                        <button type="button" class="btn btn-outline-primary w-100"
                                v-if="user.is_transporter||user.id===listing.user_id"
                                data-toggle="modal" data-target="#chatModal">
                            <i class="far fa-comments"></i>
                        </button>

                         <button type="button" class="btn btn-outline-primary w-100"
                             v-if="user.is_transporter||user.id===listing.user_id"
                                 @click="initMap"
                             data-toggle="modal" data-target="#mapModal">
                         <i class="fas fa-route"></i>
                     </button>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12">


                    <listing-item-component :listing="listing" :details="false" v-if="listing"/>




                </div>
            </div>
        </div>
        <!-- End Description Section -->

        <!-- Pagination -->
        <div class="container mb-2">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-between">
                    <li class="page-item col">
                        <a class="page-link" :href="'/listing/direction/'+listing_id+'/0'" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item col">
                        <a class="page-link" href="/find-loads">
                            <i class="fa fa-th"></i>
                        </a>
                    </li>
                    <li class="page-item col">
                        <a class="page-link" :href="'/listing/direction/'+listing_id+'/1'">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- End Pagination -->

        <!-- Modal -->
        <div class="modal modal-fullscreen fade" id="quoteModal" data-backdrop="static" data-keyboard="false"
             tabindex="-1" aria-labelledby="quoteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="quoteModalHeader">Quotes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <quotes-component :listing="listing" v-if="listing"/>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal modal-fullscreen fade" id="mapModal" data-backdrop="static" data-keyboard="false"
             tabindex="-1" aria-labelledby="mapModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mapModalHeader">Map</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div id="map" v-if="showMap" style="width:100%; height:100vh;"></div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal modal-fullscreen fade" id="chatModal" data-backdrop="static" data-keyboard="false"
             tabindex="-1" aria-labelledby="chatModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chatModalHeader">Messenger</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <chat-component :listing="listing" v-if="listing"/>
                    </div>
                </div>
            </div>
        </div>

    </main>
</template>
<script>


    import vueCustomScrollbar from 'vue-custom-scrollbar'
    import "vue-custom-scrollbar/dist/vueScrollbar.css"

    import Mapbox from "mapbox-gl";
    import mapboxgl from "mapbox-gl";
    import {MglMap, MglMarker} from "vue-mapbox";

    export default {
        name: "MapboxMap",
        props: {

            listing_id: String

        },
        components: {
            vueCustomScrollbar, MglMap, MglMarker
        },
        data() {

            return {
                activePart: 0,
                showMap: true,
                accessToken: "pk.eyJ1IjoiaW5maW5pdHlzb3VsMTMiLCJhIjoiY2twZnYxNDFrMjl4czJ5b2dlOWphajVvMSJ9.bCoFds-RVlD1TYOwilGfAg", // your access token. Needed if you using Mapbox maps
                mapStyle: 'mapbox://styles/mapbox/outdoors-v11', // your map style
                listing: null,
                center: [-93.1247, 44.9323], // St. Paul
                map: null,
                settingsScroll: {
                    suppressScrollY: false,
                    suppressScrollX: false,
                    wheelPropagation: false
                },
            };
        },
        computed: {
            messages: function () {
                return this.listing ? this.listing.messages : []
            },
            user: function () {
                return window.user
            },
        },
        created() {
            // We need to set mapbox-gl library here in order to use it in template
            this.mapbox = null;
        },
        mounted() {

            this.loadListing();

            eventBus.$on("updateListing", () => {
                this.loadListing().then(() => {
                    /*this.$nextTick(() => {
                        document.querySelector('.msg_history').scrollTo(0, document.querySelector('.msg_history').scrollHeight);
                    })*/
                })


            })

            this.mapbox = Mapbox;

            $(document).on("click", ".nav-item", () => {
                window.scroll(0, 0)

                window.resizeTo(100, 100)
            })
        },
        methods: {

            initMap() {
                this.showMap = false;

                this.$nextTick(() => {
                    this.showMap = true
                })

                setTimeout(() => {
                    this.createMap();
                }, 1000)
            },

            loadListing() {
                return axios.get(`/api/listing/${this.listing_id}`).then(resp => {
                    this.listing = resp.data

                    this.initMap();


                })
            },
            createMap() {
                mapboxgl.accessToken = 'pk.eyJ1IjoiaW5maW5pdHlzb3VsMTMiLCJhIjoiY2twZnYxNDFrMjl4czJ5b2dlOWphajVvMSJ9.bCoFds-RVlD1TYOwilGfAg';
                var geojson = {
                    'type': 'FeatureCollection',
                    'features': [
                        this.listing.place_of_loading,
                        this.listing.place_of_delivery
                    ]
                };

                let dynamicCenter = [
                    (this.listing.place_of_loading.center[0] + this.listing.place_of_delivery.center[0]) / 2,
                    (this.listing.place_of_loading.center[1] + this.listing.place_of_delivery.center[1]) / 2
                ]


                let dynamicZoom = 3
                let dist = this.listing.distance


                if (dist > 0 && dist <= 200)
                    dynamicZoom = 7

                if (dist > 200 && dist <= 700)
                    dynamicZoom = 5

                if (dist > 700 && dist <= 900)
                    dynamicZoom = 2

                if (dist > 900)
                    dynamicZoom = 1


                this.map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/outdoors-v11',
                    center: dynamicCenter,
                    zoom: dynamicZoom
                });

                geojson.features.forEach((marker, index) => {

                    var el = document.createElement('div');
                    el.className = 'marker ' + (index === 0 ? "marker_a" : "marker_b");
                    el.innerHTML = index === 0 ? "<img src='/images/point_a.png'>" : "<img src='/images/point_b.png'>";

                    new mapboxgl.Marker(el)
                        .setLngLat(marker.geometry.coordinates)
                        .setPopup(
                            new mapboxgl.Popup({offset: 25}) // add popups
                                .setHTML(
                                    '<h3>' +
                                    marker.properties.title +
                                    '</h3><p>' +
                                    marker.properties.description +
                                    '</p>'
                                )
                        )
                        .addTo(this.map);

                    this.map.resize();
                });


            }
        }
    };
</script>
<style lang="scss">
    .sticky-block {
        position: -webkit-sticky;
        position: sticky;
        // top: 100px;
    }

    .listing-nav-item {
        min-width: 159px;
        text-align: center;
        /* width: auto; */
        margin-bottom: 0;
        padding: 3px;

        a {
            font-size: 12px;
        }
    }

    .listing-menu {
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

    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%;
        border-right: 1px solid #c4c4c4;
    }

    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }

    .top_spac {
        margin: 20px 0 0;
    }


    .recent_heading {
        float: left;
        width: 40%;
    }

    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%;
    }

    .headind_srch {
        padding: 10px 29px 10px 20px;
        overflow: hidden;
        border-bottom: 1px solid #c4c4c4;
    }

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }

    .srch_bar input {
        border: 1px solid #cdcdcd;
        border-width: 0 0 1px 0;
        width: 80%;
        padding: 2px 0 4px 6px;
        background: none;
    }

    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }

    .srch_bar .input-group-addon {
        margin: 0 0 0 -27px;
    }

    .chat_ib h5 {
        font-size: 15px;
        color: #464646;
        margin: 0 0 8px 0;
    }

    .chat_ib h5 span {
        font-size: 13px;
        float: right;
    }

    .chat_ib p {
        font-size: 14px;
        color: #989898;
        margin: auto
    }

    .chat_img {
        float: left;
        width: 11%;
    }

    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people {
        overflow: hidden;
        clear: both;
    }

    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }

    .inbox_chat {
        height: 550px;
        overflow-y: scroll;
    }

    .active_chat {
        background: #ebebeb;
    }

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }

    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }

    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }

    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }

    .received_withd_msg {
        width: 57%;
    }

    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0;
        color: #fff;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }

    .outgoing_msg {
        overflow: hidden;
        margin: 26px 0 26px;
    }

    .sent_msg {
        float: right;
        width: 46%;
    }

    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {
        border-top: 1px solid #c4c4c4;
        position: relative;
    }

    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }

    .listing-map {
        padding: 12px;
        border: 1px #e6e4e4 solid;
        border-radius: 0px 0px 5px 5px;
        border-top: none;
    }

    .messaging {
        padding: 12px;
        border: 1px #e6e4e4 solid;
        border-radius: 0px 0px 5px 5px;
        border-top: none;

        img {
            max-width: 100%;
        }
    }

    .msg_history {
        height: 516px;
        overflow-y: auto;
    }


    #map {
        height: 250px;
        width: 100%;
        margin: 0 auto;
        border: none;
    }

    .text-container {
        max-width: 500px;
        display: flex;
        flex-direction: column;
        text-align: left;
        align-items: flex-start;
        margin: 0 auto; /* center text container */
    }

    .marker {
        width: 50px;
        height: 50px;
        cursor: pointer;


        // box-shadow: 2px 2px 2px 0px solid;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        font-weight: bold;

        &.marker_a {

            img {
                position: relative;
                margin-top: -45px;
                margin-right: -35px;
            }
        }

        &.marker_b {

            img {
                position: relative;
                margin-top: -45px;
                margin-right: -35px;
            }
        }
    }

    .mapboxgl-popup {
        max-width: 200px;
    }

    .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }


    .mapboxgl-canvas-container {

        height: 100vh;

    }

    .mapboxgl-canvas {
        width: 100% !important;
        height: 100vh !important;
    }

    #chatModal {
        z-index: 10000000000;

    }

</style>
