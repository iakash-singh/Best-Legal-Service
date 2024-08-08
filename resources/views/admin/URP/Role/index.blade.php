@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.roles.title') }}</div>
        <div class="ms-auto">
            @can('role-create')
                <div class="btn-group">
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">{{ trans('admin.buttons.addNew') }}</a>
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
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $key => $role)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{ route('admin.roles.show', $role->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View" data-bs-original-title="View info" aria-label="View"><i class="bi bi-eye-fill"></i></a>
                                        @if ($role->id != 1)
                                            @can('role-edit')
                                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                        @endif

                                        {{-- @can('role-delete')
                                            <form id="delete-form-{{ $role->id }}" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{ route('admin.roles.destroy', $role->id) }}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete" onclick="
                                      if(confirm('Are you sure you want to delete this Role?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $role->id }}').submit();
                                    }else{
                                        event.preventDefault();
                                    }"><i class="bi bi-trash-fill"></i></a>
                                        @endcan --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">{{ trans('admin.texts.no_data') }}</td>
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
