<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rop extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ss_view';

    protected $with = ['supplier', 'barang'];
    
    protected function ss(): Attribute
    {
        return Attribute::make(
            function () {
                $dayInYear = (int) date('z', mktime(0, 0, 0, 12, 31, $this->tahun_transaksi)) + 1;
                $hasil = (int) $this->kebutuhan_setahun / $dayInYear * $this->supplier->lead_time;

                return $hasil;
            }
        );
    }

    function barang(): HasOne
    {
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }

    function supplier(): HasOne
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    protected function hasil(): Attribute
    {
        return Attribute::make(
            function () {
                $dayInYear = (int) date('z', mktime(0, 0, 0, 12, 31, $this->tahun_transaksi)) + 1;
                $hasil = $this->ss + ($this->supplier->lead_time * (int) $this->kebutuhan_setahun / $dayInYear);

                return $hasil;
            }
        );
    }
}
