<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>E-Learning STMIK Dharma Negara</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets_6/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/visualization/echarts/echarts.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/maps/echarts/world.js')}}"></script>

	<script src="{{asset('assets_6/js/app.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/area_gradient.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/map_europe_effect.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/progress_sortable.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/bars_grouped.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/line_label_marks.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-xl navbar-dark bg-indigo navbar-static px-0">
		<div class="d-flex flex-1 pl-3">
			<div class="navbar-brand wmin-0 mr-1">
				<a href="index.html" class="d-inline-block">
					<img src="{{asset('global_assets/images/logo_light.png')}}" class="d-none d-sm-block" alt="">
					<img src="{{asset('global_assets/images/logo_icon_light.png')}}" class="d-sm-none" alt="">
				</a>
			</div>
		</div>

		<div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
			<ul class="navbar-nav flex-row">
		
				<li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
					<a href="#" class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
						<img src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle mr-xl-2" height="38" alt="">
						<span class="d-none d-xl-block">{{Auth::guard('mahasiswa')->user()->nm_mhs}}</span>
					</a>
		
					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item active">Kelas</span>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->
		

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">
                
				<!-- Page header -->
                <div class="row" style="padding-top: 6px;">
                    <div class="content container">
                        <div class="alert bg-primary text-white alert-styled-left alert-arrow-left alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            <span class="font-weight-semibold">Selamat Datang di <i>E-Learning</i> STMIK Dharma Negara Bandung.</span>
                        </div>
                    </div>
                </div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content container pt-0">

					<!-- Blocks with chart -->
					<div class="row">

                        @foreach($items as $item)
                        <div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-teal text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">{{$item->kelas->matkul->matkul}}</h5>
									<span class="d-block">{{$item->kelas->dosen->nm_dsn}}</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">{{$item->kelas->matkul->semester}}</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">{{$item->kelas->matkul->sks}}</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">{{$item->kelas->waktu}}</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">{{$item->kelas->thn_akademik}}</a></div>
									</div>
								</div>
							</div>
                        </div>
                        @endforeach

						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-pink text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-primary text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-purple text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-yellow text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-danger text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-info text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-secondary text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-light text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-success text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-indigo text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-success text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-dark text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0">Pemrograman Framework</h5>
									<span class="d-block">Endra Abdul Hadi, S.T., M.Kom</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">VII</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Jumlah SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">3</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">10.00-12.00</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">2022/2023</a></div>
									</div>
								</div>
							</div>
                        </div>

					</div>
					<!-- /blocks with chart -->

				</div>
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
						&copy; 2022. <a><i>E-Learning</i></a> STMIK Dharma Negara Bandung.
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
