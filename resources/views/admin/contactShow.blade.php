@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.contacts.title') }}</div>
    </div>
    <!--end breadcrumb-->

    <!--List View-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table align-middle table-striped">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contactList as $list)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->email }}</td>
                                <td>{{ $list->phone }}</td>
                                <td>{{ Str::limit($list->message, 25) }}</td>
                                <td>
                                    <a data-name="{{ $list->name }}" data-email="{{ $list->email }}" data-mobile="{{ $list->phone }}" data-msg="{{ $list->message }}" class="text-primary getcData" data-bs-toggle="modal" data-bs-placement="bottom" title="View" data-bs-original-title="View" aria-label="View" data-bs-target="#ViewContactModal"><i class="bi bi-eye-fill"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">{{ trans('admin.texts.no_data') }}</td>
                            </tr>
                        @endforelse
                        <!-- View Modal Start -->
                        <div class="col">
                            <div class="modal fade" id="ViewContactModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ trans('admin.contacts.detail') }} : <span id="cdetail"></span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <form class="form form-horizontal">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group row border-light">
                                                                    <div class="col-sm-3 col-form-label">
                                                                        <label>Name : </label>
                                                                    </div>
                                                                    <div id="cname" class="col-sm-9 col-form-label"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group row border-light">
                                                                    <div class="col-sm-3 col-form-label">
                                                                        <label>Email : </label>
                                                                    </div>
                                                                    <div id="cemail" class="col-sm-9 col-form-label"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group row border-light">
                                                                    <div class="col-sm-3 col-form-label">
                                                                        <label>Mobile No : </label>
                                                                    </div>
                                                                    <div id="cmob" class="col-sm-9 col-form-label"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group row border-light">
                                                                    <div class="col-sm-3 col-form-label">
                                                                        <label>Message : </label>
                                                                    </div>
                                                                    <div id="cmsg" class="col-sm-9 col-form-label" style="white-space: initial;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- View Modal End -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end list view-->
</main>

@include('admin.Master.footer')
