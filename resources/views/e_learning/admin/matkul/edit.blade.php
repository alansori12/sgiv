@extends('e_learning.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Edit Data Mata Kuliah</h5>
        </div>

        <div class="card-body">

            <form action="/admin/matkul/update/{{$item->id}}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Kode</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="kode" value="{{$item->kode}}" autocomplete="off">
                            @error('kode')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Mata Kuliah</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="matkul" value="{{$item->matkul}}" autocomplete="off">
                            @error('matkul')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">SKS</label>
                        <div class="col-lg-9">
                            <select name="sks" class="form-control">
                                <option value="1" @if($item->sks == '1') selected @endif>1</option>
                                <option value="2" @if($item->sks == '2') selected @endif>2</option>
                                <option value="3" @if($item->sks == '3') selected @endif>3</option>
                                <option value="4" @if($item->sks == '4') selected @endif>4</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Semester</label>
                        <div class="col-lg-9">
                            <select name="semester" class="form-control">
                                <option value="I" @if($item->semester == 'I') selected @endif>I</option>
                                <option value="II" @if($item->semester == 'II') selected @endif>II</option>
                                <option value="III" @if($item->semester == 'III') selected @endif>III</option>
                                <option value="IV" @if($item->semester == 'IV') selected @endif>IV</option>
                                <option value="V" @if($item->semester == 'V') selected @endif>V</option>
                                <option value="VI" @if($item->semester == 'VI') selected @endif>VI</option>
                                <option value="VII" @if($item->semester == 'VII') selected @endif>VII</option>
                                <option value="VIII" @if($item->semester == 'VIII') selected @endif>VIII</option>
                            </select>
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