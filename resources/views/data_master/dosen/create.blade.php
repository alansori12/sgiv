@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Tambah Data Dosen</h5>
        </div>

        <div class="card-body">

            <form action="/dosen/store" method="post">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">NIDN</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nidn" autofocus autocomplete="off" maxlength="9">
                            @error('nidn')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Nama Lengkap</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nm_dsn" autocomplete="off">
                            @error('nm_dsn')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label pt-0">Jenis Kelamin</label>
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
                        <label class="col-form-label col-lg-2">Tanggal Lahir</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" name="tgl_lahir" autocomplete="off">
                            @error('tgl_lahir')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="email" autocomplete="off">
                            @error('email')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">No WhatsApp</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="no_wa" autocomplete="off">
                            @error('no_wa')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                            <textarea rows="2" class="form-control" name="alamat"></textarea>
                            @error('alamat')
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