@include('admin.Master.header')

<main class="page-content">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.services.create') }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('admin.service.insertService') }}" enctype='multipart/form-data'>
                            @csrf
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-2">Service Name <span class="text-danger">*</span></label>
                                <input placeholder="Service Name" name="service_name" type="text" class="form-control @error('service_name') is-invalid @enderror" value="{{ old('service_name') }}">
                                @error('service_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-2" for="position">Position <span class="text-danger">*</span></label>
                                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number" name="position" id="position" value="{{ old('position') }}" step="1">
                                @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label mb-2">Product title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('ptitle') is-invalid @enderror" placeholder="Product title" name="ptitle" value="{{ old('ptitle') }}">
                                @error('ptitle')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label mb-2">Images (Image Resolution: 1180x410)</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="form-label">Short Description <span class="text-danger">*</span></label>
                            <div class="col-md-12 mb-2">
                                <textarea name="short_desc" class="form-control descript @error('short_desc') is-invalid @enderror" placeholder="Short Description">{{ old('short_desc') }}</textarea>
                                @error('short_desc')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label mb-2">Meta Keywords <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('meta_key') is-invalid @enderror" placeholder="Meta Keywords" name="meta_key" value="{{ old('meta_key') }}">
                                    @error('meta_key')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-2">Meta Description <span class="text-danger">*</span></label>
                                    <textarea name="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" placeholder="Full description">{{ old('meta_desc') }}</textarea>
                                    @error('meta_desc')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Full description <span class="text-danger">*</span></label>
                                <textarea name="desc" class="form-control descript @error('desc') is-invalid @enderror" placeholder="Full description">{{ old('desc') }}</textarea>
                                @error('desc')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-select" name="service_category">
                                        <option value="">Select Category</option>
                                        @foreach ($category as $cat_name)
                                            <option value="{{ $cat_name->id }}" {{ old('service_category') == $cat_name->id ? 'selected' : '' }}>{{ $cat_name->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Sub-category <span class="text-danger">*</span></label>
                                    <select name="service_subcat" class="form-control">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                    @error('service_subcat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Price</label>
                                    <div class="row">
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price" name="price" value="{{ old('price') }}">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.save') }}</button>
                                    <a href="{{ route('admin.service.listService') }}" class="btn btn-secondary px-4">{{ trans('admin.buttons.cancel') }}</a>
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
