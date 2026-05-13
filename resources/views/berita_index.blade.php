<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Pagination Berita</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .pagination {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <pre>
    {{ print_r(session()->all(), true) }}
    </pre>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    <h1>Berita</h1>

    <!-- Tabel Berita -->

    <form action="{{ route('beritas.index') }}" method="GET" class='mb-5'>
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari berita...">
        <button type="submit">Cari</button>
    </form>


    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Isi</th>
                <th>Tanggal Berita</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beritas as $berita)
            <tr>
                <td>{{ $berita->judul }}</td>
                <td>{{ $berita->isi }}</td>
                <td>{{ $berita->tanggal_berita }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div>
        {{ $beritas->withQueryString()->links() }}
    </div>

</body>

</html>