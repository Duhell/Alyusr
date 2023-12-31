<div>
    <header>
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item pl-0 mb-0">
                            <li class="list-inline-item"><a href="mailto:alyusrcb12@outlook.com"><i
                                        class="icofont-support-faq mr-2"></i>admin@alyusr.website</a></li>
                            <!-- <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, New York, USA </li> -->
                        </ul>
                    </div>
                    <div class="col-lg-6 ">
                        <div
                            class="text-lg-right top-right-bar d-flex justify-content-between align-items-center  mt-2 mt-lg-0 ">
                            <a href="tel:+966533416292">
                                <span class="translate-target">Call Now : </span>
                                <span class="h4 text-white">+966533416292</span>
                            </a>
                            {{-- <a href="https://portal.yaramay.com/" target="_blank"><button type="button" class="btn btn-primary m-3" style="padding: 5px 10px!important;">login</button></a> --}}
                            @auth
                                @if (Auth::user()->role == 0)
                                    <a href="{{ route('logout') }}" class="text-light translate-target">Logout</a>
                                @elseif (Auth::user()->role == 1)
                                    <a href="{{ route('dashboard') }}" class="text-light translate-target">Go back to dashboard</a>
                                @endif
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="text-light translate-target">login</a>
                            @endguest
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/alyusr-logo.png') }}" alt="" class="img-fluid">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item my-2"><a wire:navigate href="/"
                                class="nav-link translate-target {{ request()->routeIs('landing') ? 'text-info' : '' }}">Home</a></li>

                        <li class="nav-item dropdown my-2">
                            <a class="nav-link translate-target dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                About Us<i class="icofont-thin-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a wire:navigate href="/about"
                                        class="dropdown-item  {{ request()->routeIs('about_us') ? 'text-info text-dark bg-info' : '' }}">About
                                        Al Yusr</a></li>
                                <li><a wire:navigate href="/legality"
                                        class="dropdown-item  {{ request()->routeIs('our_legality') ? 'text-info text-dark bg-info' : '' }}">Legality</a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item my-2"><a wire:navigate href="/jobs"
                                class="nav-link translate-target {{ request()->routeIs('listJobs') || request()->routeIs('details_job_list') ? 'text-info' : '' }}">Jobs</a>
                        </li>
                        <li class="nav-item my-2"><a wire:navigate href="/services"
                                class="nav-link translate-target {{ request()->routeIs('our_services') ? 'text-info' : '' }}">Services</a>
                        </li>


                        <li class="nav-item dropdown my-2">
                            <a class="nav-link translate-target  dropdown-toggle {{ request()->routeIs('category_gallery') ? 'text-info' : '' }}"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery<i class="icofont-thin-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                @php
                                    $routes = ['achievements', 'events', 'staff', 'office', 'activities', 'others'];
                                @endphp
                                @foreach ($routes as $route)
                                    <li><a wire:navigate href="{{ route('category_gallery', $route) }}"
                                            class="dropdown-item {{ request()->is('gallery/' . $route) ? 'text-info text-dark bg-info' : '' }}">{{ Str::ucfirst($route) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>



                        <li class="nav-item my-2"><a wire:navigate href="/contact"
                                class="nav-link translate-target {{ request()->routeIs('contact_us') ? 'text-info' : '' }}">Contact</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="/application" class="btn translate-target btn-main-2 btn-icon btn-round-full my-2">
                                Apply Now
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="{{ route('sendInquiry') }}" class="btn translate-target btn-main-2 btn-icon btn-round-full my-2">
                                Inquire Now
                            </a>
                        </li>
                        <li wire:ignore class="nav-item dropdown my-2">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="icofont-world"></i><i class="icofont-thin-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" language="en" class="dropdown-item language">English</a></li>
                                <li><a href="#" language="ar" class="dropdown-item language">Arabic</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>


</div>
