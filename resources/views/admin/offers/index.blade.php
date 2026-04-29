@extends('admin.layouts.app')

@section('title', 'Offers')
@section('heading', 'Offers')

@section('content')
    <div class="admin-card p-0 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background:rgba(10,92,138,.06);">
                <tr>
                    <th class="ps-3">Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Submitted</th>
                    <th class="text-end pe-3">View</th>
                </tr>
                </thead>
                <tbody>
                @forelse($offers as $offer)
                    <tr>
                        <td class="ps-3">
                            <div class="fw-bold">{{ $offer->full_name }}</div>
                            <div class="small" style="color:var(--text-light);font-weight:700;">{{ $offer->phone ?: '—' }}</div>
                        </td>
                        <td>{{ $offer->email }}</td>
                        <td>{{ $offer->subject ?: '—' }}</td>
                        <td>
                            <span class="small" style="color:var(--text-light);font-weight:700;">
                                {{ $offer->created_at->format('Y-m-d') }}
                            </span>
                        </td>
                        <td class="text-end pe-3">
                            <a class="btn btn-sm btn-admin-outline" href="{{ route('admin.offers.show', $offer) }}">
                                Details <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <div class="fw-bold">No offers yet</div>
                            <div class="small text-muted">Submissions from “Hire Talent” will appear here.</div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $offers->links() }}
    </div>
@endsection

