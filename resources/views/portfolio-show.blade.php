@extends('layouts.app')
@section('title', $portfolio->title.' | Barnabas Koncept')
@section('content')
<section class="page-hero small-hero"><div class="container"><span class="eyebrow">{{ $portfolio->category }}</span><h1>{{ $portfolio->title }}</h1><p>{{ $portfolio->client_name ?: 'Barnabas Koncept' }}</p></div></section>
<section class="section-padding"><div class="container"><div class="row g-5">
<div class="col-lg-7">@if($portfolio->image)<img class="detail-image" src="{{ asset('storage/'.$portfolio->image) }}" alt="{{ $portfolio->title }}">@else<div class="detail-placeholder"><i class="bi bi-image"></i></div>@endif</div>
<div class="col-lg-5"><span class="eyebrow">PROJECT DETAILS</span><h2>{{ $portfolio->title }}</h2><p class="text-secondary">{{ $portfolio->description }}</p><dl class="row mt-4"><dt class="col-5">Category</dt><dd class="col-7">{{ $portfolio->category }}</dd><dt class="col-5">Client</dt><dd class="col-7">{{ $portfolio->client_name ?: '—' }}</dd><dt class="col-5">Date</dt><dd class="col-7">{{ $portfolio->project_date?->format('F Y') ?: '—' }}</dd></dl><a href="{{ route('contact') }}" class="btn btn-primary mt-3">Start a Similar Project</a></div>
</div></div></section>
@endsection
