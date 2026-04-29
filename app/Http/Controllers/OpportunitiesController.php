<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\JobPost;
class OpportunitiesController extends Controller
{
    /**
     * Show the opportunities page
     */
    public function index()
    {
        $jobs = JobPost::where('is_active', true)->orderByDesc('created_at')->get();
        return view('pages.opportunities', compact('jobs'));
    }

    /**
     * Handle job application submission
     */
    public function submit(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'position' => ['required'],
            'experience' => ['required', 'string', 'max:50'],
            'cv' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'cover_letter' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        try {
            $jobPost = null;
            $positionValue = (string) $data['position'];
            if ($positionValue !== 'other') {
                $jobPost = JobPost::query()
                    ->where('is_active', true)
                    ->findOrFail((int) $positionValue);
                $positionValue = $jobPost->title;
            } else {
                $positionValue = 'Other';
            }

            // Store CV file
            $cvPath = $request->file('cv')->store('applications/cvs', 'local');
            
            // Store Cover Letter file
            $coverLetterPath = $request->file('cover_letter')->store('applications/cover_letters', 'local');

            // Create job application record
            JobApplication::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'position' => $positionValue,
                'job_post_id' => $jobPost?->id,
                'experience' => $data['experience'],
                'cv_path' => $cvPath,
                'cover_letter_path' => $coverLetterPath,
                'notes' => $data['notes'],
                'status' => 'pending',
            ]);

            $adminEmail = (string) env('ADMIN_NOTIFICATION_EMAIL', config('mail.from.address'));
            if ($adminEmail) {
                Mail::raw(
                    "New job application submitted by {$data['first_name']} {$data['last_name']} ({$data['email']}) for {$positionValue}.",
                    fn ($message) => $message
                        ->to($adminEmail)
                        ->subject('New Job Application Received')
                );
            }

            Log::info('Job application submitted', [
                'email' => $data['email'],
                'position' => $positionValue,
                'timestamp' => now(),
            ]);

        } catch (\Throwable $e) {
            Log::error('Job application submission failed', [
                'error' => $e->getMessage(),
                'email' => $data['email'] ?? null,
                'position' => $data['position'] ?? null,
            ]);

            return back()
                ->withInput()
                ->with('error', 'There was an error processing your application. Please try again.');
        }

        return back()->with('success', 'Application submitted successfully!');
    }
}
