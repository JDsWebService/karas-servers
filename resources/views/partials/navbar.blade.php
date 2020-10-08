<section class="header navigation fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-xl">
                    {{-- Logo Image --}}
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset('imgs/logo.png') }}" alt="logo">
                    </a>
                    {{-- Hamburger --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="tf-ion-android-menu"></span>
                    </button>
                    {{-- Links Start --}}
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="https://discord.gg/kara">Join Our Discord</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="{{ route('merch') }}">Merch</a>
                            </li>

                            {{-- Learn More Links --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Connect
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('blog.index') }}">
                                        <i class="fab fa-blogger-b"></i> Blog & Events
                                    </a>
                                    <a class="dropdown-item" href="{{ route('pages.about') }}">
                                        <i class="fas fa-info-circle"></i> About Us
                                    </a>
                                </div>
                            </li>

                            {{-- Servers Links --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Servers
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('servers.status') }}">
                                        <i class="fas fa-heartbeat"></i> Status
                                    </a>
                                    <a class="dropdown-item" href="{{ route('servers.rules.index') }}">
                                        <i class="fas fa-list-ol"></i> Server Rules
                                    </a>
                                    <a class="dropdown-item" href="{{ route('pages.faq') }}">
                                        <i class="fas fa-question"></i> F.A.Q
                                    </a>
                                </div>
                            </li>

                            {{-- Resources Link --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('pages.resources') }}">Resources</a>
                            </li> --}}

                            {{-- Discord Login Button --}}
                            @guest
                                <li class="nav-item">
                                    <a href="{{ route('login.discord') }}" class="btn" id="btn-discord"><i class="fab fa-discord"></i> Login</a>
                                </li>
                            @endguest

                            {{-- User Logged In Dropdown --}}
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if(Auth::user()->avatar != NULL)
                                            <img src="{{ Auth::user()->avatar }}" alt="User's Avatar" class="navbar-avatar rounded-circle">
                                        @endif
                                        {{ Auth::user()->fullusername }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @staff
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                <i class="fas fa-user-shield"></i> Admin Dashboard
                                            </a>
                                        @endstaff
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                            <i class="fas fa-tachometer-alt"></i> Dashboard
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </a>
                                    </div>
                                </li>
                            @endauth
                        </ul>
                    </div> <!-- /.links -->
                </nav>
            </div>
        </div>
    </div>
</section>
