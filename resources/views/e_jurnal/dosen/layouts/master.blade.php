<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>E-Journal & E-Skripsi STMIK Dharma Negara</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets2/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/visualization/echarts/echarts.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/maps/echarts/world.js')}}"></script>

	<script src="{{asset('assets2/js/app.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/area_gradient.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/map_europe_effect.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/progress_sortable.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/bars_grouped.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/line_label_marks.js')}}"></script>
	<!-- /theme JS files -->

	<script src="{{asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>

	<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/tables/datatables/extensions/responsive.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/datatables_responsive.js')}}"></script>

	<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{asset('assets/js/app.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/datatables_basic.js')}}"></script>


</head>

<body>

	<!-- Main navbar -->
    @include('e_jurnal.dosen.layouts.includes.navbar')
	<!-- /main navbar -->
		

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">


				<!-- Content area -->
				@yield('content')
				<!-- /content area -->


				<!-- Footer -->
				<div class="navbar navbar-expand-lg navbar-light">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
							<i class="icon-unfold mr-2"></i>
							Footer
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-footer">
						<span class="navbar-text">
                        &copy; 2022. <a><i>E-Journal & E-Skripsi</i></a> STMIK Dharma Negara Bandung.
						</span>
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
