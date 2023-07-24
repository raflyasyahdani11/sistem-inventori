<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    private string $viewName = "eoq_view";
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(
            "CREATE OR REPLACE VIEW $this->viewName AS " .
                'SELECT
                    tk.barang_id,
                    SUM(tk.jumlah) AS kebutuhan_satu_tahun,
                    b.harga AS harga,
                    b.harga * 0.1 AS biaya_simpan,
                    SQRT((2 * SUM(tk.jumlah) * s.biaya_kirim / (b.harga * 0.1))) AS hasil,
                    YEAR(tanggal_keluar) as tahun_transaksi
                FROM
                    transaksi_keluar tk
                INNER JOIN barang b ON b.id = tk.barang_id
                INNER JOIN supplier s ON s.id = b.id_supplier
                GROUP BY
                    barang_id,
                    b.id_supplier,
                    YEAR(tanggal_keluar)'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW $this->viewName");
    }
};
