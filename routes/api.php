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
    $trxMasukBarang = $barang->transaksi_masuk
        ->whereBetween('tanggal_expired', [
            Carbon::now()->firstOfYear()->toDateTimeString(),
            Carbon::now()->lastOfYear()->toDateTimeString(),
        ])
        ->min('tanggal_expired');

    $rop = $barang->rop->firstWhere('tahun_transaksi', Carbon::now()->subYear(1)->year);

    return response()->json([
        'message' => 'berhasil mengambil data barang',
        'data' => [
            'jumlah' => $barang->jumlah,
            'min_exp_date' => $trxMasukBarang,
            'rop' => $rop->hasil,
        ]
    ]);
});
