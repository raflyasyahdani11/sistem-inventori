@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('barang.update', $barang) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="input-username">Nama Barang</label>
                            <input type="text" class="form-control" id="input-username" name="nama"
                                aria-describedby="input-username-help" value="{{ old('nama', $barang->nama) }}">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-password">Jenis Barang</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="jenis">
                                    @foreach ($jenisBarang as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $barang->jenis_barang->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-password">Jumlah Barang</label>
                            <input type="number" class="form-control" id="input-password" name="jumlah"
                                aria-describedby="input-password-help" value="{{ old('jumlah', $barang->jumlah) }}">
                            {{-- <small id="input-nama-help" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="input-password">Satuan</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="satuan">
                                    @foreach ($satuanBarang as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $barang->satuan_barang->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
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
