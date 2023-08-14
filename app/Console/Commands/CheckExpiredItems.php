<?php

namespace App\Console\Commands;

use App\Models\TransaksiMasuk;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class CheckExpiredItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-expired-items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking if items are expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking items...');
        $items = TransaksiMasuk::with(['barang'])
            ->where('jumlah_sekarang', '>', 0)
            ->where('tanggal_expired', '<', Carbon::now()->hours(0)->minutes(0)->seconds(0)->toDateTimeString());

        if ($items->get()) {
            $this->output->writeln('');

            $items->update(['jumlah_sekarang' => 0]);

            $this->output->writeln('');
            $this->warn("There are expired items this day : ");

            $this->output->writeln('');

            $expiredItem = $items
                ->get()
                ->map(function ($item) {
                    return [
                        'kode_barang' => $item->barang->kode,
                        'name' => $item->barang->nama, 
                        'tanggal_expired' => $item->tanggal_expired,
                    ];
                })
                ->toArray();

            $this->table(['Kode Barang', 'Nama Barang', 'Tanggal Expired'], $expiredItem);
        } else {
            $this->info('No expired items today');
        }
    }
}
