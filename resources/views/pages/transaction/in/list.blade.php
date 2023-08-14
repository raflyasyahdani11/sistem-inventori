@extends('layouts.app')

{{-- @push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush --}}

@push('js')
    @vite('resources/js/pages/transaction/masuk/list.js')
@endpush

@section('button-side')
    <a href="{{ route('in.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Transaksi Pembelian
    </a>
@endsection

@section('content')
    @if (session('message'))
        <div role="alert" @class([
            'alert',
            'alert-dismissible',
            'fade',
            'show',
            'alert-' . session('type'),
        ])>
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
                                        <th class="text-center align-middle">Nama barang</th>
                                        <th class="text-center align-middle">Supplier</th>
                                        <th class="text-center align-middle">Tanggal Masuk</th>
                                        <th class="text-center align-middle">Tanggal Expired</th>
                                        <th class="text-center align-middle">Jumlah</th>
                                        <th class="text-center align-middle">Satuan</th>
                                        {{-- <th width="15%">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->barang->nama }}</td>
                                            <td>{{ $item->barang->supplier->nama }}</td>
                                            <td>{{ date('j F Y', strtotime($item->tanggal_masuk)) }}</td>
                                            <td>{{ date('j F Y', strtotime($item->tanggal_expired)) }}</td>
                                            <td class="text-monospace text-right">
                                                {{ number_format($item->jumlah, 0, ',', '.') }}
                                            </td>
                                            <td>{{ $item->barang->satuan_barang->nama }}</td>
                                            {{-- <td class="text-center">
                                                <a class="btn btn-warning btn-sm">
                                                    <span>
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                <a class="btn btn-danger btn-sm">
                                                    <span>
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                                <a class="btn btn-info btn-sm" 
                                                href="{{ route('barang.show', $loop->iteration) }}">
                                                    <span>
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </a>
                                            </td> --}}
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
