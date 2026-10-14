@extends('layouts.app')
@section('title', 'Home | Barnabas Koncept')

@section('content')
<section class="hero-section hero-animated">
    <div class="container">
        <div class="row align-items-center vh-100 pt-5">
            <div class="col-lg-7 mt-lg-0 text-center text-lg-start">
                <span class="eyebrow hero-reveal delay-1">CREATIVE DESIGN STUDIO</span>
                <h1 class="hero-title hero-reveal delay-2">We turn ideas into <span class="metallic-gold">powerful visuals.</span></h1>
                <p class="lead text-light-emphasis mt-4 hero-reveal delay-3">{{ $siteSettings['tagline'] ?? 'Creative designs. Strong brands. Better impressions.' }}</p>
                <div class="d-flex gap-3 flex-wrap mt-4 hero-reveal delay-4">
                    <a class="btn btn-primary btn-lg px-4" href="{{ route('portfolio') }}">View Our Work <i class="bi bi-arrow-right ms-2"></i></a>
                    <a class="btn btn-outline-light btn-lg px-4" href="{{ route('contact') }}">Start a Project</a>
                </div>
                <div class="hero-trust mt-5 hero-reveal delay-5">
                    <span><i class="bi bi-check-circle-fill"></i> Professional Design</span>
                    <span><i class="bi bi-check-circle-fill"></i> Creative Solutions</span>
                    <span><i class="bi bi-check-circle-fill"></i> Client Focused</span>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="hero-card hero-reveal delay-3">
                    <div class="floating-card card-one"><i class="bi bi-palette"></i><strong>Branding</strong><small>Make it memorable</small></div>
                    <div class="floating-card card-two"><i class="bi bi-images"></i><strong>Visuals</strong><small>Make it stand out</small></div>
                    <div class="hero-orb"><div class="orb-ring"></div><img src="{{ asset('images/logo.png') }}" alt="Barnabas Koncept logo" class="hero-logo"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding reveal-section">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow">WHAT WE DO</span>
            <h2>Services built for <span class="gradient-text">impact.</span></h2>
        </div>
        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card h-100">
                        <div class="icon-box"><i class="bi {{ $service->icon ?: 'bi-stars' }}"></i></div>
                        <h4>{{ $service->title }}</h4>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12"><div class="empty-state">Services will appear here once added from the admin dashboard.</div></div>
            @endforelse
        </div>
    </div>
</section>
<section class="recent-work-section section-padding dark-section">
    <div class="container">

        <div class="recent-work-heading">
            <div>
                <span class="eyebrow">OUR RECENT WORK</span>
                <h2>Latest <span class="gradient-text">Designs.</span></h2>
                <p>
                    A selection of our recent graphic design projects.
                    We turn ideas into stunning visual experiences.
                </p>
            </div>

            <a href="{{ route('portfolio') }}" class="btn btn-outline-light">
                See All Projects
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

        @if($featuredProjects->count())

            <div class="portfolio-marquee">
                <div class="portfolio-marquee-track">

                    {{-- FIRST SET --}}
                    <div class="portfolio-marquee-group">

                        @foreach($featuredProjects as $project)
                            <a href="{{ route('portfolio.show', $project) }}"
                               class="portfolio-slide">

                                @if($project->image)
                                    <img
                                        src="{{ asset('storage/'.$project->image) }}"
                                        alt="{{ $project->title }}"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="portfolio-slide-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif

                                <div class="portfolio-slide-overlay">
                                    <span>{{ $project->category }}</span>
                                    <strong>{{ $project->title }}</strong>
                                    <small>
                                        View Project
                                        <i class="bi bi-arrow-up-right"></i>
                                    </small>
                                </div>

                            </a>
                        @endforeach

                    </div>

                    {{-- DUPLICATED SET FOR SEAMLESS INFINITE ANIMATION --}}
                    <div class="portfolio-marquee-group" aria-hidden="true">

                        @foreach($featuredProjects as $project)
                            <a href="{{ route('portfolio.show', $project) }}"
                               class="portfolio-slide">

                                @if($project->image)
                                    <img
                                        src="{{ asset('storage/'.$project->image) }}"
                                        alt=""
                                        loading="lazy"
                                    >
                                @else
                                    <div class="portfolio-slide-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif

                                <div class="portfolio-slide-overlay">
                                    <span>{{ $project->category }}</span>
                                    <strong>{{ $project->title }}</strong>
                                    <small>
                                        View Project
                                        <i class="bi bi-arrow-up-right"></i>
                                    </small>
                                </div>

                            </a>
                        @endforeach

                    </div>

                </div>
            </div>

            <div class="portfolio-scroll-line">
                <span></span>
            </div>

        @else

            <div class="empty-state">
                Add your completed design projects from the admin dashboard.
            </div>

        @endif

    </div>
</section>

<section class="cta-section section-padding reveal-section">
    <div class="container text-center">
        <span class="eyebrow">HAVE A PROJECT?</span>
        <h2>Let's create something <span class="gradient-text">great.</span></h2>
        <p class="lead text-secondary mx-auto">Tell us what you have in mind and let's turn your idea into a professional visual experience.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg mt-3 px-5">Contact Barnabas Koncept</a>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Home-page motion enhancements */
.hero-reveal{opacity:0;transform:translateY(28px);animation:heroReveal .85s cubic-bezier(.2,.8,.2,1) forwards}.delay-1{animation-delay:.08s}.delay-2{animation-delay:.18s}.delay-3{animation-delay:.3s}.delay-4{animation-delay:.42s}.delay-5{animation-delay:.56s}
.reveal-section{opacity:0;transform:translateY(24px);transition:opacity .8s ease,transform .8s ease}.reveal-section.is-visible{opacity:1;transform:none}
@keyframes heroReveal{to{opacity:1;transform:none}}
@keyframes floatOrb{0%,100%{transform:rotate(-8deg) translate3d(0,0,0)}50%{transform:rotate(-5deg) translate3d(0,-14px,0)}}
@keyframes pulseRing{0%,100%{transform:scale(.94);opacity:.35}50%{transform:scale(1.08);opacity:.7}}
@keyframes shimmer{0%{background-position:0% 50%}100%{background-position:200% 50%}}
.hero-orb{animation:floatOrb 5s ease-in-out infinite}.orb-ring{position:absolute;inset:-18px;border:1px solid rgba(255,255,255,.22);border-radius:inherit;animation:pulseRing 3s ease-in-out infinite}.hero-logo{width:150px;height:150px;object-fit:contain;position:relative;z-index:1;filter:drop-shadow(0 12px 24px rgba(0,0,0,.2))}.shimmer-text{background-size:200% auto;animation:shimmer 4s linear infinite}.floating-card{animation:cardFloat 4.5s ease-in-out infinite}.card-two{animation-delay:-2s}@keyframes cardFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}
@media(max-width:991px){.hero-reveal{animation-duration:.7s}}
@media(prefers-reduced-motion:reduce){.hero-reveal{opacity:1;transform:none;animation:none}.hero-orb,.orb-ring,.shimmer-text,.floating-card{animation:none}.reveal-section{opacity:1;transform:none;transition:none}}
</style>
@endpush
@push('scripts')
<script>
(() => {
  const sections = document.querySelectorAll('.reveal-section');
  if (!('IntersectionObserver' in window)) { sections.forEach(s => s.classList.add('is-visible')); return; }
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('is-visible'); observer.unobserve(entry.target); } });
  }, { threshold: 0.12 });
  sections.forEach(section => observer.observe(section));
})();
</script>
@endpush
