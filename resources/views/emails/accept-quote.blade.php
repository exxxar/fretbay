@extends("emails.layouts.main")

@section("content")
    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
        <center>
            <table cellspacing="0" cellpadding="0" width="600" class="w320">
                <tr>
                    <td class="header-lg">
                        Almost done!
                    </td>
                </tr>
                <tr>
                    <td>


                        <h3>Quote info</h3>

                        <p>Price <strong>{{$price}}</strong></p>
                        <p>Valid until <strong>{{$valid_until_date}}</strong></p>
                        <p>Additional info <strong>{{$additional_info}}</strong></p>
                        <p>Type of transport <strong>{{$type_of_transport}}</strong></p>
                        <p>Quote validity <strong>{{$quote_validity}}</strong></p>
                        <p> Formula
                            @isset($formula)
                                @foreach ($formula as $f)
                                    @switch($f)

                                        @case(1)
                                        Truck with Driver package<
                                        @break

                                        @case(2)
                                        The Economic package
                                        @break

                                        @case(3)
                                        The Standard package
                                        @break

                                        @case(4)
                                        The Complete package
                                        @break

                                        @default
                                        Minimum package
                                    @endswitch
                                @endforeach
                            @endisset
                        </p>
                        <p>Status <strong>{{$status}}</strong></p>
                        <p>Currency <strong>{{$currency}}</strong></p>
                        <p>Listing reference <a href="https://allotrans.com/single/listing/{{$listing_id}}"></a><strong>#{{$listing_id}}</strong></p>
                        <p>User account name <strong>{{$user_name}}</strong></p>

                    </td>
                </tr>
                <tr>
                    <td class="mini-block-container">
                        <table cellspacing="0" cellpadding="0" width="100%"
                               style="border-collapse:separate !important;">
                            <tr>
                                <td class="mini-block">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td class="progress-bar">
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>

                                                        <!-- STEP ONE -->
                                                        <td class="step">
                                                            <img
                                                                src="http://s3.amazonaws.com/swu-filepicker/0oYLLViRBKv7a0Lzh6vC_v3_03.jpg"
                                                                alt="step one"/><br/>
                                                            Create Quote
                                                        </td>

                                                        <!-- STEP TWO -->
                                                        <td class="step active">
                                                            <img
                                                                src="http://s3.amazonaws.com/swu-filepicker/YL3H3V5bRyGuy6pess9T_v33_04.jpg"
                                                                alt="step two"/><br/>
                                                            Accept Quote
                                                        </td>

                                                        <!-- STEP THREE -->
                                                        <td class="step">
                                                            <img
                                                                src="http://s3.amazonaws.com/swu-filepicker/YSTlgtgaTSa897tPTUhl_v3_05.jpg"
                                                                alt="step three"/>
                                                            Order start
                                                        </td>

                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="button">
                                                <div><!--[if mso]>
                                                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml"
                                                                 xmlns:w="urn:schemas-microsoft-com:office:word"
                                                                 href="https://allotrans.com"
                                                                 style="height:45px;v-text-anchor:middle;width:155px;"
                                                                 arcsize="15%" strokecolor="#ffffff"
                                                                 fillcolor="#ff6f6f">
                                                        <w:anchorlock/>
                                                        <center
                                                            style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">
                                                            You profile
                                                        </center>
                                                    </v:roundrect>
                                                    <![endif]--><a href="https://allotrans.com"
                                                                   style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;"> You profile</a></div>
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

@section("content-bottom")
    <td align="center" valign="top" width="100%"
        style="background-color: #ffffff;  border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
        <center>
            <table cellpadding="0" cellspacing="0" width="600" class="w320">
                <tr>
                    <td class="header-md" style="text-align:center;">
                        In the meantime..
                    </td>
                </tr>
                <tr>
                    <td>
                        Check out our newest collection items
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
