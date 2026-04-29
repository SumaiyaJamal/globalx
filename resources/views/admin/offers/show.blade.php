@extends('admin.layouts.app')

@section('title', 'Offer Details')
@section('heading', 'Offer Details')

@section('content')
    <div class="d-flex align-items-center justify-content-between gap-2 mb-3 flex-wrap">
        <a class="btn btn-admin-outline" href="{{ route('admin.offers.index') }}">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="admin-card p-3">
                <div class="fw-bold mb-2" style="font-family:'Sora',sans-serif;">Contact</div>
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Name</div>
                        <div class="fw-bold">{{ $offer->full_name }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Email</div>
                        <div class="fw-bold">{{ $offer->email }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Phone</div>
                        <div class="fw-bold">{{ $offer->phone ?: '—' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Submitted</div>
                        <div class="fw-bold">{{ $offer->created_at->format('Y-m-d H:i') }}</div>
                    </div>
                    <div class="col-12">
                        <div class="small" style="color:var(--text-light);font-weight:800;">Subject</div>
                        <div class="fw-bold">{{ $offer->subject ?: '—' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="admin-card p-3 h-100">
                <div class="fw-bold mb-2" style="font-family:'Sora',sans-serif;">Message</div>
                <div style="white-space:pre-wrap;color:var(--text-mid);font-weight:600;">
                    {{ $offer->message ?: '—' }}
                </div>
            </div>
        </div>
    </div>
@endsection

