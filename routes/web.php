<?php

use App\Livewire\Admin\AddNewUser;
use App\Livewire\Admin\AddRegion;
use App\Livewire\Admin\AddWoreda;
use App\Livewire\Admin\AddZone;
use Livewire\Volt\Volt;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ManageRegion;
use App\Livewire\Admin\ManageUsers;
use App\Livewire\Admin\ManageWoreda;
use App\Livewire\Admin\ManageZone;
use App\Livewire\Admin\UpdateRegion;
use App\Livewire\Admin\UpdateUser;
use App\Livewire\Admin\UpdateWoreda;
use App\Livewire\Admin\UpdateZone;
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

        Route::get('/admin/manage-region', ManageRegion::class)->name('admin.manage-region');
        Route::get('/admin/add-region', AddRegion::class)->name('admin.add-region');
        Route::get('/admin/update-region/{id}', UpdateRegion::class)->name('admin.update-region');

        Route::get('/admin/manage-zone', ManageZone::class)->name('admin.manage-zone');
        Route::get('/admin/add-zone', AddZone::class)->name('admin.add-zone');
        Route::get('/admin/update-zone/{id}', UpdateZone::class)->name('admin.update-zone');

        Route::get('/admin/manage-woreda', ManageWoreda::class)->name('admin.manage-woreda');
        Route::get('/admin/add-woreda', AddWoreda::class)->name('admin.add-woreda');
        Route::get('/admin/update-woreda/{id}', UpdateWoreda::class)->name('admin.update-woreda');
    });

     Route::middleware(['role:2'])->group(function(){
        Route::get('/share-admin/dashboard', ShareAdminDashboard::class)->name('share-admin.dashboard');
    });
});

require __DIR__.'/auth.php';
