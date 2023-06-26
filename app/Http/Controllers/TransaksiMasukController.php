<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\TransaksiMasuk;
use App\Http\Requests\StoreTransaksiMasukRequest;
use App\Http\Requests\UpdateTransaksiMasukRequest;

class TransaksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Transaksi Masuk';
        $data = TransaksiMasuk::with([
            'supplier', 'barang', 'barang.satuan_barang'
        ])->get();

        return view('pages.transaction.in.list')
            ->with(compact('title'))
            ->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Transaksi Masuk';
        $barang = Barang::all();
        $supplier = Supplier::all();

        return view('pages.transaction.in.add')
            ->with(compact('title'))
            ->with(compact('barang'))
            ->with(compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiMasukRequest $request)
    {
        $transaksi = TransaksiMasuk::create([
            'jumlah' => $request->post('jumlah'),
            'barang_id' => $request->post('barang'),
            'supplier_id' => $request->post('supplier'),
            'tanggal_masuk' => $request->post('tanggal_masuk'),
            'tanggal_expired' => $request->post('tanggal_expired'),
        ]);

        if ($transaksi instanceof TransaksiMasuk) {
            //
        } else {
            //
        }

        return redirect()->route('in.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiMasuk $transaksiMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiMasuk $transaksiMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiMasukRequest $request, TransaksiMasuk $transaksiMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiMasuk $transaksiMasuk)
    {
        //
    }
}
