<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Support\Carbon;
use App\Notifications\RestockItem;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class StockRunningOut
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $barang = $event->transactionOut->barang;
        $rop = $barang->rop->firstWhere('tahun_transaksi', Carbon::now()->subYears(1)->year);
        $rop = round($rop->hasil);

        if ($barang->jumlah <= $rop) {
            Notification::send(User::all(), new RestockItem($barang));
        }
    }
}
