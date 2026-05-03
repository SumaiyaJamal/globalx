@extends('layouts.app')

@section('title', 'About Us — ForexTalent')

@push('styles')
<style>
/* ── ABOUT HERO ── */
.about-hero {
    background:
        linear-gradient(108deg, rgba(255,255,255,.92) 0%, rgba(236,245,253,.86) 56%, rgba(219,236,248,.72) 100%),
        radial-gradient(circle at 84% 22%, rgba(2,43,99,.12) 0%, rgba(2,43,99,0) 52%);
    padding: 100px 0 80px;
    position: relative;
    overflow: hidden;
}

@media (max-width: 640px) {
    .about-hero { padding: 60px 0 50px; }
}

.about-hero::before {
    content: '';
    position: absolute;
    bottom: -60px;
    left: 0;
    right: 0;
    height: 120px;
    background: #fff;
    clip-path: ellipse(55% 100% at 50% 100%);
}

.about-hero::after {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(6,130,181,.12) 0%, transparent 65%);
    border-radius: 50%;
}

.about-hero h1 {
    font-size: clamp(2.2rem, 5vw, 3.4rem);
    font-weight: 800;
    color: #022B63;
    margin-bottom: 1.2rem;
    letter-spacing: -1px;
}

.about-hero h1 span {
    color: var(--primary);
}

.about-hero p {
    color: rgba(2,43,99,.76);
    font-size: 1.1rem;
    max-width: 580px;
    margin: 0 auto;
    line-height: 1.75;
}

/* ── MISSION / VISION ── */
.mv-card {
    border-radius: var(--radius);
    padding: 2.5rem 2rem;
    height: 100%;
    position: relative;
    overflow: hidden;
}

@media (max-width: 640px) {
    .mv-card { padding: 2rem 1.5rem; }
}

.mv-card.mission {
    background: var(--primary-dark);
    color: #fff;
}

.mv-card.vision {
    background: var(--bg-soft);
    border: 1px solid var(--border);
}

.mv-card::before {
    content: '';
    position: absolute;
    top: -40px;
    right: -40px;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    opacity: .06;
}

.mv-card.mission::before {
    background: #fff;
}

.mv-card.vision::before {
    background: var(--primary);
}

.mv-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    margin-bottom: 1.4rem;
}

.mv-card.mission .mv-icon {
    background: rgba(255,255,255,.12);
    color: var(--accent);
}

.mv-card.vision .mv-icon {
    background: rgba(6,130,181,.12);
    color: var(--primary);
}

.mv-card h3 {
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
}

.mv-card.mission h3 {
    color: #fff;
}

.mv-card.mission p {
    color: rgba(255,255,255,.78);
    line-height: 1.8;
}

.mv-card.vision p {
    color: var(--text-mid);
    line-height: 1.8;
}

/* ── CORE VALUES ── */
.value-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 1.8rem;
    transition: all .3s;
    height: 100%;
    border-left: 4px solid transparent;
}

.value-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
    border-left-color: var(--primary);
}

.value-num {
    font-size: 2rem;
    font-weight: 800;
    color: rgba(6,130,181,.14);
    line-height: 1;
    margin-bottom: .6rem;
}

.value-card h5 {
    font-size: 1.05rem;
    font-weight: 700;
    margin: 0;
}

.value-card p {
    font-size: .92rem;
    color: var(--text-mid);
    line-height: 1.7;
    margin: 0;
}

