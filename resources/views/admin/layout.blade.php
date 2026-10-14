<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>@yield('title','Admin') | Barnabas Koncept</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"><link rel="stylesheet" href="{{ asset('css/admin.css') }}"></head>
<body>
<div class="admin-shell">
<aside class="sidebar"><a class="admin-brand" href="{{ route('admin.dashboard') }}"><span class="brand-mark">BK</span><span>Barnabas Koncept</span></a>
<nav><a class="{{ request()->routeIs('admin.dashboard')?'active':'' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid-1x2"></i> Dashboard</a><a class="{{ request()->routeIs('admin.services*')?'active':'' }}" href="{{ route('admin.services.index') }}"><i class="bi bi-palette"></i> Services</a><a class="{{ request()->routeIs('admin.portfolio*')?'active':'' }}" href="{{ route('admin.portfolio.index') }}"><i class="bi bi-images"></i> Portfolio</a><a class="{{ request()->routeIs('admin.messages*')?'active':'' }}" href="{{ route('admin.messages.index') }}"><i class="bi bi-chat-left-text"></i> Messages</a><a class="{{ request()->routeIs('admin.settings*')?'active':'' }}" href="{{ route('admin.settings.edit') }}"><i class="bi bi-gear"></i> Settings</a></nav>
<div class="sidebar-bottom"><a href="{{ route('home') }}" target="_blank"><i class="bi bi-box-arrow-up-right"></i> View Website</a><form method="POST" action="{{ route('admin.logout') }}">@csrf<button><i class="bi bi-box-arrow-right"></i> Logout</button></form></div></aside>
<section class="admin-main"><header class="admin-topbar"><div><span class="text-secondary">Welcome back,</span> <strong>{{ session('admin_name') }}</strong></div><a href="{{ route('admin.messages.index') }}" class="top-icon"><i class="bi bi-bell"></i></a></header>
<div class="p-4 p-lg-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @yield('content')
</div>
</section>
</div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script></body></html>
