@extends('layouts.admin')

@section('title', $user->username . ' Bio')

@section('content')

    <a href="{{ route('admin.users.info', $user->provider_id) }}" class="btn btn-primary">
        <i class="fas fa-backward"></i> Go Back To User Info
    </a>
    <textarea class="form-control mt-3" readonly>{{ $user->bio }}</textarea>

@endsection
