<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Data Barang';
        $data = Barang::with(['jenis_barang', 'satuan_barang'])->get();

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

        return view('pages.data.barang.add')
            ->with(compact('title', 'jenisBarang', 'satuanBarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $barang = Barang::create([
            'kode' => $request->post('kode'),
            'nama' => $request->post('nama'),
            'jumlah' => $request->post('jumlah'),
            'id_jenis_barang' => $request->post('jenis'),
            'id_satuan_barang' => $request->post('satuan'),
        ]);

        if ($barang instanceof Barang) {
            // Berhasil Insert DB
        } else {
            // Gagal Insert DB
        }

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
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
            ->with(compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $title = 'Edit Data Barang';

        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();

        return view('pages.data.barang.edit')
            ->with(compact('title'))
            ->with(compact('barang'))
            ->with(compact('jenisBarang'))
            ->with(compact('satuanBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $updatedRow = $barang->update([
            'nama' => $request->post('nama'),
            'jumlah' => $request->post('jumlah'),
            'id_jenis_barang' => $request->post('jenis'),
            'id_satuan_barang' => $request->post('satuan'),
        ]);

        if ($updatedRow > 0) {
            // Berhasil Update
        } else {
            // Gagal Update
        }

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $isDeleted = $barang->delete();

        if ($isDeleted) {
            // Berhasil Delete
        } else {
            // Gagal Delete
        }

        return redirect()->route('barang.index');
    }
}
