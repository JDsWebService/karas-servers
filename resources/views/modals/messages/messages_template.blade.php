{{-- Messages Modal --}}
<div class="modal fade" id="messagesModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="messagesModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row justify-content-center">
                    <div class="col-sm-12 text-center">
                        <img src="/icons/alerts/{{ $type }}.png" style="width: 128px; height: 128px;" alt="{{ $type }} Alert Image">
                        <hr>
                        @switch($type)
                            @case('success')
                            <h3 class="text-success">Success!</h3>
                            @break
                            @case('warning')
                            <h3 class="text-warning">Heads Up!</h3>
                            @break
                            @case('danger')
                            <h3 class="text-danger">Something Is Wrong!</h3>
                            @break
                            @case('restricted')
                            <h3 class="text-danger">This Is A Restricted Area!</h3>
                            @break
                            @case('error')
                            <h3 class="text-danger">Error!</h3>
                            @break
                            @case('info')
                            <h3 class="text-info">For Your Information...</h3>
                            @break
                            @default
                            Note To User
                        @endswitch

                        {{-- Handle Error Messages Text --}}
                        @if(isset($error_content))
                            The following items need to be fixed in order to continue.
                            <hr>
                            <div class="row justify-content-center">
                                @foreach($error_content->all() as $error)
                                    <div class="col-sm-1 text-right">
                                        <img src="/icons/alerts/danger.png" style="width: 16px; height: 16px;" alt="Error Icon">
                                    </div>
                                    <div class="col-sm-11 text-left">
                                        <p style="font-size: 16px;">{{ $error }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>{{ $content }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
