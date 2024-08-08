@include('admin.Master.header')

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ trans('admin.affiliates.title') }}</div>
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
                            <th>Mobile</th>
                            <th>State</th>
                            <th>Occupation</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($affiliateList as $list)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->email }}</td>
                                <td>{{ $list->mobile }}</td>
                                <td>{{ $list->state }}</td>
                                <td>{{ $list->occupation }}</td>
                                <td>{{ $list->message }}</td>
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
