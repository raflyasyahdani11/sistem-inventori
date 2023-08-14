@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form autocomplete="off" method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="input-name">Nama</label>
                            <input type="text" class="form-control" name="nama" id="input-name"
                                aria-describedby="input-name-help" autocomplete="off" value="{{ old('nama') }}">
                            @error('nama')
                                <small id="input-nama-help" class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-phone">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="input-phone"
                                aria-describedby="input-phone-help" autocomplete="off" value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <small id="input-nama-help" class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-username">Username</label>
                            <input type="text" class="form-control" name="username" id="input-username"
                                aria-describedby="input-username-help" autocomplete="off" value="{{ old('username') }}">
                            @error('username')
                                <small id="input-nama-help" class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-username">Password</label>
                            <input type="password" class="form-control" name="password" id="input-password"
                                aria-describedby="input-password-help" autocomplete="off">
                            @error('password')
                                <small id="input-nama-help" class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-username">Role</label>
                            <div class="form-group">
                                <select class="form-control" id="select-role" name="role">
                                    <option hidden>Pilih Role User</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->name }}" @selected(old('role') == $item->name)>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                                <small id="input-nama-help" class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
