@extends('layouts.app')

@section('title', 'ForexTalent — Hire Top Forex, Crypto, and Fintech Talent Globally')
@section('meta_description', 'Connect with pre-screened forex, crypto, and fintech professionals worldwide. Fast, reliable global hiring.')

@push('styles')
<style>
/* ── HERO SECTION ── */
.hero-section {
    position: relative;
    min-height: 88vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: var(--primary-dark);
}

.hero-section .hero-bg {
    position: absolute;
    inset: 0;
    background-image: url('{{ asset("images/main_banner.jpeg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.hero-section .hero-overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(108deg, rgba(255,255,255,.94) 0%, rgba(248,252,255,.90) 56%, rgba(240,248,255,.84) 100%),
        radial-gradient(circle at 84% 22%, rgba(2,43,99,.08) 0%, rgba(2,43,99,0) 52%);
}

.hero-section .hero-content {
    position: relative;
    z-index: 2;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    background: rgba(255,255,255,.78);
    border: 1px solid rgba(2,43,99,.16);
    color: var(--primary-dark);
    border-radius: 50px;
    padding: .45rem 1.2rem;
    font-size: .83rem;
    font-weight: 600;
    letter-spacing: .5px;
    margin-bottom: 1.5rem;
}

.hero-title {
    font-size: clamp(2.2rem, 5.5vw, 3.8rem);
    font-weight: 800;
    color: var(--primary-dark);
    line-height: 1.13;
    margin-bottom: 1.4rem;
    letter-spacing: -1px;
    text-shadow: 0 2px 14px rgba(255,255,255,.45);
}

.hero-title .highlight {
    color: #0682B5;
}

.hero-subtitle {
    font-size: 1.12rem;
    color: rgba(2,43,99,.82);
    line-height: 1.75;
    max-width: 520px;
    margin-bottom: 2.2rem;
}

.hero-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin-top: 2.8rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(2,43,99,.16);
}

@media (max-width: 640px) {
    .hero-stats { gap: 1.5rem; }
}

.hero-stat-num {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary-dark);
    line-height: 1;
    margin-bottom: .2rem;
}

.hero-stat-num span {
    color: var(--primary);
}

.hero-stat-label {
    font-size: .83rem;
    color: rgba(2,43,99,.70);
    font-weight: 500;
}

/* ── LOGO STRIP ── */
.logo-strip {
    padding: 60px 0;
    border-bottom: 1px solid var(--border);
}

.logo-strip .logo-label {
    font-size: .82rem;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--text-light);
    margin-bottom: 2rem;
    text-align: center;
}

.logo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 2rem;
    align-items: center;
}

@media (max-width: 768px) {
    .logo-grid { grid-template-columns: repeat(3, 1fr); }
}

.logo-item {
    text-align: center;
    opacity: .6;
    transition: opacity .3s;
}

.logo-item:hover {
    opacity: 1;
}

/* ── COMPANIES SLIDER ── */
.companies-carousel .carousel-item { padding: .25rem 0; }
.companies-carousel .company-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px 18px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 12px;
    height: 92px;
}
.companies-carousel .company-logo img {
    max-height: 56px;
    max-width: 160px;
    width: auto;
    object-fit: contain;
    filter: grayscale(100%);
    opacity: .75;
    transition: filter .25s, opacity .25s, transform .25s;
}
.companies-carousel .company-logo:hover img {
    filter: grayscale(0%);
    opacity: 1;
    transform: translateY(-1px);
}
.companies-carousel .carousel-control-prev,
.companies-carousel .carousel-control-next {
    width: 44px;
}
.companies-carousel .carousel-control-prev-icon,
.companies-carousel .carousel-control-next-icon {
    filter: invert(1) grayscale(1);
    opacity: .9;
}

