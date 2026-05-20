<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signin', function () {
    return view('signin');
})->name('login'); // Name this route 'login' as auth middleware redirects here by default

Route::post('/signin', [LoginController::class, 'login'])->name('signin.process');

use App\Http\Controllers\WeddingDetailsController;

Route::get('/wedding-details', [WeddingDetailsController::class, 'create'])->middleware('auth')->name('wedding.details.create');
Route::post('/wedding-details', [WeddingDetailsController::class, 'store'])->middleware('auth')->name('wedding.details.store');
Route::get('/wedding-template', [WeddingDetailsController::class, 'showTemplate'])->middleware('auth')->name('wedding.template.show');
Route::post('/wedding-template', [WeddingDetailsController::class, 'storeTemplate'])->middleware('auth')->name('wedding.template.store');
Route::get('/wedding-preview', [WeddingDetailsController::class, 'showPreview'])->middleware('auth')->name('wedding.preview.show');
Route::get('/wedding-published', [WeddingDetailsController::class, 'showPublished'])->middleware('auth')->name('wedding.published.show');
Route::get('/invite/{slug}', [WeddingDetailsController::class, 'showPublicInvitation'])->name('wedding.public.show');
