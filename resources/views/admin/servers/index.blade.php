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
				<th scope="col">BM ID #</th>
				<th scope="col">Name</th>
                <th scope="col">IP/Port</th>
                <th scope="col">Last Updated</th>
                <th scope="col">Map</th>
				<th scope="col">Computed Cluster</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($servers as $server)
                {{ Form::open(['route' => ['admin.servers.delete', $server->provider_id], 'method' => 'DELETE']) }}
				<tr>
					<th scope="row">{{ $server->provider_id }}</th>
					<td>{{ \Illuminate\Support\Str::limit($server->name, 35, '...') }}</td>
                    <td>{{ $server->ip }}:{{ $server->port }}</td>
                    <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($server->updated_at))->diffForHumans() }}</td>
                    <td>{{ $server->map }}</td>
					<td class="text-uppercase">{{ $server->computedCluster }}</td>
					<td>

                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </button>

						<a href="https://www.battlemetrics.com/servers/ark/{{ $server->provider_id }}" class="btn btn-warning btn-sm" target="_blank">
							<i class="fas fa-search"></i> View
						</a>
					</td>
				</tr>
                {{ Form::close() }}
			@endforeach

		</tbody>
	</table>

	<div class="pagination">
		{{ $servers->links() }}
	</div>

@endsection
