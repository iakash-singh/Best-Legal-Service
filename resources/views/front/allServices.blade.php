@extends('front.app')
@section('title', 'All Services')
@php
use Illuminate\Support\Facades\DB;
@endphp

@section('main-content')
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

    <div class="container py-4">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-sm-4">
                    <h3 class="font-weight-bold text-4 mb-2">{{ $category->category_name }}</h3>
                    <ul class="list list-icons list-icons-sm mb-4">
                        @foreach ($category->sub_category as $sub_category)
                            @php
                                $services = DB::table('services')
                                    ->select('ser_name', 'slug')
                                    ->Where('sub_cat', $sub_category->id)
                                    ->where('status', 1)->orderBy('position', 'ASC')
                                    ->get();
                            @endphp
                            <li>
                                <h4 class="font-weight-bold text-3 mb-1 mt-2">{{ $sub_category->category_name }}</h4>
                                <ul class="list list-icons list-icons-sm mb-3 text-2">
                                    @if ($services->count())
                                        @foreach ($services as $service)
                                            <li>
                                                <a href="{{ route('singleService', $service->slug) }}"><i class="fa-solid fa-bell-concierge"></i>{{ $service->ser_name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection
