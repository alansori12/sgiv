@extends('e_jurnal.admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title"><b>{{$file->judul}}</b></h6>
    </div>

    <div class="card-body py-0">
        <iframe src="/storage/pendahuluan/{{$file->pendahuluan}}" frameborder="1" width="100%" height="800px"></iframe>
    </div>
</div>
@endsection