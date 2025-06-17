<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        
        return view('login'); // Sesuaikan dengan nama file blade kamu (resources/views/login.blade.php)
    }

    // Proses login
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Coba autentikasi
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // Login berhasil
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            
            return redirect('/admin')->with('success', 'Welcome back, ' . $user->name . '!');
        }
        if ($user->role === 'user'){
        return redirect('/')->with('success', 'Welcome back, ' . $user->name . '!');
        }
    }

    // Login gagal
    return back()->withErrors([
        'email' => 'Email or password is incorrect.',
    ])->withInput();
}

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('succes', 'You have been logged out.');
    }
}
