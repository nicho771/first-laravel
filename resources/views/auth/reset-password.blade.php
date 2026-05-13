<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">

            <h3 class="text-center mb-3">Reset Password</h3>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

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

                <div class="mb-3">
                    <label for="password" class="form-label">
                        New Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           id="password"
                           required>

                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">
                        Confirm Password
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           id="password_confirmation"
                           required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Reset Password
                </button>

            </form>

        </div>
    </div>

</body>

</html>