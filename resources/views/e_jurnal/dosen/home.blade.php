@extends('e_jurnal.dosen.layouts.master')

@section('content')
	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content container">

					<!-- Basic card -->
					<div class="card">
						<div class="card-header">
							<h5 class="card-title"><b>JIDAN : Jurnal Informatika Dharma Negara</b></h5>
						</div>

						<div class="card-body">
                            <div class="float-right" style="margin-left: 50px;"><img alt="Saturn V carrying Apollo 11" class="right" src="{{asset('global_assets/images/gambar_jidan.jpg')}}" height="400"></div>
							<p class="mb-3 text-justify">JIDAN ( Jurnal Informatika Dharma Negara ) merupakan jurnal keilmuan yang diterbitkan oleh Program Studi Teknik informatika Sekolah Tinggi Manajemen Informatika dan Komputer. Jurnal ini berisi karya ilmiah yang mencari inovasi, kreativitas dan kebaruan.</p>

							<p class="mb-3 text-justify">Jurnal ini merupakan wadah publikasi karya ilmiah berupa tulisan ilmiah akademisi mengenai penelitian-penelitian terapan tentang keinformatikaan yang ditulis merupakan karya originalitas dan memiliki landasan bidang informatika. Ruang lingkup tersebut memiliki beberapa kajian yaitu.</p>

							<p>
                                <ol>
                                    <li>Sistem Informasi</li>
                                    <li>Multimedia</li>
                                    <li>Jaringan Komputer</li>
                                    <li>Keamanan Sistem dan Jaringan Komputer</li>
                                    <li><i>E-Commerce</i></li>
                                    <li>Intelegensi Buatan</li>
                                    <li>Sistem Pakar</li>
                                    <li>Data Minning</li>
                                    <li>Sistem Informasi Grafis</li>
                                    <li>Kriptograpi</li>
                                    <li>Sistem Temu Kembali Informasi</li>
                                    <li>Pengolahan Citra Digital</li>
                                    <li>Komputer Grafik dan Animasi</li>
                                    <li><i>Augmented Reality</i></li>
                                    <li>Pemodelan dan Simulasi</li>
                                </ol>
                            </p>
						</div>
					</div>
					<!-- /basic card -->


					<!-- Basic table -->
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Artikel Terbaru</h5>
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
                                {{$data->penyusun}}, volume {{$data->volume}}, {{$data->tanggal}}
                                </div>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="fullscreen"></a>
                                    </div>
                                </div>
                            </div>

                            <div id="collapsible-controls-group{{$data->id}}" class="collapse" style="">
                                <div class="card-body">
                                    <iframe src="/storage/artikel/{{$data->artikel}}" frameborder="" width="100%" height="450px" ></iframe>
                                </div>
                            </div>
                        </div>
                        @endforeach
						</div>
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