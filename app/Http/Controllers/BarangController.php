<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Supplier;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Data Barang';
        $data = Barang::with(['jenis_barang', 'satuan_barang', 'supplier', 'transaksi_masuk'])->get();

        return view('pages.data.barang.list')
            ->with(compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Data Barang';

        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();
        $supplier = Supplier::all();

        return view('pages.data.barang.add')
            ->with(compact('title', 'jenisBarang', 'satuanBarang', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $validatedRequest = $request->validated();

        $barang = Barang::create([
            'kode' => $validatedRequest['kode'],
            'nama' => $validatedRequest['nama'],
            'harga' => $validatedRequest['harga'],
            // 'jumlah' => $validatedRequest['jumlah'],
            'id_jenis_barang' => $validatedRequest['jenis'],
            'id_satuan_barang' => $validatedRequest['satuan'],
            'id_supplier' => $validatedRequest['supplier']
        ]);

        $message = 'Barang telah ditambahkan!';
        $type = 'success';
        $title = 'Berhasil';

        if (!($barang instanceof Barang)) {
            $message = 'Barang gagal ditambahkan!';
            $type = 'danger';
            $title = 'Gagal';
        }

        return redirect()->route('barang.index')
            ->with(compact('message', 'type', 'title'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        $title = 'Detail Data Barang';
        $data = [
            (object) [
                'periode' => 'Tahun',
                'nama_barang' => 'Diso',
                'jumlah_permintaan' => 600,
                'eoq' => 109,
                'ss' => 55,
                'rop' => 216,
                'range_waktu_pemesanan_kembali' => 6,
            ],
            (object) [
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
            ->with(compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $title = 'Edit Data Barang';

        $supplier = Supplier::all();
        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();

        return view('pages.data.barang.edit')
            ->with(compact('title'))
            ->with(compact('barang', 'jenisBarang', 'satuanBarang', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $updatedRow = $barang->update([
            'nama' => $request->post('nama'),
            // 'jumlah' => $request->post('jumlah'),
            'harga' => $request->post('harga'),
            'id_jenis_barang' => $request->post('jenis'),
            'id_satuan_barang' => $request->post('satuan'),
            'id_supplier' => $request->post('supplier'),
        ]);


        $message = 'Barang telah diupdate!';
        $type = 'success';
        $title = 'Berhasil';

        if ($updatedRow === 0) {
            $message = 'Barang gagal diupdate!';
            $type = 'danger';
            $title = 'Gagal';
        }

        return redirect()->route('barang.index')
            ->with(compact('message', 'type', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $hasTransactionBuy = $barang->transaksi_masuk->count() > 0;
        $hasTransactionSell = $barang->transaksi_keluar->count() > 0;


        if ($hasTransactionSell || $hasTransactionBuy) {
            $message = 'Barang punya transaksi!';
            $type = 'danger';
            $title = 'Gagal';

            return redirect()->route('barang.index')
                ->with(compact('message', 'type', 'title'));
        }

        $message = 'Barang telah dihapus!';
        $type = 'success';
        $title = 'Berhasil';

        $isDeleted = $barang->delete();

        if (!$isDeleted) {
            $message = 'Gagal Menghapus barang!';
            $type = 'danger';
            $title = 'Gagal';
        }

        return redirect()->route('barang.index')
            ->with(compact('message', 'type', 'title'));
    }
}