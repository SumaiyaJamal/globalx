@extends('layouts.app')

@section('title', 'Jobs Portal — ForexTalent')
@section('meta_description', 'Browse active job opportunities in forex, crypto, and fintech. Apply via Explore Opportunities.')

@push('styles')
<style>
    .jobs-hero {
        background: var(--gradient-hero);
        padding: 80px 0 70px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .jobs-hero::before {
        content: '';
        position: absolute;
        bottom: -60px;
        left: 0;
        right: 0;
        height: 120px;
        background: var(--bg-soft);
        clip-path: ellipse(55% 100% at 50% 100%);
    }
    .job-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 1.4rem 1.3rem;
        transition: all .25s;
        height: 100%;
        box-shadow: var(--shadow-card);
    }
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
        border-color: var(--primary-light);
    }
    .job-meta {
        display:flex;
        flex-wrap: wrap;
        gap: .5rem .65rem;
        color: var(--text-light);
        font-size: .88rem;
        font-weight: 600;
    }
    .job-pill {
        display:inline-flex;
        align-items:center;
        gap:.35rem;
        padding: .25rem .6rem;
        border-radius: 999px;
        border: 1px solid var(--border);
        background: rgba(10,92,138,.05);
        color: var(--primary-dark);
        font-size: .82rem;
        font-weight: 700;
    }
    .pagination .page-link { border-radius: 10px; }
    .jobs-filter-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-card);
    }
</style>
@endpush

@section('content')
    <section class="jobs-hero">
        <div class="container position-relative" style="z-index:2;">
            <span class="section-label">Jobs Portal</span>
            <h1 style="color:#fff;letter-spacing:-1px;font-weight:800;">Open Opportunities</h1>
            <p style="color:rgba(255,255,255,.78);max-width:560px;margin:0 auto;line-height:1.7;">
                Browse active roles. To apply, use the <strong>Explore Opportunities</strong> form.
            </p>
        </div>
    </section>

    <div style="height:70px;background:var(--bg-soft);"></div>

    <section class="section-pad-sm bg-soft" style="padding-top:0;">
        <div class="container">
            <div class="jobs-filter-card p-3 p-md-4 mb-4">
                <form method="GET" action="{{ route('jobs.portal') }}" class="row g-2 g-md-3 align-items-end">
                    <div class="col-lg-6">
                        <label class="form-label-custom">Search jobs</label>
                        <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control form-control-custom" placeholder="Search by title, location, or skill">
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label-custom">Category</label>
                        <select name="category" class="form-control form-control-custom">
                            <option value="">All categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" @selected(($category ?? '') === $cat)>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 d-grid">
                        <button type="submit" class="btn btn-primary-custom justify-content-center">Filter</button>
                    </div>
                </form>
            </div>

            @if($jobs->count() === 0)
                <div class="card-custom text-center">
                    <div class="icon-box accent mx-auto" style="margin-bottom:1rem;">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <h3 class="mb-2" style="font-size:1.35rem;">No jobs available right now</h3>
                    <p class="mb-0" style="color:var(--text-mid);">
                        Please check back soon — new roles are added regularly.
                    </p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($jobs as $job)
                        <div class="col-md-6 col-lg-4">
                            <div class="job-card">
                                <div class="d-flex align-items-start justify-content-between gap-3">
                                    <div>
                                        <div class="job-pill mb-2">
                                            <i class="bi bi-lightning-charge"></i>
                                            {{ $job->is_active ? 'Active' : 'Inactive' }}
                                        </div>
                                        <h3 style="font-size:1.05rem;margin-bottom:.5rem;">{{ $job->title }}</h3>
                                        @if($job->short_description)
                                            <p style="color:var(--text-mid);font-size:.93rem;line-height:1.65;margin-bottom:.9rem;">
                                                {{ \Illuminate\Support\Str::limit($job->short_description, 140) }}
                                            </p>
                                        @endif
                                        @if($job->description)
                                            <p style="color:var(--text-mid);font-size:.93rem;line-height:1.65;margin-bottom:.9rem;">
                                                {{ \Illuminate\Support\Str::limit($job->description, 140) }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="job-meta mb-3">
                                    @if($job->department)
                                        <span><i class="bi bi-diagram-3 me-1"></i>{{ $job->department }}</span>
                                    @endif
                                    @if($job->job_type)
                                        <span><i class="bi bi-clock me-1"></i>{{ $job->job_type }}</span>
                                    @endif
                                    @if($job->location)
                                        <span><i class="bi bi-geo-alt me-1"></i>{{ $job->location }}</span>
                                    @endif
                                </div>
                                @auth
                                @else
                                <div class="d-flex gap-2">
                                        <a class="btn btn-outline-custom flex-grow-1 text-center" href="{{ route('jobs.show', ['slug' => ($job->slug ?: (\Illuminate\Support\Str::slug($job->title) . '-' . $job->id))]) }}">
                                            Details
                                        </a>
                                        <a class="btn btn-primary-custom flex-grow-1 justify-content-center" href="{{ url('/opportunities') }}">
                                            Apply <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $jobs->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection

