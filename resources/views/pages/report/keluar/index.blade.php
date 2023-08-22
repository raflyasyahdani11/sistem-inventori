@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="text-center">
                                Laporan Barang <span class="text-danger"><b>Penjualan</b></span>
                            </h5>
                            <hr>
                            <form class="mt-4" action="{{ route('report.transaction_out.download') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="dari_tanggal">Dari Tanggal :</label>
                                            <input type="date" class="form-control" id="dari_tanggal" name="dari_tanggal"
                                                aria-describedby="dari_tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="sampai_tanggal">Sampai Tanggal :</label>
                                            <input type="date" class="form-control" id="sampai_tanggal"
                                                name="sampai_tanggal" aria-describedby="sampai_tanggal" value="{{ \Carbon\Carbon::now()->addMonths(1)->format('Y-m-d') }}">
                                        </div>
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
