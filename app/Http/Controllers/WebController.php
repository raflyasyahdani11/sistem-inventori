<?php

namespace App\Http\Controllers;

use App\Models\Ss;
use App\Models\Eoq;
use App\Models\Rop;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\TransaksiMasuk;
use App\Models\TransaksiKeluar;
use App\Exports\TransaksiKeluarExport;
use App\Http\Requests\DownloadReportTransactionInRequest;
use App\Http\Requests\DownloadReportTransactionOutRequest;
use Maatwebsite\Excel\Facades\Excel;

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

        return view('pages.dashboard')
            ->with(compact('title', 'count'));
    }

    public function showReportIndex()
    {
        $title = 'Laporan Transaksi';

        return view('pages.report.index')
            ->with(compact('title'));
    }

    public function showLogin()
    {
        $title = 'Login';

        return view('pages.auth.login')
            ->with(compact('title'));
    }

    public function showPerhitunganEoq(Request $request)
    {
        $title = 'Perhitungan EOQ';

        $yearNow = (int) date('Y') - 1;
        $year = $request->get('year', $yearNow);

        $years = Eoq::select('tahun_transaksi')
            ->distinct()
            ->orderBy('tahun_transaksi', 'desc')
            ->pluck('tahun_transaksi')
            ->except([$yearNow])
            ->toArray();

        $data = Eoq::with(['barang', 'supplier'])
            ->where('tahun_transaksi', $year)
            ->orderBy('barang_id')
            ->get();

        return view('pages.perhitungan.eoq.list')
            ->with(compact('title', 'data', 'years', 'year'));
    }

    public function showPerhitunganSs(Request $request)
    {
        $title = 'Perhitungan SS';

        $yearNow = (int) date('Y') - 1;
        $year = $request->get('year', $yearNow);

        $years = Ss::select('tahun_transaksi')
            ->distinct()
            ->orderBy('tahun_transaksi', 'desc')
            ->pluck('tahun_transaksi')
            ->except([$yearNow])
            ->toArray();

        $data = Ss::where('tahun_transaksi', $year)
            ->orderBy('barang_id')
            ->get();

        return view('pages.perhitungan.ss.list')
            ->with(compact('title', 'data', 'years', 'year'));
    }

    public function showPerhitunganRop(Request $request)
    {
        $title = 'Perhitungan ROP';

        $yearNow = (int) date('Y') - 1;
        $year = $request->get('year', $yearNow);

        $data = Rop::where('tahun_transaksi', $year)
            ->orderBy('barang_id')
            ->get();

        $years = Rop::select('tahun_transaksi')
            ->distinct()
            ->orderBy('tahun_transaksi', 'desc')
            ->pluck('tahun_transaksi')
            ->except([$yearNow])
            ->toArray();


        return view('pages.perhitungan.rop.list')
            ->with(compact('title', 'data', 'years', 'year'));
    }

    public function readNotification(string $notification)
    {
        $notification = auth()->user()->notifications()->find($notification);

        if ($notification) $notification->markAsRead();

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

        $transaksiKeluar = TransaksiKeluar::with(['barang', 'supplier'])
            ->whereBetween('tanggal_keluar', [$from, $to])
            ->get()
            ->map(function ($value) {
                return [
                    'kode_barang' => $value->barang->kode,
                    'nama_barang' => $value->barang->nama,
                    'nama_supplier' => $value->supplier->nama,
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

      $transaksiMasuk = TransaksiMasuk::with(['barang', 'supplier'])
         ->whereBetween('tanggal_masuk', [$from, $to])
         ->get()
         ->map(function ($value) {
            return [
               'kode_barang' => $value->barang->kode,
               'nama_barang' => $value->barang->nama,
               'nama_supplier' => $value->supplier->nama,
               'jumlah_barang' => $value->jumlah,
               'tanggal_masuk' => $value->tanggal_masuk,
               'tanggal_expired' => $value->tanggal_expired,
            ];
         })
         ->toArray();

      $fileExport = new TransaksiMasuk($transaksiMasuk);
      $fileName = "transaksi_masuk.xlsx";
      $response = Excel::download($fileExport, $fileName);
      ob_end_clean();

      return $response;
   }
}
