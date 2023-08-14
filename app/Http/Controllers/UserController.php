<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Permission\Role as PermissionRole;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Pengguna';
        $data = User::all();

        return view('pages.user.list')
            ->with(compact('title'))
            ->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Pengguna';
        $roles = Role::where('name', '!=', PermissionRole::SUPER_ADMIN)->get();

        return view('pages.user.add')
            ->with(compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->post('nama'),
            'username' => $request->post('username'),
            'no_hp' => $request->post('no_hp'),
            'password' => password_hash($request->post('password'), PASSWORD_DEFAULT),
        ]);

        if ($user instanceof User) {
            $user->assignRole($request->post('role'));
        } else {
            //
        }

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title = 'Edit Pengguna';
        $roles = Role::where('name', '!=', PermissionRole::SUPER_ADMIN)->get();

        return view('pages.user.edit')
            ->with(compact('title'))
            ->with(compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $updatedRow = $user->update([
            'name' => $request->post('nama'),
            'username' => $request->post('username'),
            'no_hp' => $request->post('no_hp'),
        ]);

        if ($updatedRow > 0) {
            $user->syncRoles($request->post('role'));
            
            if ($request->post('password')) {
                $user->update([
                    'password' => password_hash($request->post('password'), PASSWORD_DEFAULT),
                ]);
            }
        } else {
            // Gagal Update
        }

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $isDeleted = $user->delete();

        if ($isDeleted) {
            // Berhasil Delete
        } else {
            // Gagal Delete
        }

        return redirect()->route('user.index');
    }
}