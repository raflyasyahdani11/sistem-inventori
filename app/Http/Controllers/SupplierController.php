<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Data Supplier';
        $data = Supplier::all();

        return view('pages.data.supplier.list')
            ->with(compact('title'))
            ->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Data Supplier';

        return view('pages.data.supplier.add')
            ->with(compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $supplier = Supplier::create([
            'nama' => $request->post('nama'),
            'alamat' => $request->post('alamat'),
            'telepon' => $request->post('telepon'),
            'biaya_kirim' => $request->post('biaya_kirim'),
            'lead_time' => $request->post('lead_time'),
        ]);

        if ($supplier instanceof Supplier) {
        } else {
        }

        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $title = 'Edit Data Supplier';

        return view('pages.data.supplier.edit')
            ->with(compact('title'))
            ->with(compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $updatedRow = $supplier->update([
            'nama' => $request->post('nama'),
            'alamat' => $request->post('alamat'),
            'telepon' => $request->post('telepon'),
            'biaya_kirim' => $request->post('biaya_kirim'),
        ]);

        if ($updatedRow > 0) {
            // Berhasil Update
        } else {
            // Gagal Update
        }

        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $isDeleted = $supplier->delete();

        if ($isDeleted) {
            // Berhasil Delete
        } else {
            // Gagal Delete
        }

        return redirect()->route('supplier.index');
    }
}
