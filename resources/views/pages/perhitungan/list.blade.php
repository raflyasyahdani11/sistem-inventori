@extends('layouts.app')

@push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush

@push('js')
    @vite('resources/js/pages/perhitungan/list.js')
@endpush

@section('button-side')
    <form class="d-flex" action="{{ route('perhitungan.index') }}" method="get">
        <select class="form-control mr-2" name="year">
            @foreach ($years as $item)
                <option value="{{ $item }}" @selected($item == $year)>
                    {{ $item }}
                </option>
            @endforeach
        </select>
        <button class="btn btn-primary btn-sm">
            <i class="fas fa-sync-alt"></i>
        </button>
    </form>
@endsection

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive overflow-hidden">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" width="3%">No</th>
                                        <th class="text-center align-middle">Nama Produk</th>
                                        <th class="text-center align-middle" width="8%">Stok Sekarang</th>
                                        <th class="text-center align-middle" width="15%">Total Penjualan</th>
                                        <th class="text-center align-middle" width="10%">EOQ</th>
                                        <th class="text-center align-middle" width="10%">SS</th>
                                        <th class="text-center align-middle" width="10%">ROP</th>
                                        <th class="text-center align-middle" width="10%">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->barang->nama }}</td>
                                            <td class="text-right text-monospace">
                                                @if ($item->barang->jumlah > round($item->rop))
                                                    <p class="mb-0 text-success">{{ $item->barang->jumlah }}</p>
                                                @elseif ($item->barang->jumlah == round($item->rop))
                                                    <p class="mb-0 text-warning">{{ $item->barang->jumlah }}</p>
                                                @else
                                                    <p class="mb-0 text-danger">{{ $item->barang->jumlah }}</p>
                                                @endif
                                            </td>
                                            <td class="text-right text-monospace">
                                                {{ number_format($item->kebutuhan_setahun, 0, ',', '.') }}
                                            </td>
                                            <td class="text-right text-monospace">
                                                {{ round($item->eoq) }}
                                            </td>
                                            <td class="text-right text-monospace">
                                                {{ round($item->ss) }}
                                            </td>
                                            <td class="text-right text-monospace">
                                                {{ round($item->rop) }}
                                            </td>
                                            <td class="text-center">
                                                @if ($item->barang->jumlah > round($item->rop))
                                                    <span class="badge badge-success">Safe</span>
                                                @elseif ($item->barang->jumlah == round($item->rop))
                                                    <span class="badge badge-warning">Running Out</span>
                                                @else
                                                    <span class="badge badge-danger">Under Stock</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
