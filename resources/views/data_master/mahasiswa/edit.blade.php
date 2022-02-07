@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Edit Data Mahasiswa</h5>
        </div>

        <div class="card-body">

            <form action="/mahasiswa/update/{{$item->id}}" method="post">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">NIM</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nim" value="{{$item->nim}}" autofocus autocomplete="off" maxlength="9">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Nama Lengkap</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nm_mhs" value="{{$item->nm_mhs}}" autocomplete="off">
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
                        <label class="col-form-label col-lg-2">Tahun Masuk</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="thn_masuk" value="{{$item->thn_masuk}}" autocomplete="off" maxlength="4">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Semester</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="semester">
                                <option value="I" @if ($item->semester == 'I') selected @endif>I</option>
                                <option value="II" @if ($item->semester == 'II') selected @endif>II</option>
                                <option value="III" @if ($item->semester == 'III') selected @endif>III</option>
                                <option value="IV" @if ($item->semester == 'IV') selected @endif>IV</option>
                                <option value="V" @if ($item->semester == 'V') selected @endif>V</option>
                                <option value="VI" @if ($item->semester == 'VI') selected @endif>VI</option>
                                <option value="VII" @if ($item->semester == 'VII') selected @endif>VII</option>
                                <option value="VIII" @if ($item->semester == 'VIII') selected @endif>VIII</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tempat Lahir</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="tmp_lahir" value="{{$item->tmp_lahir}}" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tanggal Lahir</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" name="tgl_lahir" value="{{$item->tgl_lahir}}" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Agama</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="agama">
                                <option value="Islam" @if ($item->agama == 'Islam') selected @endif>Islam</option>
                                <option value="Protestan" @if ($item->agama == 'Protestan') selected @endif>Protestan</option>
                                <option value="Katolik" @if ($item->agama == 'Katolik') selected @endif>Katolik</option>
                                <option value="Hindu" @if ($item->agama == 'Hindu') selected @endif>Hindu</option>
                                <option value="Buddha" @if ($item->agama == 'Buddha') selected @endif>Buddha</option>
                                <option value="Khonghucu" @if ($item->agama == 'Khonghucu') selected @endif>Khonghucu</option>
                            </select>
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