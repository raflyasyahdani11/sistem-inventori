@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('barang.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="input-username">Kode Barang</label>
                            <input type="text" class="form-control" id="input-username" name="kode"
                                aria-describedby="input-username-help" value="{{ old('kode') }}">
                            @error('kode')
                                <small id="input-nama-help" class="form-text text-danger">
                                    {!! $message !!}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-username">Nama Barang</label>
                            <input type="text" class="form-control" id="input-username" name="nama"
                                aria-describedby="input-username-help" value="{{ old('nama') }}">
                            @error('nama')
                                <small id="input-nama-help" class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-password">Jenis Barang</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="jenis">
                                    @foreach ($jenisBarang as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == old('jenis'))>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('jenis')
                                <small id="input-nama-help" class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-password">Jumlah Barang</label>
                            <input type="number" class="form-control" id="input-password" name="jumlah"
                                aria-describedby="input-password-help" value="{{ old('jumlah') }}">
                            @error('jumlah')
                                <small id="input-nama-help" class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-password">Satuan</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="satuan">
                                    @foreach ($satuanBarang as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == old('satuan'))>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('satuan')
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
