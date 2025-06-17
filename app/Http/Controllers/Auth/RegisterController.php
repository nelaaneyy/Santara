<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    // Tampilkan form register
    public function show()
    {
        return view('signup'); // Pastikan file blade-nya di resources/views/auth/register.blade.php
    }

    // Proses register
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', // confirmed butuh input password_confirmation
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // tambahkan kolom lain kalau perlu
        ]);

        // Otomatis login user setelah register (opsional)
        // auth()->login($user);

        // Redirect ke halaman dashboard atau home
        return redirect()->route('login')->with([
    'success' => 'Registration successful! Welcome to Santara.'
]);
    }
}
