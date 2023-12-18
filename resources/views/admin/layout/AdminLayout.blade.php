<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/alyusr-logo.png') }}"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Al Yusr</title>
        <link rel="stylesheet" href="{{ asset('icofont/icofont.min.css') }}">
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        <main class="container-fluid">
            @auth
            <div style="width: 100%;" class="row  flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex w-100 flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/dashboard" class="d-flex w-100 align-items-center border-bottom border-warning pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Menu</span>
                        </a>

                        <ul class="nav nav-pills mt-4 w-100 flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item w-100">
                                <a wire:navigate href="/dashboard" class="nav-link {{ request()->routeIs('dashboard') ? 'text-dark px-2 bg-warning' : 'text-light' }} align-middle px-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                    </svg>
                                    <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item w-100 ">
                                <a wire:navigate href="{{ route("gallery") }}" class="nav-link {{ request()->routeIs('gallery') ? 'text-dark px-2 bg-warning' : 'text-light' }}  align-middle px-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                                        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10"/>
                                    </svg>
                                    <span class="ms-1 d-none d-sm-inline"> Gallery</span>
                                </a>
                            </li>

                            <li class="nav-item w-100">
                                <a wire:navigate href="{{ route("application") }}" class="nav-link {{ request()->routeIs('application') || request()->routeIs('details_applicant') ? 'text-dark px-2 bg-warning' : 'text-light' }} align-middle px-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-up" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4"/>
                                    </svg></i>
                                    <span class="ms-1 d-none d-sm-inline">Application</span>
                                </a>
                            </li>

                            <li class="nav-item w-100">
                                <a wire:navigate href="{{ route("inquiry") }}" class="nav-link {{ request()->routeIs('inquiry') || request()->routeIs('details_inquire') ? 'text-dark px-2 bg-warning ' : 'text-light' }} align-middle px-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                                        <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z"/>
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                    </svg>
                                    <span class="ms-1 d-none d-sm-inline"> Inquiry</span>
                                </a>
                            </li>

                            <li class="nav-item w-100">
                                <a wire:navigate href="{{ route("jobs") }}" class="nav-link {{ request()->routeIs('jobs') || request()->routeIs('create_job') || request()->routeIs('details_job') || request()->routeIs('edit_job') ? 'text-dark px-2 bg-warning' : 'text-light' }} align-middle px-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
                                    </svg>
                                    <span class="ms-1 d-none d-sm-inline"> Job Posts</span>
                                </a>
                            </li>

                            <li class="nav-item w-100">
                                <a wire:navigate href="{{ route("logout") }}" class="nav-link text-light align-middle px-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                                    </svg>
                                    <span class="ms-1 d-none d-sm-inline">Logout</span>
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

