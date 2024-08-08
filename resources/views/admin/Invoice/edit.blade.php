@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.invoices.update') }}</div>
    </div>
    <!--end breadcrumb-->

    <!--List View-->
    <div class="card border shadow-none">
        <form action="{{ route('admin.invoice.update', $getInvoiceData->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                        <h5 class="mb-0">Invoice No.: #{{ $getInvoiceData->inv_id }}</h5>
                        <input type="hidden" name="inv_no" value="{{ $getInvoiceData->inv_id }}">
                    </div>
                    <div class="col-12 col-lg-6 text-md-end d-flex justify-content-end align-items-start">
                        @if ($getInvoiceData->payment_status == 'UnPaid')
                            <h6 class="status-changed-danger me-3">{{ $getInvoiceData->payment_status }}</h6>
                        @else
                            <h6 class="status-changed-success me-3">{{ $getInvoiceData->payment_status }}</h6>
                        @endif
                        <button type="submit" class="btn btn-primary px-4">{{ trans('admin.buttons.update') }}</button>
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
                            <input type="hidden" name="staticData" value="Bizhelp Solutions Private Limited</strong><br>
                                Plot No. 359, Sector-28, DLF-1<br>
                                Gurgaon, Haryana, India- 122002<br>
                                Phone: +91 9512347365<br>
                                CIN: U74999HR2020PTC084890<br>
                                PAN : AAICB8735E">
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <small>to</small>
                            <address class="mb-5">
                                <strong class="text-inverse">
                                    <div class="row">
                                        <div class="col-10">
                                            <select class="multiple-select" name="cust_name" data-placeholder="Choose Customer">
                                                <option value="" readonly>Select Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}" @if ($customer->id == $getInvoiceData->customer_user_id) selected @endif>{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <a href="{{ route('admin.Customer.create') }}" class="btn btn-primary">{{ trans('admin.buttons.add') }}</a>
                                        </div>
                                    </div>
                                </strong><br>
                                <textarea name="add" class="form-control" placeholder="Address" cols="20" rows="5" spellcheck="true">{{ $getInvoiceData->address }}</textarea>
                            </address>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">Date:
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d', strtotime($getInvoiceData->inv_date)) }}">
                        </div>
                        <div class="mb-3">Invoice No.:
                            <b>#{{ $getInvoiceData->inv_id }}</b>
                        </div>
                        <div class="mb-3">Customer Gst No.:
                            <input id="gst" type="text" name="gst" value="{{ $getInvoiceData->gst }}" class="form-control" placeholder="Gst No.">
                        </div>
                        <div class="mb-3">Ticket:
                            <select class="multiple-select" name="tkt_id" data-placeholder="Choose Ticket">
                                <option value="" readonly>Select Ticket</option>
                                @foreach ($tickets as $ticket)
                                    <option value="{{ $ticket->id }}" @if ($ticket->id == $getInvoiceData->tkt_id) selected @endif>#{{ $ticket->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a class="btn btn-primary my-1 dynamicPlus" style="float:right" id="dynamicRow"><i class="bi bi-plus-lg me-2"></i></a>
                    <table class="table table-invoice add_rmv_row" id="dynamic_field">
                        <thead>
                            <tr>
                                <th>SERVICE</th>
                                <th>Description</th>
                                <th class="text-end" width="20%">AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $srvName = json_decode($getInvoiceData->service_name);
                                $srvDesc = json_decode($getInvoiceData->service_desc);
                                $srvPrice = json_decode($getInvoiceData->inv_amt);
                            @endphp
                            @foreach ($srvName as $key => $item)
                            @php
                                $serName = App\Models\Service::select('id', 'ser_name')
                                    ->where('id', $item)
                                    ->get();
                            @endphp
                            <tr>
                                <td class="col-md-2">
                                    <span class="text-inverse">
                                        <select class="form-control multiple-select" name="srv_name[]" data-placeholder="Choose Service">
                                            <option value="" readonly>Select Service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}" @if ($service->id == $item) selected @endif>{{ $service->ser_name }}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </td>
                                <td class="col-md-8">
                                    <small>
                                        <input class="form-control" type="text" placeholder="Service Description" name="srv_desc[]" value="{{ $srvDesc[$key] }}">
                                    </small>
                                </td>
                                <td class="col-md-2 text-end">
                                    <input type="text" class="form-control txtCalc" name="inv_amt[]" placeholder="Amount" value="{{ $srvPrice[$key] }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="align-items-center m-0 row">
                    <div class="col col-auto me-auto">
                        <div class="mb-3">Payment via Razorpay :
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rzpConfirm" value="1" id="rzpYes" {{ $getInvoiceData->pay_via_rzpay == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="rzpYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rzpConfirm" value="0" id="rzpNo" {{ $getInvoiceData->pay_via_rzpay == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="rzpNo">No</label>
                            </div>
                        </div>
                        @error('rzpConfirm')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row bg-light align-items-center mb-2">
                    <div class="col col-auto me-auto p-4"></div>
                    <div class="col bg-dark col-auto py-2">
                        <p class="mb-0 text-white">TOTAL :
                            <label class="text-white" id="total_sum_value"><i class="bx bx-rupee"></i>{{ $getInvoiceData->inv_total_amt }}</label>
                            <input type="hidden" id="hidden_total_sum" name="tot_amt" value="{{ $getInvoiceData->inv_total_amt }}">
                        </p>
                    </div>
                </div>
                <!--end row-->
                @if (!empty($getInvoiceData->rzpayUrl))
                    <p>Razorpay Payment Url : <b><span id="copyclip">{{ ($getInvoiceData->rzpayUrl) }}</span></b>
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
                            <input type="hidden" name="terms_condi" value="<ol>
                                <li>All fees for purchased services shall be due and payable in advance</li>
                                <li>Please quote invoice number when remitting funds in the bank account.</li>
                            </ol>">
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
                                        <strong>Bank Address :</strong> SURAT RING ROAD Branch <br>
                                        Shree Shyam Chambers, Ring Road Surat - 395002
                                    </p>
                                    <input type="hidden" name="staticBankData" value="<strong>Acc No :</strong> 624605504530 <br>
                                        <strong>Acc Holder Name :</strong> BIZHELP SOLUTIONS PRIVATE LIMITED <br>
                                        <strong>IFSC Code :</strong> ICIC0006246 <br>
                                        <strong>Bank Name :</strong> ICICI Bank <br>
                                        <strong>Bank Address :</strong> SURAT RING ROAD Branch <br>
                                        Shree Shyam Chambers, Ring Road Surat - 395002">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end invoice-note -->
            </div>
        </form>
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
<script type="text/javascript">
    $(document).ready(function() {
        var i = 1;

        $('#dynamicRow').click(function() {
            i++;
            $('.add_rmv_row').append('<tr id="row' + i + '" class="dynamic-added"><td class="col-md-2"><span class="text-inverse"><select class="form-control multiple-select" name="srv_name[]" data-placeholder="Choose Service"><option value="" readonly>Select Service</option>@foreach ($services as $service)<option value="{{ $service->id }}" @if ($service->id == $getInvoiceData->service_name) selected @endif>{{ $service->ser_name }}</option>@endforeach </select></span><br><td class="col-md-8"><small><input class="form-control" type="text" placeholder="Service Description" name="srv_desc[]"></small></td><td class="col-md-2 text-end"><input type="text" class="form-control txtCalc" name="inv_amt[]" placeholder="Amount" value=""><a id="' + i + '" class="btn btn-danger btn_remove mt-2"><i class="bx bx-minus"></i></a></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        $("#dynamic_field").on('input', '.txtCalc', function() {
            var calculated_total_sum = 0;
            $("#dynamic_field .txtCalc").each(function() {
                var get_textbox_value = $(this).val();
                if ($.isNumeric(get_textbox_value)) {
                    calculated_total_sum += parseFloat(get_textbox_value);
                }
            });
            $("#total_sum_value").html('<i class="bx bx-rupee"></i>' + calculated_total_sum);
            $("#hidden_total_sum").val(calculated_total_sum);
        });
    });
</script>