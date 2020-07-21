<!DOCTYPE html>
<html class="no-js">
    <head>
      @include('partials.head')
    </head>

    <body id="body">

        {{-- Preloader --}}
        @include('partials.preloader')
        
        {{-- Navigation Bar --}}
        @include('partials.navbar')

        @include('partials.messages')
        
        @yield('content')

        {{-- Footer Section --}}
        @include('partials.footer-sm')

        {{-- Scripts --}}
        @include('partials.scripts')
        {{-- Custom JS --}}
        <script src="/js/script.js"></script>
    </body>
</html>
