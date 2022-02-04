@extends("emails.layouts.main")

@section("content")
    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
        <center>
            <table cellspacing="0" cellpadding="0" width="600" class="w320">
                <tbody>
                <tr>
                    <td class="header-lg">
                        Password was changed!
                    </td>
                </tr>
                <tr>
                    <td class="free-text">

                    </td>
                </tr>
                <tr>
                    <td class="mini-block-container">
                        <table cellspacing="0" cellpadding="0" width="100%"
                               style="border-collapse:separate !important;">
                            <tbody>
                            <tr>
                                <td class="mini-block">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="padding-bottom: 30px;">
                                                Your password was changed!
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="code-block">
                                               <p>
                                                   <strong>Your new password</strong>
                                                  {{$new_password}}
                                               </p>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="button">
                                                <div><!--[if mso]>
                                                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://allotrans.com" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#ff6f6f">
                                                        <w:anchorlock/>
                                                        <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">View website</center>
                                                    </v:roundrect>
                                                    <![endif]--><a class="button-mobile"
                                                                   href="https://allotrans.com"
                                                                   style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">View website</a></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </center>
    </td>
@endsection

@section("content-bottom")
    <td align="center" valign="top" width="100%"
        style="background-color: #ffffff;  border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
        <center>
            <table cellpadding="0" cellspacing="0" width="600" class="w320">
                <tbody>
                <tr>
                    <td class="content-padding">
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                            <tr>
                                <td class="header-md">
                                    Our newest offers!
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 75px;">
                        <table cellpadding="0" cellspacing="0" width="100%"
                               style="border-collapse:separate !important;">
                            <tbody>
                            <tr>
                                <td class="info-block">
                                    <table cellpadding="0" cellspacing="0" width="100%"
                                           style="border-collapse:separate !important;">
                                        <tbody>
                                        <tr>
                                            <td class="block-rounded">
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td class="info-img">
                                                            <a href=""><img class="info-img"
                                                                            src="http://s3.amazonaws.com/swu-filepicker/9wRy50HQTg2CTyZA5Ozi_item_images_16.jpg"
                                                                            alt="img"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 15px;">
                                                            <table cellspacing="0" cellpadding="0" width="100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td style="text-align:left; width:155px">
                                                                        <a href=""><span
                                                                                class="header-sm">Pink Shoes</span></a><br>
                                                                        The hottest summer sneakers are in now!
                                                                    </td>
                                                                    <td style="text-align:right; vertical-align: top;">
                                                                        <strong>$29.99</strong>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 15px;">
                                                            <div><!--[if mso]>
                                                                <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml"
                                                                             xmlns:w="urn:schemas-microsoft-com:office:word"
                                                                             href="http://"
                                                                             style="height:45px;v-text-anchor:middle;width:228px;"
                                                                             arcsize="15%" strokecolor="#ffffff"
                                                                             fillcolor="#ff6f6f">
                                                                <w:anchorlock/>
                                                                <center
                                                                    style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">
                                                                    My Account
                                                                </center>
                                                                </v:roundrect>
                                                                <![endif]--><a class="button-width" href="http://"
                                                                               style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;">View
                                                                    Now!</a></div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="info-block">
                                    <table cellpadding="0" cellspacing="0" width="100%"
                                           style="border-collapse:separate !important;">
                                        <tbody>
                                        <tr>
                                            <td class="block-rounded">
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td class="info-img">
                                                            <a href=""><img width="258" height="210" class="info-img"
                                                                            src="http://s3.amazonaws.com/swu-filepicker/RPezUIwPRv8pjatAAH1E_item_images_19.jpg"
                                                                            alt="img"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 15px;">
                                                            <table cellspacing="0" cellpadding="0" width="100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td style="text-align:left; width:155px">
                                                                        <a href=""><span class="header-sm">Golden Earings</span></a><br>
                                                                        New city looks!
                                                                        <!-- Remove bottom br and nbsp when item text longer than one line is -->
                                                                        <br>
                                                                        &nbsp;
                                                                    </td>
                                                                    <td style="text-align:right; vertical-align: top;">
                                                                        <strong>$29.99</strong>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 15px;">
                                                            <div><!--[if mso]>
                                                                <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml"
                                                                             xmlns:w="urn:schemas-microsoft-com:office:word"
                                                                             href="http://"
                                                                             style="height:45px;v-text-anchor:middle;width: 228px;"
                                                                             arcsize="15%" strokecolor="#ffffff"
                                                                             fillcolor="#ff6f6f">
                                                                <w:anchorlock/>
                                                                <center
                                                                    style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">
                                                                    My Account
                                                                </center>
                                                                </v:roundrect>
                                                                <![endif]--><a class="button-width" href="http://"
                                                                               style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none; -webkit-text-size-adjust:none;mso-hide:all;">View
                                                                    Now!</a></div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </center>
    </td>
@endsection