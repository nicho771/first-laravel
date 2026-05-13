<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
</head>
<body>
    <h3>Data Pegawai</h3>


    <!-- Tombol Tambah Data -->
    <p>
        <a href="/pegawai/tambah">+ Tambah Pegawai Baru</a>
    </p>

    //menampilkan total data
    <p>Total data: {{ count($pegawai) }}</p>
    
    <!-- Tabel Data Pegawai -->
    <table border="1" cellpadding="6" cellspacing="0" style="margin: 0 auto; width: 80%; text-align: left;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawai as $p)
            <tr>
                <td>{{ $p->pegawai_id }}</td>
                <td>{{ $p->pegawai_nama }}</td>
                <td>{{ $p->pegawai_alamat }}</td>
                <td>
                    <a href="/pegawai/edit/{{ $p->pegawai_id }}">Edit</a> |
                     <a href="/pegawai/hapus/{{ $p->pegawai_id }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
