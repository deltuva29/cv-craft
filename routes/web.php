<?php

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

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified', 'setLocale'])->name('dashboard');
Route::view('biography', 'biography')->middleware(['auth', 'verified', 'setLocale'])->name('biography');
Route::view('experiences', 'experiences')->middleware(['auth', 'verified', 'setLocale'])->name('experiences');
Route::view('educations', 'educations')->middleware(['auth', 'verified', 'setLocale'])->name('educations');
Route::view('languages', 'languages')->middleware(['auth', 'verified', 'setLocale'])->name('languages');
Route::view('certificates', 'certificates')->middleware(['auth', 'verified', 'setLocale'])->name('certificates');
Route::view('shares', 'shares')->middleware(['auth', 'verified', 'setLocale'])->name('shares');
Route::view('profile', 'profile')->middleware(['auth', 'setLocale'])->name('profile');

Route::get('/view/{share:token}', App\Http\Controllers\Profile\Shares\ShowController::class)->name('view.share');

require __DIR__.'/auth.php';
