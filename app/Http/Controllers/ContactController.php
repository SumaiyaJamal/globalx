<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name'  => ['required', 'string', 'max:80'],
            'email'      => ['required', 'email', 'max:255'],
            'subject'    => ['required', 'string', 'max:150'],
            'message'    => ['required', 'string', 'max:5000'],
            'phone'      => ['nullable', 'string', 'max:40'],
        ]);

        $to = config('mail.contact_to.address')
            ?? env('CONTACT_TO_EMAIL')
            ?? config('mail.from.address')
            ?? 'Hr@globextalentsolutions.com';

        try {
            Offer::create($data);
            Mail::to($to)->send(new ContactFormSubmitted($data));
        } catch (\Throwable $e) {
            Log::error('Contact form mail failed', [
                'error' => $e->getMessage(),
                'to' => $to,
                'payload' => [
                    'first_name' => $data['first_name'] ?? null,
                    'last_name' => $data['last_name'] ?? null,
                    'email' => $data['email'] ?? null,
                    'subject' => $data['subject'] ?? null,
                ],
            ]);
        }
        return back()->with('success', 'Thanks! Your message has been sent. We’ll get back to you shortly.');
    }
}

