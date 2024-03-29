<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
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
Auth::routes();
// Route::get('/', function () {
//     return view('auth.login');
// });
// Route::get('/register', function () {
//     return view('auth.register');
// });

Route::middleware('auth')->group(function () {
    Route::get('/', [PagesController::class, 'index'])->name('pages.index');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/personal-info', [UserController::class, 'personalInfo'])->name('user.info');
    Route::put('/personal-info', [UserController::class, 'updatePersonalInfo'])->name('user.info.update');

    Route::get('/deposit', [PagesController::class, 'deposit'])->name('pages.deposit');
    Route::get('/terms', [PagesController::class, 'terms'])->name('pages.terms');
    Route::get('/cslink', [PagesController::class, 'support'])->name('pages.support');
    Route::get('/wallet', [PagesController::class, 'wallet'])->name('pages.wallet');
    Route::put('/wallet', [PagesController::class, 'updateWallet'])->name('pages.wallet.update');
    Route::get('/withdraw', [PagesController::class, 'withdraw'])->name('pages.withdraw');
    Route::post('/withdraw', [PagesController::class, 'storeWithdraw'])->name('pages.withdraw.store');
    Route::get('/logout', [PagesController::class, 'logout'])->name('pages.logout');
    Route::get('/starting', [PagesController::class, 'starting'])->name('pages.starting');
    Route::post('/task', [PagesController::class, 'task'])->name('pages.task');
    Route::put('/task', [PagesController::class, 'submitTask'])->name('pages.task.submit');
    Route::get('/vips', [PagesController::class, 'vip'])->name('pages.vip');
    Route::get('/records', [PagesController::class, 'record'])->name('pages.record');

    // Route::get('/lang', function () {
    //     return view('user.language');
    // });
    Route::middleware('admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
            Route::post('/dashboard', [AdminController::class, 'upgradeUserVip'])->name('admin.upgradeUserVip');
            Route::put('/reset-user-today-task/{id}', [AdminController::class, 'resetUser'])->name('admin.user.reset');
            Route::get('/deposit', [AdminController::class, 'deposit'])->name('admin.deposit');    
            Route::post('/deposit', [AdminController::class, 'storeDeposit'])->name('admin.deposit.store');
            Route::get('/support', [AdminController::class, 'support'])->name('admin.support');    
            Route::post('/support', [AdminController::class, 'storeSupport'])->name('admin.support.store');    
            Route::get('/pending-withdrawal', [AdminController::class, 'pendingWithdrawal'])->name('admin.withdraw');    
            Route::put('/pending-withdrawal/{id}/{action}', [AdminController::class, 'pendingWithdrawalAction'])->name('admin.withdraw.action');
            Route::put('/minimum-withdrawal', [AdminController::class, 'updateMinimumWithdrawal'])->name('admin.withdraw.minimum');
            Route::get('/vip-levels', [AdminController::class, 'addVipLevel'])->name('admin.levels.add');    
            Route::post('/vip-levels', [AdminController::class, 'storeVipLevel'])->name('admin.levels.store');    
            Route::get('/vip-levels/manage', [AdminController::class, 'manageVipLevels'])->name('admin.levels.manage');
            Route::get('/products', [AdminController::class, 'products'])->name('admin.products');    
            Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');    
            Route::get('/user/{id}', [AdminController::class, 'showUser'])->name('admin.user.show');
            Route::get('/vip-levels/show/{slug}', [AdminController::class, 'showVip'])->name('admin.vip.show');
            Route::delete('/vip-levels/delete/{id}', [AdminController::class, 'deleteVip'])->name('admin.vip.delete');
            Route::get('/vip-levels/edit/{slug}', [AdminController::class, 'editVip'])->name('admin.vip.edit');
            Route::put('/vip-levels/edit/{slug}', [AdminController::class, 'updateVip'])->name('admin.vip.update');
            Route::put('/set-user-active/{id}', [AdminController::class, 'setUserActive'])->name('admin.user.status');


        });
    });

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
