@extends('e_jurnal.dosen.layouts.master')

@section('content')
<div class="row pt-3">
    <!-- Form inputs -->
    <div class="col-md-2"></div>
    <div class="card col-md-8">
        <div class="card-header">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h5 class="card-title">Tambah Artikel</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dosen1.artikeldosen.store')}}" method="POST" enctype="multipart/form-data">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tanggal</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="tanggal" autofocus autocomplete="off" require>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Judul</label>
                        <div class="col-lg-9">
                            <textarea type="text" class="form-control" name="judul" value="{{old('judul')}}" autofocus autocomplete="off" ></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Penulis</label>
                        <div class="col-lg-9">
						<input type="text" class="form-control" name="penyusun" readonly="" value="{{ Auth::guard('dosen')->user()->nm_dsn }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Volume</label>
                        <div class="col-lg-9">
                            <input type="number" class="form-control" name="volume" value="{{old('volume')}}" autofocus autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Abstrak</label>
                        <div class="col-lg-9">
						    <input type="file" name="abstrak" class="form-control-plaintext">
					    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Artikel</label>
                        <div class="col-lg-9">
						    <input type="file" name="artikel" class="form-control-plaintext">
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
</div>
@endsection