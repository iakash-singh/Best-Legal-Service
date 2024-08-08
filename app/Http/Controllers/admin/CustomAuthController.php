<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function login_create(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $check = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($check)) {
            return redirect()->intended('admin/Blog');
        } else {
            return redirect()->back()->with('failure', 'Something went wrong');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect(route('admin.login'));
    }
}
