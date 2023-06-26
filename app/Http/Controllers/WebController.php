<?php

namespace App\Http\Controllers;

use App\Models\Eoq;
use App\Models\Rop;
use App\Models\Ss;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\TransaksiMasuk;
use App\Models\TransaksiKeluar;
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
}
