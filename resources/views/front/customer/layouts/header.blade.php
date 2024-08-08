<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('assets/front/img/bls-favicon.png') }}" type="image/png" />
    <!--plugins-->
    {{-- <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/latest/css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <!--Theme Styles-->
    <link href="{{ asset('assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/header-colors.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/front/latest/vendor/jquery/jquery.min.js') }}"></script>
    <title>Best Legal Services - Customer Dashboard</title>
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 4px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #102e44;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #102e44;
        }

    </style>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">

        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand-sm navbar-dark flex-sm-nowrap flex-wrap" style="left: 0px">
                <div class="container-fluid" style="height:2.5rem">
                    <span class="navbar-brand position-absolute">
                        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbar5">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('customer.helpdesk.dashboard') }}">
                            <img src="{{ asset('assets/images/bestlegalservices-logo.png') }}" width="250"
                                 alt="Best Legal Services" />
                        </a>
                    </span>
                    <div class="navbar-collapse collapse mx-auto w-100" id="navbar5">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('customer.helpdesk.dashboard') }}">My
                                    Tickets</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link text-dark" href="">Emails</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('customer.helpdesk.dashboard.document') }}">Document
                                    Vault</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-user-setting">
                            <ul class="align-items-center navbar-nav">
                                <li class="nav-item dropdown dropdown-large">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                                        <div class="projects">
                                            {{ Auth::guard('customer')->user()->name }}
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item dropdown dropdown-user-setting">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                        <div class="user-setting d-flex align-items-center">
                                            <img src="{{ asset('assets/images/avatar/customer_avatar.png') }}" class="user-img" alt="">
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('assets/images/avatar/customer_avatar.png') }}" alt="" class="rounded-circle" width="54" height="54">
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 dropdown-user-name">{{ Auth::guard('customer')->user()->name }}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('customer.helpdesk.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <div class="d-flex align-items-center">
                                                    <div class=""><i class="bi bi-lock-fill"></i></div>
                                                    <div class="ms-2"><span>{{ __('Logout') }}</span></div>
                                                </div>
                                            </a>
                                            <form id="logout-form" method="POST" action="{{ route('customer.helpdesk.logout') }}">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->
