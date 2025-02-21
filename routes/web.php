<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryCtrl;
use App\Http\Controllers\Admin\ProductController as AdminProductCtrl;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// backend
Route::middleware('auth' , 'admin')->prefix('admin')->name('admin')->group(function (){
    Route::get('/dashboard' , [AdminController::class , 'dashboard'])
    ->name('admin.dashboard');
    Route::resource('products', AdminProductCtrl::class);
    Route::resource('categories', AdminCategoryCtrl::class);
});

// Front End
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);



require __DIR__.'/auth.php';
