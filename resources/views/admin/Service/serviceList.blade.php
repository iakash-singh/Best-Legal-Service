@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.services.title') }}</div>
        <div class="ms-auto">
            @can('service-create')
                <div class="btn-group">
                    <a href="{{ route('admin.service.addService') }}" class="btn btn-primary">{{ trans('admin.buttons.addNew') }}</a>
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
                <div id="checked_success"></div>
            </div>
            <div class="ms-3">
                <div id="status_success"></div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table align-middle table-striped">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sr No</th>
                            <th>Service Name</th>
                            <th>Sub Category</th>
                            <th>Position</th>
                            <th>Search/Our Services</th>
                            <th>Main</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($serviceList as $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $list->ser_name }}</td>
                                <td>{{ !empty($list->category->category_name) ? $list->category->category_name : '---' }}</td>
                                <td>{{ $list->position }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input data-id="{{ $list->id }}" class="form-check-input checked_service" type="checkbox" data-on="Checked" data-off="unChecked" {{ $list->is_checked ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input data-id="{{ $list->id }}" class="form-check-input service_status" type="checkbox" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive" {{ $list->status ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        @can('service-edit')
                                            <a href="{{ route('admin.service.editService', $list->slug) }}"
                                               class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="" data-bs-original-title="Edit info" aria-label="Edit"><i
                                                   class="bi bi-pencil-fill"></i></a>
                                        @endcan
                                        @can('service-delete')
                                            <a href="{{ route('admin.service.deleteService', $list->slug) }}"
                                               class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="" data-bs-original-title="Delete" aria-label="Delete"><i
                                                   class="bi bi-trash-fill"></i></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ trans('admin.texts.no_data') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end list view-->
</main>

@include('admin.Master.footer')
