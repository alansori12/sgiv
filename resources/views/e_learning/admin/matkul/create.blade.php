@extends('e_learning.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Tambah Data Mata Kuliah</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.matkul.store') }}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Kode</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="kode" autofocus autocomplete="off" value="{{old('kode')}}">
                            @error('kode')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Mata Kuliah</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="matkul" autocomplete="off" value="{{old('matkul')}}">
                            @error('matkul')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">SKS</label>
                        <div class="col-lg-9">
                            <select data-placeholder="Jumlah SKS..." name="sks" class="form-control select">
                                <option></option>
                                <option value="1" {{old('sks') == '1' ? 'selected' : ''}}>1</option>
                                <option value="2" {{old('sks') == '2' ? 'selected' : ''}}>2</option>
                                <option value="3" {{old('sks') == '3' ? 'selected' : ''}}>3</option>
                                <option value="4" {{old('sks') == '4' ? 'selected' : ''}}>4</option>
                            </select>
                            @error('sks')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Semester</label>
                        <div class="col-lg-9">
                            <select data-placeholder="Pilih Semester..." name="semester" class="form-control select">
                                <option></option>
                                <option value="I" {{old('semester') == 'I' ? 'selected' : ''}}>I</option>
                                <option value="II" {{old('semester') == 'II' ? 'selected' : ''}}>II</option>
                                <option value="III" {{old('semester') == 'III' ? 'selected' : ''}}>III</option>
                                <option value="IV" {{old('semester') == 'IV' ? 'selected' : ''}}>IV</option>
                                <option value="V" {{old('semester') == 'V' ? 'selected' : ''}}>V</option>
                                <option value="VI" {{old('semester') == 'VI' ? 'selected' : ''}}>VI</option>
                                <option value="VII" {{old('semester') == 'VII' ? 'selected' : ''}}>VII</option>
                                <option value="VIII" {{old('semester') == 'VIII' ? 'selected' : ''}}>VIII</option>
                            </select>
                            @error('semester')
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