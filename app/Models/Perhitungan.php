<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Perhitungan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ss_view';

    protected $with = ['barang', 'barang.supplier'];

    function barang(): HasOne
    {
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }

    protected function penjualanMax(): Attribute
    {
        return Attribute::make(
            function () {
                $penjualanMax = $this
                    ->all()
                    ->where('tahun_transaksi', $this->tahun_transaksi)
                    ->pluck('kebutuhan_setahun')
                    ->map(function ($value) {
                        return (int) $value;
                    })
                    ->max();

                return round($penjualanMax);
            }
        );
    }

    protected function ss(): Attribute
    {
        return Attribute::make(
            function () {
                $totalPenjualan = $this->kebutuhan_setahun;
                $banyakPenjualan = $this->total_transaksi;
                $penjualanMax = $this->penjualan_maksimal;

                $penjualanRataRata = ($totalPenjualan / $banyakPenjualan);
                $leadTime = $this->barang->supplier->lead_time;

                $hasil = round(($penjualanMax - $penjualanRataRata) * $leadTime);

                return $hasil;
            }
        );
    }

    protected function rop(): Attribute
    {
        return Attribute::make(
            function () {
                $totalPenjualan = $this->kebutuhan_setahun;
                $leadTime = $this->barang->supplier->lead_time;

                $rataRataPerhari = ($totalPenjualan / 12 / 30);

                $hasil = round(($rataRataPerhari * $leadTime) + $this->ss);

                return $hasil;
            }
        );
    }

    protected function eoq(): Attribute
    {
        return Attribute::make(
            function () {
                $kebutuhanSetahun = (int) $this->kebutuhan_setahun;
                $biayaKirim = $this->barang->supplier->biaya_kirim;
                $biayaSimpan = $this->barang->harga * 0.1;

                $hasil = sqrt(2 * $kebutuhanSetahun * $biayaKirim / ($biayaSimpan));
                
                return round($hasil);
            }
        );
    }
}
