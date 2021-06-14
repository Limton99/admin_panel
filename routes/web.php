<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\Promotion\PromotionController;
use App\Http\Controllers\Service\AliasServiceController;
use App\Http\Controllers\Service\CategoryRubricController;
use App\Http\Controllers\Service\ServiceCategoryController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Service\UnitController;
use App\Http\Controllers\Specialist\SpecialistController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\VerificationCodeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['auth', 'checkDb']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ResetPasswordController::class, 'resetAdminPasswordView'])->name('reset-password');
    Route::post('/profile', [ResetPasswordController::class, 'resetAdminPassword'])->name('reset-run');

    Route::group(['prefix'=>'orders'], function () {
        Route::get('/', [OrdersController::class, 'index'])->name('orders');
        Route::get('/{id}', [OrdersController::class, 'show'])->name('order');
    });

    Route::group(['prefix'=>'specialists'], function () {
        Route::get('/', [SpecialistController::class, 'index'])->name('specialists');
        Route::get('/{id}', [SpecialistController::class, 'show'])->name('specialist');
        Route::get('/update/{id}/{status}', [SpecialistController::class, 'updateStatus'])->name('specialist-update-status');
        Route::get('/reset/{id}', [SpecialistController::class, 'resetAttempts'])->name('reset-spec-attempts');
        Route::get('/transactions/{id}', [SpecialistController::class, 'getTransactions'])->name('specialist-transaction');
    });

    Route::group(['prefix'=>'clients'], function () {
        Route::get('/', [ClientController::class, 'index'])->name('clients');
        Route::get('/{id}', [ClientController::class, 'show'])->name('client');
        Route::get('/reset/{id}', [ClientController::class, 'resetAttempts'])->name('reset-client-attempts');
        Route::get('/transactions/{id}', [ClientController::class, 'getTransactions'])->name('client-transaction');

    });

    Route::group(['prefix'=>'cities'], function () {
        Route::get('/', [CityController::class, 'index'])->name('cities');
        Route::get('/create', [CityController::class, 'create'])->name('city-create');
        Route::post('/create', [CityController::class, 'store'])->name('city-store');
        Route::get('/update/{id}', [CityController::class, 'edit'])->name('city-edit');
        Route::post('/update/{id}', [CityController::class, 'update'])->name('city-update');
    });

    Route::group(['prefix'=>'services'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('services');
        Route::get('/create', [ServiceController::class, 'create'])->name('service-create');
        Route::post('/create', [ServiceController::class, 'store'])->name('service-store');
        Route::get('/update/{id}', [ServiceController::class, 'edit'])->name('service-edit');
        Route::post('/update/{id}', [ServiceController::class, 'update'])->name('service-update');

        Route::group(['prefix'=>'categories'], function () {
            Route::get('/', [ServiceCategoryController::class, 'index'])->name('serviceCategories');
            Route::get('/create', [ServiceCategoryController::class, 'create'])->name('serviceCategories-create');
            Route::post('/create', [ServiceCategoryController::class, 'store'])->name('serviceCategories-store');
            Route::get('/update/{id}', [ServiceCategoryController::class, 'edit'])->name('serviceCategories-edit');
            Route::post('/update/{id}', [ServiceCategoryController::class, 'update'])->name('serviceCategories-update');

            Route::group(['prefix'=>'rubric'], function () {
                Route::get('/', [CategoryRubricController::class, 'index'])->name('rubrics');
                Route::get('/create', [CategoryRubricController::class, 'create'])->name('rubric-create');
                Route::post('/create', [CategoryRubricController::class, 'store'])->name('rubric-store');
                Route::get('/update/{id}', [CategoryRubricController::class, 'edit'])->name('rubric-edit');
                Route::post('/update/{id}', [CategoryRubricController::class, 'update'])->name('rubric-update');
                Route::get('/delete/{id}', [CategoryRubricController::class, 'destroy'])->name('rubric-delete');
            });
        });

        Route::group(['prefix'=>'alias'], function () {
            Route::get('/', [AliasServiceController::class, 'index'])->name('aliases');
            Route::get('/create', [AliasServiceController::class, 'create'])->name('alias-create');
            Route::post('/create', [AliasServiceController::class, 'store'])->name('alias-store');
            Route::get('/update/{id}', [AliasServiceController::class, 'edit'])->name('alias-edit');
            Route::post('/update/{id}', [AliasServiceController::class, 'update'])->name('alias-update');
            Route::get('/delete/{id}', [AliasServiceController::class, 'destroy'])->name('alias-delete');
        });
    });

    Route::group(['prefix'=>'units'], function () {
        Route::get('/', [UnitController::class, 'index'])->name('units');
        Route::get('/create', [UnitController::class, 'create'])->name('unit-create');
        Route::post('/create', [UnitController::class, 'store'])->name('unit-store');
        Route::get('/update/{id}', [UnitController::class, 'edit'])->name('unit-edit');
        Route::post('/update/{id}', [UnitController::class, 'update'])->name('unit-update');
        Route::get('/delete/{id}', [UnitController::class, 'destroy'])->name('unit-delete');
    });

    Route::group(['prefix'=>'transactions'], function () {
        Route::get('/', [TransactionController::class, 'index'])->name('transactions');
    });

    Route::group(['prefix'=>'verificationcodes'], function () {
        Route::get('/', [VerificationCodeController::class, 'index'])->name('verification_codes');
    });

    Route::group(['prefix'=>'promotions'], function () {
        Route::get('/', [PromotionController::class, 'index'])->name('promotions');
        Route::get('/create', [PromotionController::class, 'create'])->name('promotion-create');
        Route::post('/create', [PromotionController::class, 'store'])->name('promotion-store');
        Route::get('/update/{id}', [PromotionController::class, 'edit'])->name('promotion-edit');
        Route::post('/update/{id}', [PromotionController::class, 'update'])->name('promotion-update');
        Route::get('/destroy/{id}', [PromotionController::class, 'destroy'])->name('promotion-delete');
    });

    Route::group(['prefix'=>'admins'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admins');
        Route::get('/register', [AdminController::class, 'register'])->name('admin-register');
        Route::post('/register', [AdminController::class, 'registerPost'])->name('admin-register-post');
        Route::get('/update/{id}', [AdminController::class, 'edit'])->name('admin-edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin-update');
        Route::get('/delete/{id}', [AdminController::class, 'destroy'])->name('admin-delete');
    });
});

Route::get('/error', function () {
    return view('errors.server-error');
})->name('error');

Auth::routes();
