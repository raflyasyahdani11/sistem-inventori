<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\TransaksiMasuk;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTransaksiMasukRequest;
use App\Http\Requests\UpdateTransaksiMasukRequest;

class TransaksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Transaksi Pembelian';
        $data = TransaksiMasuk::with(['barang', 'barang.supplier', 'barang.satuan_barang'])
            ->whereRelation('barang', 'deleted_at', '=', null)
            ->orderBy('tanggal_expired')
            ->get();

        return view('pages.transaction.in.list')
            ->with(compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Transaksi Pembelian';
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
        try {
            DB::beginTransaction();

            $barangId = $request->post('barang');
            $jumlah = (int) $request->post('jumlah');

            TransaksiMasuk::create([
                'jumlah' => $jumlah,
                'jumlah_sekarang' => $jumlah,
                'barang_id' => $request->post('barang'),
                'supplier_id' => $request->post('supplier'),
                'tanggal_masuk' => $request->post('tanggal_masuk'),
                'tanggal_expired' => $request->post('tanggal_expired'),
            ]);

            DB::commit();

            return redirect()
                ->route('in.index')
                ->with('message', 'Berhasil menginput transaksi masuk')
                ->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('in.index')
                ->with('message', $e->getMessage())
                ->with('type', 'danger');
        }
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
