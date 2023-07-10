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
                            <form class="mt-4" action="{{ route('report.transaction_in.download') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-6">
                                        @php
                                            $currentMonth = date('m');
                                        @endphp
                                        <select class="form-control" id="bulan-masuk" name="bulan">
                                            <option hidden>Pilih Bulan</option>
                                            <option value="1" @selected($currentMonth == '1')>Januari</option>
                                            <option value="2" @selected($currentMonth == '2')>Februari</option>
                                            <option value="3" @selected($currentMonth == '3')>Maret</option>
                                            <option value="4" @selected($currentMonth == '4')>April</option>
                                            <option value="5" @selected($currentMonth == '5')>Mei</option>
                                            <option value="6" @selected($currentMonth == '6')>Juni</option>
                                            <option value="7" @selected($currentMonth == '7')>Juli</option>
                                            <option value="8" @selected($currentMonth == '8')>Agustus</option>
                                            <option value="9" @selected($currentMonth == '9')>September</option>
                                            <option value="10" @selected($currentMonth == '10')>Oktober</option>
                                            <option value="11" @selected($currentMonth == '11')>November</option>
                                            <option value="12" @selected($currentMonth == '12')>Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" id="tahun-masuk" name="tahun">
                                            <option hidden>Pilih Tahun</option>
                                            @php
                                                $i = (int) date('Y');
                                                $toYear = 2020;
                                            @endphp
                                            @for ($i; $i >= $toYear; $i--)
                                                <option @selected(date('Y') == $i)>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
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
                            <form class="mt-4" action="{{ route('report.transaction_out.download') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-6">
                                        @php
                                            $currentMonth = date('m');
                                        @endphp
                                        <select class="form-control" id="bulan-keluar" name="bulan">
                                            <option hidden>Pilih Bulan</option>
                                            <option value="1" @selected($currentMonth == '1')>Januari</option>
                                            <option value="2" @selected($currentMonth == '2')>Februari</option>
                                            <option value="3" @selected($currentMonth == '3')>Maret</option>
                                            <option value="4" @selected($currentMonth == '4')>April</option>
                                            <option value="5" @selected($currentMonth == '5')>Mei</option>
                                            <option value="6" @selected($currentMonth == '6')>Juni</option>
                                            <option value="7" @selected($currentMonth == '7')>Juli</option>
                                            <option value="8" @selected($currentMonth == '8')>Agustus</option>
                                            <option value="9" @selected($currentMonth == '9')>September</option>
                                            <option value="10" @selected($currentMonth == '10')>Oktober</option>
                                            <option value="11" @selected($currentMonth == '11')>November</option>
                                            <option value="12" @selected($currentMonth == '12')>Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" id="tahun-keluar" name="tahun">
                                            <option hidden>Pilih Tahun</option>
                                            @php
                                                $i = (int) date('Y');
                                                $toYear = 2020;
                                            @endphp
                                            @for ($i; $i >= $toYear; $i--)
                                                <option @selected(date('Y') == $i)>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
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
