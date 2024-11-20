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


Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);

// menu items show
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/menu/{menu:slug}', [HomeController::class, 'showMenuItem'])->name('menu.item.show');


// cart
Route::get('/cart', [CartController::class,'index'])->name('cart.index')->middleware('auth');
Route::post('/cart/add', [CartController::class,'add'])->name('cart.add')->middleware('auth');
Route::patch('/cart/update', [CartController::class,'update'])->name('cart.update')->middleware('auth');
Route::delete('/cart/destroy/{cart:id}', [CartController::class,'destroy'])->name('cart.destroy');

// order
Route::get('/orders/items', [OrderController::class, 'orderItems'])->name('orders.items');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/store',[OrderController::class,'store'])->name('order.store');
Route::get('/orders/{order:id}', [OrderController::class, 'show'])->name('order.show');
Route::patch('/orders/{order:id}', [OrderController::class, 'update'])->name('order.update');
Route::get('/bill/print/{order:id}', [OrderController::class, 'printBill'])->name('bill.print');

// auth
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login/check',[AuthController::class,'checkLogin'])->name('login.check');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create/category', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/store/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/edit/{category:slug}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/categories/update/{category:slug}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/destroy/{category:slug}', [CategoryController::class, 'destroy'])->name('category.destroy');

// menu
Route::get('/admin/menu/list',[MenuController::class,'index'])->name('menus');
Route::get('/admin/menus/create/item',[MenuController::class,'create'])->name('menu.create');
Route::post('/admin/menus/store/item',[MenuController::class,'store'])->name('menu.store');
Route::get('/admin/menus/show/{menu:slug}',[MenuController::class,'show'])->name('menu.show');
Route::get('/admin/menus/edit/{menu:slug}', [MenuController::class, 'edit'])->name('menu.edit');
Route::patch('/admin/menus/update/{menu:slug}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/admin/menus/destroy/{menu:slug}', [MenuController::class, 'destroy'])->name('menu.destroy');

// staff
Route::get('/staffs', [UserController::class, 'index'])->name('staffs.index');
Route::get('/staffs/create/staff', [UserController::class, 'create'])->name('staff.create');
Route::post('/staffs/store/staff', [UserController::class, 'store'])->name('staff.store');
Route::get('/staffs/{user:slug}', [UserController::class, 'show'])->name('staff.show');
Route::get('/staffs/edit/{user:slug}', [UserController::class, 'edit'])->name('staff.edit');
Route::patch('/staffs/update/{user:slug}', [UserController::class, 'update'])->name('staff.update');
Route::delete('/staffs/{user:slug}/destroy', [UserController::class, 'destroy'])->name('staff.delete');

// table
Route::get('/tables', [TableController::class, 'index'])->name('tables.index');
Route::get('/tables/create/table', [TableController::class, 'create'])->name('table.create');
Route::post('/tables/store/table', [TableController::class, 'store'])->name('table.store');
Route::get('/tables/edit/{table:slug}', [TableController::class, 'edit'])->name('table.edit');
Route::patch('/tables/update/{table:slug}', [TableController::class, 'update'])->name('table.update');
Route::delete('/tables/destroy/{table:slug}', [TableController::class, 'destroy'])->name('table.destroy');

// role
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create/role', [RoleController::class, 'create'])->name('role.create');
Route::post('/roles/store/role', [RoleController::class, 'store'])->name('role.store');
Route::get('/roles/edit/{role:slug}', [RoleController::class, 'edit'])->name('role.edit');
Route::patch('/roles/update/{role:slug}', [RoleController::class, 'update'])->name('role.update');
Route::delete('/roles/destroy/{role:slug}', [RoleController::class, 'destroy'])->name('role.destroy');
