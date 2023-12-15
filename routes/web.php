<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\LandingComponent::class)->name('landing');
Route::get('/inquire', \App\Livewire\InquireComponent::class)->name('sendInquiry');
Route::get('/about', \App\Livewire\AboutPage::class)->name('about_us');
Route::get('/legality', \App\Livewire\LegalityPage::class)->name('our_legality');
Route::get('/services', \App\Livewire\ServicesPage::class)->name('our_services');
Route::get('/contact', \App\Livewire\ContactPage::class)->name('contact_us');
Route::get('/application', \App\Livewire\ApplicationComponent::class)->name('sendApplication');
Route::get('/gallery/{tag}', \App\Livewire\GalleryPage::class);

// Admin
Route::get('/auth/login',[\App\Http\Controllers\AdminController::class,"loginView"])->name('login');
Route::post('/auth/signin',[\App\Http\Controllers\AdminController::class,"login"])->name('signin');
Route::get('/dashboard',[\App\Http\Controllers\AdminController::class,"dashboard"])->name('dashboard')->middleware('auth');
Route::get('/dashboard/gallery',[\App\Http\Controllers\AdminController::class,'gallery'])->name("gallery")->middleware('auth');
Route::get('/dashboard/jobs',[\App\Http\Controllers\AdminController::class,'jobs'])->name("jobs")->middleware('auth');
Route::get('/dashboard/jobs/add',[\App\Http\Controllers\AdminController::class,'addjob'])->name("create_job")->middleware('auth');
Route::get('/dashboard/application',[\App\Http\Controllers\AdminController::class,'application'])->name("application")->middleware('auth');
Route::get('/dashboard/application/applicant={applicant_id}',[\App\Http\Controllers\AdminController::class,'show_details_applicant'])->name("details_applicant")->middleware('auth');
Route::get('/dashboard/application/delete/applicant={applicant_id}',[\App\Http\Controllers\AdminController::class,'delete_applicant_details'])->name("delete_applicant")->middleware('auth');
Route::get('/dashboard/inquiry',[\App\Http\Controllers\AdminController::class,'inquiry'])->name("inquiry")->middleware('auth');
Route::get('/dashboard/inquiry/inquire={inquire_id}',[\App\Http\Controllers\AdminController::class,'show_details_inquire'])->name("details_inquire")->middleware('auth');
Route::get('/dashboard/inquiry/delete/inquire={inquire_id}',[\App\Http\Controllers\AdminController::class,'delete_inquiry_details'])->name("delete_inquiry")->middleware('auth');
Route::post('/dashboard/gallery',[\App\Http\Controllers\AdminController::class,'upload'])->name('upload')->middleware('auth');
Route::get('/dashboard/gallery/photo={id}',[\App\Http\Controllers\AdminController::class,'deleteImage'])->name('deletephoto')->middleware('auth');

Route::get('/auth/logout',[\App\Http\Controllers\AdminController::class,"logout"])->name('logout');

