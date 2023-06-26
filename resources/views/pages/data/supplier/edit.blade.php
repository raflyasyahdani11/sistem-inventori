@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('supplier.update', $supplier) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="input-name">Nama Supplier</label>
                            <input type="text" class="form-control" id="input-name" name="nama"
                                value="{{ old('nama', $supplier->nama) }}" aria-describedby="input-name-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-username">Alamat</label>
                            <input type="text" class="form-control" id="input-username" name="alamat"
                                value="{{ old('alamat', $supplier->alamat) }}" aria-describedby="input-username-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-password">Telepon</label>
                            <input type="text" class="form-control" id="input-password" name="telepon"
                                value="{{ old('telepon', $supplier->telepon) }}" aria-describedby="input-password-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="biaya_kirim">Biaya Kirim</label>
                            <input type="number" class="form-control" id="biaya_kirim" name="biaya_kirim"
                                value="{{ old('biaya_kirim', $supplier->biaya_kirim) }}"
                                aria-describedby="input-password-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
