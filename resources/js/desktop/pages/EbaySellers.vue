<template>
    <section class="ebay-sellers">
        <div class="container">
            <article class="big-banner2">

                <div class="row pd-r pd-l">


                    <div class="col-lg-12 col-md-12 landing-page-outer" id="recherche">

                        <div class="cont-1">
                            <div class="col-lg-4 col-md-4">
                                <h2>Import your item</h2>
                                <p>It's very <span>simple and fast </span> : you just have to enter the details of your item (size and weight) or enter directly the<span> eBay item number </span>, as well as <span>your loading address. </span></p>
                            </div>
                        </div>

                        <div class="cont-2">
                            <div class="col-lg-5 col-md-5 content-2">
                                <h2>Get the banner</h2>
                                <p>Our platform <span>generates HTML code</span> that you simply have to include in the <span> description of your eBay ad. </span> This is done by clicking on a <span> simple button. </span></p>
                            </div>
                        </div>

                        <div class="cont-3">
                            <div class="col-lg-5 col-md-5 ">
                                <h2>Integrate it into your ad</h2>
                                <p>This banner is visible from your <span>e-bay ad,</span> directly in the description</p>
                                <p> Thus you offer a <span>solution</span>bulky item delivery solution <span>adapted to all</span>your future buyers.</p>
                            </div>
                        </div>

                        <div class="cont-4">
                            <div class="col-lg-6 col-md-6 content-2">
                                <h2>An instant quote</h2>
                                <p>This banner allows your future buyers to estimate instantly and free of charge the price of their door-to-door delivery. </p>
                                <p>To do this, all he has to do is enter his delivery address and date preferences. to obtain a delivery link</p>
                            </div>
                        </div>

                        <center>
                            <form action="https://fretbay.com/en/shipper/ebayFindItem.php" method="post" onsubmit="return validateForm();">
                                <button class="btn red-btn">Get a delivery link</button>
                            </form>
                        </center>

                    </div>


                    <div class="tab-pane text-sec row" role="tabpanel">

                        <div class="col-md-6">

                            <article class="text-sec">

                                <h3 class="fontblue heading">Your benefits</h3>

                                <p>It's very <span class="fontblue">simple and very fast</span> : you just have to enter the details of your item ( size and weight) or enter directly the <span class="fontblue">eBay item number </span>, as well as <span class="fontblue">your loading address</span>.<br> Our platform generates a link that you simply have to include in your sales ad and that appears as a <span class="fontblue">clickable banner</span><br> From then on, you no longer need to intervene. The customer, by clicking on the banner, will only need to enter his delivery address and <span class="fontblue">his date preferences</span>. Our platform automatically calculates <span class="fontblue">an estimate of the delivery cost</span> that the buyer can book immediately. Delivery times are respected according to your customers' requirements.<br> FretBay then undertakes to find him a professional transporter as soon as possible.</p>
                            </article>

                        </div>

                        <div class="col-md-6">

                            <article class="text-sec">


                                <h3 class="fontblue heading">Your guarantees</h3>
                                <p>FretBay works exclusively with <span class="fontblue">approved and verified professional carriers </span> We also ensure regular monitoring of the smooth running of their services through the customer notification site <a href="https://fr.trustpilot.com/review/www.fretbay.com" target="_blank"><span class="fontblue"><u>Truspilot</u></span></a></p>
                            </article>
                        </div>



                    </div>

                </div>


            </article>
        </div>
    </section>

</template>
<script>
    export default {

    }
