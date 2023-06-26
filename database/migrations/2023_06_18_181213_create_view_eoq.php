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
                "SELECT
                    tk.barang_id,
                    tk.supplier_id,
                    SUM(tk.jumlah) AS kebutuhan_satu_tahun,
                    s.biaya_kirim AS biaya_kirim,
                    s.biaya_kirim * 0.1 AS biaya_simpan,
                    SQRT((s.lead_time * SUM(tk.jumlah) * s.biaya_kirim / (s.biaya_kirim * 0.1))) AS hasil,
                    YEAR(tanggal_keluar) as tahun_transaksi
                FROM
                    transaksi_keluar tk
                INNER JOIN barang b ON
                    b.id = tk.barang_id
                INNER JOIN supplier s ON
                    s.id = tk.supplier_id
                GROUP BY
                    barang_id, 
                    supplier_id, 
                    YEAR(tanggal_keluar)"
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
