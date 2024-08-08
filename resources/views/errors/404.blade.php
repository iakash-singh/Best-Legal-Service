<!doctype html>
<html lang="en" class="light-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('assets/front/img/bls-favicon.png') }}" type="image/png" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <title>Best Legal Services - 404 Not Found</title>
</head>

<body>
    <div class="wrapper">
        <main class="page-content mx-0">
            <div class="error-404 d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="card py-5">
                        <div class="row g-0">
                            <div class="col col-xl-5">
                                <div class="card-body p-4">
                                    <h1 class="display-1">
                                        <span class="text-danger">4</span>
                                        <span class="text-primary">0</span>
                                        <span class="text-success">4</span>
                                    </h1>
                                    <h2 class="font-weight-bold display-4">Lost in Space</h2>
                                    <p>You have reached the edge of the universe.
                                        <br>The page you requested could not be found.
                                        <br>Dont'worry and return to the previous page.
                                    </p>
                                    <div class="mt-5">
                                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-md-5 radius-30">Go Home</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <img src="assets/images/error/404-error.png" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="overlay nav-toggle-icon"></div>
        <a href="#" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>
    <div class="overlay nav-toggle-icon"></div>
    <a href="#" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
