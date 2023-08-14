<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Models\TransaksiMasuk;
use Illuminate\Support\Carbon;
use App\Notifications\ExpiredItem;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;

class CheckExpiredItem implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::debug('Ini dia');
        $startDate = Carbon::now()->subDays(1)->hours(0)->minutes(0)->seconds(0)->toDateTimeString();
        $endDate = Carbon::now()->subDays(1)->hours(23)->minutes(59)->seconds(59)->toDateTimeString();

        $items = TransaksiMasuk::whereBetween('tanggal_expired', [
            $startDate,
            $endDate,
        ])
            ->where('jumlah_sekarang', '>', 0)
            ->get();

        $items->each(function ($item) {
            $item->jumlah_sekarang = 0;
            $item->save();

            Notification::send(User::all(), new ExpiredItem($item->barang));
        });
    }
}
