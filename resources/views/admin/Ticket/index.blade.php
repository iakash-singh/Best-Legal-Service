@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.tickets.title') }}</div>
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
                <div id="status_success"></div>
            </div>
            <div class="table-responsive">
                <div class="status-filter">
                    <select id="statusFilter" class="form-control form-control-sm w-25 ms-3">
                        <option value="">Show All</option>
                        <option value="Opened">Opened</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>
                <table id="filterTable" class="table align-middle table-striped w-100">
                    <thead class="table-secondary">
                        <tr>
                            <th>Ticket Id</th>
                            <th>Customer Name</th>
                            <th>Assign To</th>
                            <th>Assigned</th>
                            <th class="d-none">filterStatus</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ticketList as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->customer_name }}</td>
                                <td><a data-id="{{ $list->id }}" data-bs-target="#assign_tkt" data-bs-toggle="modal" class="btn btn-primary ticket_id" title="Assign Ticket"><span class="title">{{ trans('admin.buttons.assign') }}</span></a></td>
                                <td>
                                    @if (!empty($list->assign_name))
                                        <span class="badge rounded-pill alert-success">{{ $list->assign_name }}</span>
                                    @else
                                        <span>{{ '---' }}</span>
                                    @endif
                                </td>
                                <td class="d-none">{{ $list->status }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input data-id="{{ $list->id }}" class="form-check-input checked_ticket" type="checkbox" data-on="Opened" data-off="Closed" {{ $list->status == 'Opened' ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        @canany(['ticket-create', 'ticket-edit', 'ticket-delete'])
                                            <a href="{{ route('admin.ticket.replyToCustomer', $list->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Reply info" aria-label="Reply To"><i class="fadeIn animated bx bx-message-edit"></i></a>
                                        @endcanany
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">{{ trans('admin.texts.no_data') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!--Add Modal-->
        <div class="modal" id="assign_tkt" tabindex="-1" aria-hidden="true" aria-labelledby="AssignTicketModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AssignTicketModalLabel">Assign Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="hideee" name="data_id" value="">
                        <label class="form-label">Users <span class="text-danger">*</span></label>
                        <div class="form-group my-1">
                            <select name="user_select" class="form-select user_select">
                                <option value="" disabled readonly>Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <span id="textError"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary assign_ticket" data-dismiss="modal"
                                    aria-label="Close">Assign</button>
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
    $("document").ready(function() {

        $("#filterTable").dataTable({
            "searching": true
        });

        //Get a reference to the new datatable
        var table = $('#filterTable').DataTable();

        //Take the category filter drop down and append it to the datatables_filter div.
        //You can use this same idea to move the filter anywhere withing the datatable that you want.
        $("#filterTable_filter.dataTables_filter").append($("#statusFilter"));

        //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
        //This tells datatables what column to filter on when a user selects a value from the dropdown.
        //It's important that the text used here (Category) is the same for used in the header of the column to filter
        var categoryIndex = 0;
        $("#filterTable th").each(function(i) {
            if ($($(this)).html() == "filterStatus") {
                categoryIndex = i;
                return false;
            }
        });

        //Use the built in datatables API to filter the existing rows by the Category column
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var selectedItem = $('#statusFilter').val()
                var category = data[categoryIndex];
                if (selectedItem === "" || category.includes(selectedItem)) {
                    return true;
                }
                return false;
            }
        );

        //Set the change event for the Category Filter dropdown to redraw the datatable each time
        //a user selects a new filter.
        $("#statusFilter").change(function(e) {
            table.draw();
        });

        table.draw();

        $('#filterTable_filter').addClass('d-flex justify-content-end');
    });
</script>
