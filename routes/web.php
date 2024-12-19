<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\AssetController as AdminAssetController;
use App\Http\Controllers\Admin\StoreController as AdminStoreController;
use App\Http\Controllers\Admin\CollaborationController as AdminCollaborationController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\Unit\ProductCategoryController as AdminProductCategoryController;
use App\Http\Controllers\Admin\Unit\UserRoleController as AdminUserRoleController;
use App\Http\Controllers\Admin\Unit\AssetUnitController as AdminAssetUnitController;
use App\Http\Controllers\Admin\EcoFriendly\WasteController as AdminWasteController;
use App\Http\Controllers\Admin\EcoFriendly\Unit\WasteTypeController as AdminWasteTypeController;
use App\Http\Controllers\Admin\Financial\DebtController as AdminDebtController;
use App\Http\Controllers\Admin\Financial\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\Financial\ExpenseController as AdminExpenseController;
use App\Http\Controllers\Admin\Financial\CashController as AdminCashController;
use App\Http\Controllers\Admin\Auth\ProfileController as AdminProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\AssetController as UserAssetController;
use App\Http\Controllers\User\StoreController as UserStoreController;
use App\Http\Controllers\User\CollaborationController as UserCollaborationController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\Unit\ProductCategoryController as UserProductCategoryController;
use App\Http\Controllers\User\Unit\UserRoleController as UserUserRoleController;
use App\Http\Controllers\User\Unit\AssetUnitController as UserAssetUnitController;
use App\Http\Controllers\User\EcoFriendly\WasteController as UserWasteController;
use App\Http\Controllers\User\EcoFriendly\Unit\WasteTypeController as UserWasteTypeController;
use App\Http\Controllers\User\Financial\DebtController as UserDebtController;
use App\Http\Controllers\User\Financial\TransactionController as UserTransactionController;
use App\Http\Controllers\User\Financial\ExpenseController as UserExpenseController;
use App\Http\Controllers\User\Financial\CashController as UserCashController;
use App\Http\Controllers\User\Auth\ProfileController as UserProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('registerUser');
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
        Route::prefix('/user/role')->group(function () {
            Route::get('/create', [AdminUserRoleController::class, 'create'])->name('adminUserRoleCreate');
            Route::post('/create', [AdminUserRoleController::class, 'store'])->name('adminUserRoleStore');
            Route::get('/edit/{role}', [AdminUserRoleController::class, 'edit'])->name('adminUserRoleEdit');
            Route::put('/edit/{role}', [AdminUserRoleController::class, 'update'])->name('adminUserRoleUpdate');
            Route::delete('/delete/{role}', [AdminUserRoleController::class, 'destroy'])->name('adminUserRoleDestroy');
        });

        // Store
        Route::prefix('/store')->group(function () {
            Route::get('/', [AdminStoreController::class, 'index'])->name('adminStore');
            Route::get('/create', [AdminStoreController::class, 'create'])->name('adminStoreCreate');
            Route::post('/create', [AdminStoreController::class, 'store'])->name('adminStoreStore');
            Route::get('/edit/{store}', [AdminStoreController::class, 'edit'])->name('adminStoreEdit');
            Route::put('/edit/{store}', [AdminStoreController::class, 'update'])->name('adminStoreUpdate');
            Route::delete('/delete/{store}', [AdminStoreController::class, 'destroy'])->name('adminStoreDestroy');
        });

        // Asset
        Route::prefix('/asset')->group(function () {
            Route::get('/', [AdminAssetController::class, 'index'])->name('adminAsset');
            Route::get('/create', [AdminAssetController::class, 'create'])->name('adminAssetCreate');
            Route::post('/create', [AdminAssetController::class, 'store'])->name('adminAssetStore');
            Route::get('/edit/{asset}', [AdminAssetController::class, 'edit'])->name('adminAssetEdit');
            Route::put('/edit/{asset}', [AdminAssetController::class, 'update'])->name('adminAssetUpdate');
            Route::put('/status/edit', [AdminAssetController::class, 'updateStatus'])->name('adminAssetUpdateStatus');
            Route::delete('/delete/{asset}', [AdminAssetController::class, 'destroy'])->name('adminAssetDestroy');
        });
        Route::prefix('/user/unit')->group(function () {
            Route::get('/create', [AdminAssetUnitController::class, 'create'])->name('adminAssetUnitCreate');
            Route::post('/create', [AdminAssetUnitController::class, 'store'])->name('adminAssetUnitStore');
            Route::get('/edit/{unit}', [AdminAssetUnitController::class, 'edit'])->name('adminAssetUnitEdit');
            Route::put('/edit/{unit}', [AdminAssetUnitController::class, 'update'])->name('adminAssetUnitUpdate');
            Route::delete('/delete/{unit}', [AdminAssetUnitController::class, 'destroy'])->name('adminAssetUnitDestroy');
        });

        // Collaboration
        Route::prefix('/collaboration')->group(function () {
            Route::get('/', [AdminCollaborationController::class, 'index'])->name('adminCollaboration');
            Route::get('/create', [AdminCollaborationController::class, 'create'])->name('adminCollaborationCreate');
            Route::post('/create', [AdminCollaborationController::class, 'store'])->name('adminCollaborationStore');
            Route::get('/edit/{collaboration}', [AdminCollaborationController::class, 'edit'])->name('adminCollaborationEdit');
            Route::put('/edit/{collaboration}', [AdminCollaborationController::class, 'update'])->name('adminCollaborationUpdate');
            Route::delete('/delete/{collaboration}', [AdminCollaborationController::class, 'destroy'])->name('adminCollaborationDestroy');
        });

        // Order
        Route::prefix('/order')->group(function () {
            Route::get('/', [AdminOrderController::class, 'index'])->name('adminOrder');
            Route::get('/{order}/note', [AdminOrderController::class, 'showNote'])->name('adminOrderNote');
            Route::post('/admin/order/{order}/send-note', [AdminOrderController::class, 'sendNoteViaEmail'])->name('adminOrderSendNote');
            Route::get('/create', [AdminOrderController::class, 'create'])->name('adminOrderCreate');
            Route::post('/create', [AdminOrderController::class, 'store'])->name('adminOrderStore');
            Route::get('/edit/{order}', [AdminOrderController::class, 'edit'])->name('adminOrderEdit');
            Route::put('/edit/{order}', [AdminOrderController::class, 'update'])->name('adminOrderUpdate');
            Route::put('/status/edit', [AdminOrderController::class, 'updateStatus'])->name('adminOrderUpdateStatus');
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

        // Cash
        Route::prefix('/cash')->group(function () {
            Route::get('/', [AdminCashController::class, 'index'])->name('adminCash');
            Route::get('/create', [AdminCashController::class, 'create'])->name('adminCashCreate');
            Route::post('/create', [AdminCashController::class, 'store'])->name('adminCashStore');
            Route::get('/edit/{cash}', [AdminCashController::class, 'edit'])->name('adminCashEdit');
            Route::put('/edit/{cash}', [AdminCashController::class, 'update'])->name('adminCashUpdate');
            Route::delete('/delete/{cash}', [AdminCashController::class, 'destroy'])->name('adminCashDestroy');
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

        // Profile
        Route::prefix('/profile')->group(function () {
            Route::get('/', [AdminProfileController::class, 'index'])->name('adminProfile');
            Route::get('/edit', [AdminProfileController::class, 'edit'])->name('adminProfileEdit');
            Route::put('/edit', [AdminProfileController::class, 'update'])->name('adminProfileUpdate');
            Route::get('/edit/password', [AdminProfileController::class, 'editPassword'])->name('adminProfileEditPassword');
            Route::put('/edit/password', [AdminProfileController::class, 'updatePassword'])->name('adminProfileUpdatePassword');
        });
    });
});

