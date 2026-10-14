@extends('layouts.app')
@section('title', 'Services | Barnabas Koncept')
@section('content')
<section class="page-hero"><div class="container"><span class="eyebrow">OUR SERVICES</span><h1>Creative services for <span class="gradient-text">real results.</span></h1><p>Explore the design solutions available through Barnabas Koncept.</p></div></section>
<section class="section-padding"><div class="container"><div class="row g-4">
@forelse($services as $service)
<div class="col-md-6 col-lg-4"><div class="feature-card service-card h-100"><div class="icon-box"><i class="bi {{ $service->icon ?: 'bi-stars' }}"></i></div><h4>{{ $service->title }}</h4><p>{{ $service->description }}</p><div class="service-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div></div></div>
@empty
<div class="col-12"><div class="empty-state">No services available yet.</div></div>
@endforelse
</div></div></section>
@endsection
