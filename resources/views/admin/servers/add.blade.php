@extends('layouts.app')

@section('title', 'Add Server')

@section('content')

	<section class="section-default section-xs" id="addServer">
	    <div class="container">
	        <div class="row">
	            
				<div class="col-sm-12">
					<h1>Add Server</h1>
					{{ Form::open(['route' => 'admin.servers.store']) }}
						<label for="provider_id">Battlemetrics Server ID</label>
						<input type="text" class="form-control" name="provider_id" placeholder="847309">

						<label for="cluster" class="mt-2">Cluster</label>
						<select name="cluster" class="form-control">
							<option value="pvp">PvP</option>
							<option value="pve">PvE</option>
							<option value="modded">Modded</option>
							<option value="other">Other</option>
						</select>

						<button type="submit" class="btn btn-success mt-2 btn-block"><i class="fas fa-server"></i> Add Server</button>
					{{ Form::close() }}
				</div>

			</div>
		</div>
	</section>

@endsection