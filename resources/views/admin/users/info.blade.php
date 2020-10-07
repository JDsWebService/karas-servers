@extends('layouts.admin')

@section('title', 'User Information for ' . $user->username)

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-3">
            @include('components.user-profile-card')
            @superAdmin
                @if(!$user->isAdmin)
                    <h5 class="mt-3">Make User Admin?</h5>
                    {{ Form::open(['route' => ['admin.users.makeAdmin', $user->provider_id], 'method' => 'POST']) }}
                    <button type="submit" class="btn btn-success btn-block">
                        <i class="fas fa-user-shield"></i> Make Admin
                    </button>
                    {{ Form::close() }}
                @else
                    <h5 class="mt-3">Demote User</h5>
                    {{ Form::open(['route' => ['admin.users.revokeAdmin', $user->provider_id], 'method' => 'POST']) }}
                    <button type="submit" class="btn btn-danger btn-block">
                        <i class="fas fa-user-times"></i> Demote User
                    </button>
                    {{ Form::close() }}
                @endif
            @endsuperAdmin
        </div>
        <div class="col-sm-9">
            <h4>Technical Information</h4>
            <div class="callout callout-info">
                <h4>Heads Up!</h4>
                <p>The following values are raw data from the database. Some values show as 0's or 1's for a boolean true/false value. 1 means true, 0 means false.</p>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <h5>Discord</h5>
                    <label>Provider ID</label>
                    <input type="text" value="{{ $user->provider_id }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Username</label>
                    <input type="text" value="{{ $user->username }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Discriminator</label>
                    <input type="text" value="{{ $user->discriminator }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Full Username</label>
                    <input type="text" value="{{ $user->fullusername }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Avatar</label>
                    <div class="row justify-content-center">
                        <div class="col-sm-9 pr-0">
                            <input type="text" value="{{ $user->avatar }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-sm-3 pl-0">
                            <a href="{{ $user->avatar }}" target="_blank" class="btn btn-block btn-info btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <label class="mt-1">eMail</label>
                    <input type="text" value="{{ $user->email }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Is eMail Verified?</label>
                    <input type="text" value="{{ $user->email_verified }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Locale</label>
                    <input type="text" value="{{ $user->locale }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Two Factor Authentication</label>
                    <input type="text" value="{{ $user->twofactor }}" class="form-control form-control-sm" readonly>
                </div>
                <div class="col-sm-4">
                    <h5>Social Media</h5>
                    <label class="mt-1">Steam ID</label>
                    <input type="text" value="{{ $user->steam_id }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Epic ID</label>
                    <input type="text" value="{{ $user->epic_id }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Youtube Link</label>
                    <div class="row justify-content-center">
                        <div class="col-sm-9 pr-0">
                            <input type="text" value="{{ $user->youtube_url }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-sm-3 pl-0">
                            <a href="{{ $user->youtube_url }}" target="_blank" class="btn btn-block btn-info btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <label class="mt-1">Twitch Link</label>
                    <div class="row justify-content-center">
                        <div class="col-sm-9 pr-0">
                            <input type="text" value="{{ $user->twitch_url }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-sm-3 pl-0">
                            <a href="{{ $user->twitch_url }}" target="_blank" class="btn btn-block btn-info btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <label class="mt-1">Facebook Link</label>
                    <div class="row justify-content-center">
                        <div class="col-sm-9 pr-0">
                            <input type="text" value="{{ $user->facebook_url }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-sm-3 pl-0">
                            <a href="{{ $user->facebook_url }}" target="_blank" class="btn btn-block btn-info btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <label class="mt-1">Battlemetrics Link</label>
                    <div class="row justify-content-center">
                        <div class="col-sm-9 pr-0">
                            <input type="text" value="{{ $user->battlemetrics_url }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-sm-3 pl-0">
                            <a href="{{ $user->battlemetrics_url }}" target="_blank" class="btn btn-block btn-info btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h5>Personal/In-Game</h5>
                    <label class="mt-1">Favorite Server ID</label>
                    <input type="text" value="{{ $user->favorite_server_id }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Home Server ID</label>
                    <input type="text" value="{{ $user->home_server_id }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Tribe Name</label>
                    <input type="text" value="{{ $user->tribe_name }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Tribe Rank</label>
                    <input type="text" value="{{ $user->tribe_rank }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Early Access Member?</label>
                    <input type="text" value="{{ $user->early_access_member }}" class="form-control form-control-sm" readonly>
                    <label class="mt-1">Bio</label>
                    <a href="{{ route('admin.users.bio', $user->provider_id) }}" class="btn btn-block btn-sm btn-info">
                        <i class="far fa-eye"></i> View Bio
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
