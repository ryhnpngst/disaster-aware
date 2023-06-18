<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function index() {
        return view('admin.auth.login');
    }

    public function loginProcess(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('admin.admin.dashboard')->with('success', 'Login berhasil');
        } else {
            return redirect()->route('login')->with('error', 'Email atau password salah');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil');
    }

    public function register() {
        return view('admin.auth.register');
    }

    public function registerProcess(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ], [
            'password_confirmation.same' => 'The password confirmation does not match.',
        ]);

        $data = [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);

        return redirect()->route('login')->with('success', 'Register berhasil');
    }
}
