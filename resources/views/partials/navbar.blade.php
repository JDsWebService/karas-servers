<section class="header navigation fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
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

                            {{-- About Us Page --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pages.about') }}">About Us</a>
                            </li>

                            {{-- Temporary Server Rules Link --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('servers.rules.index') }}">Server Rules</a>
                            </li>

                            {{-- Servers Links --}}
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Servers
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('servers.status') }}">Status</a>
                                    <a class="dropdown-item" href="{{ route('servers.rules.index') }}">Server Rules</a>
                                </div>
                            </li> --}}
                            {{-- FAQ Link --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pages.faq') }}">F.A.Q</a>
                            </li>
                            {{-- Dropdown Links --}}
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">404 Page</a>
                                </div>
                            </li> --}}
                            {{-- Discord Login Button --}}
                            {{-- <li class="nav-item">
                                <a href="{{ route('login.discord') }}" class="btn btn-discord"><i class="fab fa-discord"></i> Login</a>
                            </li> --}}
                        </ul>
                    </div> <!-- /.links -->
                </nav>
            </div>
        </div>
    </div>
</section>