/* ── CTA SECTION ── */
.cta-section {
    background: var(--gradient-hero);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

@media (max-width: 640px) {
    .cta-section { padding: 50px 0; }
}

.cta-section h2 {
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 800;
    color: #fff;
    margin-bottom: 1rem;
}

.cta-section p {
    color: rgba(255,255,255,.78);
    font-size: 1.05rem;
    max-width: 480px;
    margin: 0 auto 2rem;
    line-height: 1.7;
}
</style>
@endpush

@section('content')

{{-- ══════════════════════════════════════
     ABOUT HERO
══════════════════════════════════════ --}}
<section class="about-hero">
    <div class="container text-center position-relative" style="z-index:2;">
        <span class="section-label">Who We Are</span>
        <h1>
            Bridging Companies with<br>
            <span>World-Class Financial Talent</span>
        </h1>
        <p>
            We are a specialised global talent platform focused exclusively on forex, cryptocurrency,
            and fintech industries — delivering hiring that is seamless, efficient, and reliable.
        </p>
    </div>
</section>

<div style="height:80px;"></div>

{{-- ══════════════════════════════════════
     MISSION & VISION
══════════════════════════════════════ --}}
<section class="section-pad-sm">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center">
                <span class="section-label">Our Foundation</span>
                <h2 class="section-title">Mission & <span>Vision</span></h2>
                <div class="section-divider center"></div>
            </div>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-md-6">
                <div class="mv-card mission">
                    <div class="mv-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>
                        Our mission is to bridge the gap between companies and specialised talent in forex,
                        cryptocurrency, and fintech industries. We aim to make global hiring seamless,
                        efficient, and reliable by providing access to skilled professionals who understand
                        fast-moving financial markets and emerging technologies.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mv-card vision">
                    <div class="mv-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>
                        We envision a borderless future where companies can access the best talent from
                        anywhere in the world. By enabling global hiring and fostering strong teams, we
                        strive to redefine how organisations build, scale, and succeed in the long run.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     CORE VALUES
══════════════════════════════════════ --}}
<section class="section-pad bg-soft">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center">
                <span class="section-label">What Drives Us</span>
                <h2 class="section-title">Our Core <span>Values</span></h2>
                <div class="section-divider center"></div>
                <p class="section-subtitle mx-auto">
                    These principles guide every hiring decision, every client relationship,
                    and every candidate interaction.
                </p>
            </div>
        </div>
        <div class="row g-4">
            @php
            $values = [
                [
                    'num'  => '01',
                    'icon' => 'bi-bar-chart-steps',
                    'title'=> 'Industry Expertise',
                    'desc' => 'We understand the dynamics of forex, cryptocurrency, and fintech markets — enabling us to connect businesses with talent that truly fits the role.',
                    'color'=> 'var(--primary)',
                ],
                [
                    'num'  => '02',
                    'icon' => 'bi-globe2',
                    'title'=> 'Global Mindset',
                    'desc' => 'We believe talent has no borders. Our approach focuses on building diverse, remote-ready teams across international markets.',
                    'color'=> 'var(--accent)',
                ],
                [
                    'num'  => '03',
                    'icon' => 'bi-shield-check',
                    'title'=> 'Trust & Transparency',
                    'desc' => 'We prioritise honest communication, clear processes, and reliable partnerships with both clients and candidates.',
                    'color'=> 'var(--primary-dark)',
                ],
                [
                    'num'  => '04',
                    'icon' => 'bi-award',
                    'title'=> 'Quality Over Quantity',
                    'desc' => 'We focus on delivering highly relevant, pre-screened professionals instead of overwhelming clients with generic profiles.',
                    'color'=> 'var(--accent-2)',
                ],
                [
                    'num'  => '05',
                    'icon' => 'bi-lightning-charge',
                    'title'=> 'Speed & Efficiency',
                    'desc' => 'In fast-moving financial markets, timing matters. We streamline the hiring process to help companies move quickly without compromising on quality.',
                    'color'=> 'var(--primary-light)',
                ],
            ];
            @endphp

            @foreach($values as $val)
            <div class="col-md-6 col-lg-4">
                <div class="value-card">
                    <div class="value-num">{{ $val['num'] }}</div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="bi {{ $val['icon'] }}" style="color:{{ $val['color'] }};font-size:1.3rem;"></i>
                        <h5>{{ $val['title'] }}</h5>
                    </div>
                    <p>{{ $val['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     CTA
══════════════════════════════════════ --}}
<section class="cta-section text-center position-relative" style="z-index:2;">
    <div class="container">
        <h2>Ready to Work Together?</h2>
        <p>
            Let us help you find the right professionals to grow your fintech or trading business.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('hire-talent') }}" class="cta-btn-white">
                Contact Us <i class="bi bi-arrow-right ms-1"></i>
            </a>
            <a href="{{ url('/') }}" class="cta-btn-outline">
                Back to Home
            </a>
        </div>
    </div>
</section>

@endsection
