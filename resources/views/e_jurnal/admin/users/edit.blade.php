@extends('e_jurnal.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Edit Data User</h5>
        </div>

        <div class="card-body">

            <form action="/admin1/user/update/{{$item->id}}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Nama User</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" value="{{$item->name}}" autocomplete="off">
                            @error('name')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
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
                        <label class="col-form-label col-lg-3">Hak Akses</label>
                        <div class="col-lg-9">
                            <select name="hak_akses" class="form-control">
                                <option value="Admin" @if($item->hak_akses == 'Admin') selected @endif>Admin</option>
                                <option value="Super Admin" @if($item->hak_akses == 'Super Admin') selected @endif>Super Admin</option>
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