@extends('layouts.app')

@push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush

@push('js')
    @vite('resources/js/pages/transaction/masuk/list.js')
@endpush

@section('button-side')
    <a href="{{ route('transaction.in.add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Transaksi Masuk 
    </a>
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
                                        <th width="3%">No</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Nama</th>
                                        <th>Tanggl Expired</th>
                                        <th>Pengirim</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tanggal_masuk }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tanggl_expired }}</td>
                                            <td>{{ $item->pengirim }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->satuan }}</td>
                                            <td class="text-center">
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
                                                href="{{ route('data.barang.detail', $loop->iteration) }}">
                                                    <span>
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </a>
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
