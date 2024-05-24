<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;


Route::get('/', [PhotoController::class,'index'])->name('home');
Route::get('photos/{photo}/show', [PhotoController::class,'show'])->name('photos.show');

Route::middleware('auth')->group(function() {
    Route::get('dashboard', function() {
        return view('user.dashboard');
    })->name('user.dashboard');
    Route::get('order/{photo}/pay', [OrderController::class, 'payByStripe'])->name('order.pay');
    Route::get('pay/success', [OrderController::class, 'success']);
});

Route::middleware('admin')->group(function() {
    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('admin', [PhotoController::class, 'adminDashboard'])->name('admin.index');
    Route::get('admin/photo/create', [PhotoController::class,'create'])->name('admin.photos.create');
    Route::post('admin/photo/store', [PhotoController::class,'store'])->name('admin.photos.store');
    Route::get('admin/{photo}/edit', [PhotoController::class,'edit'])->name('admin.photos.edit');
    Route::put('admin/{photo}/update', [PhotoController::class,'update'])->name('admin.photos.update');
});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'auth'])->name('admin.auth');