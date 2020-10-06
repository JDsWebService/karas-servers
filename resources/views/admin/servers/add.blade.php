@extends('layouts.admin')

@section('title', 'Add Server')

@section('content')

	<div class="row">

		<div class="col-sm-12">
			{{ Form::open(['route' => 'admin.servers.store']) }}
				<label for="provider_id">Battlemetrics Server ID</label>
				{{ Form::text('provider_id', null, ['class' => 'form-control', 'placeholder' => '846493']) }}

                <button type="submit" class="btn btn-success mt-4 btn-block"><i class="fas fa-server"></i> Add Server</button>
			{{ Form::close() }}
		</div>

	</div>

@endsection
