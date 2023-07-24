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

    function supplier(): HasOne
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    protected function ss(): Attribute
    {
        return Attribute::make(
            function () {
                $dayInYear = (int) date('z', mktime(0, 0, 0, 12, 31, $this->tahun_transaksi)) + 1;
                $hasil = (int) $this->kebutuhan_setahun / $dayInYear * $this->barang->supplier->lead_time;

                return $hasil;
            }
        );
    }


    protected function hasil(): Attribute
    {
        return Attribute::make(
            function () {
                $dayInYear = (int) date('z', mktime(0, 0, 0, 12, 31, $this->tahun_transaksi)) + 1;
                $hasil = $this->ss + ($this->barang->supplier->lead_time * (int) $this->kebutuhan_setahun / $dayInYear);

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
