@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')
    <div class="row g-3">
        <div class="col-lg-3 col-md-6">
            <div class="admin-card p-3 h-100">
                <div class="d-flex align-items-start justify-content-between gap-3">
                    <div>
                        <div class="text-muted small" style="color:var(--text-light) !important;font-weight:700;">Active jobs</div>
                        <div class="fs-3 fw-bold" style="font-family:'Sora',sans-serif;">{{ $stats['active_jobs'] ?? 0 }}</div>
                    </div>
                    <div class="icon-box accent" style="width:46px;height:46px;border-radius:14px;font-size:1.15rem;">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>
                </div>
                <div class="mt-2 small" style="color:var(--text-light);font-weight:700;">
                    Visible on Jobs Portal
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="admin-card p-3 h-100">
                <div class="d-flex align-items-start justify-content-between gap-3">
                    <div>
                        <div class="text-muted small" style="color:var(--text-light) !important;font-weight:700;">Inactive jobs</div>
                        <div class="fs-3 fw-bold" style="font-family:'Sora',sans-serif;">{{ $stats['inactive_jobs'] ?? 0 }}</div>
                    </div>
                    <div class="icon-box gold" style="width:46px;height:46px;border-radius:14px;font-size:1.15rem;">
                        <i class="bi bi-pause-circle-fill"></i>
                    </div>
                </div>
                <div class="mt-2 small" style="color:var(--text-light);font-weight:700;">
                    Hidden from Jobs Portal
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="admin-card p-3 h-100">
                <div class="d-flex align-items-start justify-content-between gap-3">
                    <div>
                        <div class="text-muted small" style="color:var(--text-light) !important;font-weight:700;">Applications</div>
                        <div class="fs-3 fw-bold" style="font-family:'Sora',sans-serif;">{{ $stats['applications_total'] ?? 0 }}</div>
                    </div>
                    <div class="icon-box" style="width:46px;height:46px;border-radius:14px;font-size:1.15rem;">
                        <i class="bi bi-inbox-fill"></i>
                    </div>
                </div>
                <div class="mt-2 small" style="color:var(--text-light);font-weight:700;">
                    Total submissions
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="admin-card p-3 h-100">
                <div class="d-flex align-items-start justify-content-between gap-3">
                    <div>
                        <div class="text-muted small" style="color:var(--text-light) !important;font-weight:700;">Offers</div>
                        <div class="fs-3 fw-bold" style="font-family:'Sora',sans-serif;">{{ $stats['applications_pending'] ?? 0 }}</div>
                    </div>
                    <div class="icon-box accent" style="width:46px;height:46px;border-radius:14px;font-size:1.15rem;">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                </div>
                <div class="mt-2 small" style="color:var(--text-light);font-weight:700;">
                    Needs review
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-1">
        <div class="col-lg-8">
            <div class="admin-card p-3 h-100">
                <div class="d-flex align-items-center justify-content-between gap-3 mb-2">
                    <div>
                        <div class="fw-bold" style="font-family:'Sora',sans-serif;">Quick actions</div>
                        <div class="small" style="color:var(--text-light);font-weight:700;">Common admin tasks</div>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.jobs.create') }}" class="btn btn-admin">
                        <i class="bi bi-plus-circle me-1"></i> Add Job
                    </a>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-admin-outline">
                        <i class="bi bi-briefcase me-1"></i> Manage Jobs
                    </a>
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-admin-outline">
                        <i class="bi bi-inbox me-1"></i> Applications
                    </a>
                    <a href="{{ route('admin.offers.index') }}" class="btn btn-admin-outline">
                        <i class="bi bi-person-workspace me-1"></i> Offers
                    </a>
                    <a href="{{ url('/jobs') }}" class="btn btn-admin-outline">
                        <i class="bi bi-globe me-1"></i> View Jobs Portal
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="admin-card p-3 h-100">
                <div class="fw-bold" style="font-family:'Sora',sans-serif;">Signed in as</div>
                <div class="mt-1" style="color:var(--text-mid);font-weight:800;">{{ auth()->user()->name }}</div>
                <div class="small" style="color:var(--text-light);font-weight:700;">{{ auth()->user()->email }}</div>
            </div>
        </div>
    </div>
@endsection

