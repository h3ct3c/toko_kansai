<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Http; // jangan lupa ini

class RegisteredUserController extends Controller
{
    /**
     * Show registration form
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function store(Request $request): RedirectResponse
    {
        // validasi input + captcha
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'g-recaptcha-response' => ['required'], // captcha wajib
        ]);

        // cek captcha ke Google
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret'   => config('services.recaptcha.secret'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );

        $result = $response->json();

        if (!($result['success'] ?? false)) {
            return back()->withErrors([
                'g-recaptcha-response' => 'Captcha harus dicentang dulu.',
            ])->withInput();
        }

        // bikin user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard'); // ganti sesuai route projectmu
    }
}
