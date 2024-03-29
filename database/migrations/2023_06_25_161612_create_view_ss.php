<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    private string $viewName = "ss_view";
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(
            "CREATE OR REPLACE VIEW $this->viewName AS " .
                "SELECT
                    tk.barang_id,
                    MAX(tk.jumlah) AS penjualan_maksimal,
                    SUM(tk.jumlah) AS kebutuhan_setahun,
                    COUNT(tk.id) AS total_transaksi,
                    YEAR(tanggal_keluar) AS tahun_transaksi
                FROM
                    transaksi_keluar tk
                INNER JOIN barang b ON b.id = tk.barang_id
                GROUP BY
                    barang_id,
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
