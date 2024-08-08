@extends('front.app')
@section('title', 'Blogs')
@section('main-content')
    <!-- Main Content-->
    <section class="page-header page-header-classic page-header-sm mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static"></div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block fz-15 text-center text-md-end text-white">
                        <li><a class="bread-white" href="{{ route('home') }}">Home</a></li>
                        <li class="active">@yield('title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5 my-3">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="row pb-1">
                    @foreach ($posts as $post)
                        <div class="col-sm-6 col-lg-6 mb-4 pb-2">
                            <a href="{{ route('post', $post->slug) }}">
                                <article>
                                    <div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                        <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                            <img src="{{ asset('/images/Post/' . $post->image) }}" alt="{{ $post->title }}" width="356px" height="200px">
                                            <div class="thumb-info-title bg-transparent p-4">
                                                <div class="thumb-info-inner mt-1">
                                                    <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">{{ $post->title }}</h2>
                                                </div>
                                                <div class="thumb-info-show-more-content">
                                                    <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5 text-truncate">{{ Str::limit(strip_tags($post->body), 150) }}</p>
                                                    <p class="text-color-default text-1 mb-1 pt-1">
                                                        <time pubdate datetime="2021-01-10">{{ $post->created_at->diffForHumans() }}</time>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="blog-sidebar col-lg-4 pt-4 pt-lg-0">
                <aside class="sidebar">
                    <div class="py-1 clearfix">
                        <hr class="my-2">
                    </div>

                    <div class="tabs tabs-dark mb-4 pb-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#latestPosts" data-bs-toggle="tab">Latest</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="latestPosts">
                                <ul class="simple-post-list">
                                    @foreach ($posts->take(6) as $category)
                                        <li>
                                            <div class="post-image">
                                                <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                    <a href="{{ route('post', $category->slug) }}">
                                                        <img src="{{ asset('/images/Post/' . $category->image) }}" width="50" height="50" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="post-info">
                                                <a href="{{ route('post', $category->slug) }}">{{ $category->title }}</a>
                                                <div class="post-meta">
                                                    {{ $category->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="py-1 clearfix">
                        <hr class="my-2">
                    </div>
                    <div class="px-3 mt-4">
                        <h3 class="text-color-dark text-capitalize font-weight-bold text-5 m-0 mb-3">Categories</h3>
                        <div class="mb-3 pb-1">
                            @foreach ($posts as $category)
                                @foreach ($category->categories->take(6) as $categories)
                                    <a href="{{ route('category', $categories->slug) }}">
                                        <span class="badge badge-dark badge-sm rounded-pill text-uppercase px-2 py-1 me-1">{{ $categories->name }}</span>
                                    </a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="py-1 clearfix">
                        <hr class="my-2">
                    </div>
                    <div class="px-3 mt-4">
                        <h3 class="text-color-dark text-capitalize font-weight-bold text-5 m-0 mb-3">Tags</h3>
                        <div class="mb-3 pb-1">
                            @foreach ($posts as $tag)
                                @foreach ($tag->tags->take(6) as $tags)
                                    <a href="{{ route('tag', $tags->slug) }}"><span class="badge badge-dark badge-sm rounded-pill text-uppercase px-2 py-1 me-1">{{ $tags->name }}</span></a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
