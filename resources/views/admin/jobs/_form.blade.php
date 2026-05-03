@php
    /** @var \App\Models\JobPost|null $job */
@endphp

<div class="admin-card p-3">
    <div class="row g-3">
        <div class="col-lg-8">
            <label class="form-label fw-bold">Title</label>
            <input type="text" name="title" value="{{ old('title', $job?->title ?? '') }}"
                   class="form-control @error('title') is-invalid @enderror" maxlength="160" required>
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-lg-4">
            <label class="form-label fw-bold">Status</label>
            <select name="is_active" class="form-select @error('is_active') is-invalid @enderror" required>
                <option value="1" {{ old('is_active', ($job?->is_active ?? true) ? 1 : 0) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', ($job?->is_active ?? true) ? 1 : 0) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Department</label>
            <input type="text" name="department" value="{{ old('department', $job?->department ?? '') }}"
                   class="form-control @error('department') is-invalid @enderror" maxlength="120">
            @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-4">
            <label class="form-label fw-bold">Job type</label>
            <input type="text" name="job_type" value="{{ old('job_type', $job?->job_type ?? '') }}"
                   class="form-control @error('job_type') is-invalid @enderror" maxlength="60" placeholder="Full-time / Remote / Contract">
            @error('job_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-4">
            <label class="form-label fw-bold">Location</label>
            <input type="text" name="location" value="{{ old('location', $job?->location ?? '') }}"
                   class="form-control @error('location') is-invalid @enderror" maxlength="120" placeholder="Dubai / Remote">
            @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-12">
            <label class="form-label fw-bold">Short description</label>
            <textarea name="short_description" rows="3"
                      class="form-control @error('short_description') is-invalid @enderror"
                      maxlength="2000">{{ old('short_description', $job?->short_description ?? '') }}</textarea>
            @error('short_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-12">
            <label class="form-label fw-bold">Full description</label>
            <textarea name="description" rows="8"
                      class="form-control @error('description') is-invalid @enderror"
                      maxlength="20000">{{ old('description', $job?->description ?? '') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
</div>

