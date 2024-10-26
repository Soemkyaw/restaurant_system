<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// auth
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login/check',[AuthController::class,'checkLogin'])->name('login.check');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// dashboard
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

// category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{category:slug}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/categories/{category:slug}/update', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{category:slug}/destory', [CategoryController::class, 'destory'])->name('category.destory');

// staff
Route::get('/staffs', [UserController::class, 'index'])->name('staffs');
