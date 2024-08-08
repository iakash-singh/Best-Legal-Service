@extends('front.app')

@section('bg-img', Storage::disk('local')->url($slug->image))
@section('title', $slug->title)
@section('sub-heading', $slug->subtitle)
@section('meta_keywords', $slug->meta_keywords)

@section('main-content')
    <!-- Post Content-->
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

    <div class="container py-3 my-3">
        <div class="row">
            <div class="col-md-8 mb-3 mb-lg-0 offset-md-2">
                <article>
                    <div class="card border-0">
                        <div class="card-body z-index-1 p-0">
                            <small>Categories :
                                @foreach ($slug->categories as $category)
                                    <a href="{{ route('category', $category->slug) }}">
                                        <div class="d-inline bg-primary border-radius line-height-2 px-3 py-2 m-1 text-center text-color-light"><b>{{ $category->name }}</b></div>
                                    </a>
                                @endforeach
                            </small>
                            <br><br>
                            <small>Tags : </small>
                            @foreach ($slug->tags as $tag)
                                <a href="{{ route('tag', $tag->slug) }}">
                                    <small class="bg-primary border-radius line-height-2 px-3 py-2 text-center text-color-light"><b>{{ $tag->name }}</b></small>
                                </a>
                            @endforeach
                            <h2 class="font-weight-normal text-7 my-3">@yield('title')</h2>
                            <div class="post-image p3-4">
                                <img class="card-img-top custom-border-radius-1" src="{{ asset('/images/Post/' . $slug->image) }}" alt="Card Image">
                            </div>
                            <p class="text-uppercase text-1 my-3 text-color-default">Published On: <time>{{ $slug->created_at->diffForHumans() }}</time>
                                <span class="opacity-3 d-inline-block px-2">|</span> {{ $slug->posted_by }}
                            </p>

                            <div class="card-body p-0">
                                {!! htmlspecialchars_decode($slug->body) !!}
                                <hr class="my-2">
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

@endsection
