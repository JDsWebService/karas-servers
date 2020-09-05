<section class="header navigation fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-xl">
                    {{-- Logo Image --}}
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="/imgs/logo.png" alt="logo">
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
                                <a class="nav-link" target="_blank" href="{{ route('merch') }}">Merch</a>
                            </li>

                            {{-- Blog --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blog.index') }}">Blog & Events</a>
                            </li>

                            {{-- Temporary Server Rules Link --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('servers.rules.index') }}">Server Rules</a>
                            </li> --}}

                            {{-- Servers Links --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Servers
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('servers.status') }}">Status</a>
                                    <a class="dropdown-item" href="{{ route('servers.rules.index') }}">Server Rules</a>
                                    <a class="dropdown-item" href="{{ route('pages.faq') }}">F.A.Q</a>
                                </div>
                            </li>

                            {{-- Resources Link --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('pages.resources') }}">Resources</a>
                            </li> --}}

                            {{-- About Us Page --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pages.about') }}">About Us</a>
                            </li>
                            
                            {{-- Discord Login Button --}}
                            @guest
                                <li class="nav-item">
                                    <a href="{{ route('login.discord') }}" class="btn btn-discord"><i class="fab fa-discord"></i> Login</a>
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