@extends('admin.layouts.app')

@section('title', 'Jobs')
@section('heading', 'Jobs')

@section('content')
    <div class="d-flex align-items-center justify-content-between gap-2 mb-3 flex-wrap">
        <div>
            <div class="fw-bold" style="font-family:'Sora',sans-serif;">Manage job postings</div>
            <div class="small" style="color:var(--text-light);font-weight:700;">Create, activate/deactivate, edit, or delete jobs.</div>
        </div>
        <a href="{{ route('admin.jobs.create') }}" class="btn btn-admin">
            <i class="bi bi-plus-circle me-1"></i> Add Job
        </a>
    </div>

    <div class="admin-card p-0 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background:rgba(10,92,138,.06);">
                <tr>
                    <th class="ps-3">Title</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th class="text-end pe-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($jobs as $job)
                    <tr>
                        <td class="ps-3">
                            <div class="fw-bold">{{ $job->title }}</div>
                        </td>
                        <td>{{ $job->department ?? '—' }}</td>
                        <td>{{ $job->job_type ?? '—' }}</td>
                        <td>{{ $job->location ?? '—' }}</td>
                        <td>
                            @if($job->is_active)
                                <span class="badge badge-admin rounded-pill">Active</span>
                            @else
                                <span class="badge text-bg-secondary rounded-pill">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end pe-3">
                            <div class="d-flex justify-content-end gap-2 flex-wrap">
                                <a class="btn btn-sm btn-admin-outline" href="{{ route('admin.jobs.edit', $job) }}">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('Delete this job?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <div class="fw-bold">No jobs yet</div>
                            <div class="small text-muted">Create your first job posting.</div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $jobs->links() }}
    </div>
@endsection

