<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USERS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard',
        [DashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile',
        [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Stock Movements
    Route::resource('movements',
        StockMovementController::class);

    // Products
    Route::resource('products',
        ProductController::class);

});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // Products
    Route::resource('products',
        ProductController::class);

    // Categories
    Route::resource('categories',
        CategoryController::class);

    // Suppliers
    Route::resource('suppliers',
        SupplierController::class);

    // Reports
    Route::get('/reports',
        [ReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/reports/csv',
        [ReportController::class, 'exportCSV'])
        ->name('reports.csv');

});

require __DIR__.'/auth.php';