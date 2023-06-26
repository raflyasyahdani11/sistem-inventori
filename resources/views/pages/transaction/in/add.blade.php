@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('in.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="input-password">Barang</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="barang">
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-name">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="input-phone" name="tanggal_masuk"
                                aria-describedby="input-phone-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-username">Tanggal Expired</label>
                            <input type="date" class="form-control" id="input-phone" name="tanggal_expired"
                                aria-describedby="input-phone-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-password">Jumlah Barang</label>
                            <input type="number" class="form-control" id="input-password" name="jumlah"
                                aria-describedby="input-password-help">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-password">Supplier</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="supplier">
                                    @foreach ($supplier as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