// User
Route::middleware(['auth.role:anggota'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('userDashboard');

    // Event
    Route::prefix('/event')->group(function () {
        Route::get('/', [UserEventController::class, 'index'])->name('userEvent');
    });

    // Store
    Route::prefix('/store')->group(function () {
        Route::get('/', [UserStoreController::class, 'index'])->name('userStore');
        Route::get('/create', [UserStoreController::class, 'create'])->name('userStoreCreate');
        Route::post('/create', [UserStoreController::class, 'store'])->name('userStoreStore');
        Route::get('/edit/{store}', [UserStoreController::class, 'edit'])->name('userStoreEdit');
        Route::put('/edit/{store}', [UserStoreController::class, 'update'])->name('userStoreUpdate');
        Route::delete('/delete/{store}', [UserStoreController::class, 'destroy'])->name('userStoreDestroy');
    });

    // Asset
    Route::prefix('/asset')->group(function () {
        Route::get('/', [UserAssetController::class, 'index'])->name('userAsset');
        Route::get('/create', [UserAssetController::class, 'create'])->name('userAssetCreate');
        Route::post('/create', [UserAssetController::class, 'store'])->name('userAssetStore');
        Route::get('/edit/{asset}', [UserAssetController::class, 'edit'])->name('userAssetEdit');
        Route::put('/edit/{asset}', [UserAssetController::class, 'update'])->name('userAssetUpdate');
        Route::put('/status/edit', [UserAssetController::class, 'updateStatus'])->name('userAssetUpdateStatus');
        Route::delete('/delete/{asset}', [UserAssetController::class, 'destroy'])->name('userAssetDestroy');
    });

    // Collaboration
    Route::prefix('/collaboration')->group(function () {
        Route::get('/', [UserCollaborationController::class, 'index'])->name('userCollaboration');
        Route::get('/create', [UserCollaborationController::class, 'create'])->name('userCollaborationCreate');
        Route::post('/create', [UserCollaborationController::class, 'store'])->name('userCollaborationStore');
        Route::get('/edit/{collaboration}', [UserCollaborationController::class, 'edit'])->name('userCollaborationEdit');
        Route::put('/edit/{collaboration}', [UserCollaborationController::class, 'update'])->name('userCollaborationUpdate');
        Route::delete('/delete/{collaboration}', [UserCollaborationController::class, 'destroy'])->name('userCollaborationDestroy');
    });

    // Order
    Route::prefix('/order')->group(function () {
        Route::get('/', [UserOrderController::class, 'index'])->name('userOrder');
        Route::get('/create', [UserOrderController::class, 'create'])->name('userOrderCreate');
        Route::post('/create', [UserOrderController::class, 'store'])->name('userOrderStore');
        Route::get('/edit/{order}', [UserOrderController::class, 'edit'])->name('userOrderEdit');
        Route::put('/edit/{order}', [UserOrderController::class, 'update'])->name('userOrderUpdate');
        Route::put('/status/edit', [UserOrderController::class, 'updateStatus'])->name('userOrderUpdateStatus');
        Route::delete('/delete/{order}', [UserOrderController::class, 'destroy'])->name('userOrderDestroy');
    });

    // Entrust
    // Product
    Route::prefix('/product')->group(function () {
        Route::get('/', [UserProductController::class, 'index'])->name('userProduct');
        Route::get('/create', [UserProductController::class, 'create'])->name('userProductCreate');
        Route::post('/create', [UserProductController::class, 'store'])->name('userProductStore');
        Route::get('/edit/{product}', [UserProductController::class, 'edit'])->name('userProductEdit');
        Route::put('/edit/{product}', [UserProductController::class, 'update'])->name('userProductUpdate');
        Route::delete('/delete/{product}', [UserProductController::class, 'destroy'])->name('userProductDestroy');
    });

    // < Eco Friendly >
    // Waste
    Route::prefix('/waste')->group(function () {
        Route::get('/', [UserWasteController::class, 'index'])->name('userWaste');
        Route::get('/create', [UserWasteController::class, 'create'])->name('userWasteCreate');
        Route::post('/create', [UserWasteController::class, 'store'])->name('userWasteStore');
        Route::get('/edit/{waste}', [UserWasteController::class, 'edit'])->name('userWasteEdit');
        Route::put('/edit/{waste}', [UserWasteController::class, 'update'])->name('userWasteUpdate');
        Route::delete('/delete/{waste}', [UserWasteController::class, 'destroy'])->name('userWasteDestroy');
    });

    // < Keuangan >
    // Transaction
    Route::prefix('/transaction')->group(function () {
        Route::get('/', [UserTransactionController::class, 'index'])->name('userTransaction');
    });

    // Cash
    Route::prefix('/cash')->group(function () {
        Route::get('/', [UserCashController::class, 'index'])->name('userCash');
        Route::get('/create', [UserCashController::class, 'create'])->name('userCashCreate');
        Route::post('/create', [UserCashController::class, 'store'])->name('userCashStore');
        Route::get('/edit/{cash}', [UserCashController::class, 'edit'])->name('userCashEdit');
        Route::put('/edit/{cash}', [UserCashController::class, 'update'])->name('userCashUpdate');
        Route::delete('/delete/{cash}', [UserCashController::class, 'destroy'])->name('userCashDestroy');
    });

    // Expense
    Route::prefix('/expense')->group(function () {
        Route::get('/', [UserExpenseController::class, 'index'])->name('userExpense');
        Route::get('/create', [UserExpenseController::class, 'create'])->name('userExpenseCreate');
        Route::post('/create', [UserExpenseController::class, 'store'])->name('userExpenseStore');
        Route::get('/edit/{expense}', [UserExpenseController::class, 'edit'])->name('userExpenseEdit');
        Route::put('/edit/{expense}', [UserExpenseController::class, 'update'])->name('userExpenseUpdate');
        Route::delete('/delete/{expense}', [UserExpenseController::class, 'destroy'])->name('userExpenseDestroy');
    });

    // Debt
    Route::prefix('/debt')->group(function () {
        Route::get('/', [UserDebtController::class, 'index'])->name('userDebt');
        Route::get('/create', [UserDebtController::class, 'create'])->name('userDebtCreate');
        Route::post('/create', [UserDebtController::class, 'store'])->name('userDebtStore');
        Route::get('/edit/{debt}', [UserDebtController::class, 'edit'])->name('userDebtEdit');
        Route::put('/edit/{debt}', [UserDebtController::class, 'update'])->name('userDebtUpdate');
        Route::delete('/delete/{debt}', [UserDebtController::class, 'destroy'])->name('userDebtDestroy');
    });

    // Profile
    Route::prefix('/profile')->group(function () {
        Route::get('/', [UserProfileController::class, 'index'])->name('userProfile');
        Route::get('/edit', [UserProfileController::class, 'edit'])->name('userProfileEdit');
        Route::put('/edit', [UserProfileController::class, 'update'])->name('userProfileUpdate');
        Route::get('/edit/password', [UserProfileController::class, 'editPassword'])->name('userProfileEditPassword');
        Route::put('/edit/password', [UserProfileController::class, 'updatePassword'])->name('userProfileUpdatePassword');
    });
});
