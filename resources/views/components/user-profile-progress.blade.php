@if($progress->percentage == '100')
    <div class="callout callout-success">
        <h4>Profile Complete!</h4>
        <p>Thanks for letting us know about you! Your profile is now complete!</p>
        <p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="{{ $progress->percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress->percentage }}%">{{ $progress->percentage }}%</div>
            </div>
        </p>
    </div>
@else
    <div class="callout callout-warning">
        <h4>Uh-oh! Looks like you haven't filled out your profile just yet!</h4>
        <p>We want to get to know you a little better! Fill out your profile information below, once you click submit you'll see your profile card on the left update accordingly.</p>
        <p>
            <div class="progress">
                @if($progress->percentage == '0')
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">0%</div>
                @else
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="{{ $progress->percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress->percentage }}%">{{ $progress->percentage }}%</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                @endif
            </div>
        </p>
    </div>
@endif