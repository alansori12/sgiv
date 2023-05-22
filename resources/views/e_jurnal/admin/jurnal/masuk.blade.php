@extends('e_jurnal.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Control position -->
    @if(Session::has('success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Berhasil!</span> {{Session::get('success')}}
    </div>
    @endif

    <div class="card">
        <div class="card-header header-elements-sm-inline">
            <h5 class="card-title">Data Artikel</h5>
        </div>

        <table class="table table-hover datatable-responsive-control-right2">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Penyusun</th>
                    <th>Volume</th>
                    <th>Abstrak</th>
                    <th>File</th>
                    <th class="text-center">Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($file as $data)
                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td>{{$data->tanggal}}</td>
                    <td>{{$data->judul}}</td>
                    <td>{{$data->penyusun}}</td>
                    <td>{{$data->volume}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin1/jurnal/abstrak/{{$data->id}}"><i class="icon-eye"></i> View</a>
                    </td>
                    <td>
                    <a class="btn btn-primary btn-sm" href="/admin1/jurnal/artikel/{{$data->id}}"><i class="icon-eye"></i> View</a>
                    </td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/admin1/jurnal/edit/{{$data->id}}" class="dropdown-item"><i class="icon-pencil7"></i> Edit</a>
                                    <a href="/admin1/jurnal/delete/{{$data->id}}" class="dropdown-item" onclick="return confirm('Data akan dihapus?')"><i class="icon-bin"></i> Hapus</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /control position -->

</div>
@endsection