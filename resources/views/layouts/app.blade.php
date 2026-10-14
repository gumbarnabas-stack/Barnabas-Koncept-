<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $siteSettings['tagline'] ?? 'Barnabas Koncept - Professional graphic design services.' }}">
    <title>@yield('title', $siteSettings['company_name'] ?? 'Barnabas Koncept')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top glass-nav">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <span class="brand-logo-wrap"><img src="{{ asset('images/logo.png') }}" alt="Barnabas Koncept logo" class="brand-logo"></span> <span>{{ $siteSettings['company_name'] ?? 'Barnabas Koncept' }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}" href="{{ route('portfolio') }}">Portfolio</a></li>
                <li class="nav-item"><a class="btn btn-primary px-4 ms-lg-2" href="{{ route('contact') }}">Let's Talk</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @if(session('success'))
        <div class="container alert-wrap"><div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button class="btn-close" data-bs-dismiss="alert"></button></div></div>
    @endif
    @if(session('error'))
        <div class="container alert-wrap"><div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}<button class="btn-close" data-bs-dismiss="alert"></button></div></div>
    @endif
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-5">
                <h4 class="fw-bold">{{ $siteSettings['company_name'] ?? 'Barnabas Koncept' }}</h4>
                <p class="text-secondary">{{ $siteSettings['tagline'] ?? 'Creative designs. Strong brands. Better impressions.' }}</p>
            </div>
            <div class="col-md-3">
                <h6>Quick Links</h6>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('portfolio') }}">Portfolio</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
            <div class="col-md-4">
                <h6>Contact</h6>
                <p class="mb-1"><i class="bi bi-envelope me-2"></i>{{ $siteSettings['email'] ?? 'hello@example.com' }}</p>
                <p class="mb-1"><i class="bi bi-telephone me-2"></i>{{ $siteSettings['phone'] ?? '' }}</p>
                <p><i class="bi bi-geo-alt me-2"></i>{{ $siteSettings['address'] ?? '' }}</p>
                <div class="socials">
                    @foreach(['facebook','instagram','tiktok'] as $social)
                        @if(!empty($siteSettings[$social]))
                            <a href="{{ $siteSettings[$social] }}" target="_blank" rel="noopener"><i class="bi bi-{{ $social === 'facebook' ? 'facebook' : ($social === 'instagram' ? 'instagram' : 'tiktok') }}"></i></a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <p class="small text-secondary mb-0">© {{ date('Y') }} {{ $siteSettings['company_name'] ?? 'Barnabas Koncept' }}. All rights reserved.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
