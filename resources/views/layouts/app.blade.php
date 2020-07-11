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

        @yield('content')

        {{-- Footer Section --}}
        @include('partials.footer')

        {{-- Scripts --}}
        @include('partials.scripts')
    </body>
</html>
