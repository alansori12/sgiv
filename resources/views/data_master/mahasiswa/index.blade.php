@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Control position -->
    <div class="card">
        <div class="card-header header-elements-sm-inline">
            <h5 class="card-title">Data Mahasiswa</h5>
            <div class="header-elements">
                <a href="/mahasiswa/create" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>

        <table class="table table-hover datatable-responsive-control-right">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Semester</th>
                    <th class="text-center">Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{$item->nim}}</td>
                    <td>{{$item->nm_mhs}}</td>
                    <td>{{$item->jk}}</td>
                    <td>{{$item->semester}}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/mahasiswa/edit/{{$item->id}}" class="dropdown-item"><i class="icon-pencil7"></i> Edit</a>
                                    <a href="/mahasiswa/delete/{{$item->id}}" class="dropdown-item"><i class="icon-bin"></i> Hapus</a>
                                    <a href="#" class="dropdown-item"><i class="icon-eye"></i> Detail</a>
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