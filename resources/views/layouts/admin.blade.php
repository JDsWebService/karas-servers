<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        {{-- Header --}}
        @include('partials.head')

        {{-- Admin Template Specific CSS --}}
        <!-- Custom Scrollbar CSS -->
        <link rel="stylesheet" href="http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">

        <link rel="stylesheet" href="/css/admin/admin.css?v={{ strtotime(\Carbon\Carbon::now()) }}">
        <link rel="stylesheet" href="/css/admin/admin-custom.css?v={{ strtotime(\Carbon\Carbon::now()) }}">
        <link rel="stylesheet" href="/css/admin/admin-themes.css">
        <link rel="stylesheet" href="/css/admin/slate.css">
        
        {{-- Page Specific Stylesheets --}}
        @yield('stylesheets')

        <title>{{ config('app.name', 'Laravel') }} Admin - @yield('title')</title>
        
    </head>

    <body>
    
        {{-- Page Wrapper --}}
        <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
            
            {{-- Sidebar --}}
            @include('partials.admin.sidebar')

            <main class="page-content">
                <div class="container-fluid">
                    {{-- Authentication Debug Component --}}
                    {{-- @component('components.debug.auth')
                    @endcomponent --}}
                    
                    <h3>@yield('title')</h3>
                    <hr>
                    
                    {{-- Flash Messages --}}
                    @include('partials.admin.messages')

                    @yield('content')

                    {{-- Footer --}}
                    @include('partials.admin.footer')
                </div>
            </main> <!-- /.page-content -->
            
        </div> <!-- /.page-wrapper -->

        <!-- Scripts -->
        @include('partials.scripts')
        
        {{-- Admin Template Specific JS --}}
        <script src="http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="/js/admin.js?v={{ strtotime(\Carbon\Carbon::now()) }}"></script>
        {{-- Page Specific Scripts --}}
        @yield('scripts')

    </body>

</html>
