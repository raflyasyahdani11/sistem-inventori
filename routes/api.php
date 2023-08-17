<?php

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TransaksiKeluar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/barang/{barang}', function (Barang $barang) {
    $trxMasukRaw = $barang->transaksi_masuk
        ->where('tanggal_expired', '>=', Carbon::now()->toDateString())
        ->where('jumlah_sekarang', '>', 0)
        ->sortBy('tanggal_expired');

    $trxMasuk = $trxMasukRaw->first();

    $perhitungan = $barang->perhitungan->firstWhere('tahun_transaksi', Carbon::now()->subYears(1)->year);

    return response()->json([
        'message' => 'berhasil mengambil data barang',
        'data' => [
            'trx_masuk_id' => $trxMasuk->id,
            'jumlah' => $trxMasuk->jumlah_sekarang,
            'min_exp_date' => $trxMasuk->tanggal_expired,
            'rop' => $perhitungan->rop,
            'eoq' => $perhitungan->eoq,
        ]
    ]);
})->name('barang.get');
