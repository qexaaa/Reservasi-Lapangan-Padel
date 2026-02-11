<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi tetap ada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // LOGIN MANUAL (MD5)
        $user = User::where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email atau password salah'
            ]);
        }

        // Login ke Laravel (tanpa bcrypt)
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect berdasarkan role (STRUKTUR TIDAK DIUBAH)
        if ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role == 'staff') {
            return redirect('/staff/dashboard');
        } else {
            return redirect('/customer/dashboard');
        }
    }

    public function registerForm()
    {
        return view('auth.register');
    }

   public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            // Pesan error saat miss-password
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => md5($request->password),
            'role'     => 'customer',
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
