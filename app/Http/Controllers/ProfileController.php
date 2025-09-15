<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // nanti isi logic update user
        return back()->with('status', 'Profile berhasil diperbarui!');
    }

    public function destroy(Request $request)
    {
        // nanti isi logic hapus akun
        return redirect('/')->with('status', 'Akun berhasil dihapus!');
    }
}
