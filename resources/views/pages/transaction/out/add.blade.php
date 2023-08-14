@extends('layouts.app')

@push('js')
    @vite('resources/js/pages/transaction/keluar/add.js')
@endpush

@section('content')
    <div class="row">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('out.store') }}">
                        @csrf
                        <input type="hidden" name="trx_masuk_id" id="trx_masuk_id" value="">
                        <div class="form-group">
                            <label for="input-password">Barang</label>
                            <div class="form-group">
                                <select class="form-control" id="barang" name="barang">
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-name">Tanggal Penjualan</label>
                            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"
                                aria-describedby="tanggal_keluar-help">
                            @error('tanggal_keluar')
                                <small id="input-nama-help" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-username">Tanggal Expired</label>
                            <input type="date" class="form-control" id="tanggal_expired" name="tanggal_expired"
                                aria-describedby="input-phone-help" readonly>
                            @error('tanggal_expired')
                                <small id="input-nama-help" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-password">Jumlah Barang</label>
                            <input type="number" class="form-control" id="input-password" name="jumlah"
                                aria-describedby="input-password-help">
                            <small id="input-nama-help" class="form-text text-muted">
                                Stok : <span id="stok">0</span> 
                                {{-- | Batas Aman Stok : <span id="rop">0</span> --}}
                                @error('jumlah')
                                    | <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
