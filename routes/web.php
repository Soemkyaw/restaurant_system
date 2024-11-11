<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
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

// recipes show
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');


// cart
Route::get('/cart', [CartController::class,'index'])->name('cart.index')->middleware('auth');
Route::post('/cart/add', [CartController::class,'add'])->name('cart.add')->middleware('auth');
Route::patch('/cart/update', [CartController::class,'update'])->name('cart.update')->middleware('auth');
Route::delete('/cart/{cart:id}/destroy', [CartController::class,'destroy'])->name('cart.destroy');

// order
Route::post('/order/store',[OrderController::class,'store'])->name('order.store');

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
Route::delete('/categories/{category:slug}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

// menu
Route::get('/menu/list',[MenuController::class,'index'])->name('menus');
Route::get('/menus/item/create',[MenuController::class,'create'])->name('menu.create');
Route::post('/menus/item/store',[MenuController::class,'store'])->name('menu.store');
Route::get('/menus/{menu:slug}/show',[MenuController::class,'show'])->name('menu.show');
Route::get('/menus/{menu:slug}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::patch('/menus/{menu:slug}/update', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menus/{menu:slug}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');


// staff
Route::get('/staff/list', [UserController::class, 'index'])->name('staffs');
Route::get('/staff/create', [UserController::class, 'create'])->name('staff.create');
Route::post('/staff/store', [UserController::class, 'store'])->name('staff.store');
Route::get('/staff/{user:slug}', [UserController::class, 'show'])->name('staff.show');
Route::get('/staff/{user:slug}/edit', [UserController::class, 'edit'])->name('staff.edit');
Route::patch('/staff/{user:slug}/update', [UserController::class, 'update'])->name('staff.update');
Route::delete('/staff/{user:slug}/destroy', [UserController::class, 'destroy'])->name('staff.delete');

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
