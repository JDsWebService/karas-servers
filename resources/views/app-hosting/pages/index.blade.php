@extends('layouts.app-main')

@section('title', 'Minecraft Hosting')

@section('content')

    @include('sections.app-hosting._hero')

    @include('partials.app-hosting._navbar')

    @include('sections.app-hosting._about')

    @include('sections.app-hosting._about-detailed')

    @include('sections.app-hosting._cta')

{{--    @include('sections.app-main._services')--}}

{{--    @include('sections.app-main._team-skills')--}}

    {{--@include('sections.app-main._portfolio')--}}

    @include('sections.app-hosting._counters')

    @include('sections.app-hosting._team')

    @include('sections.app-hosting._pricing')

    {{--@include('sections.app-main._testimonials')--}}

{{--    @include('sections.app-main._blog')--}}

    {{--@include('sections.app-main._contact')--}}

@endsection
