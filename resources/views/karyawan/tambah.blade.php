<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Karyawan</title>
</head>

<body>
    <h2>Tambah Data Karyawan</h2>


    <!-- Tombol Kembali -->
    <p>
        <a href="/karyawan">Kembali</a>
    </p>


    <!-- Form Tambah Data -->
    <form action="/karyawan/store" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" required="required"></td>
            </tr>
            <tr>
                <td><label for="jabatan">Jabatan</label></td>
                <td><input type="text" id="jabatan" name="jabatan" required="required"></td>
            </tr>
            <tr>
                <td><label for="umur">Umur</label></td>
                <td><input type="number" id="umur" name="umur" required="required"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><textarea id="alamat" name="alamat" required="required"></textarea></td>
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