<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;

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
    return view('welcome');
})->name('home');

Route::get('/login', [HomeController::class, 'login'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('userDashboard');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('adminDashboard');
