<template>
    <div>
        <section id="commentcamarche-section-tabs">
            <div class="container">
                <div class="tabs">
                    <div class="tab-pane tabs__content" v-for="tab in tabs" :class="{active:tab.id == selected}" >
                        <div class="slide-thumb">
                            <img :src="tab.image" alt="">
                        </div>
                        <div class="slide-content">
                            <h2>{{tab.title}}</h2>
                            <p>{{tab.text}}}</p>
                            <a :href="tab.href" class="btn-theme">{{tab.anchor}}</a>
                        </div>
                    </div>
                    <!--<div class="tab-pane tabs__content active">
                        <div class="slide-thumb">
                            <img src="/images/commentcamarche-img1.png" alt="">
                        </div>
                        <div class="slide-content">
                            <h2>Publish a listing</h2>
                            <p>Post your listing for free. It is only a few clicks away from being published and visible
                                by all our professional carriers.</p>
                            <a href="#" class="btn-theme">REQUEST FOR QUOTATION</a>
                        </div>
                    </div>
                    <div class="tab-pane tabs__content">
                        <div class="slide-thumb">
                            <img src="/images/commentcamarche-img2.png" alt="">
                        </div>
                        <div class="slide-content">
                            <h2>Receive quotes</h2>
                            <p>Once your listing is posted, our professional carriers will have access to your request
                                and will offer you their quote. You will have the opportunity to choose the quote that
                                suits you best and cheapest thanks to our reverse auction system.</p>
                            <a href="#" class="btn-theme">REQUEST FOR QUOTATION</a>
                        </div>
                    </div>
                    <div class="tab-pane tabs__content">
                        <div class="slide-thumb">
                            <img src="/images/commentcamarche-img3.png" alt="">
                        </div>
                        <div class="slide-content">
                            <h2>Get delivered</h2>
                            <p>Once your quotation has been selected, the carrier will take care of your furniture and
                                belongings at the address and on the date you have chosen until the destination of your
                                choice. Your belongings are handled safely by professionals equipped with equipment
                                adapted to your needs in order to avoid any damage.</p>
                            <a href="#" class="btn-theme">REQUEST FOR QUOTATION</a>
                        </div>
                    </div>
                    <div class="tab-pane tabs__content">
                        <div class="slide-thumb">
                            <img src="/images/commentcamarche-img4.png" alt="">
                        </div>
                        <div class="slide-content">
                            <h2>Evaluate the service</h2>
                            <p>When your move is completed, you have the opportunity to evaluate your carrier on our
                                site. All our carriers are evaluated in order to allow you to choose your service as
                                well as possible. So, thanks to the contribution of our customers, you are guaranteed to
                                find the carrier that suits you.</p>
                            <a href="#" class="btn btn-theme">REQUEST FOR QUOTATION</a>
                        </div>
                    </div>-->
                    <ul class="tabs__caption">
                        <li v-for="item in items" :class="{active:item.number == selected}" @click="selected = item.number, clearTickInterval()">
                            <strong>{{ item.number }}</strong>{{ item.message }}
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "HowItWorkSlider",
        methods: {
            tick: function() {
                if(this.selected > this.items.length-1) {
                    this.selected = 0;
                }
                this.selected += 1;
                this.timer = setTimeout(this.tick, this.changeSlideTimeout);
            },
            clearTickInterval: function() {
                clearTimeout(this.timer);
                this.timer = setTimeout(this.tick, this.changeSlideTimeout);
            }
        },

        data() {
            return {
                changeSlideTimeout: 5000,
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
    .tabs__caption > li {
        cursor: pointer;
    }
</style>
