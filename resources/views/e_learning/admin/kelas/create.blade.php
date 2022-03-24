@extends('e_learning.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Buat Kelas Baru</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.kelas.store') }}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Nama Kelas</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="nm_kls" autofocus autocomplete="off" value="{{old('nm_kls')}}">
                            @error('nm_kls')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Select with search</label>
                        <select class="form-control select-search" data-fouc>
                            <option value=""></option>
                        </select>
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