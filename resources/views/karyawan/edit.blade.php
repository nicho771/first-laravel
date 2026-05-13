<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Karyawan</title>
</head>

<body>
    <h2>Form Edit Data Karyawan</h2>
    <!-- Ini adalah Tombol kembali ke halaman utama karyawan -->
    <p>
        <a href="/karyawan">Kembali</a>
    </p>
    <!-- Contoh Form Edit Data Karyawan Sederhana -->
    <form action="/karyawan/update/{{ $karyawan->karyawan_id }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" value="{{ $karyawan->karyawan_nama }}" required></td>
            </tr>
            <tr>
                <td><label for="jabatan">Jabatan</label></td>
                <td><input type="text" id="jabatan" name="jabatan" value="{{ $karyawan->karyawan_jabatan }}" required></td>
            </tr>
            <tr>
                <td><label for="umur">Umur</label></td>
                <td><input type="number" id="umur" name="umur" value="{{ $karyawan->karyawan_umur }}" required></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><textarea id="alamat" name="alamat" required>{{ $karyawan->karyawan_alamat }}</textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <input type="submit" value="Simpan Data">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>