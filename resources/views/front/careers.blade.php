@extends('front.app')
@section('title', 'Careers')
@section('main-content')
    <section class="page-header page-header-classic page-header-sm mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    {{-- <h1 data-title-border></h1> --}}
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block fz-15 text-center text-md-end text-white">
                        <li><a class="bread-white" href="{{ route('home') }}">Home</a></li>
                        <li class="active">@yield('title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-default border-0 m-0" style="background: #fff;">
        <div class="container py-4">
            <img src="{{ asset('assets/front/img/career.png') }}" height="" class="mb-5 w-auto img-fluid appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700" alt="" />
            <h4 class="text-color-dark font-weight-bold text-5 text-center pb-2 mb-4 appear-animation"
                data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="600">Reach us at <a href="mailto:info@bestlegalservices.com">enquiry@bestlegalservices.com</a></h4>
        </div>
    </section>
@endsection
