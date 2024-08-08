@extends('front.app')
@section('title', 'Testimonials')
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

    <div id="examples" class="container py-3">
        <div class="row mt-lg-5">
            @foreach ($fetchTesti as $testi)
            @php
                $getSrvName = \App\Models\Service::select('ser_name')->where('id', $testi->service)->first();
            @endphp
                <div class="col-lg-4">
                    <div class="border-0 border-radius-0 box-shadow-1 card testimonial">
                        <blockquote>
                            <p class="mb-0 fz-15">{!! htmlspecialchars_decode($testi->content) !!}</p>
                        </blockquote>
                        <div class="testimonial-arrow-down"></div>
                        <div class="testimonial-author justify-content-center">
                            <p class="text-center"><strong class="font-weight-extra-bold pt-2">{{ $testi->name }}</strong><span>{{ $testi->address }} | | {{ $getSrvName->ser_name }}</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col text-center appear-animation my-5" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="800" data-plugin-options="{'accY': -250}">
                <button data-bs-target="#reviewtesti" data-bs-toggle="modal" class="btn btn-primary" title="Create New review">
                    <span class="title">Write A Review</span></button>
            </div>
        </div>

        <!--Add Modal-->
        <div class="modal" id="reviewtesti" tabindex="-1" aria-hidden="true" aria-labelledby="AddReviewTestiModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddReviewTestiModalLabel">Write A Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul id="save_msg"></ul>
                        <form id="cform1" name="cform">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <div class="form-group col-lg-12">
                                <input type="text" placeholder="Full Name"
                                       class="form-control text-3 h-auto py-2 name" name="name">
                            </div>
                            <label class="form-label">Short Address <span class="text-danger">*</span></label>
                            <div class="form-group col-lg-12">
                                <input type="text" placeholder="Company Name | Post"
                                       class="form-control text-3 h-auto py-2 address" name="address">
                            </div>
                            <label class="form-label">Select Service <span class="text-danger">*</span></label>
                            <div class="form-group col-lg-12">
                                <select name="service_select" class="form-select service_select">
                                    <option value="Select Service" readonly>Select Service</option>
                                    @foreach ($reviewServices as $service)
                                        <option value="{{ $service->id }}">{{ $service->ser_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="form-label">Short Description <span class="text-danger">*</span></label>
                            <div class="form-group col-lg-12">
                                <textarea name="s_desc" class="form-control desc" rows="5"></textarea>
                            </div>
                            <div class="modal-footer px-0">
                                <button type="button" class="btn btn-primary add_reviewtesti" data-dismiss="modal" aria-label="Close">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
