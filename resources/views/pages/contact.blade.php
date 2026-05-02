@extends('layouts.app')

@section('title', 'Contact Us — ForexTalent')
@section('meta_description', 'Get in touch with ForexTalent to start hiring top forex, crypto, and fintech professionals globally.')

@push('styles')
<style>
/* ── CONTACT HERO ── */
.contact-hero {
    background:
        linear-gradient(108deg, rgba(255,255,255,.92) 0%, rgba(236,245,253,.86) 56%, rgba(219,236,248,.72) 100%),
        radial-gradient(circle at 84% 22%, rgba(2,43,99,.12) 0%, rgba(2,43,99,0) 52%);
    padding: 80px 0 70px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

@media (max-width: 640px) {
    .contact-hero { padding: 60px 0 50px; }
}

.contact-hero::before {
    content: '';
    position: absolute;
    bottom: -60px;
    left: 0;
    right: 0;
    height: 120px;
    background: var(--bg-soft);
    clip-path: ellipse(55% 100% at 50% 100%);
}

.contact-hero h1 {
    font-size: clamp(2rem, 5vw, 3.2rem);
    font-weight: 800;
    color: #022B63;
    margin-bottom: 1rem;
    letter-spacing: -1px;
}

.contact-hero p {
    color: rgba(2,43,99,.76);
    font-size: 1.05rem;
    max-width: 500px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ── INFO CARDS ── */
.contact-info-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 1.8rem;
    transition: all .3s;
    display: flex;
    align-items: flex-start;
    gap: 1.2rem;
}

.contact-info-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
    border-color: var(--primary-light);
}

.contact-info-card h6 {
    font-weight: 700;
    margin-bottom: .3rem;
}

.contact-info-card a {
    color: var(--primary);
    font-size: .93rem;
    text-decoration: none;
    font-weight: 500;
    transition: color .2s;
}

.contact-info-card a:hover {
    color: var(--primary-dark);
}

.contact-info-card p {
    font-size: .83rem;
    color: var(--text-light);
    margin: .2rem 0 0;
}

/* ── FORM SECTION ── */
.contact-form-container {
    background: #fff;
    border-radius: var(--radius);
    border: 1px solid var(--border);
    padding: 2.5rem 2.2rem;
    box-shadow: var(--shadow-card);
}

@media (max-width: 768px) {
    .contact-form-container { padding: 2rem 1.5rem; }
}

.contact-form-container h4 {
    font-family: 'Sora', sans-serif;
    font-weight: 700;
    margin-bottom: 1.5rem;
    font-size: 1.2rem;
    color: var(--text-dark);
}

.form-label-custom {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: .6rem;
    font-size: .95rem;
}

.form-label-custom span {
    color: var(--primary);
}

.form-control-custom {
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: .65rem .85rem;
    font-size: .95rem;
    transition: all .2s;
}

.form-control-custom:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(6, 130, 181, 0.12);
}

.form-control-custom::placeholder {
    color: var(--text-light);
}

.quick-connect-box {
    background: var(--bg-soft);
    border-radius: var(--radius);
    padding: 1.4rem;
}

