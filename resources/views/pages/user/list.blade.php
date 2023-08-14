@extends('layouts.app')

{{-- @push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush --}}

@push('js')
    @vite('resources/js/pages/user/list.js')
@endpush

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive overflow-hidden">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama</th>
                                        <th>No Hp</th>
                                        @can(\App\Permission\Role::SUPER_ADMIN)
                                            <th>Role</th>
                                        @endcan
                                        <th>Username</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            @can(\App\Permission\Role::SUPER_ADMIN)
                                                <td>{{ $item->roles->pluck('name')->implode(', ') }}</td>
                                            @endcan
                                            <td>{{ $item->username }}</td>
                                            <td class="text-center">
                                                @if (App\Permission\Permission::KELOLA_DATA_PENGGUNA)
                                                    @if (!$item->roles->contains('name', \App\Permission\Role::SUPER_ADMIN))
                                                        <a href="{{ route('user.edit', $item) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <span>
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                        </a>
                                                    @else
                                                        @if (auth()->user()->roles->contains('name', \App\Permission\Role::SUPER_ADMIN))
                                                            <a href="{{ route('user.edit', $item) }}"
                                                                class="btn btn-warning btn-sm">
                                                                <span>
                                                                    <i class="fas fa-edit"></i>
                                                                </span>
                                                            </a>
                                                        @endif
                                                    @endif
                                                @endif
                                                @can('delete', $item)
                                                    <form class="d-inline formDelete" method="post"
                                                        action="{{ route('user.destroy', $item) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <span>
                                                                <i class="fas fa-times-circle"></i>
                                                            </span>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
