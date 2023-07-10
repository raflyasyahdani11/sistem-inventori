<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiMasukExport implements FromView, ShouldAutoSize
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        $data = $this->data;

        return view('exports.transaksi_masuk')
            ->with(compact('data'));
    }
}
