<?php

namespace App\Http\Controllers;

use App\Models\Rop;
use App\Models\User;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\TransaksiKeluar;
use App\Notifications\RestockItem;
use Illuminate\Support\Facades\DB;
use App\Events\TransactionOutSuccessful;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreTransaksiKeluarRequest;
use App\Http\Requests\UpdateTransaksiKeluarRequest;

class TransaksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Transaksi Keluar';
        $data = TransaksiKeluar::with(['barang', 'barang.supplier'])
            ->orderBy('tanggal_expired', 'asc')
            ->get();

        return view('pages.transaction.out.list')
            ->with(compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Transaksi Keluar';
        $barang = Barang::all();
        $supplier = Supplier::all();

        return view('pages.transaction.out.add')
            ->with(compact('title'))
            ->with(compact('barang'))
            ->with(compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiKeluarRequest $request)
    {
        try {
            DB::beginTransaction();

            $barangId = $request->post('barang');
            $jumlah = (int) $request->post('jumlah');

            $barang = Barang::find($barangId);

            if ($jumlah > $barang->jumlah) {
                throw new \Exception("Stock barang kurang dari $jumlah");
            }

            $barang->jumlah = $barang->jumlah - $jumlah;

            $transaksiKeluar = TransaksiKeluar::create([
                'jumlah' => $request->post('jumlah'),
                'barang_id' => $request->post('barang'),
                'supplier_id' => $request->post('supplier'),
                'tanggal_keluar' => $request->post('tanggal_keluar'),
                'tanggal_expired' => $request->post('tanggal_expired'),
            ]);

            $barang->save();

            TransactionOutSuccessful::dispatch($transaksiKeluar);

            DB::commit();

            return redirect()
                ->route('out.index')
                ->with('message', 'Berhasil menginput transaksi keluar')
                ->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollback();

            if ($e instanceof ValidationException) {
                return redirect()
                    ->back()
                    ->withErrors($e->errors())
                    ->withInput();
            }

            return redirect()
                ->route('out.index')
                ->with('message', $e->getMessage())
                ->with('type', 'danger');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiKeluar $transaksiKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiKeluar $transaksiKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiKeluarRequest $request, TransaksiKeluar $transaksiKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiKeluar $transaksiKeluar)
    {
        //
    }
}
