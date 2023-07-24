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
                                aria-describedby="input-name-help" autocomplete="off">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-phone">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="input-phone"
                                aria-describedby="input-phone-help" autocomplete="off">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-username">Username</label>
                            <input type="text" class="form-control" name="username" id="input-username"
                                aria-describedby="input-username-help" autocomplete="off">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-username">Role</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option hidden>Pilih Role User</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
