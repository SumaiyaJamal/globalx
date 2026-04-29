<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OpportunitiesController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobApplicationController as AdminJobApplicationController;
use App\Http\Controllers\Admin\JobPostController as AdminJobPostController;
use App\Http\Controllers\Admin\OfferController as AdminOfferController;
use App\Http\Controllers\JobPortalController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/hire-talent', function () {
    return view('pages.contact');
})->name('hire-talent');
Route::post('/hire-talent/send', [ContactController::class, 'send'])->name('hire-talent.send');

Route::get('/jobs', [JobPortalController::class, 'index'])->name('jobs.portal');

Route::get('/opportunities', [OpportunitiesController::class, 'index'])->name('opportunities');
Route::post('/opportunities/submit', [OpportunitiesController::class, 'submit'])->name('opportunities.submit');

/*
|--------------------------------------------------------------------------
| Admin (no navbar button; direct route)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('jobs', AdminJobPostController::class)->except(['show']);

        Route::get('applications', [AdminJobApplicationController::class, 'index'])->name('applications.index');
        Route::get('applications/{jobApplication}', [AdminJobApplicationController::class, 'show'])->name('applications.show');
        Route::get('applications/{jobApplication}/download/cv', [AdminJobApplicationController::class, 'downloadCv'])->name('applications.download.cv');
        Route::get('applications/{jobApplication}/download/cover-letter', [AdminJobApplicationController::class, 'downloadCoverLetter'])->name('applications.download.cover_letter');

        Route::get('offers', [AdminOfferController::class, 'index'])->name('offers.index');
        Route::get('offers/{offer}', [AdminOfferController::class, 'show'])->name('offers.show');
    });
});
