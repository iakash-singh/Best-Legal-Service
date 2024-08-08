@extends('front.app')
@section('meta_keywords', $slug->meta_keywords)
@section('meta_description', $slug->meta_description)
@section('title', $slug->title)
@section('short_desc', strip_tags($slug->short_description))
@section('main-content')

    <section class="page-header page-header-classic page-header-sm overlay overlay-op-9 overlay-show mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    {{-- <h1 data-title-border></h1> --}}
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb fz-15 d-block text-md-end text-white">
                        <li><a class="bread-white" href="{{ route('home') }}">Home</a></li>
                        <li class="active">@yield('title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @if (!$slug->image)
        <section class="page-header page-header-modern page-header-lg overlay overlay-show overlay-op-9 m-0" style="background-image: url('/images/Service/default_service.png'); background-size: cover; background-position: center;">
    @else
        <section class="page-header page-header-modern page-header-lg overlay overlay-show overlay-op-9 m-0" style="background-image: url('/images/Service/{{ $slug->image }}'); background-size: cover; background-position: center;">
    @endif
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="text-color-light font-weight-bold text-10 pb-2 mb-4"><em>@yield('title')</em></h1>
                <p class="font-weight-bold text-color-light text-4 mb-4 text-justify">@yield('short_desc')</p>
            </div>
            <div class="col-lg-4">
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
                            <div class="fs-3 text-danger"><i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="ms-3">
                                <div class="text-danger">{{ Session::get('failure') }}</div>
                            </div>
                        </div>
                    </div>
                @endif
                <form class="custom-form-style-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="800" action="{{ route('singleServiceForm.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col mb-3">
                            <input type="text" class="form-control border-radius-0" name="name" placeholder="Name *" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col mb-3">
                            <input type="email" class="form-control border-radius-0" name="email" placeholder="E-mail *" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col mb-3">
                            <input type="text" class="form-control border-radius-0" name="phone" placeholder="Phone *" value="{{ old('phone') }}">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col mb-4">
                            <textarea rows="9" class="form-control border-radius-0" name="message" placeholder="Message *">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col mb-3">
                            <input type="hidden" value="{{ url()->current() }}" class="form-control border-radius-0" name="hiddenPage">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col text-lg-end mb-0 text-center">
                            <button type="submit" class="btn btn-primary font-weight-bold btn-px-5 btn-py-3 appear-animation fs-6"
                                    data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="350"
                                    data-loading-text="Loading...">REQUEST CONSULTATION</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>

    <div class="spacer py-3 my-4"></div>
    <div class="container service-content">
        <div class="row pb-4">
            <div class="text-justify col-lg-12 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorterPlus"
                 data-appear-animation-delay="200">
                {!! htmlspecialchars_decode($slug->description) !!}
            </div>
        </div>

        <div class="row">
            <div class="col text-center appear-animation animated fadeInUpShorterPlus appear-animation-visible" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="800" data-plugin-options="{'accY': -250}" style="animation-delay: 800ms;">
                <a href="{{ route('allServices') }}" class="btn btn-primary font-weight-bold px-5 btn-py-2">Explore Our Services</a>
            </div>
        </div>
    </div>
    <div class="spacer py-3 my-4"></div>
@endsection
