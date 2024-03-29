@extends('layouts.app')

@push('js')
    @vite('resources/js/pages/transaction/masuk/add.js')
@endpush

@section('content')
    <div class="d-none" data-barang-get="{{ route('barang.get', ':id') }}" id="url"></div>
    <div class="row">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('in.store') }}">
                        @csrf
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
                            <label for="tanggal_masuk">Tanggal Pembelian</label>
                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                aria-describedby="tanggal_masuk-help"> {{-- readonly--}
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="tanggal_expired">Tanggal Expired</label>
                            <input type="date" class="form-control" id="tanggal_expired" name="tanggal_expired"
                                aria-describedby="tanggal_expired-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-password">Jumlah Barang</label>
                            <input type="number" class="form-control" id="input-password" name="jumlah"
                                aria-describedby="input-password-help">
                            <small id="input-nama-help" class="form-text text-muted">
                                EOQ : <span id="eoq">0</span>
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
