@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Control position -->
    @if(Session::has('success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Success!</span> {{Session::get('success')}}
    </div>
    @endif
    
    <div class="card">
        <div class="card-header header-elements-sm-inline">
            <h5 class="card-title">Data User</h5>
            <div class="header-elements">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>

        <table class="table table-hover datatable-responsive-control-right">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Hak Akses</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($items as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->hak_akses}}</td>
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