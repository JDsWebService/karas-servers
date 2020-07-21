@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- Above The Fold - Welcome --}}
    @include('content.hero')

    {{-- About Section --}}
    @include('content.about')

    {{-- Services Section --}}
    @include('content.services')

    {{-- Testimonials Section --}}
    @include('content.testimonials')

    {{-- About Section Small --}}
    {{-- @include('content.about-sm') --}}

    {{-- Team Section --}}
    {{-- @include('content.team') --}}

    {{-- Donations Section --}}
    @include('content.donations')

    {{-- Blog Section --}}
    {{-- @include('content.blog') --}}

@endsection