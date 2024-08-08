<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('assets/front/img/bls-favicon.png') }}" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/fontawesome-free/css/all.min.css') }}">

    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />

    <title>Best Legal Services - Admin Login</title>
</head>

<body class="bg-surface">

    <!--start wrapper-->
    <div class="wrapper">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-0 border-bottom">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/bestlegalservices-logo.png') }}" width="250" alt="Best Legal Services" height="60"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </header>

        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card mt-4">
                    <div class="card rounded-0 overflow-hidden shadow-none border mb-5 mb-lg-0">
                        <div class="row g-0 py-5">
                            <div class="col-12 order-1 col-xl-6 d-flex align-items-center justify-content-center border-end">
                                <img src="{{ asset('assets/images/error/auth-img-7.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-12 col-xl-6 order-xl-2">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Sign In</h5>
                                    <p class="card-text mb-4">See your growth and get consulting support!</p>
                                    @if (Session::has('failure'))
                                        <div class="alert alert-danger">{{ Session::get('failure') }}</div>
                                    @endif
                                    <form class="form-body" method="POST" action="{{ route('admin.login.create') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email Address</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                                                    <input type="email" name="email" class="form-control radius-30 ps-5" id="email" placeholder="Email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Enter Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" name="password" class="form-control radius-30 ps-5" id="password" placeholder="Password" value="{{ old('password') }}">
                                                    <div class="input-group-append customeye">
                                                        <span class="show_hide_pass">
                                                            <i class="fas fa-eye" id="show_eye" aria-hidden="true" style="display: none;"></i>
                                                            <i class="fas fa-eye-slash" id="hide_eye" aria-hidden="true" style="display: block;"></i>
                                                        </span>
                                                    </div>
                                                    @error('password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary radius-30">Sign In</button>
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
    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
