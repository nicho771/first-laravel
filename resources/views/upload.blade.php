<!DOCTYPE html>
<html>
<head>
    <title>Upload File Laravel</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Upload File dengan Laravel</h2>

    {{-- Tampilkan pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <br>
            <strong>Path:</strong> {{ session('file') }}
        </div>
    @endif

    {{-- Tampilkan error --}}
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
    <div class="card shadow">
        <div class="card-body">
            <form action="/upload" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Pilih File</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
