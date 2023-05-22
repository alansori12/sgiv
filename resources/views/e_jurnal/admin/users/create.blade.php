@extends('e_jurnal.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Tambah Data User</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin1.user.store') }}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Nama User</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" autofocus autocomplete="off" value="{{old('name')}}">
                            @error('name')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Email</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="email" autocomplete="off" value="{{old('email')}}">
                            @error('email')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Password</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" name="password" autocomplete="off">
                            @error('password')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Konfirmasi Password</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" name="cpassword" autocomplete="off">
                            @error('cpassword')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Hak Akses</label>
                        <div class="col-lg-9">
                            <select name="hak_akses" class="form-control">
                                <option value="Admin" {{old('hak_akses') == 'Admin' ? 'selected' : ''}}>Admin</option>
                                <option value="Super Admin" {{old('hak_akses') == 'Super Admin' ? 'selected' : ''}}>Super Admin</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form inputs -->

</div>
@endsection