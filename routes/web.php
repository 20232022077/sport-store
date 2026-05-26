<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\AdminHomeController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/test/{id}/{number}', [HomeController::class, 'test']);

Route::post('/save', [HomeController::class, 'save']);

Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.index');

// Category Routes
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

// Placeholder routes
Route::get('/admin/users', function () { return redirect()->route('admin.index'); })->name('admin.users.index');
Route::get('/admin/roles', function () { return redirect()->route('admin.index'); })->name('admin.roles.index');
Route::get('/admin/permissions', function () { return redirect()->route('admin.index'); })->name('admin.permissions.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
