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
            <h5 class="card-title">Edit Artikel</h5>
        </div>

        <div class="card-body">

            <form action="/admin1/jurnal/update/{{$file->id}}" method="POST" enctype="multipart/form-data">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tanggal</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="tanggal" value="{{$file->tanggal}}" autofocus autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Judul</label>
                        <div class="col-lg-9">
                            <textarea type="text" class="form-control" name="judul" value="" autofocus autocomplete="off" >{{$file->judul}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Penyusun</label>
                        <div class="col-lg-9">
                            <select multiple="multiple" name="penyusun" class="form-control select" data-container-css-class="select2-filled" data-fouc>
                                <optgroup label="Mahasiswa">
                                    @foreach($mhs as $mhs)
                                    <option value="{{$mhs->nm_mhs}}" @if($file->penyusun == $mhs->nm_mhs) selected @endif data-select2-id="489">{{$mhs->nm_mhs}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Dosen">
                                    @foreach($dsn as $dsn)
                                    <option value="{{$dsn->nm_dsn}}" @if($file->penyusun == $dsn->nm_dsn) selected @endif data-select2-id="489">{{$dsn->nm_dsn}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Volume</label>
                        <div class="col-lg-9">
                            <input type="number" class="form-control" name="volume" value="{{$file->volume}}" autofocus autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-9">
						    <iframe width="300" src="/storage/abstrak/{{$file->abstrak}}" frameborder="1"></iframe><br>
                            {{$file->abstrak}}
					    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Abstrak</label>
                        <div class="col-lg-9">
						    <input type="file" name="abstrak"  class="form-control-plaintext" @error('abstrak') is-invalid @enderror >
					    </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-9">
						    <iframe width="300" src="/storage/artikel/{{$file->artikel}}" frameborder="1"></iframe><br>
                            {{$file->artikel}}
					    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Artikel</label>
                        <div class="col-lg-9">
						    <input type="file" name="artikel" value="{{$file->artikel}}" class="form-control-plaintext" @error('artikel') is-invalid @enderror>
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