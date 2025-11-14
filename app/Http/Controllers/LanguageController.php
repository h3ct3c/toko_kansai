<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch($locale, Request $request)
    {
        $available = ['id', 'en']; // daftar locale yg valid
        if (!in_array($locale, $available)) {
            $locale = config('app.locale');
        }

        $request->session()->put('locale', $locale);

        // kalau mau simpan di DB (user login), tambahkan logika update user->locale

        // balik ke halaman sebelumnya
        return redirect()->back();
    }
}
