@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="input-name">Nama</label>
                            <input type="text" class="form-control" name="nama" id="input-name"
                                aria-describedby="input-name-help" value={{ $user->name }} autocomplete="off" disabled>
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-phone">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="input-phone"
                                aria-describedby="input-phone-help" value={{ $user->no_hp }} autocomplete="off" disabled>
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-username">Username</label>
                            <input type="text" class="form-control" name="username" id="input-username"
                                aria-describedby="input-username-help" value={{ $user->username }} autocomplete="off"
                                disabled>
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection