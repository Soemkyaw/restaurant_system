<?php

use App\Http\Controllers\AuthController;
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
    return view('dashboard');
});
