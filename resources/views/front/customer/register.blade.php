<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/front/img/bls-favicon.png') }}" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/latest/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/latest/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/latest/css/theme-blog.css') }}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{ asset('assets/front/latest/css/skins/skin-law-firm.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/latest/css/custom.css') }}">

    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />

    <title>Best Legal Services - Customer Registration</title>
</head>

<body class="bg-surface">

    <!--start wrapper-->
    <div class="wrapper">

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
                                            <a href="tel:919512347365" class="text-color-dark text-color-hover-primary text-decoration-none">
                                                <strong>91 9512347365</strong>
                                            </a>
                                        </li>
                                        <li class="list-inline-item text-color-dark me-4 mb-0 d-none d-md-inline-block">
                                            <i
                                               class="icons icon-envelope text-color-primary text-4 position-relative top-4 me-1"></i>
                                            <a href="mailto:enquiry@bestlegalservices.in"
                                               class="fz-14 font-weight-bold text-color-dark text-color-hover-primary text-decoration-none text-2">
                                                enquiry@bestlegalservices.in
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="header-column justify-content-md-end">
                                <div class="header-row">
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
            </div>
        </header>

        <!--start content-->
        <main class="authentication-content">
            <div class="container">
                <div class="mt-4">
                    <div class="card rounded-0 overflow-hidden shadow-none bg-white border">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-lgblue">
                                <img class="p-5 text-center w-100" width="250" src="{{ asset('assets/images/authenticate.png') }}">
                                <div class="owl-carousel owl-theme owl-loaded owl-drag owl-carousel-init bg-lgblue" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 7000}">
                                    <div class="text-center p-5">
                                        <h4 class="font-weight-semibold my-3 text-white">Easy-To-Use Dashboard</h4>
                                        <p class="lead lead-2 mb-0 text-white">Everything you need is right here! Be it enquiring for a service, buying a new service, tracking your purchased service, making payments or getting customer support</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 order-xl-2">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title px-5">Sign Up</h5>
                                    <p class="card-text mb-4 px-5">See your growth and get consulting support!</p>
                                    @if (Session::has('failure'))
                                        <div class="alert alert-danger">{{ Session::get('failure') }}</div>
                                    @endif
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    @endif
                                    <form class="form-body px-5" method="POST"
                                          action="{{ route('customer.helpdesk.register.create') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12 ">
                                                <label for="Name" class="form-label">Name</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                         class="position-absolute translate-middle-y search-icon px-3">
                                                        <i class="bi bi-person-circle"></i>
                                                    </div>
                                                    <input type="text" class="form-control radius-30 ps-5" name="name"
                                                           id="Name" placeholder="Enter Name" value="{{ old('name') }}">
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email Address</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                         class="position-absolute translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <input type="email" class="form-control radius-30 ps-5" name="email"
                                                           id="email" placeholder="Email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="mobile" class="form-label">Mobile</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                         class="position-absolute translate-middle-y search-icon px-3">
                                                        <i class="bi bi-phone-fill"></i>
                                                    </div>
                                                    <input type="text" class="form-control radius-30 ps-5" name="mobile"
                                                           id="mobile" placeholder="Mobile">
                                                    @error('mobile')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="agree"
                                                           id="agree_terms" value="1" checked>
                                                    <label class="form-check-label" for="agree_terms">By signing up agree to our
                                                        <a href="{{ route('terms') }}">Terms & Conditions</a> and <a href="{{ route('privacy') }}">Privacy Policy</a></label>
                                                </div>
                                                @error('agree')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid mb-4">
                                                    <a class="font-weight-semibold text-decoration-none text-center px-3" style="font-size: 20px;color: #102e44;">"Registration is Free"</a>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary radius-30">Sign Up</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="login-separater text-center">
                                                    <span>OR</span>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <a class="btn btn-primary radius-30" href="{{ route('customer.helpdesk.login') }}">Sign In</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--end page main-->

        <footer class="bg-white border-top p-3 text-center fixed-bottom">
            <p class="mb-0">Copyright © {{ date('Y') }}. All right reserved.</p>
        </footer>

    </div>
    <!--end wrapper-->

    <script src="{{ asset('assets/front/latest/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/latest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/front/latest/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/front/latest/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets/front/latest/js/theme.js') }}"></script>

    <!-- Demo -->
    <script src="{{ asset('assets/front/latest/js/demos/demo-law-firm.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('assets/front/latest/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets/front/latest/js/theme.init.js') }}"></script>
</body>

</html>