/* ── WHY CHOOSE US ── */
.why-wrap {
    background: linear-gradient(180deg, #ffffff 0%, #f7fbff 100%);
    border: 1px solid var(--border);
    border-radius: calc(var(--radius) + 4px);
    padding: 2rem 2rem 1.4rem;
}
.why-headline {
    font-size: clamp(2rem, 4vw, 3.2rem);
    font-weight: 800;
    line-height: 1.08;
    letter-spacing: -0.8px;
    margin-bottom: 0;
}
.why-logo {
    width: 170px;
    max-width: 100%;
    opacity: .95;
}
.why-card {
    display: flex;
    flex-direction: column;
    text-align: center;
    align-items: center;
    gap: .75rem;
    padding: 1.35rem 1rem;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 16px;
    transition: all .3s;
    height: 100%;
    box-shadow: 0 4px 18px rgba(2,43,99,.06);
}

.why-card:hover {
    box-shadow: var(--shadow-hover);
    border-color: var(--primary-light);
    transform: translateY(-4px);
}
.why-card::after {
    content: '';
    width: 34px;
    height: 4px;
    border-radius: 4px;
    background: rgba(6,130,181,.35);
    margin-top: .25rem;
}
.why-icon {
    width: 62px;
    height: 62px;
    border-radius: 50%;
    background: #eff6fb;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #dbe9f4;
    color: var(--primary-dark);
    font-size: 1.5rem;
}

.why-card h5 {
    font-size: 1.03rem;
    font-weight: 700;
    margin-bottom: .25rem;
}

.why-card p {
    font-size: .93rem;
    color: var(--text-mid);
    margin: 0;
    line-height: 1.6;
}
@media (max-width: 767px) {
    .why-wrap { padding: 1.4rem 1.1rem 1rem; }
}

/* ── HOW IT WORKS ── */
.step-card {
    position: relative;
    background: linear-gradient(180deg, #ffffff 0%, #f7fbff 100%);
    border: 1px solid #d9e8f4;
    border-radius: 18px;
    padding: 2.1rem 1.5rem 1.4rem;
    transition: all .3s;
    height: 100%;
    box-shadow: 0 8px 28px rgba(2,43,99,.08);
}

.step-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-hover);
    border-color: rgba(6,130,181,.5);
}

.step-card h5 {
    font-size: 1.05rem;
    font-weight: 700;
    margin-bottom: .6rem;
}

.step-card p {
    font-size: .9rem;
    color: var(--text-mid);
    margin: 0;
    line-height: 1.65;
}

.step-number {
    position: absolute;
    top: -14px;
    left: 1.2rem;
    width: 34px;
    height: 34px;
    background: linear-gradient(135deg, #0682B5, #022B63);
    color: #fff;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: .9rem;
    box-shadow: 0 8px 18px rgba(2,43,99,.22);
}

.step-card .icon-box {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    margin-bottom: .9rem;
    background: linear-gradient(135deg, #0682B5, #022B63);
}

.contact-visual {
    position: relative;
    border-radius: 22px;
    padding: 10px;
    background: linear-gradient(135deg, rgba(6,130,181,.18), rgba(2,43,99,.18));
    box-shadow: 0 18px 42px rgba(2,43,99,.16);
}

.contact-visual::after {
    content: '';
    position: absolute;
    top: 16px;
    right: 16px;
    width: 84px;
    height: 84px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,.28) 0%, rgba(255,255,255,0) 72%);
    pointer-events: none;
}

.contact-visual img {
    width: 100%;
    border-radius: 16px;
    min-height: 320px;
    max-height: 420px;
    object-fit: cover;
}

.contact-visual-badge {
    position: absolute;
    left: 18px;
    bottom: 18px;
    background: rgba(2,43,99,.85);
    color: #fff;
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 12px;
    padding: .55rem .8rem;
    font-size: .86rem;
    font-weight: 700;
    backdrop-filter: blur(4px);
}

@media (max-width: 767px) {
    .contact-visual img { min-height: 240px; max-height: 300px; }
}

/* ── CONTACT FORM SECTION ── */
.form-section {
    background: var(--bg-soft);
    position: relative;
    overflow: hidden;
}

.form-section::before {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(6,130,181,.10) 0%, transparent 70%);
    border-radius: 50%;
}

/* ── CTA SECTION ── */
.cta-section {
    background: var(--gradient-hero);
    position: relative;
    overflow: hidden;
    padding: 80px 0;
}

@media (max-width: 640px) {
    .cta-section { padding: 50px 0; }
}

.cta-section .cta-title {
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 800;
    color: #fff;
    margin-bottom: 1rem;
}

.cta-section .cta-text {
    color: rgba(255,255,255,.78);
    font-size: 1.05rem;
    max-width: 480px;
    margin: 0 auto 2rem;
    line-height: 1.7;
}

/* ── TESTIMONIALS ── */
.testimonials-section {
    background: #fff;
}
.testimonial-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 2rem;
    box-shadow: var(--shadow-card);
    height: 100%;
}
.testimonial-stars {
    color: var(--primary);
    letter-spacing: 2px;
    margin-bottom: .75rem;
}
.testimonial-quote {
    color: var(--text-mid);
    line-height: 1.8;
    margin: 0 0 1.25rem;
    font-size: 1rem;
}
.testimonial-person {
    display: flex;
    align-items: center;
    gap: .9rem;
    margin-top: 1rem;
}
.testimonial-avatar {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-weight: 800;
    background: linear-gradient(135deg, var(--primary-light), var(--primary));
    flex-shrink: 0;
}
.testimonial-name {
    font-weight: 800;
    margin: 0;
    font-size: .98rem;
}
.testimonial-role {
    margin: 0;
    color: var(--text-light);
    font-size: .85rem;
}
</style>
@endpush

