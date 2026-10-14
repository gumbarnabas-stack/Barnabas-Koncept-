@extends('layouts.app')
@section('title', 'Contact | Barnabas Koncept')
@section('content')
<section class="page-hero"><div class="container"><span class="eyebrow">CONTACT US</span><h1>Let's talk about your <span class="gradient-text">next project.</span></h1><p>Send a message and the Barnabas Koncept team can get back to you.</p></div></section>
<section class="section-padding"><div class="container"><div class="row g-5">
<div class="col-lg-5"><div class="contact-info"><h3>Get in touch</h3><p class="text-secondary">Have a design project, branding idea or event coming up? Tell us what you need.</p>
<div class="contact-row"><i class="bi bi-envelope"></i><div><small>Email</small><strong>{{ $siteSettings['email'] ?? 'hello@example.com' }}</strong></div></div>
<div class="contact-row"><i class="bi bi-telephone"></i><div><small>Phone</small><strong>{{ $siteSettings['phone'] ?? '' }}</strong></div></div>
<div class="contact-row"><i class="bi bi-geo-alt"></i><div><small>Location</small><strong>{{ $siteSettings['address'] ?? '' }}</strong></div></div>
</div></div>
<div class="col-lg-7"><div class="form-card"><h3>Send us a message</h3>
<form method="POST" action="{{ route('contact.store') }}">@csrf
<div class="row g-3"><div class="col-md-6"><label class="form-label">Full Name *</label><input name="name" class="form-control" value="{{ old('name') }}" required>@error('name')<small class="text-danger">{{ $message }}</small>@enderror</div>
<div class="col-md-6"><label class="form-label">Email *</label><input type="email" name="email" class="form-control" value="{{ old('email') }}" required>@error('email')<small class="text-danger">{{ $message }}</small>@enderror</div>
<div class="col-md-6"><label class="form-label">Phone</label><input name="phone" class="form-control" value="{{ old('phone') }}"></div>
<div class="col-md-6"><label class="form-label">Subject *</label><input name="subject" class="form-control" value="{{ old('subject') }}" required></div>
<div class="col-12"><label class="form-label">Message *</label><textarea name="message" class="form-control" rows="6" required>{{ old('message') }}</textarea>@error('message')<small class="text-danger">{{ $message }}</small>@enderror</div>
<div class="col-12"><button class="btn btn-primary btn-lg px-5">Send Message <i class="bi bi-send ms-2"></i></button></div></div>
</form></div></div></div></div></section>
@endsection
