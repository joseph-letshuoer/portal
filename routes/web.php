<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\WorkOS\Http\Middleware\ValidateSessionWithWorkOS;

Route::get('/', fn () => Inertia::render('Welcome'));

Route::middleware([
    'auth',
    ValidateSessionWithWorkOS::class,
])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth',
    ValidateSessionWithWorkOS::class,
    CheckRole::class.':admin',
])->group(function () {
    Route::get('admin/companies', [CompanyController::class, 'index'])
        ->name('admin.companies.index');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
