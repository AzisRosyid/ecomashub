<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\AssetController as AdminAssetController;
use App\Http\Controllers\Admin\SupplierController as AdminSupplierController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\Unit\ProductCategoryController as AdminProductCategoryController;
use App\Http\Controllers\Admin\EcoFriendly\WasteController as AdminWasteController;
use App\Http\Controllers\Admin\EcoFriendly\Unit\WasteTypeController as AdminWasteTypeController;
use App\Http\Controllers\Admin\Financial\DebtController as AdminDebtController;
use App\Http\Controllers\Admin\Financial\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\Financial\ExpenseController as AdminExpenseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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
Route::get('/logout', [LogoutController::class, 'logout'])->name('logoutUser');

// < Tamu >
Route::middleware(['auth.role:tamu'])->group(function () {
    // Auth
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginUser');
});

// < Admin >
Route::middleware(['auth.role:pengurus'])->group(function () {
    Route::prefix('/admin')->group(function () {
        // < Umum >
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('adminDashboard');

        // Event
        Route::prefix('/event')->group(function () {
            Route::get('/', [AdminEventController::class, 'index'])->name('adminEvent');
            Route::get('/create', [AdminEventController::class, 'create'])->name('adminEventCreate');
            Route::post('/create', [AdminEventController::class, 'store'])->name('adminEventStore');
            Route::get('/edit/{event}', [AdminEventController::class, 'edit'])->name('adminEventEdit');
            Route::put('/edit/{event}', [AdminEventController::class, 'update'])->name('adminEventUpdate');
            Route::delete('/delete/{event}', [AdminEventController::class, 'destroy'])->name('adminEventDestroy');
        });

        // User
        Route::prefix('/user')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('adminUser');
            Route::get('/create', [AdminUserController::class, 'create'])->name('adminUserCreate');
            Route::post('/create', [AdminUserController::class, 'store'])->name('adminUserStore');
            Route::get('/edit/{user}', [AdminUserController::class, 'edit'])->name('adminUserEdit');
            Route::put('/edit/{user}', [AdminUserController::class, 'update'])->name('adminUserUpdate');
            Route::put('/status/edit', [AdminUserController::class, 'updateStatus'])->name('adminUserUpdateStatus');
            Route::delete('/delete/{user}', [AdminUserController::class, 'destroy'])->name('adminUserDestroy');
        });

        // Asset
        Route::prefix('/asset')->group(function () {
            Route::get('/', [AdminAssetController::class, 'index'])->name('adminAsset');
            Route::get('/create', [AdminAssetController::class, 'create'])->name('adminAssetCreate');
            Route::post('/create', [AdminAssetController::class, 'store'])->name('adminAssetStore');
            Route::get('/edit/{asset}', [AdminAssetController::class, 'edit'])->name('adminAssetEdit');
            Route::put('/edit/{asset}', [AdminAssetController::class, 'update'])->name('adminAssetUpdate');
            Route::delete('/delete/{asset}', [AdminAssetController::class, 'destroy'])->name('adminAssetDestroy');
        });

        // Supplier
        Route::prefix('/supplier')->group(function () {
            Route::get('/', [AdminSupplierController::class, 'index'])->name('adminSupplier');
            Route::get('/create', [AdminSupplierController::class, 'create'])->name('adminSupplierCreate');
            Route::post('/create', [AdminSupplierController::class, 'store'])->name('adminSupplierStore');
            Route::get('/edit/{supplier}', [AdminSupplierController::class, 'edit'])->name('adminSupplierEdit');
            Route::put('/edit/{supplier}', [AdminSupplierController::class, 'update'])->name('adminSupplierUpdate');
            Route::delete('/delete/{supplier}', [AdminSupplierController::class, 'destroy'])->name('adminSuplierDestroy');
        });

        // Order
        Route::prefix('/order')->group(function () {
            Route::get('/', [AdminOrderController::class, 'index'])->name('adminOrder');
            Route::get('/create', [AdminOrderController::class, 'create'])->name('adminOrderCreate');
            Route::post('/create', [AdminOrderController::class, 'store'])->name('adminOrderStore');
            Route::get('/edit/{order}', [AdminOrderController::class, 'edit'])->name('adminOrderEdit');
            Route::put('/edit/{order}', [AdminOrderController::class, 'update'])->name('adminOrderUpdate');
            Route::delete('/delete/{order}', [AdminOrderController::class, 'destroy'])->name('adminOrderDestroy');
        });

        // Entrust
        // Product
        Route::prefix('/product')->group(function () {
            Route::get('/', [AdminProductController::class, 'index'])->name('adminProduct');
            Route::get('/create', [AdminProductController::class, 'create'])->name('adminProductCreate');
            Route::post('/create', [AdminProductController::class, 'store'])->name('adminProductStore');
            Route::get('/edit/{product}', [AdminProductController::class, 'edit'])->name('adminProductEdit');
            Route::put('/edit/{product}', [AdminProductController::class, 'update'])->name('adminProductUpdate');
            Route::delete('/delete/{product}', [AdminProductController::class, 'destroy'])->name('adminProductDestroy');
        });
        Route::prefix('/product/category')->group(function () {
            Route::get('/create', [AdminProductCategoryController::class, 'create'])->name('adminProductCategoryCreate');
            Route::post('/create', [AdminProductCategoryController::class, 'store'])->name('adminProductCategoryStore');
            Route::get('/edit/{category}', [AdminProductCategoryController::class, 'edit'])->name('adminProductCategoryEdit');
            Route::put('/edit/{category}', [AdminProductCategoryController::class, 'update'])->name('adminProductCategoryUpdate');
            Route::delete('/delete/{category}', [AdminProductCategoryController::class, 'destroy'])->name('adminProductCategoryDestroy');
        });

        // < Eco Friendly >
        // Waste
        Route::prefix('/waste')->group(function () {
            Route::get('/', [AdminWasteController::class, 'index'])->name('adminWaste');
            Route::get('/create', [AdminWasteController::class, 'create'])->name('adminWasteCreate');
            Route::post('/create', [AdminWasteController::class, 'store'])->name('adminWasteStore');
            Route::get('/edit/{waste}', [AdminWasteController::class, 'edit'])->name('adminWasteEdit');
            Route::put('/edit/{waste}', [AdminWasteController::class, 'update'])->name('adminWasteUpdate');
            Route::delete('/delete/{waste}', [AdminWasteController::class, 'destroy'])->name('adminWasteDestroy');
        });
        Route::prefix('/waste/type')->group(function () {
            Route::get('/create', [AdminWasteTypeController::class, 'create'])->name('adminWasteTypeCreate');
            Route::post('/create', [AdminWasteTypeController::class, 'store'])->name('adminWasteTypeStore');
            Route::get('/edit/{type}', [AdminWasteTypeController::class, 'edit'])->name('adminWasteTypeEdit');
            Route::put('/edit/{type}', [AdminWasteTypeController::class, 'update'])->name('adminWasteTypeUpdate');
            Route::delete('/delete/{type}', [AdminWasteTypeController::class, 'destroy'])->name('adminWasteTypeDestroy');
        });

        // < Keuangan >
        // Transaction
        Route::prefix('/transaction')->group(function () {
            Route::get('/', [AdminTransactionController::class, 'index'])->name('adminTransaction');
        });

        // Expense
        Route::prefix('/expense')->group(function () {
            Route::get('/', [AdminExpenseController::class, 'index'])->name('adminExpense');
            Route::get('/create', [AdminExpenseController::class, 'create'])->name('adminExpenseCreate');
            Route::post('/create', [AdminExpenseController::class, 'store'])->name('adminExpenseStore');
            Route::get('/edit/{expense}', [AdminExpenseController::class, 'edit'])->name('adminExpenseEdit');
            Route::put('/edit/{expense}', [AdminExpenseController::class, 'update'])->name('adminExpenseUpdate');
            Route::delete('/delete/{expense}', [AdminExpenseController::class, 'destroy'])->name('adminExpenseDestroy');
        });

        // Debt
        Route::prefix('/debt')->group(function () {
            Route::get('/', [AdminDebtController::class, 'index'])->name('adminDebt');
            Route::get('/create', [AdminDebtController::class, 'create'])->name('adminDebtCreate');
            Route::post('/create', [AdminDebtController::class, 'store'])->name('adminDebtStore');
            Route::get('/edit/{debt}', [AdminDebtController::class, 'edit'])->name('adminDebtEdit');
            Route::put('/edit/{debt}', [AdminDebtController::class, 'update'])->name('adminDebtUpdate');
            Route::delete('/delete/{debt}', [AdminDebtController::class, 'destroy'])->name('adminDebtDestroy');
        });
    });
});

// User
Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('userDashboard');
