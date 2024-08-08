@include('admin.Master.header')

<main class="page-content">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.customers.create') }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('admin.Customer.store') }}">
                            @csrf
                            <div class="col-md-4 mb-2">
                                <label class="form-label mb-2">Name <span class="text-danger">*</span></label>
                                <input placeholder="Name" name="name" type="text" class="form-control"
                                       value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label mb-2">Email <span class="text-danger">*</span></label>
                                <input placeholder="Email" name="email" type="email" class="form-control"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label mb-2">Gst</label>
                                <input placeholder="Gst Number" name="gst" type="text" class="form-control"
                                       value="{{ old('gst') }}">
                                @error('gst')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-2">Mobile</label>
                                <input placeholder="Mobile Number" name="mob1" type="text" class="form-control numeric"
                                       value="{{ old('mob1') }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-2">Mobile 2</label>
                                <input placeholder="Mobile Number 2" name="mob2" type="text" class="form-control numeric"
                                       value="{{ old('mob2') }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-2">Address 1</label>
                                <textarea placeholder="Address 1" name="add1" rows="5" class="form-control">{{ old('add1') }}</textarea>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-2">Address 2</label>
                                <textarea placeholder="Address 2" name="add2" rows="5" class="form-control">{{ old('add2') }}</textarea>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label mb-2">Country</label>
                                <input placeholder="Country" name="ctry" type="text" class="form-control"
                                       value="{{ old('ctry') }}">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label mb-2">State</label>
                                <input placeholder="State" name="state" type="text" class="form-control"
                                       value="{{ old('state') }}">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label mb-2">City</label>
                                <input placeholder="City" name="city" type="text" class="form-control"
                                       value="{{ old('city') }}">
                            </div>
                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.save') }}</button>
                                    <a href="{{ route('admin.Customer.index') }}"
                                       class="btn btn-secondary px-4">{{ trans('admin.buttons.cancel') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('admin.Master.footer')
