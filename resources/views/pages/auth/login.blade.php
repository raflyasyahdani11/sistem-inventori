@extends('layouts.auth')

@section('style')
    <style>
        .form-group select.form-control {
            font-size: 0.5rem !important;
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-xl-6 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        </div>
                        <form class="user" action="{{ route('auth.login.post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="input-email"
                                    name="username" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                <small></small>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                    name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <select class="form-control rounded-pill" id="exampleFormControlSelect1">
                                    <option hidden>Masuk Sebagai</option>
                                    <option>Admin</option>
                                    <option>Pemilik Toko</option>
                                    <option>Petugas Gudang</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        {{-- <hr>
                        <div class="text-center">
                            <a class="small" href="register.html">Create an Account!</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
