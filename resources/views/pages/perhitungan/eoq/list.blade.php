@extends('layouts.app')

@push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush

@push('js')
    @vite('resources/js/pages/perhitungan/eoq/list.js')
@endpush

@section('button-side')
    <form class="d-flex" action="{{ route('perhitungan.eoq') }}" method="get">
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
                                        <th class="align-middle" width="3%">No</th>
                                        <th class="align-middle">Nama Produk</th>
                                        <th class="align-middle" width="20%">Total Kebutuhan Satu Tahun</th>
                                        <th class="align-middle">Biaya Kirim</th>
                                        <th class="align-middle">Biaya Simpan</th>
                                        <th class="align-middle" width="10%">Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->barang->nama }}</td>
                                            <td class="text-right text-monospace">
                                                {{ number_format($item->kebutuhan_satu_tahun, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-between text-monospace">
                                                    <span>Rp. </span>
                                                    <span>{{ number_format($item->biaya_kirim, 0, ',', '.') }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-between text-monospace">
                                                    <span>Rp. </span>
                                                    <span>{{ number_format($item->biaya_simpan, 0, ',', '.') }}</span>
                                                </div>
                                            </td>
                                            <td class="text-right text-monospace">
                                                {{ number_format(round($item->rop), 0, ',', '.') }}
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
