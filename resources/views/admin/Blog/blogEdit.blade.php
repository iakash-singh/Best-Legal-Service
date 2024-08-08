@include('admin.Master.header')

<main class="page-content">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.posts.update') }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('admin.Blog.update', $post->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-6">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Post Title"
                                       value="{{ $post->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Featured Image (Image Size: 736px by 490px)</label>
                                <input name="image" class="form-control" id="f_image" type="file">
                                <input name="image" class="form-control" id="f_image" type="hidden" value="{{ $post->image }}">
                                <img src="{{ asset('images/Post/' . $post->image) }}" alt="" width="250" height="150">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tags</label>
                                <select class="multiple-select" name="tags[]" data-placeholder="Choose Tags"
                                        multiple="multiple">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" @foreach ($post->tags as $postTag) @if ($postTag->id == $tag->id)
                                                selected @endif @endforeach>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Categories</label>
                                <select class="multiple-select" name="categories[]" data-placeholder="Choose Categories"
                                        multiple="multiple">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @foreach ($post->categories as $postCategory)
                                                    @if ($postCategory->id == $category->id) selected @endif @endforeach>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label mb-2">Meta Keywords <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('meta_key') is-invalid @enderror" placeholder="Meta Keywords" name="meta_key" value="{{ $post->meta_keywords }}">
                                @error('meta_key')
                                    <div class="text-danger">{{ 'Meta Keywords are required' }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea id="editor" name="body" class="ckeditor form-control"
                                          placeholder="Description" rows="4" cols="4">{{ $post->body }}</textarea>
                                @error('body')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.update') }}</button>
                                    <a href="{{ route('admin.Blog.index') }}"
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
