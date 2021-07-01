<!DOCTYPE html>
<html lang="zxx">
<head>

    @include('partials.app-index._head')

</head>

<body class="site-layout--landing preloader-is--active bg-image bg-fixed bg--texture-05">

<div class="site-wrapper">

    @include('partials.app-index._navbar-index')

    <!-- Content
    ================================================== -->
    <main class="site-content text-center" id="wrapper">
        @yield('content')
    </main>

    @include('partials.app-index._footer-index')

    <div class="landing-detail landing-detail--left">
        <span>&nbsp;</span>
        <span>&nbsp;</span>
        <span>&nbsp;</span>
    </div>
    <div class="landing-detail-cover landing-detail-cover--left">
        <span>&nbsp;</span>
        <span>&nbsp;</span>
        <span>&nbsp;</span>
    </div>
    <div class="landing-detail landing-detail--right">
        <span>&nbsp;</span>
        <span>&nbsp;</span>
        <span>&nbsp;</span>
    </div>
    <div class="landing-detail-cover landing-detail-cover--right">
        <span>&nbsp;</span>
        <span>&nbsp;</span>
        <span>&nbsp;</span>
    </div>
    <!-- Overlay -->
    <div class="site-overlay"></div>
    <!-- Overlay / End -->


    {{--@include('partials.app._navbar-index-mobile')--}}
</div>

@include('partials.app-index._preloader')

@include('partials.app-index._cursor')

@include('partials.app-index._scripts')

@include('partials.global._toasts')

</body>

</html>
