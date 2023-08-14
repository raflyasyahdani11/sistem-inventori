<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Support\Carbon;
use App\Notifications\RestockItem;
use Illuminate\Support\Facades\Notification;

class StockRunningOut
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $barang = $event->transactionOut->barang;
        $perhitungan = $barang->perhitungan->firstWhere('tahun_transaksi', Carbon::now()->subYears(1)->year);
        $rop = round($perhitungan->rop);

        if ($barang->jumlah <= $rop) {
            Notification::send(User::all(), new RestockItem($barang));
        }
    }
}
