@extends('e_jurnal.mahasiswa.layouts.master')

@section('content')

<div class="content container pt-3">
    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <div class="page-header-content container header-elements-md-inline">
                <h5 class="card-title">Materi Terkirim</h5>
                <div class="header-elements">
                <a href="{{ route('mahasiswa1.skripsiku.create') }}" class="btn btn-primary">Upload Skripsi</a>
                </div>
            </div>
        </div>
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Artikel</th>
                    <th>Penyusun</th>
                    <th>Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
                @foreach($logs as $data)
                <tr> 
                    <td>{{$no++}}</td>
                    <td>{{$data->judul}}</td>
                    <td>{{$data->penulis}}</td>
                    <td>{{$data->waktu}}</td>
                    <td>
                        @if($data->status == 'posted')
                        <span class="badge badge-success">{{$data->status}}</span>
                        @elseif($data->status == 'submited')
                        <span class="badge badge-info">{{$data->status}}</span>
                        @elseif($data->status == 'accepted')
                        <span class="badge badge-secondary">{{$data->status}}</span>
                        @elseif($data->status == 'rejected')
                        <span class="badge badge-danger">{{$data->status}}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->
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
    </div>
</div>
<!-- /basic table -->
</div>

@endsection