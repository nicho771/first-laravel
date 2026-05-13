
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h1>Data Siswa</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>