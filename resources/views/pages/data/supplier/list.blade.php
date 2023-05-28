@extends('layouts.app')

@push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush

@push('js')
    @vite('resources/js/pages/data/supplier/list.js')
@endpush

@section('button-side')
    <a href="{{ route('data.supplier.add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                                        <th width="3%">No</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_supplier }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->telepon }}</td>
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
                                                <a class="btn btn-info btn-sm">
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
