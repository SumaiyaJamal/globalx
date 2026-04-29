@extends('admin.layouts.app')

@section('title', 'Application Details')
@section('heading', 'Application Details')

@section('content')
    <div class="d-flex align-items-center justify-content-between gap-2 mb-3 flex-wrap">
        <a class="btn btn-admin-outline" href="{{ route('admin.applications.index') }}">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
        <div class="d-flex gap-2 flex-wrap">
            <a class="btn btn-admin-outline" href="{{ route('admin.applications.download.cv', $application) }}">
                <i class="bi bi-file-earmark-arrow-down me-1"></i> Download CV
            </a>
            <a class="btn btn-admin-outline" href="{{ route('admin.applications.download.cover_letter', $application) }}">
                <i class="bi bi-file-earmark-arrow-down me-1"></i> Cover Letter
            </a>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-12">
            <div class="admin-card p-3">
                <div class="fw-bold mb-2" style="font-family:'Sora',sans-serif;">Applicant</div>
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Name</div>
                        <div class="fw-bold">{{ $application->full_name }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Email</div>
                        <div class="fw-bold">{{ $application->email }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Phone</div>
                        <div class="fw-bold">{{ $application->phone ?: '—' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Submitted</div>
                        <div class="fw-bold">{{ $application->created_at->format('Y-m-d H:i') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Position</div>
                        <div class="fw-bold">{{ $application->jobPost->title ?? 'Other' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Experience</div>
                        <div class="fw-bold">{{ $application->experience }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-5">
            <div class="admin-card p-3 h-100">
                <div class="fw-bold mb-2" style="font-family:'Sora',sans-serif;">Status</div>
                <div>
                    <span class="badge rounded-pill text-bg-{{ $application->status === 'pending' ? 'warning' : ($application->status === 'accepted' ? 'success' : ($application->status === 'rejected' ? 'danger' : 'secondary')) }}">
                        {{ ucfirst($application->status) }}
                    </span>
                </div>
                <div class="mt-3 small" style="color:var(--text-light);font-weight:700;">
                    (Status update UI can be added next.)
                </div>
            </div>
        </div> -->
        <div class="col-12">
            <div class="admin-card p-3">
                <div class="fw-bold mb-2" style="font-family:'Sora',sans-serif;">Notes</div>
                <div style="color:var(--text-mid);font-weight:600;">
                    {{ $application->notes ?: '—' }}
                </div>
            </div>
        </div>
    </div>
@endsection

