<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Named 'login' so Laravel's auth middleware redirects here (to home, where modal lives)
Route::get('/', function () {
    return view('welcome');
})->name('login');

// Old /signin route redirects back to home
Route::get('/signin', function () {
    return redirect('/');
});

Route::post('/signin', [LoginController::class, 'login'])->name('signin.process');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\WeddingDetailsController;

use App\Http\Controllers\TemplateController;

// ── Theme Gallery ──────────────────────────────────────────────────────────
Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
Route::get('/templates/{id}', [TemplateController::class, 'show'])->name('templates.show');

// ── New bigdates-style single-page wedding wizard ──────────────────────────
Route::get('/wedding',  [WeddingDetailsController::class, 'entryWedding'])->middleware('auth')->name('wedding.entry');
Route::post('/wedding', [WeddingDetailsController::class, 'storeAll'])->middleware('auth')->name('wedding.store.all');

// ── Legacy 3-step flow (kept for backward compatibility) ───────────────────
Route::get('/wedding-details', [WeddingDetailsController::class, 'create'])->middleware('auth')->name('wedding.details.create');
Route::post('/wedding-details', [WeddingDetailsController::class, 'store'])->middleware('auth')->name('wedding.details.store');
Route::get('/wedding-template', [WeddingDetailsController::class, 'showTemplate'])->middleware('auth')->name('wedding.template.show');
Route::post('/wedding-template', [WeddingDetailsController::class, 'storeTemplate'])->middleware('auth')->name('wedding.template.store');
Route::get('/wedding-preview', [WeddingDetailsController::class, 'showPreview'])->middleware('auth')->name('wedding.preview.show');
Route::get('/wedding/live-preview/{template}', [WeddingDetailsController::class, 'livePreview'])->name('wedding.live.preview');
Route::get('/wedding-published', [WeddingDetailsController::class, 'showPublished'])->middleware('auth')->name('wedding.published.show');
Route::get('/wedding/payment', [WeddingDetailsController::class, 'showPayment'])->middleware('auth')->name('wedding.payment.show');
Route::post('/wedding/payment/process', [WeddingDetailsController::class, 'processPayment'])->middleware('auth')->name('wedding.payment.process');
Route::get('/wedding/{slug}/pay', [WeddingDetailsController::class, 'initiatePayment'])->middleware('auth')->name('wedding.payment.initiate');
Route::get('/invite/{slug}', [WeddingDetailsController::class, 'showPublicInvitation'])->name('wedding.public.show');
Route::get('/my-cards', [WeddingDetailsController::class, 'myCards'])->middleware('auth')->name('my.cards');
Route::get('/wedding/{slug}/edit', [WeddingDetailsController::class, 'edit'])->middleware('auth')->name('wedding.edit');
Route::put('/wedding/{slug}', [WeddingDetailsController::class, 'updateAll'])->middleware('auth')->name('wedding.update.all');
Route::delete('/wedding/{slug}', [WeddingDetailsController::class, 'destroy'])->middleware('auth')->name('wedding.destroy');

Route::get('/newland', function () {
    return view('new-landing');
});
