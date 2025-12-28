<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\VendorRegisterController;
use App\Http\Controllers\Admin\VendorController;


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/vendor/register', [VendorRegisterController::class, 'create'])->name('vendor.register.form');
Route::post('/vendor/register', [VendorRegisterController::class, 'store'])->name('vendor.register');

Route::view('dashboard', 'dashboard')
->middleware(['auth', 'verified'])
->name('dashboard');

//admin
Route::get('/admin', function () {
    return view('admin/login');
})->name('home');
Route::get('vendors', [VendorController::class,'index'])->name('admin.vendors');
    Route::get('vendor/{id}', [VendorController::class,'show'])->name('admin.vendor.view');

//seler
Route::get('seller', [sellerController::class, 'sellerLogin'])->name('seller.login');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