@section('content')

{{-- ══════════════════════════════════════
     HERO
══════════════════════════════════════ --}}
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>
    <div class="container hero-content py-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-8 text-center">
                <div class="hero-badge justify-content-center d-inline-flex">
                    <i class="bi bi-globe2"></i>
                    Global Talent Platform
                </div>
                <h1 class="hero-title">
                    Hire Top <span class="highlight">Forex, Crypto, and Fintech</span> Talent Globally
                </h1>
                <p class="hero-subtitle mx-auto">
                    We connect fintech, forex, and crypto businesses with pre-screened professionals
                    who understand fast-moving financial markets and emerging technologies.
                </p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ route('hire-talent') }}" class="btn-white-custom">
                        Start Hiring <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ url('/about') }}" class="btn-outline-custom" style="color:#fff;border-color:rgba(255,255,255,.5);text-decoration:none;">
                        Learn More
                    </a>
                </div>

                <div class="hero-stats justify-content-center">
                    <div>
                        <div class="hero-stat-num">500<span>+</span></div>
                        <div class="hero-stat-label">Placements Made</div>
                    </div>
                    <div>
                        <div class="hero-stat-num">30<span>+</span></div>
                        <div class="hero-stat-label">Countries Covered</div>
                    </div>
                    <div>
                        <div class="hero-stat-num">98<span>%</span></div>
                        <div class="hero-stat-label">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     COMPANIES WE HAVE SERVED
══════════════════════════════════════ --}}
<section class="logo-strip">
    <div class="container">
        <p class="logo-label">
            Companies We Have Served
        </p>
        <div id="companiesServedCarousel" class="carousel slide companies-carousel" data-bs-ride="carousel" data-bs-interval="3500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-3 justify-content-center">
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="company-logo">
                                <img src="{{ asset('images/logo_1.jpeg') }}" alt="Company Logo 1">
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="company-logo">
                                <img src="{{ asset('images/logo_2.jpeg') }}" alt="Company Logo 2">
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="company-logo">
                                <img src="{{ asset('images/logo_3.jpeg') }}" alt="Company Logo 3">
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="company-logo">
                                <img src="{{ asset('images/logo_4.jpeg') }}" alt="Company Logo 4">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row g-3 justify-content-center">
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="company-logo">
                                <img src="{{ asset('images/logo_2.jpeg') }}" alt="Company Logo 2">
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="company-logo">
                                <img src="{{ asset('images/logo_3.jpeg') }}" alt="Company Logo 3">
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="company-logo">
                                <img src="{{ asset('images/logo_4.jpeg') }}" alt="Company Logo 4">
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="company-logo">
                                <img src="{{ asset('images/logo_1.jpeg') }}" alt="Company Logo 1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#companiesServedCarousel" data-bs-slide="prev" aria-label="Previous">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#companiesServedCarousel" data-bs-slide="next" aria-label="Next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     WHY CHOOSE US
