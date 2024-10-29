<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TableController;
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
Route::get('/categories/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{category:slug}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/categories/{category:slug}/update', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{category:slug}/destory', [CategoryController::class, 'destory'])->name('category.destory');

// staff
Route::get('/staff/list', [UserController::class, 'index'])->name('staffs');
Route::get('/staff/create', [UserController::class, 'create'])->name('staff.create');
Route::post('/staff/store', [UserController::class, 'store'])->name('staff.store');
Route::get('/staff/{user:slug}', [UserController::class, 'show'])->name('staff.show');
Route::get('/staff/{user:slug}/edit', [UserController::class, 'edit'])->name('staff.edit');
Route::patch('/staff/{user:slug}/update', [UserController::class, 'update'])->name('staff.update');
Route::delete('/staff/{user:slug}/destory', [UserController::class, 'destory'])->name('staff.delete');

// table
Route::get('/tables', [TableController::class, 'index'])->name('tables');
Route::get('/tables/table/create', [TableController::class, 'create'])->name('table.create');
Route::post('/tables/table/store', [TableController::class, 'store'])->name('table.store');
Route::get('/tables/{table:slug}/edit', [TableController::class, 'edit'])->name('table.edit');
Route::patch('/tables/{table:slug}/update', [TableController::class, 'update'])->name('table.update');
Route::delete('/tables/{table:slug}/destroy', [TableController::class, 'destroy'])->name('table.destroy');

// role
Route::get('/roles', [RoleController::class, 'index'])->name('roles');
Route::get('/roles/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/roles/role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/roles/{role:slug}/edit', [RoleController::class, 'edit'])->name('role.edit');
Route::patch('/roles/{role:slug}/update', [RoleController::class, 'update'])->name('role.update');
Route::delete('/roles/{role:slug}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');
