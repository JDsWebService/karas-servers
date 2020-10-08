{{-- Primary Alert --}}
@if(Session::has('primary'))
    @include('modals.messages.messages_template', ['type' => 'primary', 'content' => Session::get('primary')])
@endif

{{-- Secondary Alert --}}
@if(Session::has('secondary'))
    @include('modals.messages.messages_template', ['type' => 'secondary', 'content' => Session::get('secondary')])
@endif

{{-- Success Alert --}}
@if(Session::has('success'))
    @include('modals.messages.messages_template', ['type' => 'success', 'content' => Session::get('success')])
@endif

{{-- Danger Alert --}}
@if(Session::has('danger'))
    @include('modals.messages.messages_template', ['type' => 'danger', 'content' => Session::get('danger')])
@endif

{{-- Warning Alert --}}
@if(Session::has('warning'))
    @include('modals.messages.messages_template', ['type' => 'warning', 'content' => Session::get('warning')])
@endif

{{-- Informational Alert --}}
@if(Session::has('info'))
    @include('modals.messages.messages_template', ['type' => 'info', 'content' => Session::get('info')])
@endif

{{-- Restricted Section Alert --}}
@if(Session::has('restricted'))
    @include('modals.messages.messages_template', ['type' => 'restricted', 'content' => Session::get('restricted')])
@endif

{{-- If the page has any errors passed to it --}}
@if(count($errors) > 0)
    @include('modals.messages.messages_template', ['type' => 'error', 'error_content' => $errors])
@endif
