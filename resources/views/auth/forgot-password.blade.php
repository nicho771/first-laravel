<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">

            <h3 class="text-center mb-3">Forgot Password</h3>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           id="email"
                           required
                           autofocus>

                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Send Password Reset Link
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ url('/') }}" class="text-decoration-none">
                    Back to Login
                </a>
            </div>

        </div>
    </div>

</body>

</html>