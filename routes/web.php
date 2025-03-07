<?php

use App\Livewire\Admin\AddNewUser;
use Livewire\Volt\Volt;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ManageUsers;
use App\Livewire\Admin\UpdateUser;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShareAdmin\Dashboard as ShareAdminDashboard;

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
    // Admin
    Route::middleware(['role:1'])->group(function(){
        Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('/admin/manage-users', ManageUsers::class)->name('admin.manage-users');
        Route::get('/admin/add-new-user', AddNewUser::class)->name('admin.add-new-user');
        Route::get('/admin/update-user/{id}', UpdateUser::class)->name('admin.update-user');
        Volt::route('/admin/add-zone', 'add-zone')->name('admin.add-zone');
        // Volt::route('/admin/add-zone', 'admin/add-zone')->name('admin.add-zone');
    });

     Route::middleware(['role:2'])->group(function(){
        Route::get('/share-admin/dashboard', ShareAdminDashboard::class)->name('share-admin.dashboard');
    });
});

require __DIR__.'/auth.php';
