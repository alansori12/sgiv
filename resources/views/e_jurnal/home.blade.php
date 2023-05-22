@extends('e_jurnal.mahasiswa.layouts.master')

@section('content')
<div class="content container pt-0">
<!-- Sales by country -->
<div class="card">
	<div class="card-header">
		<h6 class="card-title font-weight-semibold">Daily sales by country</h6>
	</div>

	<div class="card-body">
		<div class="row">
			<div class="col-xl-6">
				<div class="map overflow-hidden rounded mb-3 mb-xl-0" id="map_europe_effect" style="height: 400px;"></div>
			</div>

			<div class="col-xl-6">
				<div class="row">
					<div class="col-sm-6">
						<div class="d-flex align-items-center justify-content-sm-center mb-3">
							<span class="bg-pink-100 text-pink line-height-1 rounded p-2 mr-3">
								<i class="icon-cart top-0"></i>
							</span>
							<div>
								<h6 class="font-weight-bold mb-0">1,890</h6>
								<span class="text-muted">Total sales</span>
							</div>
						</div>
					</div>
				
					<div class="col-sm-6">
						<div class="d-flex align-items-center justify-content-sm-center mb-3">
							<span class="bg-teal-100 text-teal line-height-1 rounded p-2 mr-3">
								<i class="icon-cash3 top-0"></i>
							</span>
							<div>
								<h6 class="font-weight-bold mb-0">€11,781</h6>
								<span class="text-muted">Total revenue</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="chart-container">
					<div class="chart" id="progress_bar_sorted" style="height: 333px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /sales by country -->
</div>
@endsection