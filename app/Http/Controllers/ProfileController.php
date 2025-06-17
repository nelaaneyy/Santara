<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Menampilkan form edit profil
    public function edit()
    {
        return view('profile.edit-profile');
    }

    // Menyimpan perubahan profil
    public function update(Request $request)
{

    $user = Auth::user();
//     dd([
//     'input_password' => $request->current_password,
//     'db_password' => $user->password,
//     'match' => Hash::check($request->current_password, $user->password),
// ]);

    // dd($request->current_password, $user->password);        

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'current_password' => 'required_with:password',
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Jika user ingin mengganti password
    if ($request->filled('password')) {
        // dd($request->current_password, $user->password); 
        // Verifikasi password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.'])->withInput();
        }

        // Update password
        $user->password = Hash::make($request->password);
    }

    // Update field lain
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return redirect()->route('profile.view')->with('success', 'Profil berhasil diperbarui.');
}
}