.quick-connect-label {
    font-size: .88rem;
    font-weight: 700;
    color: var(--text-mid);
    margin-bottom: .9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.quick-connect-links {
    display: flex;
    gap: .75rem;
    flex-wrap: wrap;
}

.quick-connect-btn {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    color: #fff;
    border-radius: 8px;
    padding: .5rem 1rem;
    font-size: .88rem;
    font-weight: 600;
    text-decoration: none;
    transition: opacity .2s;
}

.quick-connect-btn:hover {
    opacity: .9;
}

.whatsapp-btn { background: #0682B5; }
.email-btn { background: var(--primary); }
.linkedin-btn { background: #022B63; }

/* ── FEATURES LIST ── */
.feature-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: .75rem;
    font-size: .93rem;
    color: var(--text-mid);
}

.feature-item i {
    color: var(--accent);
    font-size: 1rem;
    flex-shrink: 0;
}

/* ── INFO SECTION ── */
.contact-info-section h2 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 800;
    margin-bottom: 1rem;
}

.contact-info-section h2 span {
    color: var(--accent);
}

.contact-info-section p {
    color: var(--text-mid);
    line-height: 1.8;
    margin-bottom: 2rem;
}
</style>
@endpush

@section('content')

{{-- ══════════════════════════════════════
     CONTACT HERO
══════════════════════════════════════ --}}
<section class="contact-hero">
    <div class="container position-relative" style="z-index:2;">
        <span class="section-label">Reach Out</span>
        <h1>Let's Start a Conversation</h1>
        <p>
            Tell us what you're looking for and we'll connect you with the right talent in
            forex, crypto, or fintech — globally.
        </p>
    </div>
</section>

<div style="height:70px;background:var(--bg-soft);"></div>

{{-- ══════════════════════════════════════
     CONTACT INFO CARDS
══════════════════════════════════════ --}}
<section class="section-pad-sm bg-soft" style="padding-top:0;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="contact-info-card">
                    <div class="icon-box flex-shrink-0" style="width:50px;height:50px;font-size:1.2rem;border-radius:12px;">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div>
                        <h6>Email Us</h6>
                        <a href="mailto:Hr@globextalentsolutions.com">
                            Hr@globextalentsolutions.com
                        </a>
                        <p>We reply within 24 hours</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info-card">
                    <div class="icon-box accent flex-shrink-0" style="width:50px;height:50px;font-size:1.2rem;border-radius:12px;">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <div>
                        <h6>WhatsApp / Phone</h6>
                        <a href="https://wa.me/447546718850" target="_blank">
                            +44 7546 718850
                        </a>
                        <p>Mon–Fri, 9am – 6pm PKT</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info-card">
                    <div class="icon-box flex-shrink-0" style="width:50px;height:50px;font-size:1.2rem;border-radius:12px;background:linear-gradient(135deg,#0682B5,#022B63);">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div>
                        <h6>Our Location</h6>
                        <p style="color:var(--text-mid);margin:0;font-weight:500;">
                            103, Fahidi Heights, Khalid Bin Al Waleed Road<br>
                            Al Hamriya, Bur Dubai, Dubai
                        </p>
                        <p>Global remote operations</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     MAIN CONTACT FORM
══════════════════════════════════════ --}}
<section class="section-pad">
    <div class="container">
        <div class="row align-items-start gy-5">

            {{-- LEFT: Info ─────────────────────────── --}}
            <div class="col-lg-5">
                <span class="section-label">Send a Message</span>
                <div class="contact-info-section">
                    <h2>How Can We <span>Help You?</span></h2>
                </div>
                <div class="section-divider"></div>
                <p>
                    Whether you're looking to hire a single forex analyst or build an entire
                    crypto trading desk, fill out the form and our team will get back to you promptly.
                </p>

                <div class="feature-list mb-4">
                    <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        Pre-screened forex & crypto professionals
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        Global talent across 30+ countries
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        Fast turnaround — matched in days, not weeks
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        Dedicated support throughout the process
                    </div>
                </div>

                {{-- Social / Quick Contact ── --}}
                <div class="quick-connect-box">
                    <p class="quick-connect-label">Quick Connect</p>
                    <div class="quick-connect-links">
                        <a href="https://wa.me/447546718850" target="_blank" class="quick-connect-btn whatsapp-btn">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>
                        <a href="mailto:Hr@globextalentsolutions.com" class="quick-connect-btn email-btn">
                            <i class="bi bi-envelope"></i> Email
                        </a>
                        <a href="https://linkedin.com" target="_blank" class="quick-connect-btn linkedin-btn">
                            <i class="bi bi-linkedin"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Form ─────────────────────────── --}}
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form-container">

                    @if(session('success'))
                        <div class="alert alert-success rounded-3 d-flex align-items-center gap-2 mb-4">
                            <i class="bi bi-check-circle-fill fs-5"></i>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif

                    <h4>Fill in Your Details</h4>

                    <form method="POST" action="{{ route('hire-talent.send') }}" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label-custom">First Name <span>*</span></label>
                                <input type="text" name="first_name" required
                                       class="form-control form-control-custom @error('first_name') is-invalid @enderror"
                                       value="{{ old('first_name') }}"
                                       placeholder="First name">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label-custom">Last Name <span>*</span></label>
                                <input type="text" name="last_name" required
                                       class="form-control form-control-custom @error('last_name') is-invalid @enderror"
                                       value="{{ old('last_name') }}"
                                       placeholder="Last name">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Email Address <span>*</span></label>
                                <input type="email" name="email" required
                                       class="form-control form-control-custom @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="your@company.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Phone / WhatsApp <span style="color:var(--text-light);font-weight:400;">(Optional)</span></label>
                                <input type="tel" name="phone"
                                       class="form-control form-control-custom @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}"
                                       placeholder="+92 300 0000000">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Subject <span>*</span></label>
                                <select name="subject"
                                        class="form-control form-control-custom @error('subject') is-invalid @enderror">
                                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select a subject…</option>
                                    <option value="Hiring Forex Talent"       {{ old('subject')=='Hiring Forex Talent' ? 'selected' : '' }}>Hiring Forex Talent</option>
                                    <option value="Hiring Crypto Talent"      {{ old('subject')=='Hiring Crypto Talent' ? 'selected' : '' }}>Hiring Crypto Talent</option>
                                    <option value="Fintech Recruitment"       {{ old('subject')=='Fintech Recruitment' ? 'selected' : '' }}>Fintech Recruitment</option>
                                    <option value="General Enquiry"           {{ old('subject')=='General Enquiry' ? 'selected' : '' }}>General Enquiry</option>
                                    <option value="Other"                     {{ old('subject')=='Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Message <span>*</span></label>
                                <textarea name="message" rows="5" required
                                          class="form-control form-control-custom @error('message') is-invalid @enderror"
                                          placeholder="Tell us about the role(s) you need to fill, your company, and any specific requirements…">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <button type="submit" class="btn-primary-custom w-100 justify-content-center" style="font-size:1rem;padding:.85rem;">
                                    Send Message &nbsp;<i class="bi bi-send-fill"></i>
                                </button>
                                <p style="font-size:.8rem;color:var(--text-light);text-align:center;margin-top:.8rem;">
                                    By submitting, you agree to our privacy policy. We never share your data.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
