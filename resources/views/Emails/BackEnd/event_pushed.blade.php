@extends("Emails.Layout.app")
@section("content")

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                            class="main-header">


                            <div style="line-height: 35px">

                                HAT<span style="color: #5caad2;">OON</span> Provider

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                <tr>
                                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>


                    <tr>
                        <td align="center">
                            <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                <tr>
                                    <td align="center" style="padding-bottom:30px;color: #000000; font-size: 18px; font-family: 'Arial', Calibri, sans-serif; line-height: 24px;">


                                        <div style="line-height: 24px">
                                            {{ $email_message }}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                <tr>
                                    <td align="center" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">


                                        <div style="line-height: 24px">
                                            {{ $intro }}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>






                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    {{--<tr>--}}
                        {{--<td align="center">--}}
                            {{--<table border="0" align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">--}}

                                {{--<tr>--}}
                                    {{--<td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>--}}
                                {{--</tr>--}}

                                {{--<tr>--}}
                                    {{--<td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">--}}


                                        {{--<div style="line-height: 26px;">--}}
                                            {{--<a href="" style="color: #ffffff; text-decoration: none;">SHOP NOW</a>--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}

                                {{--<tr>--}}
                                    {{--<td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>--}}
                                {{--</tr>--}}

                            {{--</table>--}}
                        {{--</td>--}}
                    {{--</tr>--}}


                </table>

            </td>
        </tr>

        <tr class="hide">
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>
        <tr>
            <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
        </tr>

    </table>
    <!-- end section -->
@endsection