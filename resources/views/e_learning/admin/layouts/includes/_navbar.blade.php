<div class="navbar navbar-expand-lg navbar-dark bg-indigo navbar-static shadow-none">

    <div class="navbar-brand text-center text-lg-left">
        <a href="index.html" class="d-inline-block">
            <img src="../../../../global_assets/images/logo_light.png" class="d-none d-sm-block" alt="">
            <img src="../../../../global_assets/images/logo_icon_light.png" class="d-sm-none" alt="">
        </a>
    </div>

    <div class="collapse navbar-collapse order-2 order-lg-1" id="navbar_search">
        <div class="navbar-search d-flex align-items-center py-3 py-lg-0">
            
        </div>
    </div>

    <div class="order-1 order-lg-2 d-flex flex-1 flex-lg-0 justify-content-end align-items-center">

        <ul class="navbar-nav flex-row align-items-center h-100">

            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-pill" height="34" alt="">
                    <span class="d-none d-lg-inline-block ml-2">
                        @if(Auth::guard('web')->check())
                            {{ Auth::guard('web')->user()->name }}
                        @elseif(Auth::guard('mahasiswa')->check())
                            {{ Auth::guard('mahasiswa')->user()->nm_mhs }}
                        @elseif(Auth::guard('dosen')->check())
                            {{ Auth::guard('dosen')->user()->nm_dsn }}
                        @endif
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right wmin-lg-250 py-2">
                    <div class="dropdown-item d-flex py-2">
                        <div class="flex-1">
                            <div class="font-weight-semibold">Profile</div>
                        </div>
                        <span class="btn btn-dark-100 btn-icon btn-sm text-body border-transparent rounded-pill ml-1">
                            <i class="icon-user"></i>
                        </span>
                    </div>

                    <div class="dropdown-item d-flex py-2">
                        <div class="flex-1">
                            @if(Auth::guard('web')->check())
                                <a href="{{ route('admin.logout') }}" class="font-weight-semibold" style="color: #333">Sign out</a>
                            @elseif(Auth::guard('mahasiswa')->check())
                                <a href="{{ route('mahasiswa.logout') }}" class="font-weight-semibold" style="color: #333">Sign out</a>
                            @elseif(Auth::guard('dosen')->check())
                                <a href="{{ route('dosen.logout') }}" class="font-weight-semibold" style="color: #333">Sign out</a>
                            @endif
                        </div>
                        <span class="btn btn-dark-100 btn-icon btn-sm text-body border-transparent rounded-pill ml-1">
                            <i class="icon-exit2"></i>
                        </span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>