@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <form>
                @csrf
                <div class="form-group">
                    <label for="input-name">Nama</label>
                    <input type="text" class="form-control" id="input-name" aria-describedby="input-name-help">
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="input-phone">Telepon</label>
                    <input type="number" class="form-control" id="input-phone" aria-describedby="input-phone-help">
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="input-username">Username</label>
                    <input type="text" class="form-control" id="input-username" aria-describedby="input-username-help">
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="input-password">Password</label>
                    <input type="password" class="form-control" id="input-password" aria-describedby="input-password-help">
                    {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
