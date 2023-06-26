@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('supplier.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="input-name">Nama Supplier</label>
                            <input type="text" class="form-control" id="input-name" name="nama"
                                aria-describedby="input-name-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-username">Alamat</label>
                            <input type="text" class="form-control" id="input-username" name="alamat"
                                aria-describedby="input-username-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-password">Telepon</label>
                            <input type="number" class="form-control" id="input-password" name="telepon"
                                aria-describedby="input-password-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="biaya_kirim">Biaya Kirim</label>
                            <input type="number" class="form-control" id="biaya_kirim" name="biaya_kirim"
                                aria-describedby="input-password-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="biaya_kirim">Lead Time</label>
                            <input type="number" class="form-control" id="lead_time" name="lead_time"
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
