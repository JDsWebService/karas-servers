@extends('layouts.app')

@section('title', 'Server Statuses')

@section('stylesheets')

    <link rel="stylesheet" href="{{ asset('css/servers.css') }}">

@endsection

@section('content')
    <!-- Portfolio Start -->
    <section class="section-default section-xs server-status-index">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <h1>Server Statuses</h1>
                    <hr>
                    <p class="lead">The majority of players are on the Crossplay Servers which were launched when ARK was given away as a free game on the Epic Game Store (EGS) on June 11th, 2020. Since that day over 14,000 Unique players have passed through our servers. Those that remain are part of a strong and vibrant community that prides itself on helping each other and having fun playing ARK.</p>
                    <div class="block">
                        <div class="portfolio-menu">
                            <div class="btn-group btn-group-toggle justify-content-center" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary active">
                                    <input type="radio" name="shuffle-filter" value="all" checked="checked" />All
                                </label>
                                @foreach($clusters as $cluster)
                                    <label class="btn btn-sm btn-primary">
                                        <input type="radio" name="shuffle-filter" value="{{ $cluster->computedCluster }}" />
                                        {{ $cluster->computedCluster }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="row shuffle-wrapper">
                            @foreach($servers as $server)
                                <div class="col-sm-3 server-item shuffle-item" data-groups="[&quot;{{ $server->computedCluster }}&quot;]">
                                    <div class="card mb-1 mx-1">
                                        <img src="{{ $server->serverImage }}" class="card-img-top" alt="{{ $server->map }} Image">
                                        <div class="card-body">
                                            <h6 class="card-title text-center" style="height: 50px;">{{ $server->name }}</h6>
                                            <p class="card-text text-dark">
                                                <strong>Status: </strong>{!! $server->serverStatus !!}
                                                <br>
                                                <strong>Players: </strong>{{ $server->players }}/{{ $server->maxPlayers }}
                                                <br>
                                                <strong>Global Rank: </strong> #{{ $server->rank }}
                                                <br>
                                                <strong>In-Game Day: </strong> Day {{ $server->time }}
                                                <br>
                                                <strong>Last Updated: </strong> {{ $server->lastUpdatedAt }}
                                                <br>
                                                @foreach($server->serverAttributes as $attribute)
                                                    {!! $attribute !!}
                                                @endforeach
                                            </p>
                                            <a  href="steam://connect/{{ $server->ip }}:{{ $server->port }}"
                                                class="btn btn-steam btn-sm btn-block">
                                                <i class="fab fa-steam"></i> Direct Connect
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    {{-- filter --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/5.2.3/shuffle.min.js"></script>
    <script src="/plugins/app/SyoTimer/jquery.syotimer.min.js"></script>

    <script>
        // Shuffle js filter and masonry
        var containerEl = document.querySelector('.shuffle-wrapper');
        if (containerEl) {
            var Shuffle = window.Shuffle;
            var myShuffle = new Shuffle(document.querySelector('.shuffle-wrapper'), {
                itemSelector: '.shuffle-item',
                buffer: 1
            });

            jQuery('input[name="shuffle-filter"]').on('change', function (evt) {
                var input = evt.currentTarget;
                if (input.checked) {
                    myShuffle.filter(input.value);
                }
            });
        }
    </script>

@endsection
