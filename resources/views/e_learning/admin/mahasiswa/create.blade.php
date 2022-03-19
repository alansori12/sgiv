@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Tambah Data Mahasiswa</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">NIM</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="nim" autofocus autocomplete="off" value="{{old('nim')}}">
                            @error('nim')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Nama Lengkap</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="nm_mhs" autocomplete="off" value="{{old('nm_mhs')}}">
                            @error('nm_mhs')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label pt-0">Jenis Kelamin</label>
                        <div class="col-lg-9">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jk" value="Laki-laki">
                                    Laki-laki
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jk" value="Perempuan">
                                    Perempuan
                                </label>
                            </div>
                            @error('jk')
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