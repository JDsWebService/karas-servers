@extends('layouts.admin')

@section('title', 'Add Server')

@section('content')

	<div class="row">

		<div class="col-sm-6">
			{{ Form::model($server, ['route' => ['admin.servers.update', $server->id]]) }}
				{{ Form::hidden('provider_id') }}
            
				<button type="submit" class="btn btn-success mt-4 btn-block"><i class="fas fa-server"></i> Save Server</button>
			{{ Form::close() }}
		</div>
		<div class="col-sm-6">
			<div class="callout callout-warning">
				<h4>Heads Up!</h4>
				<p>This information will be updated when you save. You can't edit this information.</p>
			</div>

			<label>Server Name</label>
			<input type="text" value="{{ $server->name }}" class="form-control" disabled>

			<label class="mt-2">BattleMetrics ID</label>
			<input type="text" value="{{ $server->provider_id }}" class="form-control" disabled>

			<div class="row mt-2">
				<div class="col-sm-6">
					<label>Server IP</label>
					<input type="text" value="{{ $server->ip }}" class="form-control" disabled>
				</div>
				<div class="col-sm-6">
					<label>Server Port</label>
					<input type="text" value="{{ $server->port }}" class="form-control" disabled>
				</div>
			</div>
			{{ Form::open(['route' => ['admin.servers.delete', $server->provider_id], 'method' => 'DELETE']) }}
				<button type="submit" class="btn btn-sm btn-danger mt-4 btn-block">
					<i class="far fa-trash-alt"></i> Delete Server
				</button>
			{{ Form::close() }}
		</div>

	</div>

@endsection
