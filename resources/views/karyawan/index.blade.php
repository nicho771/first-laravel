<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
</head>

<body>

    <h3>Data Karyawan</h3>

    <a href="/karyawan/tambah"> + Tambah Karyawan Baru</a>

    <br />
    <br />
    @if(session('success'))
    <div>
        {{ session('success') }}
    </div>
    @endif


    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawan as $p)
            <tr>
                <td>{{ $p->karyawan_id }}</td>
                <td>{{ $p->karyawan_nama }}</td>
                <td>{{ $p->karyawan_alamat }}</td>
                <td>
                    <a href="/karyawan/edit/{{ $p->karyawan_id }}">Edit</a>
                    |
                    <a href="/karyawan/hapus/{{ $p->karyawan_id }}">Hapus</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>