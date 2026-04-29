<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class JobApplicationController extends Controller
{
    public function index(): View
    {
        $applications = JobApplication::query()
            ->with('jobPost')
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.applications.index', compact('applications'));
    }

    public function show(JobApplication $jobApplication): View
    {
        return view('admin.applications.show', ['application' => $jobApplication]);
    }

    public function downloadCv(JobApplication $jobApplication): StreamedResponse
    {
        return $this->downloadPrivateFile(
            $jobApplication->cv_path,
            $jobApplication->first_name,
            $jobApplication->last_name,
            'resume'
        );
    }

    public function downloadCoverLetter(JobApplication $jobApplication): StreamedResponse
    {
        return $this->downloadPrivateFile(
            $jobApplication->cover_letter_path,
            $jobApplication->first_name,
            $jobApplication->last_name,
            'cover_letter'
        );
    }

    private function downloadPrivateFile(
        string $path,
        string $firstName,
        string $lastName,
        string $keyword
    ): StreamedResponse {
        $disk = Storage::disk('local');

        abort_unless($disk->exists($path), 404);

        // Get original extension
        $extension = pathinfo($path, PATHINFO_EXTENSION);

        // Clean names (avoid spaces/special chars issues)
        $fileName = Str::slug($firstName . ' ' . $lastName) . "_{$keyword}." . $extension;

        return $disk->download($path, $fileName);
    }
}