</script>
<style lang="scss">

    .banner-top{
        position:relative;
        background:url("/images/bg-home3.jpg") no-repeat scroll center center #0098c1;
        min-height:435px;
        padding:20px 0;
        background-size:cover;
    }
    .banner-text{
        position:relative;
        display:block;
        padding:18px 8px 24px;
        color:#FFF;
        font-family:ProximaNovaBold;
    }
    .banner-text p{
        font-size:18px;
        margin-top:15px;
        font-family: 'segoe_uilight';
    }
    .banner-users{
        margin-top:-15px;
    }
    .form-banner{
        position:relative;
        display:block;
        background:url(/images/form-bg.png) repeat;
        padding:15px 20px;
        border-radius:7px;
        -moz-border-radius:7px;
        -ms-border-radius:7px;
        -o-border-radius:7px;
        -webkit-border-radius:7px;
        -khtml-border-radius:7px;
    }
    .form-banner input{
        height:45px;
        border:1px solid #ccc;
        font-size:16px;
    }
    button.btn1{
        background: #0195c4; /* Old browsers */
        height:45px;
        font-size:16px;
        text-transform:uppercase;
        color:#FFF;
        box-shadow:9px 9px 8px -4px #ccc;
        font-weight:bold;
        border-radius:0px;
    }
    button.btn1:hover, button.btn1:active, button.btn1:focus{
        background: #0195c4;
        color:#FFF;
    }
    .form-banner .col-md-4{
        padding:0 5px;
    }
    .steps-box{
        position:relative;
        display:block;
        padding:30px 0;
    }
    .steps-box img{
        float:left;
        margin:5px 15px 5px 0;
    }
    .steps-box p{
        font-family:'myriadproregular';
        font-size:16px;
        color:#333;
        overflow:hidden;
    }
    .big-banner{
        position:relative;
        display:block;
        background:url(/images/banner1.png) no-repeat center top #f4f4f4;
        min-height:540px;
        padding:65px 0;
    }
    .text-sec{
        position:relative;
        padding:10px;
        background-color:#FFF;
        text-align:center;
        -moz-border-radius:10px;
        -ms-border-radius:10px;
        -o-border-radius:10px;
        -webkit-border-radius:10px;
    }
    .text-sec h1{
        font-size:35px;
        color:#0098c2;
        border-bottom:1px solid #0098c2;
        width:420px;
        margin:0 auto;
    }
    .text-sec i{
        display:block;
        height:1px;
        background-color:#0098c2;
        width:420px;
        position:relative;
        margin:0 auto;
        margin-top:5px;
    }
    .text-sec p, .text-sec h3{
        font-family:'segoe_uilight';
        font-size:16px;
        margin:30px 0;
        text-align: justify;
    }
    .text-sec button{
        padding:10px 20px;
    }
    .big-banner2{
        position:relative;
        background-color:#f4f4f4;
        padding:60px 0;
    }
    .text-sec2{
        position:relative;
        padding:50px;
        background-color:#FFF;
        border:10px solid #ededed;
        border-radius:10px;
        -moz-border-radius:10px;
        -ms-border-radius:10px;
        -o-border-radius:10px;
        -webkit-border-radius:10px;
    }
    .text-sec2 h2{
        font-size:25px;
        color:#0098c2;
    }
    .text-sec2 ul{
        position:relative;
        float:left;
        margin-top:10px;
    }
    .text-sec2 ul li{
        float:left;
        width:100%;
        margin-top:10px;
    }
    .text-sec2 ul li img{
        float:left;
        margin-right:5px;
        margin-top:7px;
    }
    .text-sec2 ul li p{
        font-family:ProximaNovaBold;
        font-size:18px;
        overflow:hidden;
    }
    .text-sec2 ul li p a{
        color:#8fb616;
        text-decoration:underline;
    }
    .pub-annonce{
        position:relative;
        display:block;
        padding:30px 0;
        float:left;
        width:100%;
    }
    .pub-annonce .col-md-9{
        font-family: claire_handbold;
        font-size:20px;
        font-weight:normal;
        color:#009bc0;
    }
    .big-banner3{
        background:url(/images/banner2.png) no-repeat center top;
        min-height:865px;
        display:block;
        padding:110px 0;
    }
    .text-box3{
        position:relative;
        display:block;
        padding:40px 70px;
        background-color:#FFF;
        border-radius:10px;
        -moz-border-radius:10px;
        -ms-border-radius:10px;
        -o-border-radius:10px;
        -webkit-border-radius:10px;
    }
    .text-box3 h3{
        font-size:18px;
    }
    .text-box3 h2{
        font-size:25px;
        color:#009bc0;
    }
    .text-box3 ul{
        float:left;
        width:100%;
        display:block;
        border-top:1px solid #CCC;
        margin-top:30px;
    }
    .text-box3 ul li{
        padding-top:15px;
        border-bottom:1px solid #CCC;
    }
    .text-box3 ul li span{
        float:left;
        color:#000;
    }
    .text-box3 ul li strong{
        float:right;
        font-family:ProximaNovaBold;
        font-weight:normal;
        font-size:18px;
        color:#0098c1;
    }
    .text-box3 ul li strong em{
        font-style:normal;
        font-family: LatoLight;
        color:#333;
        font-size:14px;
    }
    .text-box3 ul li i{
        font-style:normal;
        color:#666;
        float:left;
        margin-top:-5px;
    }
    .text-box3 ul li small{
        font-size:14px;
        color:#8fb616;
        float:left;
        margin-top:-5px;
        text-decoration:underline;
    }
    .text-box3 ul li p{
        color:#666;
        margin-top:10px;
    }
    .text-box3 button{
        width:310px;
        display:block;
        margin:0 auto;
        height:auto;
        margin-top:50px;
    }
    .vslider{
        position:relative;
        display:block;
        padding:40px 0;
    }
    .vslider p{
        height:60px;
        overflow:hidden;
    }

</style>
