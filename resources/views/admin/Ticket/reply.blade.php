@include('admin.Master.header')

<main class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.tickets.reply') }}</div>
        <div class="ms-auto">
            {{-- @can('role-create') --}}
            <div class="btn-group">
                <a href="{{ route('admin.ticket.getInvoice', [$reply->id, $reply->customer_user_id]) }}" class="btn btn-primary">{{ trans('admin.buttons.genInv') }}</a>
            </div>
            {{-- @endcan --}}
        </div>
    </div>
    <div class="row">
        <div class="col py-2">
            <div class="card border-primary radius-15">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">
                        <div class="col">
                            <div class="card border shadow-none radius-10 mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="info">
                                            <p class="mb-1"><b>Ticket Id :</b> #{{ $reply->id }}</p>
                                            <p class="mb-1"><b>Name :</b> {{ $reply->users->name }}</p>
                                            <p class="mb-1"><b>Email :</b> {{ $reply->users->email }}</p>
                                            @foreach ($reply->services as $item)
                                                <p class="mb-1"><b>Service Name:</b> {{ $item->ser_name }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border shadow-none radius-10 mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="info">
                                            <p class="mb-1"><b>Add :</b>
                                                {{ $reply->users->add1 ? $reply->users->add1 : '-' }}
                                                {{ $reply->users->add2 ? $reply->users->add2 : '-' }}
                                            </p>
                                            <p class="mb-1"><b>Country :</b> {{ $reply->users->country ? $reply->users->country : '-' }}</p>
                                            <p class="mb-1"><b>State :</b> {{ $reply->users->state ? $reply->users->state : '-' }}</p>
                                            <p class="mb-1"><b>City :</b> {{ $reply->users->city ? $reply->users->city : '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border shadow-none radius-10 mb-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="info">
                                            <p class="mb-1"><b>Gst :</b> {{ $reply->users->gst ? $reply->users->gst : '-' }}</p>
                                            <p class="mb-1"><b>Alt. Mobile :</b> {{ $reply->users->alt_mobile ? $reply->users->alt_mobile : '-' }}</p>
                                            <p class="mb-1"><b>Mobile :</b> {{ $reply->users->mobile ? $reply->users->mobile : '-' }}</p>
                                            <p class="mb-1"><b>Created at :</b> {{ $reply->users->created_at->format('d/m/Y g:i A') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chat-timeline container py-5">
        <div class="row">
            <div class="col-12 py-2">
                <div class="card border-primary radius-15">
                    <div class="card-body">
                        <div class="d-flex text-muted mb-2">
                            <span class="card-title text-muted mx-1"></span>
                            {{ $reply->created_at->format('d-m-Y g:i A') }}
                        </div>
                        <div class="chat-timeline1">
                            <div class="card-text">
                                <p style="white-space: pre-line;">{!! htmlspecialchars_decode($reply->cust_desc) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat1"></div>
    </div>
    <div class="align-items-center container d-flex py-5">
        <div class="flex-grow-1 pe-2">
            <textarea class="form-control chat_msg" name="chat" placeholder="Type a message"></textarea>
        </div>
        <div class="chat-footer-menu">
            <form enctype="multipart/form-data" method="POST" id="image-upload">
                @csrf
                <a class="file-send">
                    <label for="chat_file">
                        <i class='bx bx-upload'></i>
                    </label>
                    <input type="file" id="chat_file" class="d-none file_send" name="file">
                </a>
                <a class="chat-send"><i class='bx bxs-send'></i></a>
            </form>
        </div>
    </div>
</main>
<input type="hidden" name="tkt_id" class="cl_tktid" value="{{ $reply->id }}" />
<input type="hidden" name="user_id" class="cl_userid" value="{{ $reply->user_id == null ? $reply->admin_id : $reply->user_id }}" />
<input type="hidden" name="admin_id" class="admin_id" value="{{ $reply->admin_id }}" />
<input type="hidden" name="cust_user_id" class="cl_custuserid" value="{{ $reply->customer_user_id }}" />

@include('admin.Master.footer')

<script>
    $(document).ready(function() {
        $('.chat-send').on('click', function() {
            var fileData = $('#chat_file')[0].files;
            var data = new FormData();
            if (fileData.length == 0) {
                data.append('file', '');
            } else {
                data.append('file', fileData[0]);
            }

            data.append('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            data.append('tkt_id', $('.cl_tktid').val());
            data.append('user_id', $('.cl_userid').val());
            data.append('cust_user_id', $('.cl_custuserid').val());
            data.append('chat_msg', $('.chat_msg').val());
            data.append('admin_id', $('.admin_id').val());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/admin/Ticket/replyTo/",
                data: data,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    chatMsg();
                }
            });
        });
        chatMsg();

        function chatMsg() {
            var data = {
                'tkt_id': $('.cl_tktid').val(),
                'user_id': $('.cl_userid').val(),
                'cust_user_id': $('.cl_custuserid').val(),
                'admin_id': $('.admin_id').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('admin.ticket.getMsgs') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    $('.chat_msg').val('');
                    var html = '';
                    var data = response.data;
                    for (var i = 0; i < data.length; i++) {
                        var date = new Date(data[i].created_at);

                        function formatAMPM(date) {
                            var hours = date.getHours();
                            var minutes = date.getMinutes();
                            var ampm = hours >= 12 ? 'PM' : 'AM';
                            hours = hours % 12;
                            hours = hours ? hours : 12;
                            minutes = minutes < 10 ? '0' + minutes : minutes;
                            var strTime = hours + ':' + minutes + ' ' + ampm;
                            return strTime;
                        }

                        var myimg = '';
                        var mymessage = '';
                        if (data[i].file != null || data[i].file != '') {
                            myimg = '<a href="/images/ChatFile/' + data[i].file + '" download="' + data[i].file + '"><img width="150px" src="/images/ChatFile/' + data[i].file + '" alt="' + data[i].file + '"></a>';
                        }

                        if (data[i].message != null || data[i].message != '') {
                            mymessage = (data[i].message) ? data[i].message : '';
                        }

                        if (data[i].type == "customer") {
                            html += '<div class="row"><div class="col-12 py-2"><div class="card border-primary radius-15"><div class="card-body"><div class="d-flex justify-content-start text-muted mb-2"><span class="card-title text-muted mx-1"></span>' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + date.getFullYear() + ', ' + formatAMPM(date) + '</div><div class="chat-timeline1"><div class="card-text">' + myimg + '<p style="white-space: pre-line;margin-bottom: auto;">' + mymessage + '</p></div></div></div></div></div></div>';
                        }

                        if (data[i].type == "user") {
                            html += '<div class="row justify-content-end"><div class="col-12 py-2"><div class="card border-primary radius-15"><div class="card-body"><div class="d-flex justify-content-between"><span class="card-title text-muted mx-2">' + data[i].user_name + '</span><div class="text-muted">' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + date.getFullYear() + ', ' + formatAMPM(date) + '</div></div><div class="chat-timeline1"><div class="card-text">' + myimg + '<p style="white-space: pre-line;margin-bottom: auto;">' + mymessage + '</p></div></div></div></div></div></div>';
                        }
                    }
                    $('.chat1').html(html);
                }
            });
        }
    });
</script>
