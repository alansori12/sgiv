@extends('e_jurnal.dosen.layouts.master')

@section('content')
<div class="content container pt-3">

    <!-- Control position -->
    @if(Session::has('success'))
    <div class="row pt-3">
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Berhasil!</span> {{Session::get('success')}}
    </div>
    </div>
    @endif

 
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
                        <form action="{{route('dosen1.skripsidosencari')}}" method="GET">
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
                            <iframe src="/storage/skripsi/{{$data->file}}" frameborder="" width="100%" height="450px" ></iframe>
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

</div>
@endsection