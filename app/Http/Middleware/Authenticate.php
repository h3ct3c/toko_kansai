<?php

protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        return route('login'); // bisa ganti ke 'auth.login' atau apapun
    }
}
