<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barang';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'kode',
        'harga',
        'id_jenis_barang',
        'id_satuan_barang',
        'id_supplier'
    ];


    protected function jumlah(): Attribute
    {
        return Attribute::make(
            function () {
                $hasil = $this
                    ->transaksi_masuk
                    ->where('tanggal_expired', '>=', Carbon::now()->hours(0)->minutes(0)->seconds(0))
                    ->sum('jumlah_sekarang');

                return $hasil;
            }
        );
    }

    public function jenis_barang(): BelongsTo
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang', 'id');
    }

    public function satuan_barang(): BelongsTo
    {
        return $this->belongsTo(SatuanBarang::class, 'id_satuan_barang', 'id');
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }

    public function perhitungan(): HasMany
    {
        return $this->hasMany(Perhitungan::class, 'barang_id', 'id');
    }

    public function transaksi_masuk(): HasMany
    {
        return $this->hasMany(TransaksiMasuk::class, 'barang_id', 'id');
    }

    public function transaksi_keluar(): HasMany
    {
        return $this->hasMany(TransaksiKeluar::class, 'barang_id', 'id');
    }
}