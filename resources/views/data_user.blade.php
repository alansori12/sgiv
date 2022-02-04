<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=table, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="{{ route('insertusr') }}">Tambah</a>
    <table border>
        <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Email</td>
            <td colspan="2">Aksi</td>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <a href="{{ route('updateusr',$item->id) }}" class="btn btn-warning" onclick="return confirm('Edit?')">Edit</a>
            </td>
            <td>
               <a href="{{ route('deleteusr',$item->id) }}" class="btn btn-danger" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>