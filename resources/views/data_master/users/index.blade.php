@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Control position -->
    <div class="card">
        <div class="card-header header-elements-sm-inline">
            <h5 class="card-title">Data User</h5>
            <div class="header-elements">
                <a href="/user/create" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>

        <table class="table table-hover datatable-responsive-control-right">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th class="text-center">Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->email}}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
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