
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Setelah Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Selamat Datang</span>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        {{-- <h4 class="mb-3">Halo, {{ Auth::user()->name ?? 'User' }}!</h4> --}}
                        <p>Anda berhasil login.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>