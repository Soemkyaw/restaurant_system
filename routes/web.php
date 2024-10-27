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
Route::get('/category/list', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category:slug}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{category:slug}/update', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category:slug}/destory', [CategoryController::class, 'destory'])->name('category.destory');

// staff
Route::get('/staff/list', [UserController::class, 'index'])->name('staffs');
Route::get('/staff/create', [UserController::class, 'create'])->name('staff.create');
Route::post('/staff/store', [UserController::class, 'store'])->name('staff.store');
Route::get('/staff/{user:slug}', [UserController::class, 'show'])->name('staff.show');
Route::get('/staff/{user:slug}/edit', [UserController::class, 'edit'])->name('staff.edit');
Route::patch('/staff/{user:slug}/update', [UserController::class, 'update'])->name('staff.update');
Route::delete('/staff/{user:slug}/destory', [UserController::class, 'destory'])->name('staff.delete');
