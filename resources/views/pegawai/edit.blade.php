<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pegawai</title>
</head>
<body>
    <h2>Form Edit Data Pegawai</h2>


    <!-- Ini adalah Tombol kembali ke halaman utama pegawai -->
    <p>
        <a href="/pegawai">Kembali</a>
    </p>


    <!-- Contoh Form Edit Data Pegawai Sederhana -->
    <form action="/pegawai/update/{{ $pegawai->pegawai_id }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" value="{{ $pegawai->pegawai_nama }}" required="required"></td>
            </tr>
            <tr>
                <td><label for="jabatan">Jabatan</label></td>
                <td><input type="text" id="jabatan" name="jabatan" value="{{ $pegawai->pegawai_jabatan }}" required="required"></td>
            </tr>
            <tr>
                <td><label for="umur">Umur</label></td>
                <td><input type="number" id="umur" name="umur" value="{{ $pegawai->pegawai_umur }}" required="required"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><textarea id="alamat" name="alamat" required="required">{{ $pegawai->pegawai_alamat }}</textarea></td>
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