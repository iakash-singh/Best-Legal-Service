<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('assets/front/img/bls-favicon.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
    <!-- loader-->
    <!--Theme Styles-->
    <link href="{{ asset('assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/header-colors.css') }}" rel="stylesheet" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <title>Best Legal Services - {{ isset($title) ? $title : 'Admin' }}</title>
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
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-icon fs-3">
                    <i class="bi bi-list"></i>
                </div>

                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-user-setting">
                            <ul class="align-items-center navbar-nav">
                                <li class="nav-item dropdown dropdown-large">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret">
                                        <div class="projects">
                                            {{ Auth::guard('web')->user()->name }}
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item dropdown dropdown-user-setting">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                       data-bs-toggle="dropdown">
                                        <div class="user-setting d-flex align-items-center">
                                            <img src="{{ asset('assets/images/avatar/admin_avatar.png') }}" class="user-img" alt="">
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('assets/images/avatar/admin_avatar.png') }}" alt="" class="rounded-circle"
                                                         width="54" height="54">
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 dropdown-user-name">{{ Auth::guard('web')->user()->name }}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <div class="d-flex align-items-center"><i class="bi bi-lock-fill"></i>
                                                    {{ __('Logout') }}
                                                </div>
                                            </a>
                                            <form id="logout-form" method="POST" action="{{ route('admin.logout') }}">
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

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('assets/images/bestlegalservices-logo.png') }}" class="logo-icon" alt="Best Legal Services">
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                @canany(['role-list', 'user-list'])
                    <li>
                        <a href="#" class="has-arrow">
                            <div class="parent-icon"><i class="bi bi-people-fill"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.usrMgmt') }}</div>
                        </a>
                        <ul class="mx-3">
                            @can('role-list')
                                <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.roles.index') }}">{{ trans('admin.sidebar.sub1.role') }}</a>
                                </li>
                            @endcan
                            @can('user-list')
                                <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.users.index') }}">{{ trans('admin.sidebar.sub1.user') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['post-list', 'post-category-list', 'post-tag-list'])
                    <li>
                        <a href="#" class="has-arrow">
                            <div class="parent-icon"><i class="bx bxl-blogger"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.blog') }}</div>
                        </a>
                        <ul class="mx-3">
                            @can('post-list')
                                <li class="{{ request()->is('admin/Blog') || request()->is('admin/Blog/*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.Blog.index') }}"><i class="bi bi-circle"></i>{{ trans('admin.sidebar.sub2.post') }}</a>
                                </li>
                            @endcan
                            @can('post-category-list')
                                <li class="{{ request()->is('admin/category') || request()->is('admin/category/*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.category.index') }}"><i class="bi bi-circle"></i>{{ trans('admin.sidebar.sub2.cat') }}</a>
                                </li>
                            @endcan
                            @can('post-tag-list')
                                <li class="{{ request()->is('admin/tag') || request()->is('admin/tag/*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.tag.index') }}"><i class="bi bi-circle"></i>{{ trans('admin.sidebar.sub2.tag') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['service-list', 'service-category-list'])
                    <li>
                        <a href="#" class="has-arrow">
                            <div class="parent-icon"><i class="lni lni-service"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.service') }}</div>
                        </a>
                        <ul class="mx-3">
                            @can('service-list')
                                <li class="{{ request()->is('admin/Service') || request()->is('admin/Service/*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.service.listService') }}"><i class="bi bi-circle"></i>{{ trans('admin.sidebar.sub3.srv') }}</a>
                                </li>
                            @endcan
                            @can('service-category-list')
                                <li class="{{ request()->is('admin/ServiceCategory') || request()->is('admin/ServiceCategory/*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.ServiceCategory.index') }}"><i class="bi bi-circle"></i>{{ trans('admin.sidebar.sub3.srvCat') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['social-list', 'social-create', 'social-edit', 'social-delete'])
                    <li class="{{ request()->is('admin/Social') || request()->is('admin/Social/*') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.social.store') }}">
                            <div class="parent-icon"><i class="bx bxs-share-alt"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.social') }}</div>
                        </a>
                    </li>
                @endcanany
                @can('ticket-list')
                    <li class="d-flex {{ request()->is('admin/Ticket') || request()->is('admin/Ticket/*') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.ticket.listticket') }}">
                            <div class="parent-icon">
                                <i class="bi bi-file-earmark-break-fill"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.ticket') }}
                                @if (!auth()->user()->is_admin == 1)
                                    @php
                                        $user = auth()->user()->id;
                                        $ticket_count = App\Models\CustTicket::where('user_id', $user)->count();
                                    @endphp
                                @else
                                    @php
                                        $ticket_count = App\Models\CustTicket::select('status')
                                            ->Where('status', 'Opened')
                                            ->count();
                                    @endphp
                                @endif
                                <span class="badge bg-primary rounded-pill">{{ $ticket_count }}</span>
                            </div>
                        </a>
                    </li>
                @endcan
                @can('customer-list')
                    <li class="d-flex {{ request()->is('admin/Customer') || request()->is('admin/Customer/*') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.Customer.index') }}">
                            <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.customers') }}</div>
                        </a>
                    </li>
                @endcan
                @can('testimonial-list')
                    <li class="{{ request()->is('admin/Testimonial') || request()->is('admin/Testimonial/*') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.Testimonial.index') }}">
                            <div class="parent-icon"><i class="bx bx-message-rounded-dots"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.testi') }}</div>
                        </a>
                    </li>
                @endcan
                @canany(['contact-list', 'contact-create', 'contact-edit', 'contact-delete'])
                    <li class="{{ request()->is('admin/Contact') || request()->is('admin/Contact/*') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.Contact.index') }}">
                            <div class="parent-icon"><i class="bx bx-book-content"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.contact') }}</div>
                        </a>
                    </li>
                @endcanany
                @canany(['aff-list', 'aff-create', 'aff-edit', 'aff-delete'])
                    <li class="{{ request()->is('admin/Affiliate') || request()->is('admin/Affiliate/*') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.Affiliate.index') }}">
                            <div class="parent-icon"><i class="bx bx-shape-polygon"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.aff') }}</div>
                        </a>
                    </li>
                @endcanany
                <li class="{{ request()->is('admin/SingleService') || request()->is('admin/SingleService/*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.singleService.list') }}">
                        <div class="parent-icon"><i class="bx bx-book-content"></i>
                        </div>
                        <div class="menu-title">{{ trans('admin.sidebar.sSrv') }}</div>
                    </a>
                </li>
                @can('invoice-list')
                    <li class="{{ request()->is('admin/Invoice') || request()->is('admin/Invoice/*') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.invoice.list') }}">
                            <div class="parent-icon"><i class="bx bx-detail"></i>
                            </div>
                            <div class="menu-title">{{ trans('admin.sidebar.inv') }}</div>
                        </a>
                    </li>
                @endcan
            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->
