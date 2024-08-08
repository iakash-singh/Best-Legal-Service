@include('admin.Master.header')

<main class="page-content">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.testimonials.create') }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('admin.Testimonial.store') }}">
                            @csrf
                            <div class="col-md-4">
                                <label class="form-label mb-0">Full Name <span class="text-danger">*</span></label>
                                <input placeholder="Full Name" name="testi_name" type="text" class="form-control @error('testi_name') is-invalid @enderror" value="{{ old('testi_name') }}">
                                @error('testi_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label mb-0">Short Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('s_address') is-invalid @enderror" placeholder="Short Address" name="s_address" value="{{ old('s_address') }}">
                                @error('s_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label mb-0">Service <span class="text-danger">*</span></label>
                                <select class="multiple-select" name="service" data-placeholder="Choose Service">
                                    <option value="">Select Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" {{ is_array(old('service')) && in_array($service->id, old('service')) ? 'selected' : '' }}>{{ $service->ser_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Content <span class="text-danger">*</span></label>
                                <textarea name="content" class="form-control descript @error('content') is-invalid @enderror" placeholder="Short Description">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.save') }}</button>
                                    <a href="{{ route('admin.Testimonial.index') }}" class="btn btn-secondary px-4">{{ trans('admin.buttons.cancel') }}</a>
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
