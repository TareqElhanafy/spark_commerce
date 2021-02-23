<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with([
            'message' => 'successfully logout',
            'alert-type' => 'success',
        ]);
    }

    public function changePassowordForm()
    {
        return view('admin.password');
    }

    public function updatePassword(AdminChangePasswordRequest $request)
    {
        $storedPassword = Auth::user()->password;
        $oldPassword = $request->old_password;
        $new_password = $request->password;
        $confirm_password = $request->password_confirmation;
        if (Hash::check($oldPassword, $storedPassword)) {
            if ($new_password !== $confirm_password) {
                return redirect()->back()->with([
                    'message' => 'Passwords not matched',
                    'alert-type' => 'error'
                ]);
            }
            $user = Admin::find(Auth::id());
            $user->password = Hash::make($new_password);
            $user->save();
            Auth::logout();
            return redirect()->route('admin.login')->with([
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'old password you entered is not valid',
                'alert-type' => 'error'
            ]);
        }
    }
}
