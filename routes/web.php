<?php

use App\Models\ChangeLog;

use App\Http\Controllers\HitungWR;
use Illuminate\Support\Facades\View;

/* Start of Controller Namespace */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ChangeLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\LinkTreeController;

/* End of Controller Namespace */

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
/* View Composer */

// View::composer(['*'], function ($view) {
//     $notification_changelog = ChangeLog::orderBy('created_at', 'desc')?->paginate(3);
//     $view->with('notification_changelog', $notification_changelog);
// });

/* Linktree */

Route::get('/linktree', [App\Http\Controllers\LinkTreeController::class, 'index'])->name('linktree');

/* Landing Page */

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::post('/subscribe', [LandingController::class, 'subscribe'])->name('subscribe');
Route::get('/thankyou', [LandingController::class, 'thankyou'])->name('thankyou');

/* Login */

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/post-login', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/* Admin */

Route::group(['middleware' => ['auth', 'role:1,2,3']], function () {

    /* Dashboard */

    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/logs', [ActivityController::class, 'logs'])->name('logs');

    /* Winrate */

    Route::get('/admin/winrate', [HitungWR::class, 'index'])->name('winrate');
    
    /* CashFlow */

    Route::get('/admin/accounting', [CashFlowController::class, 'index'])->name('accounting');
    Route::post('/admin/accounting/new', [CashFlowController::class, 'create'])->name('accounting-add');
    
    /* Order */

    Route::get('/admin/order', [OrderController::class, 'orderIndex'])->name('order');
    Route::get('/admin/order/history', [OrderController::class, 'orderHistory'])->name('order-history');
    Route::get('/admin/order/{game}', [OrderController::class, 'productsOrder'])->name('products');
    Route::post('/admin/order/{game}/process', [OrderController::class, 'processOrder'])->name('process');
    Route::get('/admin/invoice/proceed/{order}', [OrderController::class, 'invoiceProceed'])->name('invoice-proceed');
    Route::get('/admin/invoice/cancel/{order}', [OrderController::class, 'invoiceCancel'])->name('invoice-cancel');
    Route::get('/admin/invoice/{order}', [OrderController::class, 'invoiceOrder'])->name('invoice');

    /* Users */

    Route::get('/admin/users', [UserController::class, 'index'])->name('users');

    /* Tickets */

    Route::get('/admin/tickets', [TicketController::class, 'index'])->name('tickets');
    Route::get('/admin/contact', [TicketController::class, 'help'])->name('contact');
    Route::get('/admin/contact-send', [TicketController::class, 'send'])->name('contact-send');

    /* My Profile */

    Route::get('/admin/my-profile', [ProfileController::class, 'index'])->name('my-profile');
    Route::post('/admin/my-profile-info/{id}', [ProfileController::class, 'changeInfo'])->name('my-profile-info');
    Route::post('/admin/my-profile-password/{id}', [ProfileController::class, 'changePassword'])->name('my-profile-password');

    /* Changelog */

    Route::get('/admin/changelog', [ChangeLogController::class, 'index'])->name('changelog');
    Route::post('/admin/changelog-add', [ChangeLogController::class, 'create'])->name('changelog-add');

    /* Deposit */

    Route::get('/admin/deposit', [DepositController::class, 'index'])->name('deposit');
    Route::post('/admin/deposit/new', [DepositController::class, 'new'])->name('new-deposit');
    Route::get('/admin/deposit/history', [DepositController::class, 'history'])->name('history-deposit');

    /* Games */

    Route::get('/admin/games', [GameController::class, 'gamesIndex'])->name('games');
    Route::post('/admin/games/new', [GameController::class, 'gamesNew'])->name('new-games');
    Route::get('/admin/games/del/{game}', [GameController::class, 'gamesDel'])->name('del-games');
    Route::get('/admin/games/edit/{game}', [GameController::class, 'gamesEdit'])->name('edit-games');
    Route::post('/admin/games/update/{game}', [GameController::class, 'gamesUpdate'])->name('update-games');

    Route::get('/admin/products/{game}', [GameController::class, 'productsIndex'])->name('games-products');
    Route::post('/admin/products/{product}/new', [GameController::class, 'productsNew'])->name('new-products');
    Route::get('/admin/products/del/{product}', [GameController::class, 'productsDel'])->name('del-products');
    Route::get('/admin/products/edit/{product}', [GameController::class, 'productsEdit'])->name('edit-products');
    Route::post('/admin/products/update/{product}', [GameController::class, 'productsUpdate'])->name('update-products');

    /* Roles */

    Route::get('/admin/auth/roles', [RoleController::class, 'index'])->name('auth.roles');
    Route::post('/admin/auth/roles-add', [RoleController::class, 'create'])->name('auth.roles-add');
    Route::get('/admin/auth/roles-delete/{id}', [RoleController::class, 'delete'])->name('auth.roles-delete');
    Route::get('/admin/auth/roles-edit/{id}', [RoleController::class, 'edit'])->name('auth.roles-edit');
    Route::post('/admin/auth/roles-update/{id}', [RoleController::class, 'update'])->name('auth.roles-update');

    /* Users */

    Route::get('/admin/auth/users', [UserController::class, 'auth'])->name('auth.users');
    Route::post('/admin/auth/user-add', [UserController::class, 'create'])->name('auth.user-add');
    Route::get('/admin/auth/user-delete/{id}', [UserController::class, 'delete'])->name('auth.user-delete');
    Route::get('/admin/auth/user-edit/{id}', [UserController::class, 'edit'])->name('auth.user-edit');
    Route::post('/admin/auth/user-update/{id}', [UserController::class, 'update'])->name('auth.user-update');
});
    
