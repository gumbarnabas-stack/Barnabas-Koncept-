@extends('layouts.app')
@section('title', 'Portfolio | Barnabas Koncept')
@section('content')
<section class="page-hero"><div class="container"><span class="eyebrow">OUR PORTFOLIO</span><h1>Work that speaks <span class="gradient-text">visually.</span></h1><p>Browse selected projects created by Barnabas Koncept.</p></div></section>
<section class="section-padding"><div class="container"><div class="row g-4">
@forelse($portfolios as $project)
<div class="col-md-6 col-lg-4"><a href="{{ route('portfolio.show', $project) }}" class="project-card portfolio-item">
@if($project->image)<img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">@else<div class="project-placeholder"><i class="bi bi-image"></i></div>@endif
<div class="project-overlay"><small>{{ $project->category }}</small><h4>{{ $project->title }}</h4><span>View project <i class="bi bi-arrow-up-right"></i></span></div></a></div>
@empty
<div class="col-12"><div class="empty-state">No portfolio projects have been added yet.</div></div>
@endforelse
</div><div class="mt-5 d-flex justify-content-center">{{ $portfolios->links() }}</div></div></section>
@endsection
