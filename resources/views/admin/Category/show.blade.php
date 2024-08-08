@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.srvCats.title') }}</div>
        <div class="ms-auto">
            @can('service-category-create')
                <div class="btn-group">
                    <a href="{{ route('admin.ServiceCategory.create') }}" class="btn btn-primary">{{ trans('admin.buttons.addNew') }}</a>
                </div>
            @endcan
        </div>
    </div>
    <!--end breadcrumb-->

    <!--List View-->
    <div class="card border shadow-none radius-10">
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
            @if (Session::has('failure'))
                <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-danger"><i class="bx bx-x-circle"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-danger">{{ Session::get('failure') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="ms-3">
                <div id="status_success"></div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Position</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input data-id="{{ $category->id }}" class="form-check-input cat_service_status" type="checkbox" data-on="Active" data-off="InActive" {{ $category->status ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>{{ $category->position }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        @can('service-category-edit')
                                            <a href="{{ route('admin.ServiceCategory.edit', $category->id) }}"
                                               class="text-warning" data-id="{{ $category->id }}" data-name="{{ $category->category_name }}"><i
                                                   class="bi bi-pencil-fill"></i></a>
                                        @endcan
                                        @can('service-category-delete')
                                            <form id="delete-form-{{ $category->id }}" action="{{ route('admin.ServiceCategory.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="text-danger" onclick="if(confirm('Are you sure you want to delete this category?'))
                                                {
                                                    event.preventDefault();document.getElementById('delete-form-{{ $category->id }}').submit();
                                                }else{
                                                    event.preventDefault();}"><i class="bi bi-trash-fill"></i></a>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @if ($category->sub_category)
                                @foreach ($category->sub_category as $child)
                                    <tr>
                                        <td>{{ $category->category_name }} > {{ $child->category_name }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input data-id="{{ $child->id }}" class="form-check-input cat_service_status" type="checkbox" data-on="Active" data-off="InActive" {{ $child->status ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>{{ $child->position }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                @can('service-category-edit')
                                                    <a href="{{ route('admin.ServiceCategory.edit', $child->id) }}" class="text-warning" data-id="{{ $child->id }}" data-name="{{ $child->category_name }}"><i class="bi bi-pencil-fill"></i></a>
                                                @endcan
                                                @can('service-category-delete')
                                                    <form id="delete-form-{{ $child->id }}" action="{{ route('admin.ServiceCategory.destroy', $child->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="text-danger" onclick="if(confirm('Are you sure you want to delete this category?'))
                                                        {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $child->id }}').submit();
                                                        }else{
                                                            event.preventDefault();}"><i class="bi bi-trash-fill"></i></a>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">{{ trans('admin.texts.no_data') }}</td>
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
