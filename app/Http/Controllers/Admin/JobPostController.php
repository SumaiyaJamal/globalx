<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jobs = JobPost::query()
            ->orderByDesc('is_active')
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        JobPost::create($data);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $job): View
    {
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobPost $job): RedirectResponse
    {
        $data = $this->validated($request);

        $job->update($data);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $job): RedirectResponse
    {
        $job->delete();

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'department' => ['nullable', 'string', 'max:120'],
            'job_type' => ['nullable', 'string', 'max:60'],
            'location' => ['nullable', 'string', 'max:120'],
            'short_description' => ['nullable', 'string', 'max:2000'],
            'description' => ['nullable', 'string', 'max:20000'],
            'is_active' => ['required', 'boolean'],
        ]);
    }
}
