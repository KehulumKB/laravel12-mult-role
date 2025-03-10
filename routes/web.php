<?php

use Livewire\Volt\Volt;
use App\Livewire\Admin\AddCity;
use App\Livewire\Admin\AddKebele;
use App\Livewire\Admin\AddZone;
use App\Livewire\Admin\AddRegion;
use App\Livewire\Admin\AddWoreda;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\AddNewUser;
use App\Livewire\Admin\AddSubCity;
use App\Livewire\Admin\ManageCity;
use App\Livewire\Admin\ManageKebele;
use App\Livewire\Admin\ManageZone;
use App\Livewire\Admin\UpdateUser;
use App\Livewire\Admin\UpdateZone;
use App\Livewire\Admin\ManageUsers;
use App\Livewire\Admin\ManageRegion;
use App\Livewire\Admin\ManageSubCity;
use App\Livewire\Admin\ManageWoreda;
use App\Livewire\Admin\UpdateCity;
use App\Livewire\Admin\UpdateKebele;
use App\Livewire\Admin\UpdateRegion;
use App\Livewire\Admin\UpdateSubCity;
use App\Livewire\Admin\UpdateWoreda;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShareAdmin\Dashboard as ShareAdminDashboard;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Role-based Routes -- Admin
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

        Route::get('/admin/manage-city', ManageCity::class)->name('admin.manage-city');
        Route::get('/admin/add-city', AddCity::class)->name('admin.add-city');
        Route::get('/admin/update-city/{id}', UpdateCity::class)->name('admin.update-city');

        Route::get('/admin/manage-sub-city', ManageSubCity::class)->name('admin.manage-sub-city');
        Route::get('/admin/add-sub-city', AddSubCity::class)->name('admin.add-sub-city');
        Route::get('/admin/update-sub-city/{id}', UpdateSubCity::class)->name('admin.update-sub-city');

        Route::get('/admin/manage-kebele', ManageKebele::class)->name('admin.manage-kebele');
        Route::get('/admin/add-kebele', AddKebele::class)->name('admin.add-kebele');
        Route::get('/admin/update-kebele/{id}', UpdateKebele::class)->name('admin.update-kebele');
    });

     Route::middleware(['role:2'])->group(function(){
        Route::get('/share-admin/dashboard', ShareAdminDashboard::class)->name('share-admin.dashboard');
    });
});

require __DIR__.'/auth.php';
