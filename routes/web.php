<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicHomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminPackageController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\PublicStoreController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminStoreController;
use App\Http\Controllers\AdminOrderController;

Route::get('/', [PublicHomeController::class, 'index'])->name('home');
Route::get('/pricing', [PublicHomeController::class, 'pricing'])->name('pricing');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'submit'])->name('admin.login.submit');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('affilio.admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/setting', [AdminSettingController::class, 'index'])->name('admin.setting');
        Route::post('/setting/update', [AdminSettingController::class, 'update'])->name('admin.setting.update');

        Route::get('/package', [AdminPackageController::class, 'index'])->name('admin.package');
        Route::post('/package/store', [AdminPackageController::class, 'store'])->name('admin.package.store');
        Route::post('/package/update', [AdminPackageController::class, 'update'])->name('admin.package.update');
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::post('/users/{uid}/toggle', [AdminUserController::class, 'toggle'])->name('admin.users.toggle');

        Route::get('/stores', [AdminStoreController::class, 'index'])->name('admin.stores');
        Route::post('/stores/{uid}/toggle', [AdminStoreController::class, 'toggle'])->name('admin.stores.toggle');

        Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    });
});

Route::get('/register/{packageUid}', [RegisterController::class, 'form'])
    ->name('register.form');

Route::post('/register/{packageUid}', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/checkout/{uid}', [RegisterController::class, 'checkout'])
    ->name('checkout.show');

Route::post('/midtrans/notification', [MidtransController::class, 'notification'])
    ->name('midtrans.notification');

Route::get('/payment/finish/{uid}', [MidtransController::class, 'finish'])
    ->name('payment.finish');

Route::prefix('user')->group(function () {
    Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
    Route::post('/login', [UserAuthController::class, 'submit'])->name('user.login.submit');
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

    Route::middleware('affilio.user')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    });
});

Route::domain('{username}.affilio.store')->group(function () {
    Route::get('/', [PublicStoreController::class, 'show'])->name('store.show');
});
Route::get('/s/{username}', [PublicStoreController::class, 'show'])
    ->name('store.local');