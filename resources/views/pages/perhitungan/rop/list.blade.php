@extends('layouts.app')

@push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush

@push('js')
    @vite('resources/js/pages/perhitungan/eoq/list.js')
@endpush

@section('button-side')
    <form class="d-flex" action="{{ route('perhitungan.rop') }}" method="get">
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
                                        <th class="text-center align-middle">SS</th>
                                        <th class="text-center align-middle" width="15%">Lead Time</th>
                                        <th class="text-center align-middle" width="15%">Kebutuhan Tahunan</th>
                                        <th class="text-center align-middle" width="15%">Jumlah Hari Dalam Setahun</th>
                                        <th class="text-center align-middle">Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->barang->nama }}</td>
                                            <td class="text-right text-monospace">
                                                {{ round($item->ss) }}
                                            </td>
                                            <td class="text-right text-monospace">
                                                {{ $item->supplier->lead_time }}
                                            </td>
                                            <td class="text-right text-monospace">
                                                {{ number_format($item->kebutuhan_setahun, 0, ',', '.') }}</td>
                                            <td class="text-right text-monospace">
                                                {{ date('z', mktime(0, 0, 0, 12, 31, $item->tahun_transaksi)) + 1 }}</td>
                                            <td class="text-right text-monospace">{{ round($item->hasil) }}</td>
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
