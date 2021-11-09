@extends("emails.layouts.main")

@section("content")
    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
        <center>
            <table cellspacing="0" cellpadding="0" width="600" class="w320">
                <tbody><tr>
                    <td class="header-lg">
                        Payment info:
                    </td>
                </tr>
                <tr>
                    <td class="free-text">
                        We noticed you haven't been around for awhile and we wanted to say that we miss you. We've been working really hard to improve our services and selection and hope you will give us another visit.
                    </td>
                </tr>
                <tr>
                    <td class="mini-block-container">
                        <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                            <tbody><tr>
                                <td class="mini-block">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody><tr>
                                            <td style="padding-bottom: 30px;">
                                                As a token of our appreciation, please accept this coupon code for <span style="font-weight:700; color: #ff6f6f; font-size: 18px;">40% off</span> your next purchase!
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="code-block">


                                                <p>Title {{$title}}</p>
                                                <p>Description {{$description}}</p>
                                                <p>User id {{$user_id}}</p>
                                                <p>Listing id {{$listing_id}}</p>
                                                <p>Order id {{$order_id}}</p>
                                                <p>Quote id {{$quote_id}}</p>
                                                <p>Status {{$user_id?"success":"failur"}}</p>
                                                <p>Amount {{$amount}} {{$currency}}</p>
                                                <p>Tax {{$tax_amount}}</p>
                                                <p>Source {{$source}}</p>
                                                <p>Type {{$type}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="button">
                                                <div><!--[if mso]>
                                                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#ff6f6f">
                                                        <w:anchorlock/>
                                                        <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">Shop Now</center>
                                                    </v:roundrect>
                                                    <![endif]--><a class="button-mobile" href="http://" style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Shop Now</a></div>
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
    <td align="center" valign="top" width="100%"
        style="background-color: #ffffff;  border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
        <center>
            <table cellpadding="0" cellspacing="0" width="600" class="w320">
                <tr>
                    <td class="header-md" style="text-align:center;">
                        You payment success!
                    </td>
                </tr>
                <tr>
                    <td>


                    </td>
                </tr>
                <tr>
                    <td class="mini-imgs">
                        <table cellpadding="0" cellspacing="0" width="0"
                               style="border-collapse:separate !important;">
                            <tr>
                                <td class="mobile-block">
                                    <table cellspacing="0" cellpadding="0" width="100%"
                                           style="border-collapse:separate !important;">
                                        <tr>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://s3.amazonaws.com/swu-filepicker/u3EYVdcIQo6dZiKefuLu_bracelet.jpg"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://s3.amazonaws.com/swu-filepicker/yyN7crRfTTW6l8fO0S0S_hat.jpg"
                                                        alt="product"/></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://s3.amazonaws.com/swu-filepicker/DXWZ4PzwQUGI0wQoABDt_jacket.jpg"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://s3.amazonaws.com/swu-filepicker/RPezUIwPRv8pjatAAH1E_item_images_19.jpg"
                                                        alt="product"/></a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="mobile-block">
                                    <table cellspacing="0" cellpadding="0" width="100%"
                                           style="border-collapse:separate !important;">
                                        <tr>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://s3.amazonaws.com/swu-filepicker/9wRy50HQTg2CTyZA5Ozi_item_images_16.jpg"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://s3.amazonaws.com/swu-filepicker/RPezUIwPRv8pjatAAH1E_item_images_19.jpg"
                                                        alt="product"/></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://s3.amazonaws.com/swu-filepicker/DXWZ4PzwQUGI0wQoABDt_jacket.jpg"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://s3.amazonaws.com/swu-filepicker/u3EYVdcIQo6dZiKefuLu_bracelet.jpg"
                                                        alt="product"/></a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </center>
    </td>
@endsection
