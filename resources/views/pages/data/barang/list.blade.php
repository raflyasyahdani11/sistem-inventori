@extends('layouts.app')

{{-- @push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush --}}

@push('js')
    @vite('resources/js/pages/data/barang/list.js')
@endpush

@section('button-side')
    <div>
        <a href="{{ route('barang.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Data Barang
        </a>
        <a href="{{ route('barang.expired') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class='bx bxs-band-aid'></i> List Expired
        </a>
    </div>
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
                                        <th class="text-center align-middle" width="12%">Kode Barang</th>
                                        <th class="text-center align-middle">Nama Barang</th>
                                        <th class="text-center align-middle">Jenis Barang</th>
                                        <th class="text-center align-middle">Harga Beli</th>
                                        <th class="text-center align-middle" width="8%">Stok Barang</th>
                                        <th class="text-center align-middle">Satuan</th>
                                        <th class="text-center align-middle">Supplier</th>
                                        <th class="text-center align-middle" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-monospace">{{ $item->kode }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis_barang->nama }}</td>
                                            <td>
                                                <div class="d-flex justify-content-between text-monospace">
                                                    <span>Rp.</span>
                                                    <span>{{ number_format($item->harga, 0, ',', '.') }}</span>
                                                </div>
                                            </td>
                                            <td class="text-monospace text-right">
                                                {{ number_format($item->jumlah, 0, ',', '.') }}
                                            </td>
                                            <td>{{ $item->satuan_barang->nama }}</td>
                                            <td>{{ $item->supplier->nama }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-warning btn-sm" href="{{ route('barang.edit', $item) }}">
                                                    <span>
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                <form class="d-inline formDelete" method="post"
                                                    action="{{ route('barang.destroy', $item) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <span>
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                                {{-- <a class="btn btn-info btn-sm" href="{{ route('barang.show', $item) }}">
                                                    <span>
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </a> --}}
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
