<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\VendorRegisterController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\ProductVariantController;


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
 // Products
        Route::resource('products', ProductController::class);

        // Attributes
        Route::resource('attributes', AttributeController::class);

        // Attribute Values
        Route::resource('attribute-values', AttributeValueController::class);

        // Product Variants (nested)
        Route::get('products/{product}/variants', [ProductVariantController::class, 'index'])
            ->name('products.variants.index');

        Route::get('products/{product}/variants/create', [ProductVariantController::class, 'create'])
            ->name('products.variants.create');

        Route::post('products/{product}/variants', [ProductVariantController::class, 'store'])
            ->name('products.variants.store');
//seler
Route::get('seller', [sellerController::class, 'sellerLogin'])->name('seller.login');


//catgory
Route::prefix('category')->name('category.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::patch('/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])->name('toggle-status');
});

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
