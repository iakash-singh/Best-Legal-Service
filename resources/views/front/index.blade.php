@extends('front.app')
@section('title', 'Home')
@section('main-content')
    <div class="body">
        <div role="main" class="main">
            {{-- We Offer A One Stop Shop For All Your Business Requirements --}}
            <section class="text-center section-default section-no-border">
                <div class="container pt-4">
                    <div class="align-self-center extra-padding col-md-12">
                        <h2 class="text-white"><b>We are your one-stop-shop for all the business requirements</b></h2>
                        @livewire('search-service')
                        <ul class="shortLinks my-4 px-0">
                            @if ($services->count())
                                <li class="text-white">Popular : </li>
                                @foreach ($services as $service)
                                    @if ($service->service_checked == 1)
                                        <li class="text-black"><a title="{{ $service->service_name }}" href="{{ route('singleService', $service->service_slug) }}">{{ $service->service_name }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </section>

            {{-- We'\re' Only A Click Away, And We Guarantee Your Satisfaction --}}
            <section class="section section-no-border my-0">
                <div class="container pt-3 pb-4">
                    <div class="row">
                        <div class="col text-center">
                            <div class="appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="0">
                                <h2 class="mb-0 font-weight-bold text-white">We Are Just A Click Away!</h2>
                                <div class="divider divider-primary divider-small mt-2 mb-4 text-center">
                                    <hr class="my-0 mx-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                 data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                <div class="feature-box-icon mt-3">
                                    <img width="50" height="50"
                                         src="{{ asset('assets/front/img/Legal_Services_Solution-INV.png') }}"
                                         alt="" />
                                </div>
                                <div class="feature-box-info ms-3">
                                    <h4 class="mb-2 text-white">Legal Services</h4>
                                    <p class="text-white text-justify fz-15">Get best legal services from experienced Lawyers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                 data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                <div class="feature-box-icon mt-3">
                                    <img width="50" height="50"
                                         src="{{ asset('assets/front/img/CA_And_CS_Services-INV.png') }}"
                                         alt="" />
                                </div>
                                <div class="feature-box-info ms-3">
                                    <h4 class="mb-2 text-white">CA & CS Services</h4>
                                    <p class="text-white fz-15 text-justify">Accounting and taxation related services undertaken by Chartered Accountants and Company Secretaries focus on compliance function</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                 data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                <div class="feature-box-icon mt-3">
                                    <img width="50" height="50"
                                         src="{{ asset('assets/front/img/HR_Services_Search-INV.png') }}"
                                         alt="" />
                                </div>
                                <div class="feature-box-info ms-3">
                                    <h4 class="mb-2 text-white">HR Services</h4>
                                    <p class="text-white fz-15 text-justify">HR and Payroll solutions to drive your business forward</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Why choose Us --}}
            <section class="section bg-transparent section-no-border my-0">
                <div class="container py-3">
                    <div class="row">
                        <div class="col text-center">
                            <div class="appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="0">
                                <h2 class="mb-0 font-weight-bold">Why Should You Choose Us</h2>
                                <div class="divider divider-primary divider-small mt-2 mb-4 text-center">
                                    <hr class="my-0 mx-auto">
                                </div>
                            </div>
                            <div class="row row-gutter-sm pb-2 appear-animation animated appear-animation-visible"
                                 data-appear-animation="fadeIn" data-appear-animation-delay="300">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                         data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <div class="feature-box-icon">
                                            <i class="fa-solid fa-piggy-bank"></i><i class="fa-solid fa-badge-percent"></i>
                                        </div>
                                        <div class="text-start feature-box-info ms-3">
                                            <h4 class="mb-2">Best Price Guarantee</h4>
                                            <p class="fz-15 text-justify">We are here to provide you with best services at a reasonable and affordable cost</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                         data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <div class="feature-box-icon">
                                            <i class="fa-solid fa-house-chimney-user"></i>
                                        </div>
                                        <div class="text-start feature-box-info ms-3">
                                            <h4 class="mb-2">All business services under one roof</h4>
                                            <p class="fz-15 text-justify">We wanted to eliminate the drudgery of running from pillar-to-post for simple services. That’s the reason why we are your one-stop-shop for all the legal services, CA & CS services, and HR services you need</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                         data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <div class="feature-box-icon">
                                            <i class="fa-solid fa-globe"></i>
                                        </div>
                                        <div class="text-start feature-box-info ms-3">
                                            <h4 class="mb-2">PAN India network of lawyers, CA, CS and HR Professionals</h4>
                                            <p class="fz-15 text-justify">We have a pool of experienced Lawyers, Chartered Accountants, Company Secretaries, and HR professionals located all over India to serve you as per your needs and requirements at your place</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                         data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <div class="feature-box-icon">
                                            <img width="27.2" height="27.2" src="{{ asset('assets/front/img/technology-driven.png') }}" alt="" />
                                        </div>
                                        <div class="text-start feature-box-info ms-3">
                                            <h4 class="mb-2">Technology Driven</h4>
                                            <p class="fz-15 text-justify">Our professionals work tirelessly to improve upon their skills and stay updated with the latest technological advances to provide you their services in an efficient manner</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                         data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <div class="feature-box-icon">
                                            <i class="fa-solid fa-headset"></i>
                                        </div>
                                        <div class="text-start feature-box-info ms-3">
                                            <h4 class="mb-2">Excellent Customer Service</h4>
                                            <p class="fz-15 text-justify">We are available 24*7 to provide excellent customer service. We will be a pleasure to work with. We believe in the maxim ‘spero meliora’ and only your feedback that can lead us to become the best solution to all your business needs. We will be more than happy to direct your grievances to our professionals and implement your suggestions</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                         data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <div class="feature-box-icon">
                                            <i class="fas fa-shield-alt"></i>
                                        </div>
                                        <div class="text-start feature-box-info ms-3">
                                            <h4 class="mb-2">Safe Payment Options</h4>
                                            <p class="fz-15 text-justify">We provide safe payment options for providing an intuitive and secure checkout experience for our users. We have online payment gateways specialized in processing financial information with proper encryption and safety features to keep our customers’ information safe</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                         data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <div class="feature-box-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="text-start feature-box-info ms-3">
                                            <h4 class="mb-2">On Time Delivery</h4>
                                            <p class="fz-15 text-justify">We adhere to the project timelines and deliver services on time. We communicate constantly with our clients to give them updates as we progress. We consider the client’s deadline as ours which keeps us on our toes. If we have pledged to provide project milestones by a specific date, we will do so. You will never have to worry about the service delays from our end</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                         data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <div class="feature-box-icon">
                                            <i class="fa-solid fa-file-code"></i>
                                        </div>
                                        <div class="text-start feature-box-info ms-3">
                                            <h4 class="mb-2">Transparency</h4>
                                            <p class="fz-15 text-justify">We believe in Transparency. We have dedicated much time and effort to make sure that you know everything about the services and the finances related to them</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Testimonials --}}
            <section class="section border-0 m-0 appear-animation" data-appear-animation="fadeIn"
                     data-appear-animation-delay="300"
                     id="testimonialsSection">
                <div class="container pt-5 pb-3">
                    <div class="row">
                        <div class="col text-center">
                            <h3 class="text-transform-none text-dark font-weight-bold text-10 negative-ls-1 pb-3 mb-5" style="line-height: normal;">
                                What Our Clients Says About Our Work</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="dots-light mb-0 owl-carousel owl-carousel-init owl-drag owl-loaded owl-theme"
                             data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 3}}, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 8000}">
                            @if ($testi->count())
                                @foreach ($testi as $list)
                                @php
                                    $getSrvName = \App\Models\Service::select('ser_name')->where('id', $list->service)->first();
                                @endphp
                                    <div class="col-lg-12">
                                        <div class="testimonial testimonial-style-3 testimonial-style-3-light">
                                            <blockquote class="box-shadow-6 p-3 before-d-none text-break">
                                                <p class="m-2 fz-14 text-justify">{!! Str::limit(htmlspecialchars_decode($list->content), 190) !!}</p>
                                            </blockquote>
                                            <div class="testimonial-arrow-down p-relative z-index-1"></div>
                                            <div class="testimonial-author">
                                                <p class="w-100 text-center">
                                                    <span class="font-weight-extra-bold">{{ $list->name }}</span>
                                                    <strong>{{ $list->address }} | {{ $getSrvName->ser_name }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center appear-animation my-3" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="800" data-plugin-options="{'accY': -250}">
                        <button data-bs-target="#review" data-bs-toggle="modal" class="btn btn-primary" title="Create New review">
                            <span class="title">Write A Review</span></button>
                        <a href="{{ route('viewAllTestimonial') }}" class="btn btn-primary">View All</a>
                    </div>
                </div>
            </section>

            {{-- Blogs --}}
            <section class="section bg-transparent section-no-border my-0">
                <div class="container pt-3 pb-4">
                    <div class="row">
                        <div class="col text-center">
                            <div class="appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="0">
                                <h2 class="mb-4 font-weight-bold">Blogs</h2>
                                <div class="divider divider-primary divider-small mt-2 mb-4 text-center">
                                    <hr class="my-0 mx-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-gutter-sm pb-2 mb-5 appear-animation" data-appear-animation="fadeInUpShorterPlus"
                         data-appear-animation-delay="600">
                        @foreach ($posts->take(2) as $post)
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <article>
                                    <div class="card border-0 border-radius-0 custom-box-shadow-1">
                                        <div class="card-img-top">
                                            <a href="{{ route('post', $post->slug) }}">
                                                <img class="card-img-top border-radius-0 hover-effect-2"
                                                     src="{{ asset('/images/Post/' . $post->image) }}"
                                                     alt="{{ $post->title }}" title="{{ $post->title }}" width="548" height="308">
                                            </a>
                                        </div>
                                        <div class="card-body bg-light p-4 z-index-1">
                                            <p class="text-uppercase text-color-default text-1 mb-1 pt-1">
                                                Published On : <time pubdate
                                                      datetime="{{ $post->created_at }}">{{ $post->created_at->format('j F, Y') }}</time>
                                            </p>
                                            <div class="card-body p-0">
                                                <h4 class="card-title alternative-font-4 font-weight-semibold text-5 mb-3">
                                                    <a class="text-color-dark text-color-hover-primary text-decoration-none font-weight-bold text-3"
                                                       href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
                                                </h4>
                                                <p class="card-text mb-2 text-justify">{{ Str::limit(strip_tags($post->body), 250) }}
                                                </p>
                                                <a href="{{ route('post', $post->slug) }}"
                                                   class="custom-read-more-link d-inline-flex align-items-center font-weight-semibold text-3 text-decoration-none ps-0">
                                                    READ MORE
                                                    <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706"
                                                         width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <polygon stroke="#777" stroke-width="0.1" fill="#777"
                                                                 points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col text-center appear-animation" data-appear-animation="fadeInUpShorterPlus"
                             data-appear-animation-delay="800" data-plugin-options="{'accY': -250}">
                            <a href="{{ route('blog') }}" class="btn btn-primary font-weight-bold px-5 btn-py-3">VIEW
                                BLOGS</a>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Our Services --}}
            <section class="section bg-transparent section-no-border my-0">
                <div class="container pt-3 pb-4">
                    <div class="row">
                        <div class="col text-center">
                            <div class="appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="0">
                                <h2 class="mb-0 font-weight-bold">Our Services</h2>
                                <div class="divider divider-primary divider-small mt-2 mb-4 text-center">
                                    <hr class="my-0 mx-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        @foreach ($ourServices->take(6) as $service)
                            <div class="col-lg-4">
                                <div class="feature-box feature-box-style-2 mb-4 appear-animation"
                                     data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                    <div class="feature-box-info ms-3">
                                        <h4 class="mb-2">{{ $service->ser_name }}</h4>
                                        <p class="text-break fz-15 text-justify">{{ Str::words(strip_tags($service->short_description), 25, '') }}</p>
                                        <a class="mt-3 font-weight-semi-bold" title="{{ $service->ser_name }}" href="{{ route('singleService', $service->slug) }}">Learn More <img width="27" height="27" src="{{ asset('assets/front/latest/img/demos/law-firm/icons/arrow-right.svg') }}" title="{{ $service->ser_name }}" data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-dark d-inline-block ms-2 p-relative bottom-1'}" /></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="form-group col text-center mt-5">
                            <a href="{{ route('allServices') }}"
                               class="btn btn-primary font-weight-bold px-5 btn-py-3">Explore All Services</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!--Add Modal-->
        <div class="modal" id="review" tabindex="-1" aria-hidden="true" aria-labelledby="AddReviewModalLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddReviewModalLabel">Write A Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul id="save_msgList"></ul>
                        <form id="cform" name="cform">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <div class="form-group col-lg-12">
                                <input type="text" placeholder="Full Name"
                                       class="form-control text-3 h-auto py-2 name" name="name">
                            </div>
                            <label class="form-label">Short Address <span class="text-danger">*</span></label>
                            <div class="form-group col-lg-12">
                                <input type="text" placeholder="Company Name"
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
                                <button type="button" class="btn btn-primary add_review" data-dismiss="modal" aria-label="Close">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
