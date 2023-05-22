<div class="navbar navbar-expand-xl navbar-dark bg-indigo navbar-static px-0">
		<div class="d-flex flex-1 pl-3">
			<div class="mt-2">
				<!-- <a href="#" class="d-inline-block"> -->
					<img src="{{asset('global_assets/images/logo1.png')}}" height="35px" class="d-none d-sm-block" alt="">
					<img src="{{asset('global_assets/images/logo_2.png')}}" class="d-sm-none" alt="">
				<!-- </a> -->
			</div>
		</div>

		<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-light-100 border-top-xl-0 order-1 order-xl-0">
			<ul class="navbar-nav flex-row text-nowrap mx-auto">
				<li class="nav-item">
					<a href="{{ route('index') }}" class="navbar-nav-link active">
						<i class="icon-home4 mr-2"></i>
						Home
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('about') }}" class="navbar-nav-link">
						<i class="icon-question6 mr-2"></i>
						About
					</a>
				</li>

				<li class="nav-item dropdown nav-item-dropdown-xl">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-book mr-2"></i>
						Jurnal
					</a>
				
					<div class="dropdown-menu dropdown-scrollable-xl">
						<div class="dropdown-divider"></div>
						<a href="{{ route('jurnal') }}" class="dropdown-item rounded">Semua Artikel</a>
					</div>
				</li>

                <li class="nav-item dropdown nav-item-dropdown-xl">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-book3 mr-2"></i>
						Skripsi
					</a>
				
					<div class="dropdown-menu dropdown-scrollable-xl">
						<div class="dropdown-divider"></div>
						<a href="{{ route('skripsi') }}" class="dropdown-item rounded">Semua Skripsi</a>
					</div>
				</li>

                <li class="nav-item dropdown nav-item-dropdown-xl">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-user mr-2"></i>
						Login
					</a>
				
					<div class="dropdown-menu dropdown-scrollable-xl">
						<div class="dropdown-divider"></div>
						<a href="{{ route('admin1.login') }}" class="dropdown-item rounded">Admin</a>
						<a href="{{ route('mahasiswa1.login') }}" class="dropdown-item rounded">Mahasiswa</a>
                        <a href="{{ route('dosen1.login') }}" class="dropdown-item rounded">Dosen</a>
					</div>
				</li>

			</ul>
		</div>

		<div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
			<ul class="navbar-nav flex-row">
		

			</ul>
		</div>
	</div>