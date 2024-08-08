@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.postCats.title') }}</div>
        <div class="ms-auto">
            @can('post-category-create')
                <div class="btn-group">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">{{ trans('admin.buttons.addNew') }}</a>
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
            <div class="table-responsive">
                <table id="example" class="table align-middle table-striped">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categoryList as $list)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->slug }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        @can('post-category-edit')
                                            <a href="{{ route('admin.category.edit', $list->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        @endcan
                                        @can('post-category-delete')
                                            <form id="delete-form-{{ $list->id }}" method="POST" action="{{ route('admin.category.destroy', $list->id) }}" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{ route('admin.category.destroy', $list->id) }}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete" onclick="
                                      if(confirm('Are you sure you want to delete this Post category?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $list->id }}').submit();
                                    }else{
                                        event.preventDefault();
                                    }"><i class="bi bi-trash-fill"></i></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
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
