@include('admin.Master.header')

<main class="page-content">

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.srvCats.create') }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('admin.ServiceCategory.store') }}">
                            @csrf
                            <div class="col-6 offset-md-3">
                                <label class="form-label">Parent Category</label>
                                <select class="form-control" name="parent_id">
                                    <option value="">Select Parent Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 offset-md-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6 offset-md-3">
                                <label class="form-label" for="position">Position <span class="text-danger">*</span></label>
                                <input class="form-control numeric{{ $errors->has('position') ? 'is-invalid' : '' }}" type="text" name="position" id="position" value="{{ old('position', '') }}" step="1">
                                @if ($errors->has('position'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('position') }}
                                    </div>
                                @endif
                            </div>
                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.save') }}</button>
                                    <a href="{{ route('admin.ServiceCategory.index') }}" class="btn btn-secondary px-4">{{ trans('admin.buttons.cancel') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</main>

@include('admin.Master.footer')
