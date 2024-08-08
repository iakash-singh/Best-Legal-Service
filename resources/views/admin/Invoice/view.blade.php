@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.invoices.view') }}</div>
    </div>
    <!--end breadcrumb-->

    <!--List View-->
    <div class="card border shadow-none">
        <div class="card-header py-3">
            <div class="row align-items-center g-3">
                <div class="col-12 col-lg-6">
                    <h5 class="mb-0">Invoice No.: #{{ $fetchData->inv_id }}</h5>
                </div>
                <div class="col-12 col-lg-6 text-md-end d-flex justify-content-end align-items-center">
                    @if ($fetchData->payment_status == 'UnPaid' || $fetchData->payment_status == 'Cancelled')
                        <h6 class="status-changed-danger me-3">{{ $fetchData->payment_status }}</h6>
                    @else
                        <h6 class="status-changed-success me-3">{{ $fetchData->payment_status }}</h6>
                    @endif
                    Export :
                <a href="{{ route('admin.generate.pdf', $fetchData->id) }}" target="_blank"><i class="bx bxs-file-pdf me-2 font-30 text-danger"></i></a>
                </div>
            </div>
        </div>
        <div class="card-header py-2 bg-light">
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col">
                    <div class="">
                        <small>from</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">Bizhelp Solutions Private Limited</strong><br>
                            Plot No. 359, Sector-28, DLF-1<br>
                            Gurgaon, Haryana, India- 122002<br>
                            Phone: +91 9512347365<br>
                            CIN: U74999HR2020PTC084890<br>
                            PAN : AAICB8735E
                        </address>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <small>to</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">
                                {{ Str::upper($fetchData->cust_name) }}
                            </strong><br>
                            {{ Str::upper($fetchData->address) }}
                        </address>
                    </div>
                </div>
                <div class="col">
                    <div>Date:
                        <b>
                            {{ date('d/m/y', strtotime($fetchData->inv_date)) }}
                        </b>
                    </div>
                    <div class="invoice-detail">
                        Invoice No.: <b>#{{ $fetchData->inv_id }}</b><br>
                        Customer Gst No.: <b>{{ Str::upper($fetchData->gst) }}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Service Description</th>
                            <th style="text-align:right" width="20%">Amount</th>
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
                                <td class="col-md-2"><span class="text-inverse">{{ $serName->ser_name }}</span></td>
                                <td class="col-md-8"><span class="text-inverse"><small>{{ $srvDesc[$key] }}</small></span></td>
                                <td style="text-align:right">Rs. {{ $srvPrice[$key] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row bg-light align-items-center mb-2">
                <div class="col col-auto me-auto p-4"></div>
                <div class="col bg-dark col-auto py-2">
                    <p class="mb-0 text-white">TOTAL :
                        <label class="text-white">Rs. {{ $fetchData->inv_total_amt }}</label>
                    </p>
                </div>
            </div>

            @if (!empty($fetchData->rzpayUrl))
                <p>Razorpay Payment Url : <b><span id="copyclip">{{ ($fetchData->rzpayUrl) }}</span></b>
                </p>
            @else
                <p>Payment Method : <b><span id="copyclip">Manual Payment</span></b></p>
            @endif
            <hr>
            <div class="row">
                <div class="col-6 border-right">
                    <div class="my-3">
                        <strong class="m-3">Terms and Conditions :</strong>
                        <ol>
                            <li>All fees for purchased services shall be due and payable in advance</li>
                            <li>Please quote invoice number when remitting funds in the bank account.</li>
                        </ol>
                    </div>
                </div>
                <div class="col-6">
                    <div class="my-3">
                        <div class="card border shadow-none bg-warning radius-10">
                            <div class="card-body">
                                <h5 class="mb-3">Bank Details</h5>
                                <p><strong>Acc No :</strong> 624605504530 <br>
                                    <strong>Acc Holder Name :</strong> BIZHELP SOLUTIONS PRIVATE LIMITED <br>
                                    <strong>IFSC Code :</strong> ICIC0006246 <br>
                                    <strong>Bank Name :</strong> ICICI Bank <br>
                                    <strong>Bank Address :</strong> SURAT RING ROAD Branch, Shree Shyam Chambers, Ring Road Surat - 395002
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer py-3">
            <p class="text-center mb-2">
                THANK YOU FOR YOUR BUSINESS
            </p>
            <p class="text-center d-flex align-items-center gap-3 justify-content-center mb-0">
                <span class=""><a href="{{ route('home') }}"><i class="bi bi-globe"></i> bestlegalservices.in</a></span>
                <span class=""><a href="tel:+91 9512347365"><i class="bi bi-telephone-fill"></i> T:+91 9512347365</a></span>
                <span class=""><a href="mailto:enquiry@bestlegalservices.in"><i class="bi bi-envelope-fill"></i> enquiry@bestlegalservices.in</a></span>
            </p>
        </div>
    </div>
    <!--end list view-->
</main>

@include('admin.Master.footer')
