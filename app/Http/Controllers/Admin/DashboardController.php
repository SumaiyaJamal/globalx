<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPost;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'active_jobs' => JobPost::query()->where('is_active', true)->count(),
            'inactive_jobs' => JobPost::query()->where('is_active', false)->count(),
            'applications_total' => JobApplication::query()->count(),
            'applications_pending' => JobApplication::query()->where('status', 'pending')->count(),
            'applications_today' => JobApplication::query()->whereDate('created_at', today())->count(),
        ];

        $applicationTrend = collect(range(6, 0))
            ->map(function (int $daysAgo) {
                $date = Carbon::today()->subDays($daysAgo);
                return [
                    'label' => $date->format('d M'),
                    'count' => JobApplication::query()->whereDate('created_at', $date)->count(),
                ];
            })
            ->push([
                'label' => Carbon::today()->format('d M'),
                'count' => JobApplication::query()->whereDate('created_at', today())->count(),
            ]);

        return view('admin.dashboard', compact('stats', 'applicationTrend'));
    }
}

