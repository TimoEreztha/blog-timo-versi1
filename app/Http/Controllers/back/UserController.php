<?php

namespace App\Http\Controllers\back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    //
    public function index() {
        if(auth()->user()->role  == 'admin') {
            $users = User::get();
        } else {
            $users = User::whereId(auth()->user()->id)->get();
        }
        return view('dashboard.user.index',[
            'users' => $users
        ]);
    }
    public function create() {
        return view('dashboard.user.create-users');
    }
    public function store(UserRequest $request) {
        // Membuat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect atau melakukan hal lain setelah registrasi berhasil
        return redirect()->route('users.index')->with('success', 'Registration successful!');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.user.edit-users', compact('user'));
    }
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save(); 
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }
    public function destroy(User $user)
    {
        // Menghapus user
        $user->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }

}
