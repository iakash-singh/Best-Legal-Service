@include('front.customer.layouts.header')
<main class="page-content" style="margin-left: 0px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="menu-ticket">
                            <div class="pull-left">
                                <ul class="nav nav-tabs nav-warning" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#active" role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-title">Active Tickets</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link completed" data-bs-toggle="tab" href="#completed" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-title">Completed Tickets</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link all" data-bs-toggle="tab" href="#all" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-title">All Tickets</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <button data-bs-target="#create_ticket" data-bs-toggle="modal" class="btn btn-primary"
                                        title="Create New Ticket"><span class="icon">+</span><span
                                          class="title">
                                        Create Ticket</span></button>
                            </div>
                        </div>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active activeTab" id="active" role="tabpanel">
                            </div>
                            <div class="tab-pane fade completeTab" id="completed" role="tabpanel"></div>
                            <div class="tab-pane fade allTab" id="all" role="tabpanel"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Add Modal-->
    <div class="modal" id="create_ticket" tabindex="-1" aria-hidden="true" aria-labelledby="AddTicketModalLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddTicketModalLabel">Create New Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="save_msgList"></ul>
                    <label class="form-label">States <span class="text-danger">*</span></label>
                    <div class="form-group my-1">
                        <select name="state_select" class="form-select state_select">
                            <option value="Select States" readonly>Select States</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                    <label class="form-label">Service <span class="text-danger">*</span></label>
                    <div class="form-group my-1">
                        <select name="service_select" class="form-select service_select">
                            <option value="Select Service" readonly>Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->ser_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="form-label">Short Description <span class="text-danger">*</span></label>
                    <div class="form-group my-1">
                        <textarea name="s_desc" class="form-control summernote desc" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary add_ticket" data-dismiss="modal" aria-label="Close">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<!--start overlay-->
<div class="overlay nav-toggle-icon"></div>
<!--end overlay-->

<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol']],
            ]
        });

        fetchActiveTickets();

        function fetchActiveTickets() {
            $.ajax({
                type: "GET",
                url: "{{ route('customer.helpdesk.dashboard.fetchActiveTickets') }}",
                dataType: "json",
                success: function(response) {
                    var html = '';
                    $.each(response, function(key, item) {
                        html += '<div class="border-2 card"><div class="card-body"><h4 class="card-title my-4"><div class="pull-right" style="width: 121.078px; height: 20px;"><div class="milestone-status status-success">' + item.status + '</div></div><div class="pull-left">';
                        var service = item.services;
                        for (let i = 0; i < service.length; i++) {
                            var date = new Date(item.created_at);
                            var cHour = date.getHours();
                            var cMin = date.getMinutes();
                            html += '<div class="milestone-status-id status-success">' + '#' + item.id + '</div><div class="milestone-status-date status-success">' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + date.getFullYear() + '</div><a title="View Ticket" href="/helpdesk/customer/viewTicket/' + item.id + '">' + service[i].ser_name + '</a>';
                        }
                        html += '</div></h4></div></div>';
                    });
                    $('.activeTab').html(html);
                }
            });
        }

        $('.add_ticket').on('click', function(e) {
            e.preventDefault();
            var data = {
                'state_select': $('.state_select').val(),
                'service_select': $('.service_select').val(),
                's_desc': $('.desc').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/helpdesk/customer/createTicket",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert-danger');
                        $.each(response.errors, function(key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('#create_ticket').modal('show');
                        $('.state_select').focus();
                    } else {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert-success');
                        $('#save_msgList').html(response.message);
                        $(this).find("input,select").val('');
                        $('.summernote').summernote('reset');
                        $('#save_msgList').html('');
                        $('#create_ticket').modal('hide');
                        fetchActiveTickets();
                    }
                }
            });
        });

        $('.completed').on('click', function(e) {
            $.ajax({
                type: "GET",
                url: "{{ route('customer.helpdesk.dashboard.fetchCompletedTickets') }}",
                dataType: "json",
                success: function(response) {
                    var html = '';
                    $.each(response, function(key, item) {
                        html = '<div class="border-2 card"><div class="card-body"><h4 class="card-title my-4"><div class="pull-right" style="width: 121.078px; height: 20px;"><div class="milestone-status status-success">' + item.status + '</div></div><div class="pull-left">';
                        var service = item.services;
                        for (let i = 0; i < service.length; i++) {
                            var date = new Date(item.created_at);
                            var cHour = date.getHours();
                            var cMin = date.getMinutes();
                            html += '<div class="milestone-status-id status-success">' + '#' + item.id + '</div><div class="milestone-status-date status-success">' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + date.getFullYear() + '</div><a title="View Ticket" href="/helpdesk/customer/viewTicket/' + item.id + '">' + service[i].ser_name + '</a>';
                        }
                        html += '</div></h4></div></div>';
                    });
                    $('.completeTab').html(html);
                }
            });
        });

        $('.all').on('click', function(e) {
            $.ajax({
                type: "GET",
                url: "{{ route('customer.helpdesk.dashboard.fetchAllTickets') }}",
                dataType: "json",
                success: function(response) {
                    var html = '';
                    $.each(response, function(key, item) {
                        html += '<div class="border-2 card"><div class="card-body"><h4 class="card-title my-4"><div class="pull-right" style="width: 121.078px; height: 20px;"><div class="milestone-status status-success">' + item.status + '</div></div><div class="pull-left">';
                        var service = item.services;
                        for (let i = 0; i < service.length; i++) {
                            var date = new Date(item.created_at);
                            var cHour = date.getHours();
                            var cMin = date.getMinutes();
                            html += '<div class="milestone-status-id status-success">' + '#' + item.id + '</div><div class="milestone-status-date status-success">' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + date.getFullYear() + '</div><a title="View Ticket" href="/helpdesk/customer/viewTicket/' + item.id + '">' + service[i].ser_name + '</a>';
                        }
                        html += '</div></h4></div></div>';
                    });
                    $('.allTab').html(html);
                }
            });
        });
    });
</script>
@include('front.customer.layouts.footer')
