@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <form>
                @csrf
                <div class="form-group">
                    <label for="input-name">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="input-phone" aria-describedby="input-phone-help">
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="input-phone">Barang</label>
                    <input type="text" class="form-control" id="input-name" aria-describedby="input-name-help">
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="input-username">Tanggal Expired</label>
                    <input type="date" class="form-control" id="input-phone" aria-describedby="input-phone-help">
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="input-password">Jumlah Barang</label>
                    <input type="number" class="form-control" id="input-password" aria-describedby="input-password-help">
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="input-password">Total Stok</label>
                    <input type="number" class="form-control" id="input-password" aria-describedby="input-password-help">
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="input-password">Supplier</label>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Supplier Barang 1</option>
                            <option>Supplier Barang 2</option>
                        </select>
                    </div>
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
