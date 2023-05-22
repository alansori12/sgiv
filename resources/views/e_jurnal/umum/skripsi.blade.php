@extends('e_jurnal.umum.layouts.master')

@section('content')
<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Inner content -->
			<div class="content-inner">
				<!-- Content area -->
				<div class="content container">
					<!-- Basic table -->
					<div class="card">
					<div class="card-header header-elements-inline">
							<h5 class="card-title">Skripsi dan Tugas Akhir</h5>
							<div class="d-flex justify-content-end">
							<form action="{{route('skripsicari')}}" method="GET">
								<div class="form-group row">
									<div class="col-lg-10">
										<div class="input-group">
											<input type="text" class="form-control" name="cari" value="{{ old('cari') }}" placeholder="Search">
											<span class="input-group-append">
											<input type="submit" value="search" class="btn btn-light">
											</span>
										</div>
									</div>
								</div>
							</form>
							</div>
						</div>
						<div class="card-body">
						<div class="accordion-sortable" id="accordion-controls">
                        @foreach($file as $data)
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <div class="media-body">
                                <h5 class="card-title">
                                    <b><a class="text-body collapsed" data-toggle="collapse" href="#collapsible-controls-group{{$data->id}}" aria-expanded="false">
                                        {{$data->judul}} 
                                    </a></b>
                                </h5>
                                {{$data->penulis}}, {{$data->tanggal}}
                                </div>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="fullscreen"></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapsible-controls-group{{$data->id}}" class="collapse" style="">
                                <div class="card-body">
                                    <iframe src="/storage/pendahuluan/{{$data->pendahuluan}}" frameborder="" width="100%" height="450px" ></iframe>
                                </div>
                            </div>
                        </div>
                        @endforeach
						</div>
						{{ $file->links() }}
						</div>
					</div>
					<!-- /basic table -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /inner content -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
    @endsection