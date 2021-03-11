<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    public function store(AddUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users')->with([
            'alert-type' => 'success',
            'message' => 'New User added successfully'
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users')->with([
                'alert-type' => 'error',
                'message' => 'There is no user with such an id'
            ]);
        }

        return view('admin.user.edit', compact('user'));
    }

    public function update(AddUserRequest $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users')->with([
                'alert-type' => 'error',
                'message' => 'There is no user with such an id'
            ]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.users')->with([
            'alert-type' => 'success',
            'message' => 'User updated successfully'
        ]);
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users')->with([
                'alert-type' => 'error',
                'message' => 'There is no user with such an id'
            ]);
        }

        $user->delete();
        return redirect()->route('admin.users')->with([
            'alert-type' => 'success',
            'message' => 'User deleted successfully'
        ]);
    }
}
