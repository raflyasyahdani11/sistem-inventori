<?php

namespace App\Http\Controllers;

use App\Models\Ss;
use App\Models\Eoq;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Perhitungan;
use Illuminate\Http\Request;
use App\Models\TransaksiMasuk;
use App\Models\TransaksiKeluar;
use App\Notifications\ExpiredItem;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaksiMasukExport;
use App\Exports\TransaksiKeluarExport;
use App\Http\Requests\DownloadReportTransactionInRequest;
use App\Http\Requests\DownloadReportTransactionOutRequest;
use App\Models\Barang;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function showDashboard()
    {
        $title = 'Dashboard';
        $count = (object)[
            'user' => User::count(),
            'supplier' => Supplier::count(),
            'trx_in' => TransaksiMasuk::count(),
            'trx_out' => TransaksiKeluar::count(),
        ];

        $barangTerlaris = DB::table('transaksi_keluar')
            ->selectRaw('SUM(jumlah) as jumlah, barang.nama')
            ->groupBy('barang_id', 'barang.nama')
            ->whereBetween('tanggal_keluar', [
                Carbon::now()->firstOfMonth()->toDateTimeString(),
                Carbon::now()->hours(23)->minutes(59)->seconds(59)->toDateTimeString(),
            ])
            ->orderByDesc('jumlah')
            ->join('barang', 'barang.id', '=', 'transaksi_keluar.barang_id')
            ->limit(10)
            ->get();

        $barangTerbanyak = Barang::with(['transaksi_masuk'])
            ->get()
            ->sortByDesc('jumlah')
            ->take(5)
            ->map(function ($barang) {
                return (object)[
                    'jumlah' => $barang->jumlah,
                    'nama' => $barang->nama,
                ];
            })
            ->values();

        return view('pages.dashboard')
            ->with(compact('title', 'count', 'barangTerlaris', 'barangTerbanyak'));
    }

    public function showReportIndex()
    {
        $title = 'Laporan Transaksi';

        return view('pages.report.index')
            ->with(compact('title'));
    }

    public function showReportKeluar()
    {
        $title = 'Laporan Transaksi Penjualan';

        return view('pages.report.keluar.index')
            ->with(compact('title'));
    }

    public function showReportMasuk()
    {
        $title = 'Laporan Transaksi Pembelian';

        return view('pages.report.masuk.index')
            ->with(compact('title'));
    }

    public function showLogin()
    {
        $title = 'Login';

        return view('pages.auth.login')
            ->with(compact('title'));
    }

    // public function showPerhitunganEoq(Request $request)
    // {
    //     $title = 'Perhitungan EOQ';

    //     $yearNow = (int) date('Y');
    //     $yearsAgo = $yearNow - 1;
    //     $year = $request->get('year', $yearsAgo);

    //     $years = Eoq::select('tahun_transaksi')
    //         ->distinct()
    //         ->orderBy('tahun_transaksi', 'desc')
    //         ->pluck('tahun_transaksi')
    //         ->reject(function (int $value, int $key) use ($yearNow) {
    //             return $value == $yearNow;
    //         })
    //         ->toArray();

    //     $data = Eoq::with(['barang', 'supplier'])
    //         ->where('tahun_transaksi', $year)
    //         ->orderBy('barang_id')
    //         ->get();

    //     return view('pages.perhitungan.eoq.list')
    //         ->with(compact('title', 'data', 'years', 'year'));
    // }

    // public function showPerhitunganSs(Request $request)
    // {
    //     $title = 'Perhitungan SS';

    //     $yearNow = (int) date('Y');
    //     $yearsAgo = $yearNow - 1;
    //     $year = $request->get('year', $yearsAgo);

    //     $years = Ss::select('tahun_transaksi')
    //         ->distinct()
    //         ->orderBy('tahun_transaksi', 'desc')
    //         ->pluck('tahun_transaksi')
    //         ->reject(function (int $value, int $key) use ($yearNow) {
    //             return $value == $yearNow;
    //         })
    //         ->toArray();

    //     $data = Ss::where('tahun_transaksi', $year)
    //         ->orderBy('barang_id')
    //         ->get();

    //     return view('pages.perhitungan.ss.list')
    //         ->with(compact('title', 'data', 'years', 'year'));
    // }

    public function showPerhitunganRop(Request $request)
    {
        $title = 'Perhitungan ROP';

        $yearNow = (int) date('Y');
        $yearsAgo = $yearNow - 1;
        $year = $request->get('year', $yearsAgo);

        $data = Perhitungan::where('tahun_transaksi', $year)
            ->orderBy('barang_id')
            ->get();

        $years = Perhitungan::select('tahun_transaksi')
            ->distinct()
            ->orderBy('tahun_transaksi', 'desc')
            ->pluck('tahun_transaksi')
            ->reject(function (int $value, int $key) use ($yearNow) {
                return $value == $yearNow;
            })
            ->toArray();

        return view('pages.perhitungan.rop.list')
            ->with(compact('title', 'data', 'years', 'year'));
    }

    public function showPerhitungan(Request $request)
    {
        $title = 'Perhitungan';

        $yearNow = (int) date('Y');
        $yearsAgo = $yearNow - 1;
        $year = $request->get('year', $yearsAgo);

        $data = Perhitungan::where('tahun_transaksi', $year)
            ->orderBy('barang_id')
            ->get();

        $years = Perhitungan::select('tahun_transaksi')
            ->distinct()
            ->orderBy('tahun_transaksi', 'desc')
            ->pluck('tahun_transaksi')
            ->reject(function (int $value, int $key) use ($yearNow) {
                return $value == $yearNow;
            })
            ->toArray();

        return view('pages.perhitungan.list')
            ->with(compact('title', 'data', 'years', 'year'));
    }

    public function readNotification(string $notification)
    {
        $notification = auth()->user()->notifications()->find($notification);

        if ($notification) $notification->markAsRead();

        if ($notification->type == ExpiredItem::class)
            return redirect()->route('in.index');

        return redirect()->back();
    }

    public function downloadReportTransactionOut(DownloadReportTransactionOutRequest $request)
    {
        $validatedRequest = $request->validated();

        $tahun = $validatedRequest['tahun'];
        $bulan = $validatedRequest['bulan'];
        $bulanString = str_pad($bulan, 2, '0', STR_PAD_LEFT); // dari 1, 2, 3 -> jadi 01, 02, 03

        $date = \Carbon\Carbon::parse("$tahun-$bulanString-01");

        $from = $date->toDateString();
        $to = $date->endOfMonth()->toDateString();

        $transaksiKeluar = TransaksiKeluar::with(['barang', 'barang.supplier'])
            ->whereBetween('tanggal_keluar', [$from, $to])
            ->get()
            ->map(function ($value) {
                return [
                    'kode_barang' => $value->barang->kode,
                    'nama_barang' => $value->barang->nama,
                    'nama_supplier' => $value->barang->supplier->nama,
                    'jumlah_barang' => $value->jumlah,
                    'tanggal_keluar' => $value->tanggal_keluar,
                    'tanggal_expired' => $value->tanggal_expired,
                ];
            })
            ->toArray();

        $fileExport = new TransaksiKeluarExport($transaksiKeluar);
        $fileName = "transaksi_keluar.xlsx";
        $response = Excel::download($fileExport, $fileName);
        ob_end_clean();

        return $response;
    }

    public function downloadReportTransactionIn(DownloadReportTransactionInRequest $request)
    {
        $validatedRequest = $request->validated();

        $tahun = $validatedRequest['tahun'];
        $bulan = $validatedRequest['bulan'];
        $bulanString = str_pad($bulan, 2, '0', STR_PAD_LEFT); // dari 1, 2, 3 -> jadi 01, 02, 03

        $date = \Carbon\Carbon::parse("$tahun-$bulanString-01");

        $from = $date->toDateString();
        $to = $date->endOfMonth()->toDateString();

        $transaksiMasuk = TransaksiMasuk::with(['barang', 'barang.supplier'])
            ->whereBetween('tanggal_masuk', [$from, $to])
            ->get()
            ->map(function ($value) {
                return [
                    'kode_barang' => $value->barang->kode,
                    'nama_barang' => $value->barang->nama,
                    'nama_supplier' => $value->barang->supplier->nama,
                    'jumlah_barang' => $value->jumlah,
                    'tanggal_masuk' => $value->tanggal_masuk,
                    'tanggal_expired' => $value->tanggal_expired,
                ];
            })
            ->toArray();

        $fileExport = new TransaksiMasukExport($transaksiMasuk);
        $fileName = "transaksi_masuk.xlsx";
        $response = Excel::download($fileExport, $fileName);
        ob_end_clean();

        return $response;
    }
}
