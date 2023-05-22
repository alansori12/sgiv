@extends('e_jurnal.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Control position -->
    <div class="alert bg-teal text-white alert-styled-left alert-arrow-left alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Selamat Datang di <i>E-Jurnal & E-Skripsi</i> STMIK Dharma Negara Bandung.</span>
    </div>
    <!-- /control position -->
    <div class="row">
        <div class="col-lg-3">
            <!-- Members online -->
            <div class="card bg-teal text-white">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="font-weight-semibold mb-0">{{$jmla}}</h3>
                    </div>
                    
                    <div>
                        Jumlah Artikel
                    </div>
                </div>
            </div>
            <!-- /members online -->
        </div>
        <div class="col-lg-3">
            <!-- Members online -->
            <div class="card bg-pink text-white">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="font-weight-semibold mb-0">{{$jmls}}</h3>
                    </div>
                    
                    <div>
                        Jumlah Skripsi
                    </div>
                </div>
            </div>
            <!-- /members online -->
        </div>
        <div class="col-lg-3">
            <!-- Members online -->
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="font-weight-semibold mb-0">{{$jmlm}}</h3>
                    </div>
                    
                    <div>
                        Jumlah Mahasiswa
                    </div>
                </div>
            </div>
            <!-- /members online -->
        </div>
        <div class="col-lg-3">
            <!-- Members online -->
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="font-weight-semibold mb-0">{{$jmld}}</h3>
                    </div>
                    
                    <div>
                        Jumlah Dosen
                    </div>
                </div>
            </div>
            <!-- /members online -->
        </div>
    </div>
    
    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <div class="page-header-content container header-elements-md-inline">
                <h5 class="card-title">Log Artikel</h5>
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
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
                @foreach($logj as $data)
                <tr> 
                    <td>{{$no++}}</td>
                    <td>{{$data->judul}}</td>
                    <td>{{$data->penyusun}}</td>
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
   <!-- Basic datatable -->
   <div class="card">
    <div class="card-header">
        <div class="page-header-content container header-elements-md-inline">
            <h5 class="card-title">Log Skripsi</h5>
        </div>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Skripsi</th>
                <th>Penulis</th>
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
</div>
@endsection