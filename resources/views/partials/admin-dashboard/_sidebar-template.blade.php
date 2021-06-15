<div class="sidebar"
     data-color="{{ $color }}"
     data-background-color="black"
     data-image="{{ asset("public/{$image}") }}">

    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Company
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @include('partials.admin-dashboard._sidebar')
        </ul>
    </div>
</div>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">
                            <span class="material-icons">logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
