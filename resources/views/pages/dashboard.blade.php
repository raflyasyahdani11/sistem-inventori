@extends('layouts.app')

@push('js')
    @vite('resources/js/pages/dashboard.js')
@endpush

@section('content')
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data User
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $count->user }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class='bx bxs-user bx-md text-gray-300'></i>
                            {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Supplier
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $count->supplier }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class='bx bxs-store-alt bx-md text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Transaksi Pembelian
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $count->trx_in }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class='bx bxs-right-down-arrow-circle bx-md text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Transaksi Penjualan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $count->trx_out }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class='bx bxs-right-top-arrow-circle bx-md text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="d-none" id="datas" data-barang-terlaris="{{ $barangTerlaris }}"
            data-barang-terbanyak="{{ $barangTerbanyak }}">
        </div>
        <div class="col-xl-7 col-md-7 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Barang Paling Laris</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="barang_terlaris"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-md-5 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Barang Paling Banyak</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="barang_terbanyak"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
