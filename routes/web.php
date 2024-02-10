<?php

use App\Http\Controllers\Profile\Shares\ShowController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Volt::route('/', 'pages.home.index')->name('home');

Route::middleware(['auth', 'verified', 'setLocale'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('biography', 'biography')->name('biography');
    Route::view('experiences', 'experiences')->name('experiences');
    Route::view('educations', 'educations')->name('educations');
    Route::view('languages', 'languages')->name('languages');
    Route::view('certificates', 'certificates')->name('certificates');
    Route::view('shares', 'shares')->name('shares');

    Route::view('profile', 'profile')->middleware(['auth', 'setLocale'])->name('profile');
});

Route::get('/view/{share:token}', ShowController::class)->name('view.share');

// Include auth routes
require __DIR__.'/auth.php';

