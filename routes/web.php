<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebController;
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
    return redirect()->route('auth.login');
});

Route::get('/dashboard', [WebController::class, 'showDashboard'])->name('dashboard');

Route::prefix('/user')->group(function () {
    Route::get('/list', [WebController::class, 'showListUser'])->name('user.show');
    Route::get('/add', [WebController::class, 'showAddUser'])->name('user.add');
});

Route::prefix('/data')->group(function () {
    Route::prefix('/barang')->group(function () {
        Route::get('/list', [WebController::class, 'showDataBarang'])->name('data.barang.list');
        Route::get('/add', [WebController::class, 'showAddDataBarang'])->name('data.barang.add');
        Route::get('/detail/{id}', [WebController::class, 'showDetailDataBarang'])->name('data.barang.detail');
    });
    Route::prefix('/supplier')->group(function () {
        Route::get('/list', [WebController::class, 'showDataSupplier'])->name('data.supplier.list');
        Route::get('/add', [WebController::class, 'showAddDataSupplier'])->name('data.supplier.add');
    });
});

Route::prefix('/transaction')->group(function () {
    Route::prefix('/in')->group(function () {
        Route::get('/list', [WebController::class, 'showInTransaction'])->name('transaction.in.list');
        Route::get('/add', [WebController::class, 'showInTransactionAdd'])->name('transaction.in.add');
    });
    Route::prefix('/out')->group(function () {
        Route::get('/list', [WebController::class, 'showOutTransaction'])->name('transaction.out.list');
        Route::get('/add', [WebController::class, 'showOutTransactionAdd'])->name('transaction.out.add');
    });
});

Route::get('/report', [WebController::class, 'showReportIndex'])->name('report.index');

Route::prefix('/auth')->group(function () {
    Route::get('/login', [WebController::class, 'showLogin'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
});
