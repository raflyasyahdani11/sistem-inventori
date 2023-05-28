@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="text-center">
                                Laporan Barang <span class="text-success"><b>Masuk</b></span>
                            </h5>
                            <hr>
                            <form action="" class="mt-4">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option hidden>Pilih Bulan</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option hidden>Pilih Tahun</option>
                                            @php
                                                $i = (int) date('Y');
                                            @endphp
                                            @for ($i; $i >= 2020; $i--)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fas fa-file-download"></i> Download
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="text-center">
                                Laporan Barang <span class="text-danger"><b>Keluar</b></span>
                            </h5>
                            <hr>
                            <form action="" class="mt-4">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option hidden>Pilih Bulan</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option hidden>Pilih Tahun</option>
                                            @php
                                                $i = (int) date('Y');
                                            @endphp
                                            @for ($i; $i >= 2020; $i--)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fas fa-file-download"></i> Download
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
