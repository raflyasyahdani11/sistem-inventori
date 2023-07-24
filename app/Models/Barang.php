<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'nama', 'kode', 'jumlah', 'id_jenis_barang', 'id_satuan_barang'
    ];

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

    public function rop(): BelongsTo
    {
        return $this->BelongsTo(Rop::class, 'barang_id', 'id');
    }
}
