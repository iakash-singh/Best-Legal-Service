@include('front.customer.layouts.header')
<!--start content-->
<main style="margin-top: 82px; padding:1.5rem">
    <div class="card border-primary radius-15">
        <div class="card-body">
            <div class="row mb-3">
                <div class="pull-right">
                    <a href="{{ route('customer.helpdesk.dashboard') }}" class="btn btn-primary" title="Back to Dashboard"><span class="title">Back</span></a>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">
                <div class="col">
                    <div class="card border shadow-none radius-10 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="info">
                                    <p class="mb-1"><b>Ticket Id :</b> #{{ $fetchTkt->id }}</p>
                                    <p class="mb-1"><b>Name :</b> {{ $fetchTkt->users->name }}</p>
                                    <p class="mb-1"><b>Email :</b> {{ $fetchTkt->users->email }}</p>
                                    @foreach ($fetchTkt->services as $item)
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
                                        {{ $fetchTkt->users->add1 ? $fetchTkt->users->add1 : '-' }}
                                        {{ $fetchTkt->users->add2 ? $fetchTkt->users->add2 : '-' }}
                                    </p>
                                    <p class="mb-1"><b>Country :</b> {{ $fetchTkt->users->country ? $fetchTkt->users->country : '-' }}</p>
                                    <p class="mb-1"><b>State :</b> {{ $fetchTkt->users->state ? $fetchTkt->users->state : '-' }}</p>
                                    <p class="mb-1"><b>City :</b> {{ $fetchTkt->users->city ? $fetchTkt->users->city : '-' }}</p>
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
                                    <p class="mb-1"><b>Gst :</b> {{ $fetchTkt->users->gst ? $fetchTkt->users->gst : '-' }}</p>
                                    <p class="mb-1"><b>Alt. Mobile :</b> {{ $fetchTkt->users->alt_mobile ? $fetchTkt->users->alt_mobile : '-' }}</p>
                                    <p class="mb-1"><b>Mobile :</b> {{ $fetchTkt->users->mobile ? $fetchTkt->users->mobile : '-' }}</p>
                                    <p class="mb-1"><b>Created at :</b> {{ $fetchTkt->created_at->format('d/m/Y g:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chat-timeline container py-5">
        <h2 class="font-weight-light text-center text-muted py-3"></h2>
        <div class="chatStatic">
            <div class="row justify-content-end">
                <div class="col-12 py-2">
                    <div class="card border-primary radius-15">
                        <div class="card-body">
                            <div class="d-flex">
                                <span class="card-title text-muted mx-1">You, </span>
                                <div class="text-muted">
                                    {{ $fetchTkt->created_at->format('d-m-Y g:i A') }}
                                </div>
                            </div>
                            <div class="chat-timeline1">
                                <div class="card-text">
                                    <p style="white-space: pre-line;margin-bottom: auto;">{!! htmlspecialchars_decode($fetchTkt->cust_desc) !!}</p>
                                </div>
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
            <div class="chatpreimg"></div>
            <div class="input-group mt-2">
                <textarea class="form-control chat_msg" name="chat" placeholder="Type a message"></textarea>
            </div>
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
<input type="hidden" name="tkt_id" class="cl_tktid" value="{{ $fetchTkt->id }}" />
<input type="hidden" name="user_id" class="cl_userid" value="{{ $fetchTkt->user_id == null ? $fetchTkt->admin_id : $fetchTkt->user_id }}" />
<input type="hidden" name="admin_id" class="cl_adminid" value="{{ $fetchTkt->admin_id }}" />
<input type="hidden" name="cust_user_id" class="cl_custuserid" value="{{ auth()->user()->id }}" />
<!--end page main-->
@include('front.customer.layouts.footer')
<script>
    $(document).ready(function() {
        chat_file.onchange = evt => {
            const [file] = chat_file.files;
            if (file) {
                $('.chatpreimg').html('<img src="'+URL.createObjectURL(file)+'" id="imgSrc" width="250px" height="150px">');
            }
        }
        $('.chat-send').on('click', function() {
            var data = new FormData();
            if ($('#chat_file')[0].files.length > 0) {
                var fileData = $('#chat_file')[0].files;
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp', 'doc', 'docx', 'pdf', 'xlsx'];
                if ($.inArray(fileData[0].name.split('.').pop().toLowerCase(), fileExtension) == -1) {
                    alert("Only '.jpeg','.jpg', '.png', '.gif', '.bmp' formats are allowed.");
                    $('#chat_file').val('');
                    return false;
                }
                data.append('file', fileData[0]);
            }

            data.append('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            data.append('tkt_id', $('.cl_tktid').val());
            data.append('user_id', $('.cl_userid').val());
            data.append('cust_user_id', $('.cl_custuserid').val());
            data.append('chat_msg', $('.chat_msg').val());
            data.append('admin_id', $('.cl_adminid').val());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/helpdesk/customer/replyTo/",
                data: data,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    chatMsg();
                    $('#chat_file').val('');
                }
            });
        });
        chatMsg();

        function chatMsg() {
            var data = {
                'tkt_id': $('.cl_tktid').val(),
                'user_id': $('.cl_userid').val(),
                'cust_user_id': $('.cl_custuserid').val(),
                'admin_id': $('.cl_adminid').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('customer.helpdesk.dashboard.getMsgs') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    $('.chat_msg').val('');
                    $('.chatpreimg').html('');
                    var html = '';
                    var data = response.data;
                    var imgMsg = '';
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
                            myimg = '<p style="white-space: pre-line;margin-bottom: auto;"><a href="/images/ChatFile/' + data[i].file + '" download="' + data[i].file + '"><img width="150px" src="/images/ChatFile/' + data[i].file + '" alt="' + data[i].file + '"></a></p>';
                        }

                        if (data[i].message != null || data[i].message != '') {
                            mymessage = (data[i].message) ? data[i].message : '';
                        }

                        if (data[i].type == "user") {
                            html += '<div class="row"><div class="col-12 py-2"><div class="card border-primary radius-15"><div class="card-body"><div class="d-flex justify-content-between"><span class="text-muted">Best Legal Services</span><div class="card-title text-muted">' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + date.getFullYear() + ', ' + formatAMPM(date) + '</div></div><div class="chat-timeline1"><div class="card-text">' + myimg + '<p style="white-space: pre-line;margin-bottom: auto;">' + mymessage + '</p></div></div></div></div></div></div>';
                        }

                        if (data[i].type == "customer") {
                            html += '<div class="row justify-content-end"><div class="col-12 py-2"><div class="card border-primary radius-15"><div class="card-body"><div class="d-flex"><span class="card-title text-muted mx-1">You, </span><div class="text-muted">' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + date.getFullYear() + ', ' + formatAMPM(date) + '</div></div><div class="chat-timeline1"><div class="card-text">' + myimg + '<p style="white-space: pre-line;margin-bottom: auto;">' + mymessage + '</p></div></div></div></div></div></div>';
                        }
                    }
                    $('.chat1').html(html);
                }
            });
        }
    });
</script>
