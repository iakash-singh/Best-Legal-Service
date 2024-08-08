<!doctype html>
<html lang="en" class="light-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="{{ asset('assets/front/img/bls-favicon.png" type="image/png') }}" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/icons.css">
    <title>Best Legal Services - {{ trans('admin.invoices.invoicePDF') . ' - #' . $fetchData->inv_id}}</title>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <a href="{{ route('home') }}"><img src="./assets/images/bestlegalservices-logo.png" width="250px" height="60px"></a>
        </div>
        <h1>Invoice Number: #{{ $fetchData->inv_id }}</h1>
        <div id="company" class="clearfix">
            <div class="company_info">
                Date: <b>{{ date('d/m/y', strtotime($fetchData->inv_date)) }}</b><br>
                @if ($fetchData->gst)
                    Customer Gst No: <b>{{ Str::upper($fetchData->gst) }}</b><br>
                @endif
            </div>
        </div>
        <div style="margin-right: 20px;" id="from">
            <div>
                From: <br>
                <b>Bizhelp Solutions Private Limited</b><br>
                Plot No. 359, Sector-28, DLF-1<br>
                Gurgaon, Haryana, India- 122002<br>
                Phone: +91 9512347365<br>
                CIN: U74999HR2020PTC084890<br>
                PAN : AAICB8735E<br>
            </div>
        </div>
        <div style="width:auto;" id="to">
            <div>
                To: <br>
                <b>{{ Str::upper($fetchData->cust_name) }}</b><br>
                {{ Str::upper($fetchData->address) }}<br>
            </div>
        </div>
    </header>
    <main>
        <table border="1">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th class="service">SERVICE NAME</th>
                    <th class="desc">SERVICE DESCRIPTION</th>
                    <th class="amt">AMOUNT (INR)</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $srvName = json_decode($fetchData->service_name);
                    $srvDesc = json_decode($fetchData->service_desc);
                    $srvPrice = json_decode($fetchData->inv_amt);
                @endphp
                @foreach ($srvName as $key => $item)
                    @php
                        $serName = App\Models\Service::select('ser_name')
                            ->where('id', $item)
                            ->first();
                    @endphp
                    <tr>
                        <td style="text-align: center">{{ $loop->iteration }}</td>
                        <td class="service">{{ $serName->ser_name }}</td>
                        <td class="desc">{{ $srvDesc[$key] }}</td>
                        <td class="amt">{{ number_format($srvPrice[$key]) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">{{ number_format($fetchData->inv_total_amt) }}</td>
                </tr>
            </tbody>
        </table>
        @if (!empty($fetchData->rzpayUrl))
            <p>Razorpay Payment Url : <b><span id="copyclip">{{ $fetchData->rzpayUrl }}</span></b>
            </p>
        @else
            <p>Payment Method : <b><span id="copyclip">Manual Payment</span></b></p>
        @endif
        <div id="notices" style="float: left; width: 50%">
            <div><b>Terms and Conditions :</b></div>
            <div class="notice">{!! htmlspecialchars_decode($fetchData->terms_and_condi) !!}</div>
        </div>
        <div id="notices" style="margin-left: 26px; float: left; width: 50%">
            <div><b>Bank Details :</b></div>
            <p><strong>Acc No :</strong> 624605504530 <br>
                <strong>Acc Holder Name :</strong> BIZHELP SOLUTIONS PRIVATE LIMITED <br>
                <strong>IFSC Code :</strong> ICIC0006246 <br>
                <strong>Bank Name :</strong> ICICI Bank <br>
                <strong>Bank Address :</strong> SURAT RING ROAD Branch, Shree Shyam Chambers, Ring Road Surat - 395002
            </p>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="footer">
            <p style="margin-bottom: 20px">THANK YOU FOR YOUR BUSINESS</p>
            <a class="footerLink" href="{{ route('home') }}"> bestlegalservices.in</a>
            <a class="footerLink" href="tel:+91 9512347365"> T:+91 9512347365</a>
            <a class="footerLink" href="mailto:enquiry@bestlegalservices.in"> enquiry@bestlegalservices.in</a>
        </div>
        <p class="footer" style="margin-bottom: 20px; font-weight: bold;">This is a Computer Generated Invoice</p>
    </main>
</body>

</html>
