@extends('layouts.app')

@push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush

@push('js')
    @vite('resources/js/pages/data/barang/detail.js')
@endpush

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
                                        <th>Periode</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Permintaan</th>
                                        <th>EOQ</th>
                                        <th>SS</th>
                                        <th>ROP</th>
                                        <th>Range Waktu Pemesanan Kembali</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->periode }}</td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->jumlah_permintaan }}</td>
                                            <td>{{ $item->eoq }}</td>
                                            <td>{{ $item->ss }}</td>
                                            <td>{{ $item->rop }}</td>
                                            <td>{{ $item->range_waktu_pemesanan_kembali }}</td>
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
