{{-- <!-- Navigation--> --}}
<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 107, 'stickySetTop': '-60px', 'stickyChangeLogo': true}" style="background-image: url(@yield('bg-img'))">
    <div class="header-body border-color-primary border-top-0 box-shadow-none">
        <div class="header-top" style="height: 53.8906px;">
            <div class="container">
                <div class="header-row">
                    <div class="header-column d-none d-md-inline-block justify-content-start">
                        <div class="header-row">
                            <ul class="list list-unstyled list-inline mb-0">
                                <li class="list-inline-item text-color-dark me-md-4 mb-0 d-none d-md-inline-block">
                                    <i class="icons icon-screen-smartphone text-color-primary text-4 position-relative top-2 me-1"></i>
                                    <a href="tel:917405149211" class="text-color-dark text-color-hover-primary text-decoration-none">
                                        <strong>91 9512347365</strong>
                                    </a>
                                </li>
                                <li class="list-inline-item text-color-dark me-4 mb-0 d-none d-md-inline-block">
                                    <i
                                       class="icons icon-envelope text-color-primary text-4 position-relative top-4 me-1"></i>
                                    <a href="mailto:enquiry@bestlegalservices.in"
                                       class="fz-14 font-weight-bold text-color-dark text-color-hover-primary text-decoration-none">
                                        enquiry@bestlegalservices.in
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-column justify-content-md-end">
                        <div class="header-row">
                            {{-- <a class="font-weight-semibold text-decoration-none px-3" style="font-size: 20px;color: #102e44;">"Registration is Free"</a> --}}
                            @php
                                $socials = \App\Models\social::all();
                            @endphp
                            <ul class="header-social-icons social-icons social-icons-clean d-none d-lg-block">
                                @foreach ($socials as $social)
                                    <li class="social-icons-facebook"><a href="{{ $social->fb }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="{{ $social->li }}" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
                                    <li class="social-icons-instagram"><a href="{{ $social->ig }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                @endforeach
                            </ul>

                            <a class="text-color-dark text-color-hover-primary font-weight-semibold text-decoration-none px-3" href="{{ route('home') }}">Home</a>

                            <a href="{{ route('customer.helpdesk.register') }}" class="text-color-dark text-color-hover-primary font-weight-semibold text-decoration-none px-3">Register Now</a>
                            <a class="text-color-dark text-color-hover-primary font-weight-semibold text-decoration-none px-3"
                               href="#" role="button" id="dropdownMenus" data-bs-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                More
                            </a>

                            <div class="justify-content-end">
                                <div id="google_translate_element" class="d-none"></div>
                                <select class="selectpicker" data-width="fit" onchange="translateLanguage(this.value);">
                                    <option data-content='English' value="English">English</option>
                                    <option data-content='Bengali' value="Bengali">Bengali</option>
                                    <option data-content='Gujarati' value="Gujarati">Gujarati</option>
                                    <option data-content='Hindi' value="Hindi">Hindi</option>
                                    <option data-content='Marathi' value="Marathi">Marathi</option>
                                    <option data-content='Nepali' value="Nepali">Nepali</option>
                                    <option data-content='Oriya' value="Oriya">Oriya</option>
                                    <option data-content='Punjabi' value="Punjabi">Punjabi</option>
                                    <option data-content='Tamil' value="Tamil">Tamil</option>
                                    <option data-content='Telugu' value="Telugu">Telugu</option>
                                    <option data-content='Urdu' value="Urdu">Urdu</option>
                                </select>
                            </div>

                            <div class="dropdown-menu dropdown-menu-arrow-centered min-width-0"
                                 aria-labelledby="dropdownMenus">
                                <a class="dropdown-item text-1 font-weight-bold" target="_blank" rel="noreferrer noopener" href="{{ route('customer.helpdesk.login') }}">Customer Login</a>
                                <a class="dropdown-item text-1 font-weight-bold" href="{{ route('blog') }}">Blogs</a>
                                <a class="dropdown-item text-1 font-weight-bold" href="{{ route('about') }}">About Us</a>
                                <a class="dropdown-item text-1 font-weight-bold" href="{{ route('contact') }}">Contact Us</a>
                                <a class="dropdown-item text-1 font-weight-bold" href="{{ route('carrers') }}">Careers</a>
                                <a class="dropdown-item text-1 font-weight-bold" href="{{ route('faq') }}">FAQ</a>
                                <a class="dropdown-item text-1 font-weight-bold" href="{{ route('offers') }}">Offers</a>
                                <a class="dropdown-item text-1 font-weight-bold" href="{{ route('affiliates') }}">Become An Affiliate</a>
                                <a class="dropdown-item text-1 font-weight-bold" href="{{ route('viewAllTestimonial') }}">Client Testimonials</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container" style="height: 100px;">
            <div class="header-column">
                <div class="header-row">
                    <div class="header-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/bestlegalservices-logo.png') }}"
                                 alt="Best Legal Services" width="250" height="60">
                        </a>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <div class="header-row">
                    <div class="header-nav header-nav-links">
                        <div class="header-nav-main header-nav-main-text-capitalize header-nav-main-effect-2 header-nav-main-sub-effect-1">
                            <nav class="collapse">
                                <ul class="nav nav-pills" id="mainNav">
                                    @if (is_array($categories) || is_object($categories))
                                        @foreach ($categories as $category)
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item dropdown-toggle">
                                                    {{ $category->category_name }}
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="">
                                                        <div class="dropdown-mega-content">
                                                            <div class="row">
                                                                @foreach ($category->sub_category as $sub_category)
                                                                    @php
                                                                        $services = \App\Models\Service::where('status', '1')
                                                                            ->Where('sub_cat', $sub_category->id)
                                                                            ->orderBy('position', 'ASC')
                                                                            ->get();
                                                                    @endphp
                                                                    <div class="col-lg-3 mb-3">
                                                                        <span class="dropdown-mega-sub-title">{{ $sub_category->category_name }}</span>
                                                                        <ul class="dropdown-mega-sub-nav">
                                                                            @foreach ($services->take(7) as $service)
                                                                                <li><a class="dropdown-item" href="{{ route('singleService', $service->slug) }}">{{ $service->ser_name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endif

                                    <li class="dropdown">
                                        <a class="dropdown-item" href="{{ route('blog') }}">
                                            Blogs
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-item p-0" href="{{ route('viewAllTestimonial') }}">
                                            Client Testimonials
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
