<script src="js/global/toasty.min.js?v={{ \Carbon\Carbon::now() }}"></script>

{{-- Info Alert --}}
@if(session()->has('info'))
    <script>
        $(document).ready(function() {
            var options = {
                duration: 12500,
                autoClose: true,
                progressBar: true,
                enableSounds: true,
                sounds: {
                    info: "sounds/notification.wav"
                },
            };
            var toast = new Toasty(options);
            toast.configure(options);
            toast.info("<strong>Heads Up!:</strong> {{ session()->get('info') }}");
        });
    </script>
@endif

{{-- Success Alert --}}
@if(session()->has('success'))
    <script>
        $(document).ready(function() {
            var options = {
                duration: 12500,
                autoClose: true,
                progressBar: true,
                enableSounds: true,
                sounds: {
                    success: "sounds/notification.wav"
                },
            };
            var toast = new Toasty(options);
            toast.configure(options);
            toast.success("<strong>Heads Up!:</strong> {{ session()->get('success') }}");
        });
    </script>
@endif

{{-- Warning Alert --}}
@if(session()->has('warning'))
    <script>
        $(document).ready(function() {
            var options = {
                duration: 12500,
                autoClose: true,
                progressBar: true,
                enableSounds: true,
                sounds: {
                    warning: "sounds/notification.wav"
                },
            };
            var toast = new Toasty(options);
            toast.configure(options);
            toast.warning("<strong>Heads Up!:</strong> {{ session()->get('warning') }}");
        });
    </script>
@endif

{{-- Danger Alert --}}
@if(session()->has('danger'))
    <script>
        $(document).ready(function() {
            var options = {
                duration: 12500,
                autoClose: true,
                progressBar: true,
                enableSounds: true,
                sounds: {
                    error: "sounds/notification.wav"
                },
            };
            var toast = new Toasty(options);
            toast.configure(options);
            toast.error("<strong>Error:</strong> {{ session()->get('danger') }}");
        });
    </script>
@endif
