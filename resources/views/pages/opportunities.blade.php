@extends('layouts.app')

@section('title', 'Explore Opportunities — ForexTalent')
@section('meta_description', 'Apply for forex, crypto, and fintech positions. Submit your CV and cover letter to join our network.')

@push('styles')
<style>
/* ── OPPORTUNITIES HERO ── */
.opportunities-hero {
    background:
        linear-gradient(108deg, rgba(255,255,255,.92) 0%, rgba(236,245,253,.86) 56%, rgba(219,236,248,.72) 100%),
        radial-gradient(circle at 84% 22%, rgba(2,43,99,.12) 0%, rgba(2,43,99,0) 52%);
    padding: 80px 0 70px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

@media (max-width: 640px) {
    .opportunities-hero { padding: 60px 0 50px; }
}

.opportunities-hero::before {
    content: '';
    position: absolute;
    bottom: -60px;
    left: 0;
    right: 0;
    height: 120px;
    background: var(--bg-soft);
    clip-path: ellipse(55% 100% at 50% 100%);
}

.opportunities-hero h1 {
    font-size: clamp(2rem, 5vw, 3.2rem);
    font-weight: 800;
    color: #022B63;
    margin-bottom: 1rem;
    letter-spacing: -1px;
}

.opportunities-hero p {
    color: rgba(2,43,99,.76);
    font-size: 1.05rem;
    max-width: 500px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ── APPLICATION FORM CONTAINER ── */
.apply-form-container {
    background: #fff;
    border-radius: var(--radius);
    border: 1px solid var(--border);
    padding: 2.5rem 2.2rem;
    box-shadow: var(--shadow-card);
}

@media (max-width: 768px) {
    .apply-form-container { padding: 2rem 1.5rem; }
}

.apply-form-container h4 {
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

.file-upload-wrapper {
    position: relative;
    margin-bottom: 1.5rem;
}

.file-upload-input {
    display: none;
}

.file-upload-label {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.8rem;
    padding: 1.2rem;
    border: 2px dashed var(--border);
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: all .2s;
    background: var(--bg-soft);
}

.file-upload-label:hover {
    border-color: var(--primary);
    background: rgba(6, 130, 181, 0.08);
}

.file-upload-label i {
    font-size: 1.5rem;
    color: var(--primary);
}

.file-upload-text {
    display: flex;
    flex-direction: column;
    text-align: left;
}

.file-upload-text strong {
    color: var(--text-dark);
    font-size: .95rem;
}

.file-upload-text small {
    color: var(--text-light);
    font-size: .85rem;
}

.file-name-display {
    margin-top: 0.5rem;
    font-size: .85rem;
    color: var(--primary);
    font-weight: 500;
}

.btn-submit-custom {
    background: var(--primary);
    color: #fff;
    border: none;
    border-radius: 50px;
    padding: 0.75rem 2.5rem;
    font-family: 'Sora', sans-serif;
    font-weight: 600;
    font-size: 0.95rem;
    width: 100%;
    letter-spacing: 0.3px;
    transition: all .25s;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .5rem;
}

.btn-submit-custom:hover {
    background: var(--primary-dark);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 28px rgba(2,43,99,.3);
}

.success-alert {
    background: rgba(6,130,181,.08);
    color: var(--primary-dark);
    border: 1px solid rgba(6,130,181,.28);
    border-radius: var(--radius-sm);
    padding: 1rem;
    margin-bottom: 1.5rem;
}

.error-alert {
    background: rgba(2,43,99,.06);
    color: var(--primary-dark);
    border: 1px solid rgba(2,43,99,.20);
    border-radius: var(--radius-sm);
    padding: 1rem;
    margin-bottom: 1.5rem;
}

.error-list {
    margin: 0;
    padding-left: 1.2rem;
}

.error-list li {
    margin-bottom: 0.3rem;
}

/* ── POSITION INFO ── */
.position-info {
    background: var(--bg-soft);
    border-radius: var(--radius);
    padding: 1.8rem;
    margin-bottom: 2rem;
    border-left: 4px solid var(--primary);
}

.position-info h5 {
    font-size: 1.05rem;
    font-weight: 700;
    margin-bottom: .8rem;
    color: var(--text-dark);
}

.position-info p {
    font-size: .95rem;
    color: var(--text-mid);
    margin: 0.3rem 0;
    line-height: 1.6;
}

.position-label {
    font-weight: 600;
    color: var(--primary);
    font-size: .88rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
</style>
@endpush

@section('content')

{{-- ══════════════════════════════════════
     HERO
══════════════════════════════════════ --}}
<section class="opportunities-hero">
    <div class="container text-center position-relative" style="z-index:2;">
        <span class="section-label">Join Our Network</span>
        <h1>
            Explore <span>Opportunities</span>
        </h1>
        <p>
            Ready to take the next step in your forex, crypto, or fintech career? Submit your application below.
        </p>
    </div>
</section>

<div style="height:60px;"></div>

{{-- ══════════════════════════════════════
     APPLICATION FORM
══════════════════════════════════════ --}}
<section class="section-pad">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="apply-form-container">
                    <h4>
                        <i class="bi bi-briefcase me-2"></i>
                        Submit Your Application
                    </h4>

                    @if ($errors->any())
                        <div class="error-alert">
                            <strong>Please correct the following errors:</strong>
                            <ul class="error-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="success-alert">
                            <strong>✓ Success!</strong> Your application has been received. We'll review your submission and get back to you shortly.
                        </div>
                    @endif

                    <form action="{{ route('opportunities.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label-custom">First Name <span>*</span></label>
                                <input type="text" class="form-control form-control-custom @error('first_name') is-invalid @enderror" 
                                    name="first_name" placeholder="John" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom">Last Name <span>*</span></label>
                                <input type="text" class="form-control form-control-custom @error('last_name') is-invalid @enderror" 
                                    name="last_name" placeholder="Doe" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">Email Address <span>*</span></label>
                            <input type="email" class="form-control form-control-custom @error('email') is-invalid @enderror" 
                                name="email" placeholder="john@example.com" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">Phone Number</label>
                            <input type="tel" class="form-control form-control-custom @error('phone') is-invalid @enderror" 
                                name="phone" placeholder="+1 (555) 123-4567" value="{{ old('phone') }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">Position Applied For <span>*</span></label>
                            <select class="form-control form-control-custom @error('position') is-invalid @enderror" 
                                name="position" required>
                                <option value="">-- Select a Position --</option>
                                @foreach($jobs as $job)
                                    <option value="{{ $job->id }}" @selected(old('position') === (string) $job->id)>{{ $job->title }}</option>
                                @endforeach
                                <option value="other" @selected(old('position') === 'other')>Other</option>
                            </select>
                            @error('position')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">Years of Experience <span>*</span></label>
                            <select class="form-control form-control-custom @error('experience') is-invalid @enderror" 
                                name="experience" required>
                                <option value="">-- Select Experience Level --</option>
                                <option value="0-1" @selected(old('experience') === '0-1')>0-1 Years</option>
                                <option value="1-3" @selected(old('experience') === '1-3')>1-3 Years</option>
                                <option value="3-5" @selected(old('experience') === '3-5')>3-5 Years</option>
                                <option value="5-10" @selected(old('experience') === '5-10')>5-10 Years</option>
                                <option value="10+" @selected(old('experience') === '10+')>10+ Years</option>
                            </select>
                            @error('experience')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- CV Upload -->
                        <div class="file-upload-wrapper">
                            <label class="form-label-custom">Upload Your CV <span>*</span></label>
                            <input type="file" id="cv_file" name="cv" class="file-upload-input @error('cv') is-invalid @enderror" 
                                accept=".pdf,.doc,.docx" required>
                            <label for="cv_file" class="file-upload-label">
                                <i class="bi bi-cloud-upload"></i>
                                <div class="file-upload-text">
                                    <strong>Choose CV file</strong>
                                    <small>PDF, DOC, or DOCX (Max 5MB)</small>
                                </div>
                            </label>
                            <div class="file-name-display" id="cv_name"></div>
                            @error('cv')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Cover Letter Upload -->
                        <div class="file-upload-wrapper">
                            <label class="form-label-custom">Upload Your Cover Letter <span>*</span></label>
                            <input type="file" id="cover_letter_file" name="cover_letter" class="file-upload-input @error('cover_letter') is-invalid @enderror" 
                                accept=".pdf,.doc,.docx" required>
                            <label for="cover_letter_file" class="file-upload-label">
                                <i class="bi bi-cloud-upload"></i>
                                <div class="file-upload-text">
                                    <strong>Choose Cover Letter file</strong>
                                    <small>PDF, DOC, or DOCX (Max 5MB)</small>
                                </div>
                            </label>
                            <div class="file-name-display" id="cover_letter_name"></div>
                            @error('cover_letter')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">Additional Notes</label>
                            <textarea class="form-control form-control-custom @error('notes') is-invalid @enderror" 
                                name="notes" rows="4" placeholder="Tell us about yourself, your strengths, or anything else we should know..."
                                maxlength="2000">{{ old('notes') }}</textarea>
                            <small class="text-muted d-block mt-1">Max 2000 characters</small>
                            @error('notes')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn-submit-custom">
                            <i class="bi bi-send"></i>
                            Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     CTA SECTION
══════════════════════════════════════ --}}
<section class="cta-section text-center position-relative" style="z-index:2; margin-top: 80px;">
    <div class="container">
        <h2 style="color:#fff;">Have Questions?</h2>
        <p style="color:rgba(255,255,255,.78);">
            Can't find what you're looking for? Get in touch with our team.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('hire-talent') }}" class="btn-white-custom">
                Contact Us <i class="bi bi-arrow-right ms-1"></i>
            </a>
            <a href="{{ url('/') }}" class="btn-outline-custom" style="color:#fff;border-color:rgba(255,255,255,.5);">
                Back to Home
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Handle CV file upload
    document.getElementById('cv_file').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'No file chosen';
        document.getElementById('cv_name').textContent = fileName;
    });

    // Handle Cover Letter file upload
    document.getElementById('cover_letter_file').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'No file chosen';
        document.getElementById('cover_letter_name').textContent = fileName;
    });
</script>
@endpush
