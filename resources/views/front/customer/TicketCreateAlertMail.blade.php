<!DOCTYPE html>
<html lang="en">

<head>
    <title>Best Legal Services - New Ticket Generate</title>
</head>

<body>
    <div style="font-size: 100%; font-family: Arial, sans-serif, Gotham, &quot;Helvetica Neue&quot;, Helvetica, serif, EmojiFont; margin: 0px; padding: 0px;">
        <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:600px;border:1px solid #DDDADA;">
            <tbody>
                <tr>
                    <td>
                        <a href="{{ route('home') }}" target="_blank">
                            <img src="https://bestlegalservices.in/assets/images/bestlegalservices-logo.png" width="50%" alt="Best Legal Services" align="center" style="padding-top: 10px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top" style="padding:20px 0 0 0;">
                        <table align="center" width="90%" border="0" cellspacing="0" cellpadding="0" style="max-width:570px;">
                            <tbody>
                                <tr>
                                    <td align="left" style="color:black;font-size:14px;font-family:Arial,sans-serif,Gotham,Helvetica Neue,Helvetica;font-weight:bold;margin:0;padding:0 0 20px 0;line-height:22px;">Hi Best Legal Services,</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" style="color:black;font-size:13px;font-family:Arial,sans-serif,Gotham,Helvetica Neue,Helvetica;margin:0;padding:0 0 20px 0;line-height:22px;">You have new ticket generated with Ticket Id: <strong>{{ $details['ticket'] }}</strong> regarding <strong>{{ $srvName->ser_name }}</strong> from <strong>{{ $details['name'] }}</strong>. Here are ticket query details</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" style="color:black;font-size:13px;font-family:Arial,sans-serif,Gotham,Helvetica Neue,Helvetica;margin:0;padding:0 0 20px 0;line-height:22px;">
                                        <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#C7C7C7;">
                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top" style="background-color:white;width:200px;padding:10px;">Name:</td>
                                                    <td align="left" valign="top" style="background-color:white;padding:10px;">{{ $details['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="background-color:white;width:200px;padding:10px;">State: </td>
                                                    <td align="left" valign="top" style="background-color:white;padding:10px;">{{ $details['state'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="background-color:white;width:200px;padding:10px;">Service: </td>
                                                    <td align="left" valign="top" style="background-color:white;padding:10px;">{{ $srvName->ser_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="background-color:white;width:200px;padding:10px;">Short Description: </td>
                                                    <td align="left" valign="top" style="background-color:white;padding:10px;">{!! htmlspecialchars_decode($details['content']) !!}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="color:#8E8E8E;font-size:11px;font-family:Roboto-Regular,Arial, sans-serif,Gotham,Helvetica Neue,Helvetica;font-weight:300;padding:0 0 20px 0;line-height:24px;">© {{ date('Y') }}. All rights reserved</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
