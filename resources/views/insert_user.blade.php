<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
</head>
<body>
    <form action="{{ route('saveusr') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <a style="font-size:23px; font-weight:600">Nama</a>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
        </div>
        <div class="form-group">
            <a style="font-size:23px; font-weight:600">Email</a>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <a style="font-size:23px; font-weight:600">Password</a>
            <input type="text" name="password" id="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Insert</button>
        </div>
    </form>
</body>
</html>