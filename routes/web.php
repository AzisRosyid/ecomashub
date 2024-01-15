<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\AssetController as AdminAssetController;
use App\Http\Controllers\Admin\SupplierController as AdminSupplierController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\DebtController as AdminDebtController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\ExpenseController as AdminExpenseController;
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
    return redirect('/home');
});

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth
Route::get('/login', [HomeController::class, 'login'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// < Admin >
// Dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('adminDashboard');
// Event
Route::get('/admin/event', [AdminEventController::class, 'index'])->name('adminEvent');
Route::get('/admin/event/create', [AdminEventController::class, 'create'])->name('adminEventCreate');
Route::post('/admin/event/create', [AdminEventController::class, 'store'])->name('adminEventStore');
Route::get('/admin/event/edit', [AdminEventController::class, 'edit'])->name('adminEventEdit');
Route::post('/admin/event/edit', [AdminEventController::class, 'create'])->name('adminEventUpdate');
// User
Route::get('/admin/user', [AdminUserController::class, 'index'])->name('adminUser');
Route::get('/admin/user/create', [AdminUserController::class, 'create'])->name('adminUserCreate');
Route::post('/admin/user/create', [AdminUserController::class, 'store'])->name('adminUserStore');
Route::get('/admin/user/edit', [AdminUserController::class, 'edit'])->name('adminUserEdit');
Route::post('/admin/user/edit', [AdminUserController::class, 'create'])->name('adminUserUpdate');
// Asset
Route::get('/admin/asset', [AdminAssetController::class, 'index'])->name('adminAsset');
Route::get('/admin/asset/create', [AdminAssetController::class, 'create'])->name('adminAssetCreate');
Route::post('/admin/asset/create', [AdminAssetController::class, 'store'])->name('adminAssetStore');
Route::get('/admin/asset/edit', [AdminAssetController::class, 'edit'])->name('adminAssetEdit');
Route::post('/admin/asset/edit', [AdminAssetController::class, 'create'])->name('adminAssetUpdate');
// Supplier
Route::get('/admin/supplier', [AdminSupplierController::class, 'index'])->name('adminSupplier');
Route::get('/admin/supplier/create', [AdminSupplierController::class, 'create'])->name('adminSupplierCreate');
Route::post('/admin/supplier/create', [AdminSupplierController::class, 'store'])->name('adminSupplierStore');
Route::get('/admin/supplier/edit', [AdminSupplierController::class, 'edit'])->name('adminSupplierEdit');
Route::post('/admin/supplier/edit', [AdminSupplierController::class, 'create'])->name('adminSupplierUpdate');
// Order
Route::get('/admin/order', [AdminOrderController::class, 'index'])->name('adminOrder');
Route::get('/admin/order/create', [AdminOrderController::class, 'create'])->name('adminOrderCreate');
Route::post('/admin/order/create', [AdminOrderController::class, 'store'])->name('adminOrderStore');
Route::get('/admin/order/edit', [AdminOrderController::class, 'edit'])->name('adminOrderEdit');
Route::post('/admin/order/edit', [AdminOrderController::class, 'create'])->name('adminOrderUpdate');
// Entrust
// Product
Route::get('/admin/product', [AdminProductController::class, 'index'])->name('adminProduct');
Route::get('/admin/product/create', [AdminProductController::class, 'create'])->name('adminProductCreate');
Route::post('/admin/product/create', [AdminProductController::class, 'store'])->name('adminProductStore');
Route::get('/admin/product/edit', [AdminProductController::class, 'edit'])->name('adminProductEdit');
Route::post('/admin/product/edit', [AdminProductController::class, 'create'])->name('adminProductUpdate');
// Eco Friendly
// Transaction
Route::get('/admin/transaction', [AdminTransactionController::class, 'index'])->name('adminTransaction');
Route::get('/admin/transaction/create', [AdminTransactionController::class, 'create'])->name('adminTransactionCreate');
Route::post('/admin/transaction/create', [AdminTransactionController::class, 'store'])->name('adminTransactionStore');
Route::get('/admin/transaction/edit', [AdminTransactionController::class, 'edit'])->name('adminTransactionEdit');
Route::post('/admin/transaction/edit', [AdminTransactionController::class, 'create'])->name('adminTransactionUpdate');
// Expense
Route::get('/admin/expense', [AdminExpenseController::class, 'index'])->name('adminExpense');
Route::get('/admin/expense/create', [AdminExpenseController::class, 'create'])->name('adminExpenseCreate');
Route::post('/admin/expense/create', [AdminExpenseController::class, 'store'])->name('adminExpenseStore');
Route::get('/admin/expense/edit', [AdminExpenseController::class, 'edit'])->name('adminExpenseEdit');
Route::post('/admin/expense/edit', [AdminExpenseController::class, 'create'])->name('adminExpenseUpdate');
// Debt
Route::get('/admin/debt', [AdminDebtController::class, 'index'])->name('adminDebt');
Route::get('/admin/debt/create', [AdminDebtController::class, 'create'])->name('adminDebtCreate');
Route::post('/admin/debt/create', [AdminDebtController::class, 'store'])->name('adminDebtStore');
Route::get('/admin/debt/edit', [AdminDebtController::class, 'edit'])->name('adminDebtEdit');
Route::post('/admin/debt/edit', [AdminDebtController::class, 'create'])->name('adminDebtUpdate');

// User
Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('userDashboard');
