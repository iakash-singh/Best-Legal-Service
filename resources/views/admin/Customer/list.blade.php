@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.customers.title') }}</div>
        <div class="ms-auto">
            @can('customer-create')
                <div class="btn-group">
                    <a href="{{ route('admin.Customer.create') }}" class="btn btn-primary">{{ trans('admin.buttons.addNew') }}</a>
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
            <div class="table-responsive">
                <table id="example" class="table align-middle table-striped">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($List as $list)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->email }}</td>
                                <td>{{ $list->mobile ? $list->mobile : ' - ' }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        @can('customer-edit')
                                            <a href="{{ route('admin.Customer.edit', $list->id) }}" class="text-warning"><i class="bi bi-pencil-fill"></i></a>
                                        @endcan
                                        @can('customer-delete')
                                            <form id="delete-form-{{ $list->id }}" action="{{ route('admin.Customer.destroy', $list->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="text-danger" onclick="if(confirm('Are you sure you want to delete this Customer?'))
                                                {
                                                    event.preventDefault();document.getElementById('delete-form-{{ $list->id }}').submit();
                                                }else{
                                                    event.preventDefault();}"><i class="bi bi-trash-fill"></i></a>
                                            </form>
                                        @endcan
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
