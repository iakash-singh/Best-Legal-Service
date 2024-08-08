@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.invoices.title') }}</div>
        <div class="ms-auto">
            @can('invoice-create')
                <div class="btn-group">
                    <a href="{{ route('admin.invoice.create') }}" class="btn btn-primary">{{ trans('admin.buttons.addNew') }}</a>
                        <a href="{{ route('admin.invoice.export') }}" class="btn btn-primary mx-1" data-toggle="tooltip" title="Export Invoice"><i class="fadeIn animated bx bx-import"></i> {{ trans('admin.buttons.exportCsv') }}</a>
                </div>
            @endcan
        </div>
    </div>
    <!--end breadcrumb-->

    <!--List View-->
    <div class="card">
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert border-0 bg-light-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-success">{{ Session::get('success') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="ms-3">
                <div class="text-success">
                    <div id="status_success"></div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table align-middle table-striped">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sr No.</th>
                            <th>Invoice No.</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Invoicelist as $list)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>#{{ $list->inv_id }}</td>
                                <td class="productlist">{{ $list->cust_name }}</td>
                                <td>{{ $list->created_at }}</td>
                                <td><h6 class="mb-0 product-title badge rounded-pill alert-success">Rs. {{ $list->inv_total_amt }}</h6></td>
                                <td>{{ $list->payment_type ? $list->payment_type : '--' }}</td>
                                <td>
                                    @if ($list->payment_status == 'UnPaid' || $list->payment_status == 'Cancelled')
                                        <h6 class="mb-0 product-title badge rounded-pill alert-danger">{{ $list->payment_status }}</h6>
                                    @else
                                        <h6 class="mb-0 product-title badge rounded-pill alert-success">{{ $list->payment_status }}</h6>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        @can('invoice-edit')
                                            @if ($list->payment_status == 'UnPaid')
                                                <a href="{{ route('admin.invoice.edit', $list->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit Invoice" class="text-warning"><i class="bi bi-pencil-fill"></i></a>
                                            @endif
                                        @endcan
                                        @can('invoice-list')
                                            <a href="{{ route('admin.invoice.show', $list->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="View Invoice"><i class="bi bi-eye-fill"></i></a>
                                        @endcan
                                        @can('invoice-delete')
                                            @if ($list->payment_status == 'UnPaid')
                                                <form id="delete-form-{{ $list->id }}" action="{{ route('admin.invoice.destroy', $list->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Cancel Invoice" onclick="if(confirm('Are you sure you want to Cancel this Invoice?'))
                                                    {
                                                        event.preventDefault();document.getElementById('delete-form-{{ $list->id }}').submit();
                                                    }else{
                                                        event.preventDefault();}"><i class="lni lni-close"></i></a>
                                                </form>
                                                <a data-id="{{ $list->id }}" data-cust-id="{{ $list->customer_user_id }}" data-price="{{ $list->inv_total_amt }}" data-name="{{ $list->cust_name }}" data-bs-target="#mark_paid" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Mark as Paid" class="inv_id text-warning"><i class="bx bx-rupee"></i></a>
                                            @endif
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">{{ trans('admin.texts.no_data') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!--Add Modal-->
        <div class="modal" id="mark_paid" tabindex="-1" aria-hidden="true" aria-labelledby="MarkAsPaidModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="MarkAsPaidModalLabel">{{ trans('admin.invoices.markAsPaid') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="price" name="price">
                        <input type="hidden" id="inv_id" name="inv_id">
                        <input type="hidden" id="cust_name" name="cust_name">
                        <input type="hidden" id="cust_id" name="cust_id">
                        <label class="form-label">User or Transaction Id <span class="text-danger">*</span></label>
                        <div class="form-group my-1">
                            <input class="form-control" type="text" name="user">
                        </div>
                        <div class="form-group my-3">
                            <label for="amt">Amount</label>
                            <input class="form-control mb-1" type="text" name="amt" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary mark_paid" data-dismiss="modal"
                                    aria-label="Close">Mark as Paid</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end list view-->
</main>

@include('admin.Master.footer')

<script>
    $(document).on("click", ".inv_id", function() {
        var DataId = $(this).data('id');
        var Dataprice = $(this).data('price');
        var Dataname = $(this).data('name');
        var DatacustId = $(this).data('cust-id');
        $(".modal-body #price").val(Dataprice);
        $(".modal-body #inv_id").val(DataId);
        $(".modal-body #cust_name").val(Dataname);
        $(".modal-body #cust_id").val(DatacustId);
        $('#mark_paid').modal('show');
        $("input[name=amt]").val(Dataprice);
        $("input[name=user]").val(Dataname);
    });

    $('.mark_paid').on('click', function(e) {
        e.preventDefault();
        var data = {
            'invc_id': $('input[name=inv_id]').val(),
            'invc_user': $('input[name=user').val(),
            'invc_amt': $('input[name=amt').val(),
            'invc_cust_id': $('input[name=cust_id').val()
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/admin/Invoice/InvoicePaid/",
            data: data,
            dataType: "json",
            success: function(response) {
                $('#status_success').addClass('alert border-0 bg-light-success alert-dismissible fade show py-2');
                $('#status_success').text(response.success);
                $('#mark_paid').modal('hide');
                location.reload();
            }
        });
    });
</script>
