@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
	
	<div class="row justify-content-center">
		<div class="col-sm-12">
			<p class="lead">Welcome to the Admin Dashboard! If you need any help navigating this dashboard, reach out to DJRedNight#3428 on Discord!</p>
			<hr>

			{{-- Statistics --}}
			<div class="row justify-content-center">
				<div class="col-sm-6">
					<h4>Users Last Seven Days</h4>
					<canvas id="myChart" width="100" height="55"></canvas>
				</div>
				<div class="col-sm-6">
					<h4>We are currently managing...</h4>
					<div class="row justify-content-center">
						<div class="col-sm-6">
							<div class="card-counter primary">
								<i class="fas fa-server"></i>
								<span class="count-numbers">{{ $serverCount }}</span>
								<span class="count-name">Servers</span>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="card-counter danger">
								<i class="fas fa-blog"></i>
								<span class="count-numbers">{{ $postCount }}</span>
								<span class="count-name">Blog Posts</span>
							</div>
						</div>
					</div>
					<div class="row justify-content-center mt-3">

						{{-- <div class="col-sm-6">
							<div class="card-counter success">
								<i class="far fa-calendar-alt"></i>
								<span class="count-numbers">6875</span>
								<span class="count-name">Events</span>
							</div>
						</div> --}}

						<div class="col-sm-6">
							<div class="card-counter info">
								<i class="fa fa-users"></i>
								<span class="count-numbers">{{ $userCount }}</span>
								<span class="count-name">Users</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var chartColors = window.chartColors;
		var color = Chart.helpers.color;
		var data = {
			datasets: [{
				label: 'Users',
				data: [
					@foreach($userStats as $day)
						{
							x: {{ $day['date'] }},
							y: {{ $day['count'] }}
						},
					@endforeach
				],
				backgroundColor: [
					color(chartColors.red).alpha(0.5).rgbString(),
					color(chartColors.orange).alpha(0.5).rgbString(),
					color(chartColors.yellow).alpha(0.5).rgbString(),
					color(chartColors.green).alpha(0.5).rgbString(),
					color(chartColors.blue).alpha(0.5).rgbString(),
					color(chartColors.purple).alpha(0.5).rgbString(),
					color(chartColors.grey).alpha(0.5).rgbString(),
				],
				hoverBackgroundColor: [
					color(chartColors.red).alpha(0.9).rgbString(),
					color(chartColors.orange).alpha(0.9).rgbString(),
					color(chartColors.yellow).alpha(0.9).rgbString(),
					color(chartColors.green).alpha(0.9).rgbString(),
					color(chartColors.blue).alpha(0.9).rgbString(),
					color(chartColors.purple).alpha(0.9).rgbString(),
					color(chartColors.grey).alpha(0.9).rgbString(),
				],
			}],
			// These labels appear in the legend and in the tooltips when hovering different arcs
			labels: [
				@foreach($userStats as $day)
					'{{ $day['date'] }}',
				@endforeach
			]
		};
		var options = {
		    scales: {
		        xAxes: [{
		            gridLines: {
		                offsetGridLines: true
		            }
		        }],
		        yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
		    },
		    legend: {
	            display: false,
	        }
		};
		var myBarChart = new Chart(ctx, {
		    type: 'bar',
		    data: data,
		    options: options
		});
	</script>

@endsection