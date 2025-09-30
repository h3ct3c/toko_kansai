<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Tampilkan halaman profil (GET /profile)
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // Form edit (GET /profile/edit)
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Simpan perubahan (PUT /profile)
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'current_password' => 'nullable|string',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update nama
        $user->name = $request->name;

        // Update password kalau diisi
        if ($request->filled('password')) {
            // Cek password lama dulu
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password lama salah.']);
            }

            $user->password = Hash::make($request->password);
        }

        // Update avatar kalau ada file baru
        if ($request->hasFile('avatar')) {
            // Hapus lama kalau ada
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Simpan baru
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
