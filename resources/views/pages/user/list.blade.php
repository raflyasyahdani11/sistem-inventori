@extends('layouts.app')

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
                                        <th>Username</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Chief Executive Officer (CEO)</td>
                                        <td>London</td>
                                        <td>47</td>
                                        <td>$1,200,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    @vite('resources/js/pages/datatable-custom.css')
@endpush

@push('js')
    @vite('resources/js/pages/user/list.js')
@endpush
