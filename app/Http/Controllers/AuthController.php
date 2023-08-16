<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostLoginRequest;
use App\Permission\Role;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    public function login(PostLoginRequest $request)
    {
        $input = $request->only(['username', 'password']);

        $isSuccess = Auth::attempt($input);

        if ($isSuccess) {
            if ($user->hasRole(Role::KARYAWAN)) {
                return redirect()->route(RouteServiceProvider::KARYAWAN_HOME);
            }

            return redirect()->route(RouteServiceProvider::HOME);
        }

        $message = 'User atau password salah';
        $type = 'danger';

        return redirect()->back()->with(compact('message', 'type'))->withInput();
    }

    function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
