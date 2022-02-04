<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
</head>
<body>
    <form action="{{ route('saveupdt',$item->id) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <a style="font-size:23px; font-weight:600">Nama</a>
            <input type="hidden" name="id" id="id" class="form-control" placeholder="Id" value="{{$item->id}}">
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama" value="{{$item->name}}">
        </div>
        <div class="form-group">
            <a style="font-size:23px; font-weight:600">Email</a>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{$item->email}}">
        </div>
        <div class="form-group">
            <a style="font-size:23px; font-weight:600">Password</a>
            <input type="text" name="password" id="password" class="form-control" placeholder="Password" value="{{$item->password}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</body>
</html>