<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPost;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'active_jobs' => JobPost::query()->where('is_active', true)->count(),
            'inactive_jobs' => JobPost::query()->where('is_active', false)->count(),
            'applications_total' => JobApplication::query()->count(),
            'applications_pending' => JobApplication::query()->where('status', 'pending')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}