══════════════════════════════════════ --}}
<section class="section-pad">
    <div class="container">
        <div class="why-wrap">
            <div class="row align-items-center mb-4 gy-3">
                <div class="col-lg-8">
                    <span class="section-label mb-2" style="color:var(--primary-dark);">Why Choose Us</span>
                    <h2 class="why-headline">Why <span style="color:var(--primary);">Globex</span><br>Talent Solutions</h2>
                </div>
                <div class="col-lg-4 text-lg-end d-none d-lg-block"></div>
            </div>

            @php
                $whyItems = [
                    ['icon' => 'bi-people', 'title' => 'Strong Global Talent Network', 'desc' => 'Access a vast network of pre-vetted professionals across global markets.'],
                    ['icon' => 'bi-person-badge', 'title' => 'Deep Industry Specialization', 'desc' => 'Focused expertise in forex, fintech, crypto, and financial services sectors.'],
                    ['icon' => 'bi-stopwatch', 'title' => 'Fast & Efficient Hiring Process', 'desc' => 'Streamlined recruitment process to deliver the right talent quickly.'],
                    ['icon' => 'bi-clipboard2-check', 'title' => 'High-Quality Candidate Screening', 'desc' => 'Rigorous screening and assessment to ensure strong quality and fit.'],
                    ['icon' => 'bi-database-check', 'title' => 'Forex Candidate Database', 'desc' => 'Proprietary talent database of professionals across roles and levels.'],
                    ['icon' => 'bi-handshake', 'title' => 'Client-Focused Solutions', 'desc' => 'Tailored hiring solutions designed around your business goals.'],
                ];
            @endphp

            <div class="row g-3 g-lg-4">
                @foreach($whyItems as $item)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="why-card">
                            <div class="why-icon">
                                <i class="bi {{ $item['icon'] }}"></i>
                            </div>
                            <h5>{{ $item['title'] }}</h5>
                            <p>{{ $item['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     HOW IT WORKS
══════════════════════════════════════ --}}
<section class="section-pad bg-soft">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center">
                <span class="section-label">The Process</span>
                <h2 class="section-title">How It <span>Works</span></h2>
                <div class="section-divider center"></div>
                <p class="section-subtitle mx-auto">
                    Four simple steps from sharing your requirements to building your dream team.
                </p>
            </div>
        </div>
        <div class="row g-4 position-relative">
            @php
            $steps = [
                ['icon'=>'bi-pencil-square', 'title'=>'Share Your Hiring Needs',
                 'desc'=>"Tell us about the role and profile you want to hire. We'll take it from there."],
                ['icon'=>'bi-people',         'title'=>'Discover Relevant Talent',
                 'desc'=>'Get connected with professionals who match your specific business requirements.'],
                ['icon'=>'bi-check-circle', 'title'=>'Interview with Confidence',
                 'desc'=>"Review, assess, and shortlist qualified candidates at your own pace."],
                ['icon'=>'bi-briefcase',      'title'=>'Hire Across Borders',
                 'desc'=>'Build a remote-ready or onsite team with talent from around the world.'],
            ];
            @endphp
            @foreach($steps as $i => $step)
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <div class="step-number">{{ $i + 1 }}</div>
                    <div class="icon-box mt-2 {{ $i % 2 === 1 ? 'accent' : '' }}">
                        <i class="bi {{ $step['icon'] }}"></i>
                    </div>
                    <h5>{{ $step['title'] }}</h5>
                    <p>{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     CONTACT FORM
══════════════════════════════════════ --}}
<section class="section-pad form-section" id="contact-form">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5">
                <span class="section-label">Get In Touch</span>
                <h2 class="section-title">Ready to <span>Find Your Talent?</span></h2>
                <div class="section-divider"></div>
                <p style="color:var(--text-mid);line-height:1.75;margin-bottom:2rem;">
                    Describe your hiring needs and let our team match you with the perfect candidates.
                </p>
                <a href="{{ route('hire-talent') }}" class="btn-primary-custom">
                    Tell us more <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-visual">
                    <img src="{{ asset('images/talent.jpg') }}" alt="Talent Hiring" class="img-fluid">
                    <div class="contact-visual-badge">
                        <i class="bi bi-stars me-1"></i> Trusted hiring partner
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     CTA
══════════════════════════════════════ --}}
<section class="cta-section">
    <div class="container text-center position-relative" style="z-index:2;">
        <h2 class="cta-title">
            Ready to Transform Your Hiring?
        </h2>
        <p class="cta-text">
            Get matched with pre-screened forex, crypto, and fintech professionals in days, not weeks.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('hire-talent') }}" class="btn-white-custom">
                Start Now <i class="bi bi-arrow-right ms-1"></i>
            </a>
            <a href="{{ url('/about') }}" class="btn-outline-custom" style="color:#fff;border-color:rgba(255,255,255,.5);">
                Learn More
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     CONTACT FORM SECTION
══════════════════════════════════════ --}}
<section class="section-pad form-section">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5">
                <span class="section-label">Get In Touch</span>
                <h2 class="section-title">Ready to <span>Find Your Talent?</span></h2>
                <div class="section-divider"></div>
                <p>
                    Share your hiring needs with us and we'll connect you with the right
                    professionals in forex, crypto, and fintech industries across the globe.
                </p>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li class="d-flex align-items-center gap-3">
                        <div class="icon-box" style="width:44px;height:44px;font-size:1.1rem;border-radius:10px;flex-shrink:0;">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <span style="color:var(--text-mid);font-size:.95rem;">info@forextalent.com</span>
                    </li>
                    <li class="d-flex align-items-center gap-3">
                        <div class="icon-box accent" style="width:44px;height:44px;font-size:1.1rem;border-radius:10px;flex-shrink:0;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <span style="color:var(--text-mid);font-size:.95rem;">+92 300 1234567 (WhatsApp)</span>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 offset-lg-1">
                <div style="background:#fff;border-radius:var(--radius);border:1px solid var(--border);padding:2.5rem;box-shadow:var(--shadow-card);">
                    @if(session('success'))
                        <div class="alert alert-success rounded-3 mb-4">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('hire-talent.send') }}" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label-custom">First Name <span style="color:var(--primary);">*</span></label>
                                <input type="text" name="first_name" required
                                       class="form-control form-control-custom @error('first_name') is-invalid @enderror"
                                       value="{{ old('first_name') }}"
                                       placeholder="John">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label-custom">Last Name <span style="color:var(--primary);">*</span></label>
                                <input type="text" name="last_name" required
                                       class="form-control form-control-custom @error('last_name') is-invalid @enderror"
                                       value="{{ old('last_name') }}"
                                       placeholder="Doe">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Email Address <span style="color:var(--primary);">*</span></label>
                                <input type="email" name="email" required
                                       class="form-control form-control-custom @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="john@company.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Subject <span style="color:var(--primary);">*</span></label>
                                <input type="text" name="subject" required
                                       class="form-control form-control-custom @error('subject') is-invalid @enderror"
                                       value="{{ old('subject') }}"
                                       placeholder="e.g. Hiring a Forex Analyst">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Message <span style="color:var(--primary);">*</span></label>
                                <textarea name="message" rows="4" required
                                          class="form-control form-control-custom @error('message') is-invalid @enderror"
                                          placeholder="Tell us about the role and profile you're looking to hire...">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <button type="submit" class="btn-primary-custom w-100 justify-content-center">
                                    Send Message <i class="bi bi-send"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     CTA BANNER
