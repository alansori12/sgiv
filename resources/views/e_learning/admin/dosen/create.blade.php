@extends('e_learning.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Tambah Data Dosen</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.dosen.store') }}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">NIDN</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="nidn" autofocus autocomplete="off" value="{{old('nidn')}}">
                            @error('nidn')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Nama Lengkap</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="nm_dsn" autocomplete="off" value="{{old('nm_dsn')}}">
                            @error('nm_dsn')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label pt-0">Jenis Kelamin</label>
                        <div class="col-lg-9">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jk" value="Laki-laki" {{old('jk') == 'Laki-laki' ? 'checked' : ''}}>
                                    Laki-laki
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jk" value="Perempuan" {{old('jk') == 'Perempuan' ? 'checked' : ''}}>
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

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Jabatan Fungsional</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="jab_fungs" autocomplete="off" value="{{old('jab_fungs')}}">
                            @error('jab_fungs')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Pendidikan</label>
                        <div class="col-lg-9">
                            <select data-placeholder="Pilih Pendidikan..." name="pend" class="form-control select">
                                <option></option>
                                <option value="S1" {{old('pend') == 'S1' ? 'selected' : ''}}>S1</option>
                                <option value="S2" {{old('pend') == 'S2' ? 'selected' : ''}}>S2</option>
                                <option value="S3" {{old('pend') == 'S3' ? 'selected' : ''}}>S3</option>
                            </select>
                            @error('pend')
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