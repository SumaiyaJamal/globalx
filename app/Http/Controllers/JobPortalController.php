<?php

namespace App\Http\Controllers;

use App\Models\JobPost;

class JobPortalController extends Controller
{
    public function index()
    {
        $jobs = JobPost::query()
            ->where('is_active', true)
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        return view('pages.jobs', compact('jobs'));
    }
}
