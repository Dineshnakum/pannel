<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('cm-admin')->group(function () {
    Route::name('admin.')->middleware('auth')->group(function () {
        Route::prefix('a_categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories');
            Route::get('create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('save', [CategoryController::class, 'save'])->name('category.save');
            Route::get('{category}/edit/', [CategoryController::class, 'edit'])->name('category.edit');
            Route::put('{category}/update', [CategoryController::class, 'update'])->name('category.update');
            Route::delete('{category}/delete', [CategoryController::class, 'delete'])->name('category.delete');
        });

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/subscription', [SettingController::class, 'subscription'])->name('subscription');
    });
    require __DIR__ . '/auth.php';
});