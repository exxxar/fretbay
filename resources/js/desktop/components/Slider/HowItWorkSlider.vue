<template>

    <div class="container" style="padding:130px;">
        <h1 class="text-center mb-2">Movers evaluated by our customers</h1>

        <VueSlickCarousel v-bind="slickOptions">

            <div v-for="tab in tabs">
                <div class="row">
                    <div class="col-sm-4"><img class="card-img-top w-100 custom-slick-slide-img" :src="tab.image"
                                               alt="Card image cap"></div>
                    <div class="col-sm-8"><h5 class="card-title">{{tab.title}}</h5>
                        <p class="card-text">{{tab.text}}}</p>
                        <a :href="tab.href" class="btn-theme">{{tab.anchor}}</a></div>
                </div>

            </div>

        </VueSlickCarousel>

    </div>

</template>

<script>
    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    export default {
        components: {
            VueSlickCarousel
        },
        name: "HowItWorkSlider",
        methods: {
            tick: function () {
                if (this.selected > this.items.length - 1) {
                    this.selected = 0;
                }
                this.selected += 1;
                this.timer = setTimeout(this.tick, this.changeSlideTimeout);
            },
            clearTickInterval: function () {
                clearTimeout(this.timer);
                this.timer = setTimeout(this.tick, this.changeSlideTimeout);
            }
        },

        data() {
            return {
                changeSlideTimeout: 5000,
                slickOptions: {
                    //options can be used from the plugin documentation
                    slidesToShow: 1,
                    infinite: true,
                    accessibility: true,
                    adaptiveHeight: true,
                    arrows: true,
                    dots: true,
                    draggable: true,
                    edgeFriction: 0.30,
                    swipe: true,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 1008,
                            settings: {
                                slidesToShow: 1,
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
                tabs: [
                    {
                        id: 1,
                        image: "/images/commentcamarche-img1.png",
                        title: "Publish a listing",
                        text: "Post your listing for free. It is only a few clicks away from being published and visible by all our professional carriers.",
                        anchor: "REQUEST FOR QUOTATION",
                        href: "#",
                    },
                    {
                        id: 2,
                        image: "/images/commentcamarche-img2.png",
                        title: "Receive quotes",
                        text: "Once your listing is posted, our professional carriers will have access to your request\n" +
                            "                                and will offer you their quote. You will have the opportunity to choose the quote that\n" +
                            "                                suits you best and cheapest thanks to our reverse auction system.",
                        anchor: "REQUEST FOR QUOTATION",
                        href: "#",
                    },
                    {
                        id: 3,
                        image: "/images/commentcamarche-img3.png",
                        title: "Get delivered",
                        text: "Once your quotation has been selected, the carrier will take care of your furniture and\n" +
                            "                                belongings at the address and on the date you have chosen until the destination of your\n" +
                            "                                choice. Your belongings are handled safely by professionals equipped with equipment\n" +
                            "                                adapted to your needs in order to avoid any damage.",
                        anchor: "REQUEST FOR QUOTATION",
                        href: "#",
                    },
                    {
                        id: 4,
                        image: "/images/commentcamarche-img4.png",
                        title: "Evaluate the service",
                        text: "When your move is completed, you have the opportunity to evaluate your carrier on our\n" +
                            "                                site. All our carriers are evaluated in order to allow you to choose your service as\n" +
                            "                                well as possible. So, thanks to the contribution of our customers, you are guaranteed to\n" +
                            "                                find the carrier that suits you.",
                        anchor: "REQUEST FOR QUOTATION",
                        href: "#",
                    },
                ],
                items: [
                    {number: 1, message: "Publish a listing"},
                    {number: 2, message: "Receive quotes"},
                    {number: 3, message: "Get delivered"},
                    {number: 4, message: "Evaluate the service1"},
                ],
                selected: 0,
                timer: Number,
            }
        },
        mounted() {
            this.tick();
        },
    }
</script>

<style scoped>
    .custom-slick-slide-img {
        object-fit: contain;
        height: 147px;
    }
</style>
