
@extends("emails.layouts.main")

@section("content")
    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
        <center>
            <table cellspacing="0" cellpadding="0" width="600" class="w320">
                <tbody><tr>
                    <td class="header-lg">
                        Your order has shipped!
                    </td>
                </tr>
                <tr>
                    <td class="free-text">
                        We wanted to let you know that we just shipped off your order <a href="">#23141</a>. You'll find all the details below.
                    </td>
                </tr>
                <tr>
                    <td class="button">
                        <div><!--[if mso]>
                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#ff6f6f">
                                <w:anchorlock/>
                                <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">Track Order</center>
                            </v:roundrect>
                            <![endif]--><a href="http://" style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Track Order</a></div>
                    </td>
                </tr>
                <tr>
                    <td class="w320">
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tbody><tr>
                                <td class="mini-container-left">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody><tr>
                                            <td class="mini-block-padding">
                                                <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                                    <tbody><tr>
                                                        <td class="mini-block">
                                                            <span class="header-sm">Shipping Address</span><br>
                                                            Jane Doe <br>
                                                            123 Street <br>
                                                            Victoria, BC <br>
                                                            Canada
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                                <td class="mini-container-right">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody><tr>
                                            <td class="mini-block-padding">
                                                <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                                    <tbody><tr>
                                                        <td class="mini-block">
                                                            <span class="header-sm">Date Shipped</span><br>
                                                            January 12, 2015 <br>
                                                            <br>
                                                            <span class="header-sm">Order</span> <br>
                                                            #12342
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                </tbody></table>
        </center>
    </td>
@endsection

@section("content-bottom")
    <td align="center" valign="top" width="100%" style="background-color: #ffffff;  border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
        <center>
            <table cellpadding="0" cellspacing="0" width="600" class="w320">
                <tbody><tr>
                    <td class="item-table">
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <tbody><tr>
                                <td class="title-dark" width="300">
                                    Item
                                </td>
                                <td class="title-dark" width="163">
                                    Qty
                                </td>
                                <td class="title-dark" width="97">
                                    Total
                                </td>
                            </tr>


                            <tr>
                                <td class="item-col item">
                                    <table cellspacing="0" cellpadding="0" width="100%">
                                        <tbody><tr>
                                            <td class="mobile-hide-img">
                                                <img width="110" height="92" src="http://s3.amazonaws.com/swu-filepicker/RPezUIwPRv8pjatAAH1E_item_images_19.jpg" alt="item1">
                                            </td>
                                            <td class="product">
                                                <span style="color: #4d4d4d; font-weight:bold;">Golden Earings</span> <br>
                                                Hot city looks
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                                <td class="item-col quantity">
                                    1
                                </td>
                                <td class="item-col">
                                    $2.52
                                </td>
                            </tr>


                            <tr>
                                <td class="item-col item">
                                    <table cellspacing="0" cellpadding="0" width="100%">
                                        <tbody><tr>
                                            <td class="mobile-hide-img">
                                                <img width="110" height="92" src="http://s3.amazonaws.com/swu-filepicker/9wRy50HQTg2CTyZA5Ozi_item_images_16.jpg" alt="item2">
                                            </td>
                                            <td class="product">
                                                <span style="color: #4d4d4d; font-weight: bold;">Pink Shoes</span> <br>
                                                Newest styles
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                                <td class="item-col quantity">
                                    1
                                </td>
                                <td class="item-col price">
                                    $10.50
                                </td>
                            </tr>


                            <tr>
                                <td class="item-col item mobile-row-padding"></td>
                                <td class="item-col quantity"></td>
                                <td class="item-col price"></td>
                            </tr>


                            <tr>
                                <td class="item-col item">
                                </td>
                                <td class="item-col quantity" style="text-align:right; padding-right: 10px; border-top: 1px solid #cccccc;">
                                    <span class="total-space">Subtotal</span> <br>
                                    <span class="total-space">Tax</span>  <br>
                                    <span class="total-space">Shipping</span> <br>
                                    <span class="total-space" style="font-weight: bold; color: #4d4d4d">Total</span>
                                </td>
                                <td class="item-col price" style="text-align: left; border-top: 1px solid #cccccc;">
                                    <span class="total-space">$13.02</span> <br>
                                    <span class="total-space">$0.75</span>  <br>
                                    <span class="total-space">$1.00</span>  <br>
                                    <span class="total-space" style="font-weight:bold; color: #4d4d4d">$15.77</span>
                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>

                </tbody></table>
        </center>
    </td>
@endsection
