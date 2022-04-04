@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">

                        @foreach($items as $item)
                        <div class="col-lg-4">
                            <div class="card">
								<div class="card-body bg-teal text-white text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <i class="icon-book icon-2x text-white border-white border-3 rounded-pill p-3 mb-3 mt-1"></i>

									<h5 class="font-weight-semibold mb-0"><a href="/dosen/kelas/{{$item->id}}" style="color: #fff">{{$item->matkul->matkul}}</a></h5>
									<span class="d-block">Teknik Informatika</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Semester</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">{{$item->matkul->semester}}</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">SKS</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">{{$item->matkul->sks}}</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-2">
										<div class="font-weight-semibold">Waktu</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">{{$item->waktu}}</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Tahun Akademik</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">{{$item->thn_akademik}}</a></div>
									</div>
								</div>
							</div>
                        </div>
                        @endforeach

					</div>
@endsection