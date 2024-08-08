<html>

<head>
    <title>Best Legal Services - OTP Login</title>
</head>

<body>
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;background-color: #f6f6f6;font-family: 'Roboto';">
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td style="max-width: 600px;margin: 0 auto;width: 600px;padding: 0;padding-top: 24px;">
                    <div>
                        <div style="margin-bottom: 24px;">
                            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="padding:10px;text-align: center;">
                                            <a href="{{ route('home') }}" target="_blank">
                                                <img src="{{ asset('assets/images/bestlegalservices-logo.png') }}" width="100%" alt="Best Legal Services" align="center" class="CToWUd">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" style="background: #fff;border-radius: 4px;width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="padding-bottom: 0px!important;padding: 24px;">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h3 style="font-family:Inter;font-style:normal;font-weight:normal;font-size:27px;line-height:33px;text-align:center;color:#231f20;padding-bottom:20px">
                                                            OTP: {{ $details['otp'] }}<br>
                                                        </h3>
                                                        <p style="padding:10px;font-family:Inter;font-style:normal;font-weight:normal;font-size:18px;line-height:27px;color:#515759">
                                                            Hi,
                                                            <span style="font-family:Roboto;font-style:normal;font-weight:600;font-size:18px;line-height:27px;color:#007aff">{{ $details['name'] }}</span><br><br>
                                                            You’re almost ready to
                                                            start using your dashboard. Enter your Dashboard
                                                            using this OTP now!<br><br>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 0px!important;padding: 24px;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0"></table>
                                                        <p style="font-family:'Inter',sans-serif;font-style:italic;font-weight:500;font-size:18px;line-height:27px;color:#606162;padding-top:20px">
                                                            Best Regards,<br>
                                                            <span style="font-style:normal;color:#000">Team Best Legal Services</span>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="padding-top: 24px;text-align: center;clear: both;width: 100%;">
                            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="padding-bottom: 24px; text-align: center;">
                                            <span>© {{ date('Y') }} Best Legal Services. All rights reserved.</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
