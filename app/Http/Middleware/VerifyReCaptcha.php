<?php
namespace App\Http\Middleware;
public function handle($request, Closure $next)
{
    $token = $request->input('g-recaptcha-response');
    if (!$token) {
        return back()->withErrors(['recaptcha' => 'Isi reCAPTCHA.']);
    }

    $res = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => env('RECAPTCHA_SECRET'),
        'response' => $token,
        'remoteip' => $request->ip(),
    ])->json();

    if (empty($res['success']) || $res['success'] !== true) {
        \Log::warning('reCAPTCHA middleware failed', ['resp' => $res]);
        return back()->withErrors(['recaptcha' => 'Verifikasi reCAPTCHA gagal.']);
    }

    return $next($request);
}
