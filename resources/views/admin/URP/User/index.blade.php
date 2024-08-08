@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.users.title') }}</div>
        <div class="ms-auto">
            @can('user-create')
                <div class="btn-group">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">{{ trans('admin.buttons.addNew') }}</a>
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
                            <th>Email</th>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $key => $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <label class="badge rounded-pill alert-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        @can('user-edit')
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        @endcan
                                        @if ($user->is_admin != 1)
                                            @can('user-delete')
                                                <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="{{ route('admin.users.destroy', $user->id) }}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"
                                                   onclick="
                                                    if(confirm('Are you sure you want to delete this User?')) {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $user->id }}').submit();
                                                    }else{
                                                        event.preventDefault();
                                                    }">
                                                    <i class="bi bi-trash-fill"></i></a>
                                            @endcan
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">{{ trans('admin.texts.no_data') }}</td>
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
