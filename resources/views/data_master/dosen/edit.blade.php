@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Edit Data Dosen</h5>
        </div>

        <div class="card-body">

            <form action="/dosen/update/{{$item->id}}" method="post">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">NIDN</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nidn" value="{{$item->nidn}}" autofocus autocomplete="off" maxlength="9">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Nama Lengkap</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nm_dsn" value="{{$item->nm_dsn}}" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label pt-0">Jenis Kelamin</label>
                        <div class="col-lg-9">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jk" value="Laki-laki" @if ($item->jk == 'Laki-laki') checked @endif >
                                    Laki-laki
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jk" value="Perempuan" @if ($item->jk == 'Perempuan') checked @endif >
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tanggal Lahir</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" name="tgl_lahir" value="{{$item->tgl_lahir}}" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="email" value="{{$item->email}}" autocomplete="off" maxlength="4">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">No WhatsApp</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="no_wa" value="{{$item->no_wa}}" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                            <textarea rows="2" class="form-control" name="alamat">{{$item->alamat}}</textarea>
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