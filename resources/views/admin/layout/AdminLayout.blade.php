<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/alyusr-logo.png') }}"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Al Yusr | Admin</title>
        <link rel="stylesheet" href="{{ asset('icofont/icofont.min.css') }}">
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        <main class="container-fluid">
            @auth
            <div style="width: 100%;" class="row  flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/dashboard" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Menu</span>
                        </a>
                        <ul class="nav nav-pills  flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a wire:navigate href="/dashboard" class="nav-link {{ request()->routeIs('dashboard') ? 'text-info' : 'text-light' }} align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a wire:navigate href="{{ route("gallery") }}" class="nav-link {{ request()->routeIs('gallery') ? 'text-info' : 'text-light' }}  align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Gallery</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a wire:navigate href="{{ route("application") }}" class="nav-link {{ request()->routeIs('application') || request()->routeIs('details_applicant') ? 'text-info' : 'text-light' }} align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Application</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a wire:navigate href="{{ route("inquiry") }}" class="nav-link {{ request()->routeIs('inquiry') || request()->routeIs('details_inquiry') ? 'text-info' : 'text-light' }} align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Inquiry</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a wire:navigate href="{{ route("jobs") }}" class="nav-link {{ request()->routeIs('jobs') || request()->routeIs('create_job') ? 'text-info' : 'text-light' }} align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Jobs</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a wire:navigate href="{{ route("logout") }}" class="nav-link text-light align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Logout</span>
                                </a>
                            </li>

                        </ul>
                        <hr>
                    </div>
                </div>
                <div style="height:90vh; width:90%;" id="loading_screen" class="d-flex loading_screen align-items-center justify-content-center">
                    <div class="spinner-border text-danger" role="status">
                      <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                @yield('contents')
            </div>
            @endauth
            @guest
                @yield('guestContents')
            @endguest
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const loadingScreen = document.getElementById('loading_screen');
                const alertElement = document.getElementById('notif')

                if (loadingScreen) {
                    loadingScreen.classList.remove('d-flex');
                    loadingScreen.classList.add('d-none');
                }
                removeNotif(alertElement)

            });

            function removeNotif(e){
                setTimeout(function(){
                    if(e){
                        e.classList.add('d-none')
                    }
                },4000)
            }


        </script>
    </body>
</html>

