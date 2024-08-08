<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Best Legal Services - Thankyou for visiting</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap');

        html,
        body {
            font-family: 'Raleway', sans-serif;
        }

        .thankyou-page ._header {
            background: #102e44;
            padding: 100px 30px;
            text-align: center;
            background: #102e44;
        }

        .thankyou-page ._header .logo {
            max-width: 200px;
            margin: 0 auto 50px;
        }

        .thankyou-page ._header .logo img {
            width: 100%;
        }

        .thankyou-page ._header h1 {
            font-size: 65px;
            font-weight: 800;
            color: white;
            margin: 0;
        }

        .thankyou-page ._body {
            margin: -70px 0 30px;
        }

        .thankyou-page ._body ._box {
            margin: auto;
            max-width: 80%;
            padding: 50px;
            background: white;
            border-radius: 3px;
            box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
            -moz-box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
            -webkit-box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
        }

        .thankyou-page ._body ._box h2 {
            font-size: 32px;
            font-weight: 600;
            color: #4ab74a;
        }

        .thankyou-page ._footer {
            text-align: center;
            padding: 50px 30px;
        }

        .thankyou-page ._footer .btn {
            background: #4ab74a;
            color: white;
            border: 0;
            font-size: 14px;
            font-weight: 600;
            border-radius: 0;
            letter-spacing: 0.8px;
            padding: 20px 33px;
            text-transform: uppercase;
        }
    </style>
</head>
@php
	$api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
	$payment = $api->payment->fetch($_REQUEST['razorpay_payment_id']);
@endphp

<body>
    <div class="thankyou-page">
        <div class="_header">
            <h1>Thank You!</h1>
        </div>
        <div class="_body">
            <div class="_box">
                <div class="text-center">
                    <h2>
                        <strong>Paid Successfully</strong>
                    </h2>
                    <p>
                        Thanks a bunch for filling that out. It means a lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for being you.
                    </p>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td align="left" style="font-size:0px;padding:0px;word-break:break-word">
                                    <div style="font-family:Trebuchet MS;font-size:13px;line-height:1;text-align:left;color:#000000">
                                        <div style="width:85%;width:calc(46000% - 211600px);max-width:460px;min-width:308px;margin-left:auto;margin-right:auto;box-sizing:border-box;padding-left:16px;padding-right:16px;border-radius:2px;background-color:#ffffff;border-top-width:2px;border-top-style:solid;padding-top:20px;padding-bottom:20px;border-top-color:#0f1829;margin-top:8px border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: #0f1829; margin-bottom: 20px">
                                            <div style="font-size:14px;line-height:1.5;width:100%;box-sizing:border-box;padding-left:9.3%;margin-bottom:20px">
                                                <div style="color:#7b8199;display:inline-block;vertical-align:top;width:50%;width:calc((388.203px - 100%)*388.203);max-width:100%;min-width:50%">Payment Id</div>
                                                <div style="color:#515978;display:inline-block">{{ $payment['id'] }}</div>
                                            </div>
                                            <div style="font-size:14px;line-height:1.5;width:100%;box-sizing:border-box;padding-left:9.3%;margin-bottom:20px">
                                                <div style="color:#7b8199;display:inline-block;vertical-align:top;width:50%;width:calc((388.203px - 100%)*388.203);max-width:100%;min-width:50%">Paid On</div>
                                                <div style="color:#515978;display:inline-block">{{ date('d-m-Y', $payment['created_at']) }}</div>
                                            </div>
                                            <div style="font-size:14px;line-height:1.5;width:100%;box-sizing:border-box;padding-left:9.3%;margin-bottom:20px">
                                                <div style="color:#7b8199;display:inline-block;vertical-align:top;width:50%;width:calc((388.203px - 100%)*388.203);max-width:100%;min-width:50%">Method</div>
                                                <div style="color:#515978;display:inline-block">
                                                    <div style="color:#7b8199">{{ $payment['method'] }}</div>
                                                </div>
                                            </div>
                                            <div style="font-size:14px;line-height:1.5;width:100%;box-sizing:border-box;padding-left:9.3%;margin-bottom:20px">
                                                <div style="color:#7b8199;display:inline-block;vertical-align:top;width:50%;width:calc((388.203px - 100%)*388.203);max-width:100%;min-width:50%">Email Id</div>
                                                <div style="color:#515978;display:inline-block">
                                                    <div style="color:#7b8199">{{ $payment['email'] }}</div>
                                                </div>
                                            </div>
                                            <div style="font-size:14px;line-height:1.5;width:100%;box-sizing:border-box;padding-left:9.3%">
                                                <div style="color:#7b8199;display:inline-block;vertical-align:top;width:50%;width:calc((388.203px - 100%)*388.203);max-width:100%;min-width:50%">Mobile Number</div>
                                                <div style="color:#515978;display:inline-block">{{ $payment['contact'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    For any service related queries, please contact Best Legal Services support.
                </div>
            </div>
        </div>
        <div class="_footer">
            <p>Having trouble? <a href="{{ route('contact') }}">Contact us</a> </p>
            <a class="btn" href="{{ route('home') }}">Back to Home</a>
        </div>
    </div>
</body>

</html>
