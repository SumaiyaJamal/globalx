<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\View\View;

class JobPortalController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->string('search'));
        $category = trim((string) $request->string('category'));

        $jobs = JobPost::query()
            ->where('is_active', true)
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('department', 'like', "%{$search}%")
                        ->orWhere('job_type', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%")
                        ->orWhere('short_description', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($category, function ($query) use ($category) {
                $query->where(function ($q) use ($category) {
                    $q->where('department', $category)
                        ->orWhere('job_type', $category);
                });
            })
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        $categories = JobPost::query()
            ->where('is_active', true)
            ->select(['department', 'job_type'])
            ->get()
            ->flatMap(fn ($job) => [$job->department, $job->job_type])
            ->filter()
            ->unique()
            ->values();

        return view('pages.jobs', compact('jobs', 'categories', 'search', 'category'));
    }

    public function show(string $slug): View
    {
        $jobPost = null;
        if (Schema::hasColumn('job_posts', 'slug')) {
            $jobPost = JobPost::query()
                ->where('slug', $slug)
                ->first();
        }

        if (!$jobPost) {
            $idFromSlug = (int) Str::of($slug)->afterLast('-')->toString();
            if ($idFromSlug > 0) {
                $jobPost = JobPost::query()->find($idFromSlug);
            }
        }

        abort_unless($jobPost, 404);
        abort_unless($jobPost->is_active, 404);

        return view('pages.job-detail', ['job' => $jobPost]);
    }
}
