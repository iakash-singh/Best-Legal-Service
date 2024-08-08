@include('admin.Master.header')

<main class="page-content">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.services.update') }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST"
                              action="{{ route('admin.service.updateService', $slug->slug) }}"
                              enctype='multipart/form-data'>
                            @csrf
                            @method('PATCH')
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-2">Service Name <span class="text-danger">*</span></label>
                                <input placeholder="Service Name" name="service_name" type="text" class="form-control"
                                       value="{{ $slug->ser_name }}">
                                @error('service_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-2" for="position">Position <span class="text-danger">*</span></label>
                                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number" name="position" id="position" value="{{ old('position', $slug->position) }}" step="1">
                                @error('position')
                                    <div class="text-danger">{{ 'Product Title is required' }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label mb-2">Product title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Product title" name="ptitle"
                                       value="{{ $slug->title }}">
                                @error('ptitle')
                                    <div class="text-danger">{{ 'Product Title is required' }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label mb-2">Image <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="image">
                                <input name="image" class="form-control" type="hidden" value="{{ $slug->image }}">
                                <img src="{{ asset('images/Service/' . $slug->image) }}" alt="" width="250" height="150">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label mb-2">Short Description <span class="text-danger">*</span></label>
                                <textarea name="short_desc" class="form-control descript @error('short_desc') is-invalid @enderror" placeholder="Short Description">{{ $slug->short_description }}</textarea>
                                @error('short_desc')
                                    <div class="text-danger">{{ 'Short Description is required' }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label mb-2">Meta Keywords <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('meta_key') is-invalid @enderror" placeholder="Meta Keywords" name="meta_key" value="{{ $slug->meta_keywords }}">
                                    @error('meta_key')
                                        <div class="text-danger">{{ 'Meta Keywords are required' }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-2">Meta Description <span class="text-danger">*</span></label>
                                    <textarea name="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" placeholder="Full description">{{ $slug->meta_description }}</textarea>
                                    @error('meta_desc')
                                        <div class="text-danger">{{ 'Meta Description is required' }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Full description <span class="text-danger">*</span></label>
                                <textarea name="desc" class="form-control descript" placeholder="Full description"
                                          rows="500">{{ $slug->description }}</textarea>
                                @error('desc')
                                    <div class="text-danger">{{ 'Product Description is required' }}</div>
                                @enderror
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-select" name="service_category">
                                        <option value="">Select Category</option>
                                        @foreach ($category as $cat_name)
                                            <option value="{{ $cat_name->id }}" @if ($cat_name->id == $slug->cat) selected @endif>
                                                {{ $cat_name->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Sub-category <span class="text-danger">*</span></label>
                                    <select class="form-select" name="service_subcat">
                                        <option value="">Select Sub-Category</option>
                                        @foreach ($subcat as $sub_cat_name)
                                            <option value="{{ $sub_cat_name->id }}" @if ($sub_cat_name->id === $slug->sub_cat) selected @endif
                                                    class="parent-{{ $sub_cat_name->parents_id }} subcategory">
                                                {{ $sub_cat_name->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_subcat')
                                        <div class="text-danger">{{ 'Select Service Sub category' }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Price</label>
                                    <div class="row g-3">
                                        <input type="text" class="form-control" placeholder="Price" name="price"
                                               value="{{ $slug->price }}">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="border p-3 rounded">
                                <div class=" col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.update') }}</button>
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
