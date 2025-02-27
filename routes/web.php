<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\ShareAdmin\Dashboard as ShareAdminDashboard;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Role-based Routes
    Route::middleware(['role:1'])->group(function(){
        Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    });

     Route::middleware(['role:2'])->group(function(){
        Route::get('/share-admin/dashboard', ShareAdminDashboard::class)->name('share-admin.dashboard');
    });


    // Route::get('/projects', Dashboard::class)->name('projects');
    // Route::get('share-admin/dashboard', ShareAdminDashboard::class)->name('share-admin.dashboard');
});

require __DIR__.'/auth.php';
