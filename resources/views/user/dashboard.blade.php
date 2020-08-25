@extends('layouts.app')

@section('title', $user->username . '\'s Profile Page')

@section('content')
    <section class="section-default section-xs" id="userDashboard">
        <div class="container">
            <div class="row">
                

                <div class="col-sm-3">
                    @include('components.user-profile-card')
                </div>
                <div class="col-sm-9">
                    <h1>{{ $user->username }}, welcome to your profile!</h1>
                    <hr>
                    @include('components.user-profile-progress')
                    
                    {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'POST']) }}
                        
                        <div class="row">
                            <div class="col-sm-8">
                                <h3>External Profiles</h3>
                            </div>
                            <div class="col-sm-4 text-right">
                                <span class="badge badge-pill badge-info">1/2 Required For Completion</span>
                                @if(!$progress->external)
                                    <span class="badge badge-pill badge-warning">Not Completed</span>
                                @else
                                    <span class="badge badge-pill badge-success">Completed</span>
                                @endif
                            </div>
                        </div>
                        <p class="lead">By filling these two fields out, it will allow our support staff to quickly help you and give you access to our Patreon/Supporters exclusive server whenever you sign up for <a href="https://www.patreon.com/karasworlds" target="_blank">Kara's World's Patreon</a>.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="steam_id">
                                    Steam ID
                                    @include('modals.help.steamid')
                                </label>
                                {{ Form::text('steam_id', null, ['class' => 'form-control', 'placeholder' => '76561198053544529']) }}
                            </div>
                            <div class="col-sm-6">
                                <label for="steam_id">
                                    Epic ID
                                    @include('modals.help.epicid')
                                </label>
                                {{ Form::text('epic_id', null, ['class' => 'form-control', 'placeholder' => 'cac6b765ad724e1ebaef73aae08679f6']) }}
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row mt-3">
                            <div class="col-sm-8">
                                <h3>Social Media</h3>
                            </div>
                            <div class="col-sm-4 text-right">
                                <span class="badge badge-pill badge-info">1/4 Required For Completion</span>
                                @if(!$progress->social_media)
                                    <span class="badge badge-pill badge-warning">Not Completed</span>
                                @else
                                    <span class="badge badge-pill badge-success">Completed</span>
                                @endif
                            </div>
                        </div>
                        <p class="lead">Have a YouTube channel you want to brag about? Do you stream on Twitch? Get your name known, and get a fancy button on your profile card!</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="youtube_url">YouTube URL</label>
                                {{ Form::text('youtube_url', null, ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/channel/UC1RQTdxgMqTasDfS_t8yM4A']) }}
                            </div>
                            <div class="col-sm-6">
                                <label for="twitch_url">Twitch URL</label>
                                {{ Form::text('twitch_url', null, ['class' => 'form-control', 'placeholder' => 'https://www.twitch.tv/shroud']) }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label for="facebook_url">Facebook URL</label>
                                {{ Form::text('facebook_url', null, ['class' => 'form-control', 'placeholder' => 'https://www.facebook.com/DevHacksOfficial']) }}
                            </div>
                            <div class="col-sm-6">
                                <label for="battlemetrics_url">
                                    Battlemetrics URL
                                    @include('modals.help.battlemetricsurl')
                                </label>
                                {{ Form::text('battlemetrics_url', null, ['class' => 'form-control', 'placeholder' => 'https://www.battlemetrics.com/players/915312253']) }}
                            </div>
                        </div>

                        <hr>
                        <h3 class="mt-3">Tribe & Server Info</h3>
                        <p class="lead">Love the server that you're playing on? Apart of the best tribe ever? Let other people know where and who you play with!</p>
                        <div class="row justify-content-center">
                                <div class="col-sm-8"><h5>Server</h5></div>
                                <div class="col-sm-4 text-right">
                                    <span class="badge badge-pill badge-info">2/2 Required For Completion</span>
                                    @if(!$progress->server)
                                        <span class="badge badge-pill badge-warning">Not Completed</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Completed</span>
                                    @endif
                                </div>
                            <div class="col-sm-6">
                                <label for="favorite_server_id">Favorite Server</label>
                                {{ Form::select('favorite_server_id', $serversArray, null, ['placeholder' => 'Select your favorite server...', 'class' => 'form-control']) }}
                            </div>
                            <div class="col-sm-6">
                                <label for="home_server_id">Home Base Server</label>
                                {{ Form::select('home_server_id', $serversArray, null, ['placeholder' => 'Select your home base server...', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                                <div class="col-sm-8"><h5>Tribe</h5></div>
                                <div class="col-sm-4 text-right">
                                    <span class="badge badge-pill badge-info">2/2 Required For Completion</span>
                                    @if(!$progress->tribe)
                                        <span class="badge badge-pill badge-warning">Not Completed</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Completed</span>
                                    @endif
                                </div>
                            <div class="col-sm-6">
                                <label for="tribe_name">Tribe Name</label>
                                {{ Form::text('tribe_name', null, ['class' => 'form-control', 'placeholder' => 'Tribe of ...']) }}
                            </div>
                            <div class="col-sm-6">
                                <label for="tribe_rank">Tribe Rank</label>
                                {{ Form::select('tribe_rank', ['owner' => 'Owner', 'admin' => 'Admin', 'member' => 'Member'], null, ['class' => 'form-control', 'placeholder' => 'Select your Tribe Rank ...']) }}
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-sm-8">
                                <h3>Bio</h3>
                            </div>
                            <div class="col-sm-4 text-right">
                                <span class="badge badge-pill badge-info">1/1 Required For Completion</span>
                                @if(!$progress->bio)
                                    <span class="badge badge-pill badge-warning">Not Completed</span>
                                @else
                                    <span class="badge badge-pill badge-success">Completed</span>
                                @endif
                            </div>
                        </div>
                        <p class="lead">Tell us about yourself!</p>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                {{ Form::textarea('bio', null, ['placeholder' => 'Write your next great story ...']) }}
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-block mt-4"><i class="far fa-save"></i> Save Your Profile</button>
                        

                    {{ Form::close() }}
                </div>
                    

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    
    <x-tiny-m-c-e/>

@endsection