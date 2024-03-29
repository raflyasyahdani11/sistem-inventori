<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Middleware\CheckExpiredItems;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiMasukController;
use App\Http\Controllers\TransaksiKeluarController;

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

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::prefix('/auth')
    ->middleware('guest')
    ->group(function () {
        Route::get('/login', [WebController::class, 'showLogin'])->name('auth.login');
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
    });

Route::prefix('/sistem-inventori')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', function () {
            return redirect()->route('auth.login');
        });
        Route::get('/dashboard', [WebController::class, 'showDashboard'])
            ->middleware(['permission:lihat-dashboard'])
            ->name('dashboard');
        Route::get('/notification/read/{notification}', [WebController::class, 'readNotification'])->name('notification.read');

        Route::resources([
            'user' => UserController::class,
        ]);

        Route::prefix('/data')->group(function () {
            Route::resources([
                'barang' => BarangController::class,
                'supplier' => SupplierController::class,
            ]);
        });

        Route::get('/data/barang-expired', [WebController::class, 'showBarangExpired'])->name('barang.expired');

        Route::prefix('/transaction')->group(function () {
            Route::resources([
                'in' => TransaksiMasukController::class,
                'out' => TransaksiKeluarController::class,
            ], [
                'parameters' => [
                    'in' => 'transaksi_masuk',
                    'out' => 'transaksi_keluar',
                ],
            ]);
        });

        Route::prefix('/perhitungan')->group(function () {
            Route::get('/eoq', [WebController::class, 'showPerhitunganEoq'])->name('perhitungan.eoq');
            Route::get('/rop', [WebController::class, 'showPerhitunganRop'])->name('perhitungan.rop');
            Route::get('/ss', [WebController::class, 'showPerhitunganSs'])->name('perhitungan.ss');
            Route::get('/', [WebController::class, 'showPerhitungan'])->name('perhitungan.index');
        });

        Route::get('/report', [WebController::class, 'showReportIndex'])->name('report.index');
        Route::get('/report/masuk', [WebController::class, 'showReportMasuk'])->name('report.masuk');
        Route::get('/report/keluar', [WebController::class, 'showReportKeluar'])->name('report.keluar');

        Route::post('/report/download/transaksi_masuk', [WebController::class, 'downloadReportTransactionIn'])->name('report.transaction_in.download');
        Route::post('/report/download/transaksi_keluar', [WebController::class, 'downloadReportTransactionOut'])->name('report.transaction_out.download');
    });