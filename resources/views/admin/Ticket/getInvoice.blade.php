@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.tickets.invDetail') }}</div>
        <div class="ms-auto">
            <div class="btn-group">
                {{-- <a href="{{ route('admin.invoice.generate', $fetchCustData->id) }}" class="btn btn-primary">Save</a> --}}
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <!--List View-->
    <div class="card border shadow-none">
        <form action="{{ route('admin.invoice.generate', [$fetchCustData->id, $custid]) }}" method="POST">
            @csrf
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                        <h5 class="mb-0">Invoice No.: #{{ $inv_id }}</h5>
                    </div>
                    <div class="col-12 col-lg-6 text-md-end">
                        <button class="btn btn-primary px-4">{{ trans('admin.buttons.save') }}</button>
                    </div>
                </div>
            </div>
            <div class="card-header py-2 bg-light">
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                        <div class="">
                            <small>from</small>
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse">
                                    Bizhelp Solutions Private Limited</strong><br>
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
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse">
                                    <input type="text" name="name" class="form-control" placeholder="Customer Name" value="{{ $fetchCustData->users->name }}">
                                </strong><br>
                                <textarea name="add" class="form-control" placeholder="Address" cols="20" rows="5" spellcheck="true">{{ old('add', $fetchCustData->users->add1 != null ? $fetchCustData->users->add1 : '') }} &#13;&#10;&#13;&#10;{{ old('add', $fetchCustData->users->add2 != null ? $fetchCustData->users->add2 : '') }} &#13;&#10;&#13;&#10;Country: {{ old('add', $fetchCustData->users->country != null ? $fetchCustData->users->country : '') }} &#13;&#10;State: {{ old('add', $fetchCustData->users->state != null ? $fetchCustData->users->state : '') }} &#13;&#10;City: {{ old('add', $fetchCustData->users->city != null ? $fetchCustData->users->city : '') }}</textarea>
                            </address>
                        </div>
                    </div>
                    <div class="col">
                        <div class="">Date:
                            <b>{{ $fetchCustData->created_at->format('d/m/y') }}</b>
                            <input type="hidden" name="inv_date" value="{{ $fetchCustData->created_at->format('d/m/y') }}">
                        </div>
                        <div class="invoice-detail">
                            Invoice No.: <b>#{{ $inv_id }}</b><br>
                            <input type="hidden" name="inv_id" value="{{ $inv_id }}">
                            Customer Gst No.: {{ $fetchCustData->users->gst }}
                            <input type="hidden" name="gst" value="{{ $fetchCustData->users->gst }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a class="btn btn-primary mt-1" id="dynamicRow" style="float:right"><i class="bi bi-plus-lg me-2"></i></a>
                    <table class="table table-invoice add_rmv_row" id="dynamic_field">
                        <thead>
                            <tr>
                                <th>SERVICE</th>
                                <th>Description</th>
                                <th class="text-end" width="20%">AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-2">
                                    <span class="text-inverse">
                                        <select class="form-control multiple-select" name="srv_name[]" data-placeholder="Choose Service">
                                            <option value="" readonly>Select Service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->ser_name }}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </td>
                                <td class="col-md-8">
                                    <small>
                                        <input class="form-control" type="text" placeholder="Service Description" name="srv_desc[]">
                                    </small>
                                </td>
                                <td class="text-end">
                                    <input type="text" class="form-control txtCalc" name="inv_amt[]" placeholder="Amount">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="align-items-center m-0 row">
                    <div class="col col-auto me-auto">
                        <div class="mb-3">Payment via Razorpay :
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rzpConfirm" value="1" id="rzpYes">
                                <label class="form-check-label" for="rzpYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rzpConfirm" value="0" id="rzpNo">
                                <label class="form-check-label" for="rzpNo">No</label>
                            </div>
                        </div>
                        @error('rzpConfirm')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row bg-light align-items-center m-0">
                    <div class="col col-auto me-auto p-4"></div>
                    <div class="col bg-dark col-auto py-2">
                        <p class="mb-0 text-white">TOTAL :
                            <label class="text-white" id="total_sum_value"></label>
                            <input type="hidden" id="hidden_total_sum" name="tot_amt" value="">
                        </p>
                    </div>
                </div>
                <!--end row-->

                <hr>
                <!-- begin invoice-note -->
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
                            {{-- <textarea id="editor" name="terms_condi" cols="30" rows="10" class="form-control mt-2 ckeditor" placeholder="Terms and Conditions here..."></textarea> --}}
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
            $('.add_rmv_row').append('<tr id="row' + i + '" class="dynamic-added"><td class="col-md-2"><span class="text-inverse"><select class="form-control multiple-select" name="srv_name[]" data-placeholder="Choose Service"><option value="" readonly>Select Service</option>@foreach ($services as $service)<option value="{{ $service->id }}">{{ $service->ser_name }}</option>@endforeach</select></span></td><td class="col-md-8"><small><input class="form-control" type="text" placeholder="Service Description" name="srv_desc[]"></small></td><td class="text-end"><input type="text" class="form-control txtCalc" name="inv_amt[]" placeholder="Amount"><a id="' + i + '" class="btn btn-danger btn_remove mt-4">X</a></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        $('#total_sum_value').html('<i class="bx bx-rupee"></i>0.00');
        $("#dynamic_field").on('input', '.txtCalc', function() {
            var calculated_total_sum = 0;
            $("#dynamic_field .txtCalc").each(function() {
                var get_textbox_value = $(this).val();
                if ($.isNumeric(get_textbox_value)) {
                    calculated_total_sum += parseFloat(get_textbox_value);
                }
            });
            $("#total_sum_value").html('<i class="bx bx-rupee"></i>' + calculated_total_sum.toFixed(2));
            $("#hidden_total_sum").val(calculated_total_sum.toFixed(2));
        });
    });
</script>
