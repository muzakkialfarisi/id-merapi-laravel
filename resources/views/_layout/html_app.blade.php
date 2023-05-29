<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
        <meta name="author" content="Bootlab">

        <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/dark.css') }}" >
        <link rel="stylesheet"  type="text/css" href="{{ asset('lib/sweetalert2/sweetalert2.min.css') }}">

        <title>{{ config('app.name') }}</title>
    </head>
    <body style="font-size: 14px">
        {{-- <div class="splash active">
            <div class="splash-icon"></div>
        </div> --}}

        <div class="wrapper">
            <nav id="sidebar" class="sidebar">
                <a class="sidebar-brand" asp-controller="Dashboards" asp-action="Index">
                    {{-- <img src="~/img/avatars/wmsmini.jpg" class="img-fluid rounded-3  mb-2" alt="M-API" /> --}}
                    &nbsp;&nbsp;
                    MERAPI
                </a>
                <div class="sidebar-content">
                    <div class="sidebar-user">
                        <img src="{{ URL::asset('image/user/avatar/' . Auth::user()->avatar) }}" class="img-fluid rounded-circle mb-2" alt="Profile Picture" />

                        <div class="fw-bold">

                            {{ Auth::user()->name ?? 'Muzakki Ahmad Al Farisi' }}

                        </div>
                        {{-- <small> @User.FindFirst(x => x.Type == "ProfileName")?.Value </small> --}}
                    </div>

                    <ul class="sidebar-nav">
                        @include('_layout._content.menu')
                    </ul>

                </div>
            </nav>

            <div class="main">
                <nav class="navbar navbar-expand navbar-theme">
                    <a class="sidebar-toggle d-flex me-2">
                        <i class="hamburger align-self-center"></i>
                    </a>

                    <div class="navbar-text">
                        {{-- @ViewData["MenuKey"] / @ViewData["Title"] --}}
                    </div>

                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item dropdown ms-lg-2">

                                <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
                                    <i class="align-middle fas fa-user-cog"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    {{-- <a class="dropdown-item" asp-controller="Account" asp-action="Index"><i class="align-middle me-1 fas fa-fw fa-user"></i> View Profile</a>
                                    <div class="dropdown-divider"></div> --}}
                                    <form method="get" action="{{ route('auth.logout_process') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>

                </nav>
                <main class="container-fluid">

                    @yield('content')

                </main>
                @include('_layout.footer')
            </div>
        </div>

        <script src="{{ URL::asset('lib/js/app.js') }}"></script>
        <script src="{{ URL::asset('lib/sweetalert2/sweetalert2.min.js') }}"></script>
        @stack('scripts')

        @include('_layout.notification')
    </body>
</html>