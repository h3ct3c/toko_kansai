<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Proses login user/admin.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba login
        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        // Regenerasi session
        $request->session()->regenerate();

        // Cek apakah email mengandung kata "admin"
        $role = auth()->user()->role;

    // Arahkan sesuai role
    if ($role === 'admin') {
        return redirect()->intended(route('dashboard'));
    }

        return redirect()->intended('/'); // arahkan ke halaman utama user
    }

    /**
     * Logout user/admin.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Tampilkan halaman register.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Proses register user baru.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}
