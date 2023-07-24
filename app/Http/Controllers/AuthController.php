<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostLoginRequest;

class AuthController extends Controller
{
    public function login(PostLoginRequest $request)
    {
        $input = $request->only(['username', 'password']);

        $isSuccess = Auth::attempt($input);

        if ($isSuccess) {
            return redirect()->route('auth.login');
        }

        return redirect()->back();
    }

    function logout()
    {
        Auth::logout();
        
        return redirect()->route('auth.login');
    }
}
