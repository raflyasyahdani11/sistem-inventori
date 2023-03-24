<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function showDashboard()
    {
        $title = 'Dashboard';

        return view('pages.dashboard')->with(compact('title'));
    }

    public function showListUser()
    {
        $title = 'Daftar Pengguna';

        return view('pages.user.list')->with(compact('title'));
    }

    public function showAddUser()
    {
        $title = 'Tambah Pengguna';

        return view('pages.user.add')->with(compact('title'));
    }

    public function showLogin()
    {
        $title = 'Login';

        return view('pages.auth.login')->with(compact('title'));
    }
}
