@extends('layouts.app')

{{-- @push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush --}}

@push('js')
    @vite('resources/js/pages/data/supplier/list.js')
@endpush

@section('button-side')
    <a href="{{ route('supplier.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Supplier
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
                                        <th class="text-center align-middle" width="3%">No</th>
                                        <th class="text-center align-middle">Nama Supplier</th>
                                        <th class="text-center align-middle">Alamat</th>
                                        <th class="text-center align-middle">Telepon</th>
                                        <th class="text-center align-middle" width="7%">Lead Time</th>
                                        <th class="text-center align-middle" width="10%">Biaya Kirim</th>
                                        <th class="text-center align-middle" width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->telepon }}</td>
                                            <td class="text-right text-monospace">{{ $item->lead_time }}</td>
                                            <td>
                                                <div class="d-flex justify-content-between text-monospace">
                                                    <span>Rp.</span>
                                                    <span>{{ number_format($item->biaya_kirim, 0, ',', '.') }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('supplier.edit', $item) }}">
                                                    <span>
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                <form class="d-inline formDelete" method="post"
                                                    action="{{ route('supplier.destroy', $item) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <span>
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                                {{-- <a class="btn btn-info btn-sm" href="{{ route('supplier.show', $item) }}">
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
