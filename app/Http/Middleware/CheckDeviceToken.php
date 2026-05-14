<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserToken;

class CheckDeviceToken
{
    public function handle(Request $request, Closure $next)
    {
        // Jika user belum login di sesi ini, tapi punya Cookie kita
        if (!Auth::check() && $request->hasCookie('device_auth_token')) {
            $token = $request->cookie('device_auth_token');

            // Cari token di database yang statusnya masih 'login'
            $validToken = UserToken::where('token', $token)
                ->where('status', 'login')
                ->first();

            if ($validToken) {
                // Loginkan user tersebut secara diam-diam di background
                Auth::loginUsingId($validToken->user_id);
            } else {
                // Jika token tidak valid / sudah logout, hapus cookienya
                cookie()->queue(cookie()->forget('device_auth_token'));
            }
        }

        return $next($request);
    }
}
