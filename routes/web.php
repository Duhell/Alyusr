<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\LandingComponent::class);
Route::get('/inquire', \App\Livewire\InquireComponent::class);
