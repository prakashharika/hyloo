<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\VendorRegisterController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorHandler;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\ProductVariantController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('vendor')->group(function(){
    Route::get('/register', [VendorRegisterController::class, 'create'])->name('vendor.register.form');
    Route::post('/register', [VendorRegisterController::class, 'store'])->name('vendor.register');
    Route::get('/login', [VendorRegisterController::class, 'login'])->name('vendor.login');
    Route::get('/forgot', [VendorRegisterController::class, 'forgot'])->name('vendor.password.forgot');
    Route::post('/login', [VendorRegisterController::class, 'loginCheck'])->name('vendor.login.submit');
    Route::get('/logout', [VendorRegisterController::class, 'logout'])->name('vendor.logout');
    Route::middleware(['vendorAuth'])->group(function () {
        Route::get('/vendotlog', function () {
            
            return "hiii";
        });
        Route::get('/dashboard', [VendorHandler::class, 'dashboard'])->name('vendor.dashboard');
    });
});



  
//seler
Route::get('seller', [sellerController::class, 'sellerLogin'])->name('seller.login');


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
            Route::patch('/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])->name('toggle-status');
        });
        Route::prefix('category/{category}/subcategory')->name('category.subcategory.')->group(function () {
            Route::get('/', [SubCategoryController::class, 'index'])->name('index');
            Route::get('/create', [SubCategoryController::class, 'create'])->name('create');
            Route::post('/', [SubCategoryController::class, 'store'])->name('store');
            Route::get('/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('edit');
            Route::put('/{subcategory}', [SubCategoryController::class, 'update'])->name('update');
            Route::delete('/{subcategory}', [SubCategoryController::class, 'destroy'])->name('destroy');
            Route::patch('/{subcategory}/toggle-status', [SubCategoryController::class, 'toggleStatus'])->name('toggle-status');
        });
        Route::view('dashboard', 'dashboard')->name('dashboard');
        Route::get('vendors', [VendorController::class,'index'])->name('admin.vendors');
        Route::get('vendor/{id}', [VendorController::class,'show'])->name('admin.vendor.view');
        Route::resource('products', ProductController::class);
        Route::resource('attributes', AttributeController::class);
        Route::resource('attribute-values', AttributeValueController::class);
        Route::get('products/{product}/variants', [ProductVariantController::class, 'index'])
            ->name('products.variants.index');

        Route::get('products/{product}/variants/create', [ProductVariantController::class, 'create'])
            ->name('products.variants.create');

        Route::post('products/{product}/variants', [ProductVariantController::class, 'store'])
            ->name('products.variants.store');
    });
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
