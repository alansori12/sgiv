@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Tambah Data Mahasiswa</h5>
        </div>

        <div class="card-body">

            <form action="/mahasiswa/store" method="post">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">NIM</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nim" autofocus autocomplete="off" maxlength="9">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Nama Lengkap</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nm_mhs" autocomplete="off">
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
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tahun Masuk</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="thn_masuk" autocomplete="off" maxlength="4">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Semester</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="semester">
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tempat Lahir</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="tmp_lahir" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tanggal Lahir</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" name="tgl_lahir" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Agama</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                            <textarea rows="2" class="form-control" name="alamat"></textarea>
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