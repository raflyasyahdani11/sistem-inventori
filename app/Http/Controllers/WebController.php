<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function showDashboard()
    {
        $title = 'Dashboard';

        return view('pages.dashboard')->with(compact('title'));
    }

    public function showListUser()
    {
        $title = 'Daftar Pengguna';
        $data = [
            (object)[
                'nama' => 'Diso',
                'no_hp' => '082121491284',
                'username' =>  'diso.diso.diso'
            ],
            (object)[
                'nama' => 'Sinto',
                'no_hp' => '082289512212',
                'username' =>  'sinto.sinto.sinto'
            ],
        ];

        return view('pages.user.list')
            ->with(compact('title'))
            ->with(compact('data'));
    }

    public function showAddUser()
    {
        $title = 'Tambah Pengguna';

        return view('pages.user.add')->with(compact('title'));
    }

    public function showDataBarang()
    {
        $title = 'List Data Barang';
        $data = [
            (object)[
                'tanggal_expired' => '22-07-20223',
                'nama_barang' => 'Diso',
                'jenis_barang' => 'Manusia',
                'jumlah_barang' => '1',
                'satuan' => 'Orang',
            ],
            (object)[
                'tanggal_expired' => '22-07-20223',
                'nama_barang' => 'Sinto',
                'jenis_barang' => 'Manusia',
                'jumlah_barang' => '1',
                'satuan' => 'Orang',
            ],
        ];

        return view('pages.data.barang.list')
            ->with(compact('title'))
            ->with(compact('data'));
    }

    public function showAddDataBarang()
    {
        $title = 'Add Data Barang';

        return view('pages.data.barang.add')
            ->with(compact('title'));
    }

    public function showDetailDataBarang($id)
    {
        $title = 'Detail Data Barang';
        $data = [
            (object)[
                'periode' => 'Tahun',
                'nama_barang' => 'Diso',
                'jumlah_permintaan' => 600,
                'eoq' => 109,
                'ss' => 55,
                'rop' => 216,
                'range_waktu_pemesanan_kembali' => 6,
            ],
            (object)[
                'periode' => 'Tahun',
                'nama_barang' => 'Sinto',
                'jumlah_permintaan' => 230,
                'eoq' => 219,
                'ss' => 59,
                'rop' => 186,
                'range_waktu_pemesanan_kembali' => 9,
            ],
        ];

        return view('pages.data.barang.detail')
            ->with(compact('title'))
            ->with(compact('data'));
    }

    public function showDataSupplier()
    {
        $title = 'List Data Supplier';
        $data = [
            (object)[
                'nama_supplier' => 'PT Diso Pekanbaru Distribusindo',
                'alamat' => 'Jl. Manuk Biru No.1',
                'telepon' => '076132789',
            ],
            (object)[
                'nama_supplier' => 'PT Sinto Pekanbaru Distribusindo',
                'alamat' => 'Jl. Toko Oren No.2',
                'telepon' => '076132789',
            ],
        ];

        return view('pages.data.supplier.list')
            ->with(compact('title'))
            ->with(compact('data'));
    }

    public function showAddDataSupplier()
    {
        $title = 'Add Data Supplier';

        return view('pages.data.supplier.add')
            ->with(compact('title'));
    }

    public function showInTransaction()
    {
        $title = 'List Transaksi Masuk';
        $data = [
            (object)[
                'tanggal_masuk' => '21-08-2023',
                'nama' => 'Diso',
                'tanggl_expired' => '21-09-2023',
                'pengirim' => 'Pt Sinto Distribusindo',
                'jumlah' => '4',
                'satuan' => 'Orang',
            ]
        ];

        return view('pages.transaction.in.list')
            ->with(compact('title'))
            ->with(compact('data'));
    }

    public function showInTransactionAdd()
    {
        $title = 'Add Transaksi Masuk';

        return view('pages.transaction.in.add')
            ->with(compact('title'));
    }

    public function showOutTransaction()
    {
        $title = 'List Transaksi Keluar';
        $data = [
            (object)[
                'tanggal_keluar' => '21-08-2023',
                'nama' => 'Diso',
                'tanggl_expired' => '21-09-2023',
                'pengirim' => 'Pt Sinto Distribusindo',
                'jumlah' => '4',
                'satuan' => 'Orang',
            ]
        ];

        return view('pages.transaction.out.list')
            ->with(compact('title'))
            ->with(compact('data'));
    }

    public function showOutTransactionAdd()
    {
        $title = 'Add Transaksi Keluar';

        return view('pages.transaction.out.add')
            ->with(compact('title'));
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

        return view('pages.auth.login')->with(compact('title'));
    }
}
