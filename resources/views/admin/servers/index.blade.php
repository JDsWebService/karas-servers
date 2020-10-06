@extends('layouts.admin')

@section('title', 'View Servers')

@section('content')

	<div class="row justify-content-center">
		<div class="col-sm-2">
			<a href="{{ route('admin.servers.add') }}" class="btn btn-sm btn-success btn-block">
				<i class="far fa-plus-square"></i> Add Server
			</a>
		</div>
	</div>
	<table class="table table-dark table-hover table-sm table-borderless mt-3">
		<thead>
			<tr>
{{--				<th scope="col">#</th>--}}
{{--				<th scope="col">Name</th>--}}
{{--				<th scope="col">Cluster</th>--}}
{{--				<th scope="col"></th>--}}
			</tr>
		</thead>
		<tbody>
{{--			@foreach($servers as $server)--}}
{{--				<tr>--}}
{{--					<th scope="row">{{ $server->provider_id }}</th>--}}
{{--					<td>{{ $server->name }}</td>--}}
{{--					<td class="text-uppercase">{{ $server->cluster }}</td>--}}
{{--					<td>--}}
{{--						<a href="{{ route('admin.servers.edit', $server->provider_id) }}" class="btn btn-secondary btn-sm">--}}
{{--							<i class="far fa-edit"></i> Edit--}}
{{--						</a>--}}
{{--						<a href="https://www.battlemetrics.com/servers/ark/{{ $server->provider_id }}" class="btn btn-warning btn-sm" target="_blank">--}}
{{--							<i class="fas fa-search"></i> BattleMetrics--}}
{{--						</a>--}}
{{--					</td>--}}
{{--				</tr>--}}
{{--			@endforeach--}}

		</tbody>
	</table>

	<div class="pagination">
		{{ $servers->links() }}
	</div>

@endsection