══════════════════════════════════════ --}}
<section class="cta-section">
    <div class="container text-center position-relative">
        <span class="section-label" style="color:var(--accent);">Global Reach</span>
        <h2 style="font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:#fff;margin-bottom:1rem;">
            Build Your Dream Team Across Borders
        </h2>
        <p style="color:rgba(255,255,255,.78);font-size:1.05rem;max-width:540px;margin:0 auto 2.2rem;line-height:1.7;">
            Whether you need one specialist or an entire team, we're ready to connect you
            with the right talent — fast.
        </p>
        <a href="{{ route('hire-talent') }}" class="btn-white-custom">
            Start Hiring Today <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
</section>

{{-- ══════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════ --}}
<section class="section-pad testimonials-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <span class="section-label">Testimonials</span>
                <h2 class="section-title">Trusted by <span>Teams Worldwide</span></h2>
                <div class="section-divider center"></div>
                <p class="section-subtitle mx-auto">
                    A few words from clients who hired forex, crypto, and fintech talent through our network.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-quote">
                        “The process was smooth and professional. I was matched with a role that aligned perfectly with my experience in forex Sales, and the communication throughout was clear and efficient.”
                    </p>
                    <div class="testimonial-person">
                        <div class="testimonial-avatar">AM</div>
                        <div>
                            <p class="testimonial-name">Account Manager</p>
                            <p class="testimonial-role">MENA</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-quote">
                        What stood out most was the level of ownership took. I never felt like just another candidate in a pipeline, instead, I felt supported and represented. That made a meaningful difference during a major career transition.
                        <br><br>
                        I’m grateful for the professionalism and care brought to the process, and I would absolutely recommend working with GlobeX Talent Solutions to anyone navigating a strategic career move.
                    </p>
                    <div class="testimonial-person">
                        <div class="testimonial-avatar" style="background:linear-gradient(135deg,#0682B5,#022B63);">FS</div>
                        <div>
                            <p class="testimonial-name">Full Stack Developer</p>
                            <p class="testimonial-role">Russia</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-quote">
                        From our first conversation to the final steps, the process was seamless and incredibly supportive. I was kept informed at every stage, and the team’s clarity, care, and attention to detail put me entirely at ease. Their professionalism and timely communication made the transition into my new role smooth and confident.
                        <br><br>
                        I’m deeply grateful for the guidance provided by the entire Globex Team. I couldn’t have wished for a better experience.
                    </p>
                    <div class="testimonial-person">
                        <div class="testimonial-avatar" style="background:linear-gradient(135deg,#0682B5,#022B63);">BD</div>
                        <div>
                            <p class="testimonial-name">Business Development Manager Forex</p>
                            <p class="testimonial-role">Malaysia</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-quote">
                        The hiring process was efficient and transparent. I received timely updates and was guided through each step clearly.
                    </p>
                    <div class="testimonial-person">
                        <div class="testimonial-avatar" style="background:linear-gradient(135deg,#0682B5,#022B63);">RC</div>
                        <div>
                            <p class="testimonial-name">Risk &amp; Compliance Specialist</p>
                            <p class="testimonial-role">Cyprus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
