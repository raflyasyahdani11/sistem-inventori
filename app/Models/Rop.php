<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rop extends Model
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
                $kebutuhanSetahun = $this->kebutuhan_setahun;
                $totalTransaksi = $this->total_transaksi;
                $penjualanMax = $this->penjualan_maksimal;
                $leadTime = $this->barang->supplier->lead_time;

                $hasil = round(($penjualanMax - ($kebutuhanSetahun / $totalTransaksi)) * $leadTime);

                return $hasil;
            }
        );
    }

    protected function hasil(): Attribute
    {
        return Attribute::make(
            function () {
                $kebutuhanSetahun = $this->kebutuhan_setahun;
                $totalTransaksi = $this->total_transaksi;
                $penjualanMax = $this->penjualan_maksimal;
                $leadTime = $this->barang->supplier->lead_time;

                // $dayInYear = (int) date('z', mktime(0, 0, 0, 12, 31, $this->tahun_transaksi)) + 1;
                // $hasil = $this->ss + ($this->barang->supplier->lead_time * (int) $this->kebutuhan_setahun / $dayInYear);

                $hasil = round((($kebutuhanSetahun / $totalTransaksi / 30) * $leadTime) + $this->ss);

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
                return $hasil;
            }
        );
    }
}
