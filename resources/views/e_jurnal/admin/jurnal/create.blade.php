@extends('e_jurnal.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Tambah Artikel</h5>
        </div>

        <div class="card-body">

            <form action="#" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tanggal</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="tanggal" autofocus autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Judul</label>
                        <div class="col-lg-9">
                            <textarea type="text" class="form-control" name="judul" autofocus autocomplete="off" ></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Penulis</label>
                        <div class="col-lg-9">
                            <select multiple="multiple" class="form-control select" data-container-css-class="select2-filled" data-fouc>
                                <optgroup label="Mahasiswa">
                                    @foreach($mhs as $mhs)
                                    <option value="{{$mhs->id}}" data-select2-id="489">{{$mhs->nm_mhs}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Dosen">
                                    @foreach($dsn as $dsn)
                                    <option value="{{$dsn->id}}" data-select2-id="489">{{$dsn->nm_dsn}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Volume</label>
                        <div class="col-lg-9">
                            <input type="number" class="form-control" name="volume" autofocus autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Abstrak</label>
                        <div class="col-lg-9">
						    <input type="file" class="form-control-plaintext">
					    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Artikel</label>
                        <div class="col-lg-9">
						    <input type="file" class="form-control-plaintext">
					    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Status</label>
                        <div class="col-lg-9">
                        <select class="form-control select-fixed-single select2-hidden-accessible" data-fouc="" data-select2-id="72" tabindex="-1" aria-hidden="true">
                            <optgroup label="Mountain Time Zone" data-select2-id="254">
                                <option value="AZ" data-select2-id="74">Submited</option>
                                <option value="CO" data-select2-id="255">Accepted</option>
                                <option value="ID" data-select2-id="256">Rejected</option>
                                <option value="WY" data-select2-id="257">Posted</option>
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