<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\LandingComponent::class)->name('landing')->middleware('auth');
Route::get('/inquire', \App\Livewire\InquireComponent::class)->name('sendInquiry')->middleware('auth');
Route::get('/about', \App\Livewire\AboutPage::class)->name('about_us')->middleware('auth');
Route::get('/legality', \App\Livewire\LegalityPage::class)->name('our_legality')->middleware('auth');
Route::get('/services', \App\Livewire\ServicesPage::class)->name('our_services')->middleware('auth');
Route::get('/jobs', \App\Livewire\JobsPage::class)->name('listJobs')->middleware('auth');
Route::get('/jobs/details/job={job_id}', \App\Livewire\ShowDetails\JobDetails::class)->name('details_job_list')->middleware('auth');
Route::get('/contact', \App\Livewire\ContactPage::class)->name('contact_us')->middleware('auth');
Route::get('/application', \App\Livewire\ApplicationComponent::class)->name('sendApplication')->middleware('auth');;
Route::get('/gallery/{tag}', \App\Livewire\GalleryPage::class)->name('category_gallery')->middleware('auth');

// Admin
Route::get('/auth/login',[\App\Http\Controllers\AdminController::class,"loginView"])->name('login')->middleware('visitor');
Route::get('/auth/signup',[\App\Http\Controllers\AdminController::class,"signupView"])->name('signup');
Route::post('/auth/register',[\App\Http\Controllers\AdminController::class,"registerAccount"])->name('register');
Route::post('/auth/signin',[\App\Http\Controllers\AdminController::class,"login"])->name('signin');
Route::get('/dashboard',[\App\Http\Controllers\AdminController::class,"dashboard"])->name('dashboard')->middleware('auth');
Route::get('/dashboard/gallery',[\App\Http\Controllers\AdminController::class,'gallery'])->name("gallery")->middleware('auth');
Route::get('/dashboard/jobs',[\App\Http\Controllers\AdminController::class,'jobs'])->name("jobs")->middleware('auth');
Route::get('/dashboard/jobs/add',[\App\Http\Controllers\AdminController::class,'addjob'])->name("create_job")->middleware('auth');
Route::post('/dashboard/jobs/add',[\App\Http\Controllers\AdminController::class,'saveJob'])->name("save_job")->middleware('auth');
Route::get('/dashboard/jobs/show={job_id}',[\App\Http\Controllers\AdminController::class,'show_details_job'])->name("details_job")->middleware('auth');
Route::get('/dashboard/jobs/delete={job_id}',[\App\Http\Controllers\AdminController::class,'delete_job'])->name("delete_job")->middleware('auth');
Route::get('/dashboard/jobs/edit={job_id}',[\App\Http\Controllers\AdminController::class,'edit_job'])->name("edit_job")->middleware('auth');
Route::patch('/dashboard/jobs/update/{job_id}',[\App\Http\Controllers\AdminController::class,'update_job'])->name("update_job")->middleware('auth');
Route::get('/dashboard/application',[\App\Http\Controllers\AdminController::class,'application'])->name("application")->middleware('auth');
Route::get('/dashboard/application/applicant={applicant_id}',[\App\Http\Controllers\AdminController::class,'show_details_applicant'])->name("details_applicant")->middleware('auth');
Route::get('/dashboard/application/delete/applicant={applicant_id}',[\App\Http\Controllers\AdminController::class,'delete_applicant_details'])->name("delete_applicant")->middleware('auth');
Route::get('/dashboard/inquiry',[\App\Http\Controllers\AdminController::class,'inquiry'])->name("inquiry")->middleware('auth');
Route::get('/dashboard/inquiry/inquire={inquire_id}',[\App\Http\Controllers\AdminController::class,'show_details_inquire'])->name("details_inquire")->middleware('auth');
Route::get('/dashboard/inquiry/delete/inquire={inquire_id}',[\App\Http\Controllers\AdminController::class,'delete_inquiry_details'])->name("delete_inquiry")->middleware('auth');
Route::post('/dashboard/gallery',[\App\Http\Controllers\AdminController::class,'upload'])->name('upload')->middleware('auth');
Route::get('/dashboard/gallery/photo={id}',[\App\Http\Controllers\AdminController::class,'deleteImage'])->name('deletephoto')->middleware('auth');

Route::get('/auth/logout',[\App\Http\Controllers\AdminController::class,"logout"])->name('logout');

