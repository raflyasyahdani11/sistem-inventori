@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data User
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                251
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
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Supplier
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                14
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class='bx bxs-store-alt bx-md text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Masuk
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                14
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class='bx bxs-right-top-arrow-circle bx-md text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Data Keluar
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                18
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class='bx bxs-right-down-arrow-circle bx-md text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Gudang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                298
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class='bx bxs-truck bx-md text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
