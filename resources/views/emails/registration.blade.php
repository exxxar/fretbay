@extends("emails.layouts.main")

@section("content")
    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
        <center>
            <table cellspacing="0" cellpadding="0" width="600" class="w320">
                <tbody>
                <tr>
                    <td class="header-lg">
                        Congratulations, you have just registered a new account!
                    </td>
                </tr>
                <tr>
                    <td class="free-text">
                        <span>{{$name}}!</span> hello friend!


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
                                            <td>
                                                <table cellspacing="0" cellpadding="0" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td class="user-img">
                                                            <h2>{{$name}}!</h2>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="user-msg">
                                                            <p>Your account name <strong>{{$name}}</strong></p>
                                                            <p>Your email <strong>{{$email}}</strong></p>
                                                            <p>You are <strong>{{$type}}</strong></p>
                                                            <p>You first name <strong>{{$first_name}}</strong></p>
                                                            <p>You last name <strong>{{$second_name}}</strong></p>
                                                            <p>You company name <strong>{{$company_name}}</strong></p>
                                                            <p>Phone number <strong>{{$telephone_number_1}}</strong></p>
                                                            <p>Mobile number <strong>{{$telephone_number_2}}</strong>
                                                            </p>
                                                            <hr>
                                                            <p>Country
                                                                <strong>{{ empty($country) ? "not selected": $country}}</strong>
                                                            </p>
                                                            <p>City
                                                                <strong>{{ empty($city)? "not selected" : $city}}</strong>
                                                            </p>
                                                            <p>Region
                                                                <strong>{{ empty($region)? "not selected": $region}}</strong>
                                                            </p>
                                                            <p>Postal
                                                                <strong>{{ empty($postal)? "not selected": $postal}}</strong>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="button">
                                                <div><!--[if mso]>
                                                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml"
                                                                 xmlns:w="urn:schemas-microsoft-com:office:word"
                                                                 href="https://allotrans.com/login"
                                                                 style="height:45px;v-text-anchor:middle;width:155px;"
                                                                 arcsize="15%" strokecolor="#ffffff"
                                                                 fillcolor="#ff6f6f">
                                                        <w:anchorlock/>
                                                        <center
                                                            style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">
                                                            Sign In
                                                        </center>
                                                    </v:roundrect>
                                                    <![endif]--><a href="https://allotrans.com/login"
                                                                   style="background-color:#26ff78;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Sign
                                                        In</a></div>
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
                <tr>
                    <td class="header-md" style="text-align:center;">
                        Our services
                    </td>
                </tr>
                <tr>
                    <td>
                        You can choose the service that suits you
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
                                                        src="http://allotrans.com/images/common/icons/category/default/1.png?v=2"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://allotrans.com/images/common/icons/category/default/2.png?v=2"
                                                        alt="product"/></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://allotrans.com/images/common/icons/category/default/3.png?v=2"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://allotrans.com/images/common/icons/category/default/4.png?v=2"
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
                                                        src="http://allotrans.com/images/common/icons/category/default/5.png?v=2"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://allotrans.com/images/common/icons/category/default/6.png?v=2"
                                                        alt="product"/></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://allotrans.com/images/common/icons/category/default/7.png?v=2"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://allotrans.com/images/common/icons/category/default/8.png?v=2g"
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
                                                        src="http://allotrans.com/images/common/icons/category/default/9.png?v=2"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://allotrans.com/images/common/icons/category/default/10.png?v=2"
                                                        alt="product"/></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://allotrans.com/images/common/icons/category/default/11.png?v=2"
                                                        alt="product"/></a>
                                            </td>
                                            <td class="mini-img">
                                                <a href=""><img
                                                        src="http://allotrans.com/images/common/icons/category/default/12.png?v=2g"
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

{{--
{{$text}}--}}
