@extends('layouts.app')

@section('title', 'Add Server')

@section('content')

	<section class="section-default section-xs" id="addServer">
	    <div class="container">
	        <div class="row">
	            
				<div class="col-sm-12">
					<h1>Server Statuses</h1>
					<hr>
					<p class="lead">The majority of players are on the Xplay Servers which were launched when ARK was given away as a free game on the Epic Game Store (EGS) on June 11th, 2020. Since that day over 14,000 Unique players have passed through our servers. Those that remain are part of a strong and vibrant community that prides itself on helping each other and having fun playing ARK.</p>
					
					@include('servers.widgets.clusters.pve')
					@include('servers.widgets.clusters.pvp')
					@include('servers.widgets.clusters.modded')
					@include('servers.widgets.clusters.standalone')
				</div>
			</div>
		</div>
	</section>

@endsection