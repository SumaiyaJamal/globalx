@extends('layouts.app')

@section('title', $job->title . ' — Jobs — ForexTalent')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($job->short_description ?: $job->description), 155))

@push('styles')
<style>
    .job-pill {
        display:inline-flex;
        align-items:center;
        padding: .3rem .75rem;
        border-radius: 999px;
        border: 1px solid var(--border);
        background: rgba(10,92,138,.05);
        color: var(--primary-dark);
        font-size: .85rem;
        font-weight: 700;
    }
</style>
@endpush

@section('content')
    <section class="section-pad-sm bg-soft">
        <div class="container">
            <div class="mb-3">
                <a href="{{ route('jobs.portal') }}" class="btn btn-outline-custom">
                    <i class="bi bi-arrow-left"></i> Back to Jobs
                </a>
            </div>

            <div class="card-custom">
                <div class="d-flex flex-wrap gap-2 mb-3">
                    @if($job->department)
                        <span class="job-pill">{{ $job->department }}</span>
                    @endif
                    @if($job->job_type)
                        <span class="job-pill">{{ $job->job_type }}</span>
                    @endif
                    @if($job->location)
                        <span class="job-pill">{{ $job->location }}</span>
                    @endif
                </div>

                <h1 class="section-title mb-3">{{ $job->title }}</h1>

                @if($job->short_description)
                    <p class="section-subtitle mb-3">{{ $job->short_description }}</p>
                @endif

                @if($job->description)
                    <div style="white-space:pre-line;color:var(--text-mid);line-height:1.8;">
                        {{ $job->description }}
                    </div>
                @endif

                <div class="mt-4">
                    <a href="{{ url('/opportunities') }}" class="btn btn-primary-custom">
                        Apply for this role <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
