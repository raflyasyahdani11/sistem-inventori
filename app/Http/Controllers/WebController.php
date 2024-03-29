<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Supplier;
use App\Models\Perhitungan;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $count = (object) [
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
                return (object) [
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
            ->whereRelation('barang', 'deleted_at', '=', null)
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

        if ($notification)
            $notification->markAsRead();

        if ($notification->type == ExpiredItem::class)
            return redirect()->route('in.index');

        return redirect()->back();
    }

    public function downloadReportTransactionIn(DownloadReportTransactionInRequest $request)
    {
        $from = $request->post('dari_tanggal');
        $to = $request->post('sampai_tanggal');

        $transaksiMasuk = TransaksiMasuk::with(['barang', 'barang.supplier'])
            ->whereBetween('tanggal_masuk', [
                Carbon::parse($from),
                Carbon::parse($to),
            ])
            ->orderBy('tanggal_masuk')
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

        $data = $transaksiMasuk;
        $pdf = Pdf::loadView('exports.transaksi_masuk', compact('data'));

        return $pdf->download('transaksi_pembelian.pdf');
    }

    public function downloadReportTransactionOut(DownloadReportTransactionOutRequest $request)
    {
        $from = $request->post('dari_tanggal');
        $to = $request->post('sampai_tanggal');

        $transaksiKeluar = TransaksiKeluar::with(['barang', 'barang.supplier'])
            ->whereBetween('tanggal_keluar', [
                Carbon::parse($from),
                Carbon::parse($to),
            ])
            ->orderBy('tanggal_keluar')
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

        $data = $transaksiKeluar;
        $pdf = Pdf::loadView('exports.transaksi_keluar', compact('data'));

        return $pdf->download('transaksi_penjualan.pdf');
    }

    public function showBarangExpired()
    {
        $title = 'List Barang Expired';

        $data = TransaksiMasuk::with(['barang'])
            ->where('tanggal_expired', '<=', Carbon::now()->setHours(0)->setMinutes(0)->setSeconds(1))
            ->orderByDesc('tanggal_expired')
            ->get();

        return view('pages.data.barang.expired')
            ->with(compact('title', 'data'));
    }
}