@extends('e_jurnal.admin.layouts.master')

@section('content')
	<!-- Page content -->
	<div class="content">

    @if(Session::has('success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible col-md-6">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Berhasil!</span> {{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible col-md-6">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Gagal!</span> {{Session::get('error')}}
    </div>
    @endif

    <!-- Form inputs -->
    <div class="card col-md-6">
        <div class="card-header">
            <h5 class="card-title">Edit Password</h5>
        </div>

        <div class="card-body">
            <form action="/admin1/password/update" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Passwor Lama</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" name="pslama" value="" autocomplete="off">
                            @error('pslama')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Passwor Baru</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" name="psbaru" value="" autocomplete="off">
                            @error('psbaru')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Konfirmasi Password</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" name="konps" value="" autocomplete="off">
                            @error('konps')
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
	<!-- /page content -->
@endsection