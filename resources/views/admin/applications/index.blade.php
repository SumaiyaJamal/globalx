@extends('admin.layouts.app')

@section('title', 'Applications')
@section('heading', 'Applications')

@section('content')
    <div class="admin-card p-0 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background:rgba(10,92,138,.06);">
                <tr>
                    <th class="ps-3">Applicant</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th class="text-end pe-3">View</th>
                </tr>
                </thead>
                <tbody>
                @forelse($applications as $app)
                    <tr>
                        <td class="ps-3">
                            <div class="fw-bold">{{ $app->full_name }}</div>
                            <div class="small" style="color:var(--text-light);font-weight:700;">{{ $app->experience }}</div>
                        </td>
                        <td>{{ $app->email }}</td>
                        <td>{{ $app->jobPost->title ?? 'Other' }}</td>
                        <td>
                            <span class="badge rounded-pill text-bg-{{ $app->status === 'pending' ? 'warning' : ($app->status === 'accepted' ? 'success' : ($app->status === 'rejected' ? 'danger' : 'secondary')) }}">
                                {{ ucfirst($app->status) }}
                            </span>
                        </td>
                        <td>
                            <span class="small" style="color:var(--text-light);font-weight:700;">
                                {{ $app->created_at->format('Y-m-d') }}
                            </span>
                        </td>
                        <td class="text-end pe-3">
                            <a class="btn btn-sm btn-admin-outline" href="{{ route('admin.applications.show', $app) }}">
                                Details <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <div class="fw-bold">No applications yet</div>
                            <div class="small text-muted">Submissions from “Explore Opportunities” will appear here.</div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $applications->links() }}
    </div>
@endsection

