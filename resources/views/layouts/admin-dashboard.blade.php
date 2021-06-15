<!doctype html>
<html lang="en">

<head>
    @include('partials.admin-dashboard._head')
</head>

<body class="dark-edition">
<div class="wrapper ">
    <!--
        Tip 1: You can change the color of the sidebar specifying the color variable. Your options are as follows:

        purple | azure | green | orange | danger

        Tip 2: you can also add a background image. To do so, define the relative path from the public folder.

        Note: Due to Blade restrictions the include has to remain on ONE LINE. Do not put the include on multiple lines. Blade is parsed using Regex, so it does not support multi-line statements.
    -->
    @include('partials.admin-dashboard._sidebar-template', ['color' => 'purple', 'image' => ''])

        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

    @include('partials.admin-dashboard._footer')

    </div>
</div>
@include('partials.admin-dashboard._scripts')
</body>

</html>
