<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch($locale, Request $request)
    {
        $available = ['id', 'en'];
        if (!in_array($locale, $available)) {
            $locale = config('app.locale');
        }

        $request->session()->put('locale', $locale);


        return redirect()->back();
    }
}
