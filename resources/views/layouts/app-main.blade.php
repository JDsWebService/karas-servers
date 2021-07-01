<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

    @include('partials.app-main._head')

</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="50">

@include('partials.app-main._preloader')

@yield('content')

@include('partials.app-main._footer')

@include('partials.app-main._scripts')

</body>
</html>
