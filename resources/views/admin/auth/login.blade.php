<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login | Barnabas Koncept</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    </head>
    <body class="login-page">  
        <div class="login-card">
            <div class="brand-logo-container w-45 h-45 justify-content-center d-flex mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Barnabas Koncept logo" class="brand-logo img-fluid w-25 h-25">
            </div>
            <h2>Admin Login</h2>
            <p class="text-secondary">Manage your Barnabas Koncept website.</p>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control mb-3" value="{{ old('email') }}" required>

                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control mb-4" required>

                <button class="btn btn-primary w-100">Sign In</button>
            </form>

            <a class="back-link" href="{{ route('home') }}">← Back to website</a>
        </div>
    </body>
</html>
