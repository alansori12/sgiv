@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Edit Data Dosen</h5>
        </div>

        <div class="card-body">

            <form action="/admin/dosen/update/{{$item->id}}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">NIDN</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="nidn" value="{{$item->nidn}}" autocomplete="off">
                            @error('nidn')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Nama Lengkap</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="nm_dsn" value="{{$item->nm_dsn}}" autocomplete="off">
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
                        <label class="col-form-label col-lg-3">Email</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="email" value="{{$item->email}}" autocomplete="off">
                            @error('email')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Jabatan Fungsional</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="jab_fungs" value="{{$item->jab_fungs}}" autocomplete="off">
                            @error('jab_fungs')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Pendidikan</label>
                        <div class="col-lg-9">
                            <select name="pend" class="form-control">
                                <option value="S1" @if($item->pend == 'S1') selected @endif>S1</option>
                                <option value="S2" @if($item->pend == 'S2') selected @endif>S2</option>
                                <option value="S3" @if($item->pend == 'S3') selected @endif>S3</option>
                            </select>
                            @error('pend')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form inputs -->

</div>
@endsection