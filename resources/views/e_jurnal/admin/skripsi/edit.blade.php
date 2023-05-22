@extends('e_jurnal.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
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
            <h5 class="card-title">Edit Skripsi</h5>
        </div>

        <div class="card-body">

            <form action="/admin1/skripsi/update/{{$file->id}}" method="POST" enctype="multipart/form-data">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tanggal</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="tanggal" value="{{$file->tanggal}}" autofocus autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tahun</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="tahun" value="{{$file->tahun}}" autofocus autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Judul</label>
                        <div class="col-lg-9">
                            <textarea type="text" class="form-control" name="judul" value="" autofocus autocomplete="off" >{{$file->judul}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Penulis</label>
                        <div class="col-lg-9">
                            <select multiple="multiple" name="penulis" class="form-control select" data-container-css-class="select2-filled" data-fouc>
                                <optgroup label="Mahasiswa">
                                    @foreach($mhs as $mhs)
                                    <option value="{{$mhs->nm_mhs}}" @if($file->penulis == $mhs->nm_mhs) selected @endif data-select2-id="489">{{$mhs->nm_mhs}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-9">
						    <iframe width="300" src="/storage/pendahuluan/{{$file->pendahuluan}}" frameborder="1"></iframe><br>
                            {{$file->pendahuluan}}
					    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Pendahuluan</label>
                        <div class="col-lg-9">
						    <input type="file" name="pendahuluan"  class="form-control-plaintext" @error('pendahuluan') is-invalid @enderror >
					    </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-9">
						    <iframe width="300" src="/storage/skripsi/{{$file->file}}" frameborder="1"></iframe><br>
                            {{$file->file}}
					    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">File Lengkap</label>
                        <div class="col-lg-9">
						    <input type="file" name="skripsi" class="form-control-plaintext" @error('file') is-invalid @enderror>
					    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Status</label>
                        <div class="col-lg-9">
                        <select class="form-control select-fixed-single select2-hidden-accessible" name="status" data-fouc="" data-select2-id="72" tabindex="-1" aria-hidden="true">
                            <optgroup label="Status" data-select2-id="254">
                                <option value="submited" @if($file->status == 'submited') selected @endif data-select2-id="74">submited</option>
                                <option value="accepted" @if($file->status == 'accepted') selected @endif data-select2-id="255">accepted</option>
                                <option value="rejected" @if($file->status == 'rejected') selected @endif data-select2-id="256">rejected</option>
                                <option value="posted" @if($file->status == 'posted') selected @endif data-select2-id="257">posted</option>
                            </optgroup>
                        </select>
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