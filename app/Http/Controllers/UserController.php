<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $request->validate([

            'nama'=>'required',

            'username'=>'required|unique:users',

            'password'=>'required|min:6',

            'role'=>'required'

        ]);

        User::create([

            'nama'=>$request->nama,

            'username'=>$request->username,

            'password'=>Hash::make($request->password),

            'role'=>$request->role

        ]);

        return redirect()->route('users.index')
            ->with('success','User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $request->validate([

            'nama'=>'required',

            'username'=>'required|unique:users,username,'.$user->id,

            'role'=>'required'

        ]);

        $user->update([

            'nama'=>$request->nama,

            'username'=>$request->username,

            'role'=>$request->role

        ]);

        return redirect()->route('users.index')
            ->with('success','User berhasil diubah');
    }

    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->route('users.index')
            ->with('success','User berhasil dihapus');
    }

}