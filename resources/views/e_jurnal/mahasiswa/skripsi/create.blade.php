@extends('e_jurnal.mahasiswa.layouts.master')

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
            <h5 class="card-title">Upload Skripsi dan Tugas Akhir</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa1.skripsiku.store')}}" method="POST" enctype="multipart/form-data">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tanggal</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="tanggal" autofocus autocomplete="off" require>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tahun</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="tahun" value="{{old('tahun')}}" autofocus autocomplete="off" >
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
						<input type="text" class="form-control" name="penulis" readonly="" value="{{ Auth::guard('mahasiswa')->user()->nm_mhs }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Pendahuluan</label>
                        <div class="col-lg-9">
						    <input type="file" name="pendahuluan" class="form-control-plaintext">
					    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">File Lengkap</label>
                        <div class="col-lg-9">
						    <input type="file" name="skripsi" class="form-control-plaintext">
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