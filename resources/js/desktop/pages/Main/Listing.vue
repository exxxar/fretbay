<template>
    <main id="content">
        <!-- Description Section -->
        <div class="container space-1 space-3--md">
            <div class="row">
                <div class="col-12">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">Quotes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">Messages</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="text-container">
                                <p>Center: {{ center }}</p>
                                <p>Zoom: {{ zoom }}</p>
                            </div>

                            <div id="map"></div>

                            <listing-item-component :listing="listing"/>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="messaging">
                                <div class="inbox_msg">
                                    <div class="inbox_people">
                                        <div class="headind_srch">
                                            <div class="recent_heading">
                                                <h4>Recent</h4>
                                            </div>
                                            <div class="srch_bar">
                                                <div class="stylish-input-group">
                                                    <input type="text" class="search-bar" placeholder="Search">
                                                    <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span></div>
                                            </div>
                                        </div>
                                        <div class="inbox_chat">
                                            <div class="chat_list active_chat">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil">
                                                    </div>
                                                    <div class="chat_ib">
                                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil">
                                                    </div>
                                                    <div class="chat_ib">
                                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil">
                                                    </div>
                                                    <div class="chat_ib">
                                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil">
                                                    </div>
                                                    <div class="chat_ib">
                                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil">
                                                    </div>
                                                    <div class="chat_ib">
                                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil">
                                                    </div>
                                                    <div class="chat_ib">
                                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil">
                                                    </div>
                                                    <div class="chat_ib">
                                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mesgs">
                                        <div class="msg_history">
                                            <div class="incoming_msg">
                                                <div class="incoming_msg_img"><img
                                                    src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                </div>
                                                <div class="received_msg">
                                                    <div class="received_withd_msg">
                                                        <p>Test which is a new approach to have all
                                                            solutions</p>
                                                        <span class="time_date"> 11:01 AM    |    June 9</span></div>
                                                </div>
                                            </div>
                                            <div class="outgoing_msg">
                                                <div class="sent_msg">
                                                    <p>Test which is a new approach to have all
                                                        solutions</p>
                                                    <span class="time_date"> 11:01 AM    |    June 9</span></div>
                                            </div>
                                            <div class="incoming_msg">
                                                <div class="incoming_msg_img"><img
                                                    src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                </div>
                                                <div class="received_msg">
                                                    <div class="received_withd_msg">
                                                        <p>Test, which is a new approach to have</p>
                                                        <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                                                </div>
                                            </div>
                                            <div class="outgoing_msg">
                                                <div class="sent_msg">
                                                    <p>Apollo University, Delhi, India Test</p>
                                                    <span class="time_date"> 11:01 AM    |    Today</span></div>
                                            </div>
                                            <div class="incoming_msg">
                                                <div class="incoming_msg_img"><img
                                                    src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                </div>
                                                <div class="received_msg">
                                                    <div class="received_withd_msg">
                                                        <p>We work directly with our designers and suppliers,
                                                            and sell direct to you, which means quality, exclusive
                                                            products, at a price anyone can afford.</p>
                                                        <span class="time_date"> 11:01 AM    |    Today</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="type_msg">
                                            <div class="input_msg_write">
                                                <input type="text" class="write_msg" placeholder="Type a message"/>
                                                <button class="msg_send_btn" type="button"><i
                                                    class="fa fa-paper-plane-o"
                                                    aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Description Section -->

        <!-- Sticky Block End Point -->
        <div id="stickyBlockEndPoint"></div>

        <!-- Pagination -->
        <div class="container space-2-bottom">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-between">
                    <li class="page-item col">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item col">
                        <a class="page-link" href="#">
                            <i class="fa fa-th"></i>
                        </a>
                    </li>
                    <li class="page-item col">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- End Pagination -->
    </main>
</template>
<script>
    import mapboxgl from "mapbox-gl";
    export default {
        name: "MapboxMap",
        props:["listing_id"],
        data() {
            // Set initial data, this.createMap() configures event listeners that update data based on user interaction
            return {
                listing: null,
                center: [-93.1247, 44.9323], // St. Paul
                zoom: 10.5
            };
        },
        mounted() {
            // create the map after the component is mounted
            this.createMap();

            console.log("listing_id=>",this.listing_id)
            this.loadListing();


        },
        methods: {
            loadListing(){
                axios.get(`/api/listing/${this.listing_id}`).then(resp=>{
                    this.listing = resp.data

                    console.log(this.listing)
                })
            },
            createMap() {

                mapboxgl.accessToken = 'pk.eyJ1IjoiaW5maW5pdHlzb3VsMTMiLCJhIjoiY2twZnYxNDFrMjl4czJ5b2dlOWphajVvMSJ9.bCoFds-RVlD1TYOwilGfAg';

                var geojson = {
                    'type': 'FeatureCollection',
                    'features': [
                        {
                            'type': 'Feature',
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.032, 38.913]
                            },
                            'properties': {
                                'title': 'Mapbox',
                                'description': 'Washington, D.C.'
                            }
                        },
                        {
                            'type': 'Feature',
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-122.414, 37.776]
                            },
                            'properties': {
                                'title': 'Mapbox',
                                'description': 'San Francisco, California'
                            }
                        }
                    ]
                };

                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/outdoors-v11',
                    center: [-96, 37.8],
                    zoom: 3
                });

// add markers to map
                geojson.features.forEach(function (marker) {
// create a HTML element for each feature
                    var el = document.createElement('div');
                    el.className = 'marker';

// make a marker for each feature and add it to the map
                    new mapboxgl.Marker(el)
                        .setLngLat(marker.geometry.coordinates)
                        .setPopup(
                            new mapboxgl.Popup({ offset: 25 }) // add popups
                                .setHTML(
                                    '<h3>' +
                                    marker.properties.title +
                                    '</h3><p>' +
                                    marker.properties.description +
                                    '</p>'
                                )
                        )
                        .addTo(map);
                });
            }
        }
    };
</script>
<style lang="scss">
    .sticky-block {
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
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
        height: 400px;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        border: 1px solid darkgrey;
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
        background-color: red;
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
    }
    .mapboxgl-popup {
        max-width: 200px;
    }
    .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }
</style>
