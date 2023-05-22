<div class="navbar navbar-expand-xl navbar-dark bg-indigo navbar-static px-0">
		<div class="d-flex flex-1 pl-3">
			<div class="mt-2">
				<a href="#" class="d-inline-block">
					<img src="{{asset('global_assets/images/logo1.png')}}" height="35px" class="d-none d-sm-block" alt="">
					<img src="{{asset('global_assets/images/logo_icon_light.png')}}" class="d-sm-none" alt="">
				</a>
			</div>
		</div>

		<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-light-100 border-top-xl-0 order-1 order-xl-0">
			<ul class="navbar-nav flex-row text-nowrap mx-auto">
				<li class="nav-item">
					<a href="{{route('mahasiswa1.home')}}" class="navbar-nav-link active">
						<i class="icon-home4 mr-2"></i>
						Home
					</a>
				</li>

				<li class="nav-item">
					<a href="{{route('mahasiswa1.about')}}" class="navbar-nav-link">
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
						<a href="{{ route('mahasiswa1.artikelmahasiswa') }}" class="dropdown-item rounded">Semua Artikel</a>
						<a href="{{ route('mahasiswa1.artikelsaya') }}" class="dropdown-item rounded">Artikel Saya</a>
					</div>
				</li>

                <li class="nav-item dropdown nav-item-dropdown-xl">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-book3 mr-2"></i>
						Skripsi
					</a>
				
					<div class="dropdown-menu dropdown-scrollable-xl">
						<div class="dropdown-divider"></div>
						<a href="{{ route('mahasiswa1.skripsimahasiswa') }}" class="dropdown-item rounded">Semua Skripsi</a>
                        @if(Auth::guard('mahasiswa')->user()->status == 'Alumni')
						<a href="{{ route('mahasiswa1.skripsiku') }}" class="dropdown-item rounded">Skripsi Saya</a>
						@endif
					</div>
				</li>
			</ul>
		</div>

		<div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
			<ul class="navbar-nav flex-row">
		
				<li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
					<a href="#" class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
						<img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-xl-2" height="38" alt="">
						<span class="d-none d-xl-block">
						@if(Auth::guard('mahasiswa')->check())
                            {{ Auth::guard('mahasiswa')->user()->nm_mhs }}
                        @elseif(Auth::guard('dosen')->check())
                            {{ Auth::guard('dosen')->user()->nm_dsn }}
                        @endif
						</span>
					</a>
		
					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{route('mahasiswa1.password.edit')}}" class="dropdown-item"><i class="icon-cog5"></i> Edit Password</a>
						<a href="{{route('mahasiswa1.logout')}}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>