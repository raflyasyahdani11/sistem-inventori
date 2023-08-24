@extends('layouts.app')

{{-- @push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush --}}

@push('js')
    @vite('resources/js/pages/data/barang/expired.js')
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
                                        <th class="text-center align-middle" width="3%">No</th>
                                        <th class="text-center align-middle">Kode</th>
                                        <th class="text-center align-middle">Nama Barang</th>
                                        <th class="text-center align-middle">Tanggal Expired</th>
                                        <th class="text-center align-middle">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->barang->kode }}</td>
                                            <td>{{ $item->barang->nama }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal_expired)->translatedFormat('d F Y') }}</td>
                                            <td class="text-right text-monospace">{{ $item->jumlah }}</td>
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
