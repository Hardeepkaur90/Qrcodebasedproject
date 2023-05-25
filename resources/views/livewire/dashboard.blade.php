<div>

	<!-- Navbar -->
	<!-- End Navbar -->
	@if(@Auth::user()->roles->role_name === 'superadmin' )


	<div style="display:flex; min-height:calc(100vh - 182px)" class="py-4 dashboard-row">
		<div class="container-fluid py-4">
			<div class="card text-left">
				<div class="card-body">
					<h5 class="card-title">Total Users</h5>
					<p class="card-text">{{$total_users}}</p>
					<a href="manageuser" class="btn btn-primary">Check</a>
				</div>
			</div>
		</div>

		<div class="container-fluid py-4">
			<div class="card text-left">
				<div class="card-body">
					<h5 class="card-title">Total Menu Items</h5>
					<p class="card-text">{{$total_items}}</p>
					<a href="manageitem" class="btn btn-primary">Check</a>
				</div>
			</div>
		</div>

		</div>


<canvas id="myChart" ></canvas>

		@endif
	

</div>


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script>
	const DATA_COUNT = 7;
	const NUMBER_CFG = {
		count: DATA_COUNT,
		min: -100,
		max: 100
	};

	const data = {
		labels: JSON.parse("{{$lables}}"),
		datasets: [{
			label: 'Weekly Orders',
			data: JSON.parse("{{$orders}}"),
		}]
	};
	const myChart = new Chart("myChart", {
		type: 'line',
		data: data,
		options: {
			responsive: true,
			plugins: {
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Chart.js Line Chart'
				}
			}
		},
	});
</script>