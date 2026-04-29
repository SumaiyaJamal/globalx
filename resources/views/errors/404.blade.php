@extends('layouts.app')

@section('title', '404 — Page Not Found')
@section('meta_description', 'The page you are looking for could not be found.')

@section('content')
    <section class="section-pad bg-soft">
        <div class="container">
            <div class="card-custom text-center mx-auto" style="max-width:760px;">
                <span class="section-label">Oops</span>
                <h1 class="section-title mb-2">404 — <span>Page Not Found</span></h1>
                <p class="section-subtitle mx-auto">
                    The link may be broken or the page may have been moved.
                    Please continue from one of the actions below.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                    <a href="{{ url('/') }}" class="btn-primary-custom">
                        <i class="bi bi-house-door"></i> Back to Home
                    </a>
                    <a href="{{ url('/jobs') }}" class="btn-outline-custom">
                        View Jobs Portal
                    </a>
                    <a href="{{ route('hire-talent') }}" class="btn-outline-custom">
                        Hire Talent
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

