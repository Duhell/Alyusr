<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\LandingComponent::class);
Route::get('/inquire', \App\Livewire\InquireComponent::class);
Route::get('/about', \App\Livewire\AboutPage::class);
Route::get('/gallery/{tag}', \App\Livewire\GalleryPage::class);

// Admin
Route::get('/auth/login',[\App\Http\Controllers\AdminController::class,"loginView"])->name('login');
Route::post('/auth/signin',[\App\Http\Controllers\AdminController::class,"login"])->name('signin');
Route::get('/dashboard',[\App\Http\Controllers\AdminController::class,"dashboard"])->middleware('auth');
Route::get('/dashboard/gallery',[\App\Http\Controllers\AdminController::class,'gallery'])->name("gallery")->middleware('auth');
Route::get('/dashboard/application',[\App\Http\Controllers\AdminController::class,'application'])->name("application")->middleware('auth');
Route::get('/dashboard/inquiry',[\App\Http\Controllers\AdminController::class,'inquiry'])->name("inquiry")->middleware('auth');
Route::post('/dashboard/gallery',[\App\Http\Controllers\AdminController::class,'upload'])->name('upload')->middleware('auth');
Route::get('/dashboard/gallery/photo={id}',[\App\Http\Controllers\AdminController::class,'deleteImage'])->name('deletephoto')->middleware('auth');

Route::get('/auth/logout',[\App\Http\Controllers\AdminController::class,"logout"])->name('logout');

