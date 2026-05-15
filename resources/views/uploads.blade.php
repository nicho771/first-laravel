<!DOCTYPE html>
<html>
<head>
    <title>Upload File Laravel ke Database</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Upload File ke Database</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Upload -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/uploads" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Pilih File</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>

    <!-- List File -->
    <h4>Daftar File</h4>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Preview</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $index => $f)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $f->name }}</td>
                    <td>
                        @php $ext = pathinfo($f->path, PATHINFO_EXTENSION); @endphp
                        @if(in_array($ext, ['jpg','jpeg','png']))
                            <img src="{{ asset('storage/'.$f->path) }}" class="img-thumbnail" style="max-width:100px;">
                        @elseif($ext == 'pdf')
                            <a href="{{ asset('storage/'.$f->path) }}" target="_blank" class="btn btn-danger btn-sm">Lihat PDF</a>
                        @else
                            <a href="{{ asset('storage/'.$f->path) }}" target="_blank" class="btn btn-secondary btn-sm">Download</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

