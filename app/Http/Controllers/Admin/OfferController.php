<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\View\View;

class OfferController extends Controller
{
    public function index(): View
    {
        $offers = Offer::query()
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.offers.index', compact('offers'));
    }

    public function show(Offer $offer): View
    {
        return view('admin.offers.show', compact('offer'));
    }
}
