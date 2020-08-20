@include('components.includes.user-profile-card-css')
<div class="card hovercard">
	<div class="cardheader"></div>
    <div class="avatar">
        <img alt="" src="{{ $user->avatar }}">
    </div>
    <div class="info">
    	{{-- Early Access --}}
    	@if($user->early_access_member)
			<div class="desc">
				<div class="badge badge-success badge-pill">
					<i class="fas fa-medal"></i> Early Access Member
				</div>
			</div>
    	@endif
        <div class="desc">{{ $user->tribe_name }}</div>
        <div class="desc">{{ $user->tribe_rank }}</div>
    </div>
    <div class="bottom">
    	@if($user->youtube_url)
        <a class="btn youtube-color btn-sm" href="{{ $user->youtube_url }}">
            <i class="fab fa-youtube"></i>
        </a>
        @endif
        @if($user->twitch_url)
        <a class="btn twitch-color btn-sm" href="{{ $user->twitch_url }}">
            <i class="fab fa-twitch"></i>
        </a>
        @endif
        @if($user->facebook_url)
        <a class="btn facebook-color btn-sm" href="{{ $user->facebook_url }}">
            <i class="fa fa-facebook"></i>
        </a>
        @endif
        @if($user->battlemetrics_url)
        <a class="btn battlemetrics-color btn-sm" href="{{ $user->battlemetrics_url }}">
            BM
        </a>
        @endif
    </div>
</div>