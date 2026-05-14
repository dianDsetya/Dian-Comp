<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Model untuk Admin

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Jika sudah login admin, langsung ke dashboard admin
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard.index');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Proses Login Admin
        // Menggunakan 'name' sesuai konfigurasi tabel users Anda sebelumnya
        $credentials = [
            'name'     => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard.index');
        }

        // Jika Gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Setelah logout admin, lempar ke landing page
        return redirect()->url('/');
    }
}
