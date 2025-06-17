<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\kategori;
use App\Models\Feedback;
use App\Models\Artikel;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Menampilkan dashboard admin
    public function index(Request $request)
    {
        // Ambil parameter filter jika ada
        $status = $request->get('status');

        // Query data user dengan role 'user'
        $query = User::where('role', 'user');

        // Jika ada filter status, tambahkan ke query
        if ($status) {
            $query->where('status', $status);
        }

        // Ambil semua hasil
        $users = $query->get();
        $kategoris = Kategori::all(); // ambil semua data kategori
        $artikels = Artikel::with('user', 'kategori')->get();
        $feedbacks = Feedback::with('user')->latest()->get();


        return view('admin.index', compact('users', 'status', 'kategoris','artikels','feedbacks'));
    }

    // Tampilkan detail pengguna
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-detail', compact('user'));
    }

    // Form edit pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-edit', compact('user'));
    }

    // Proses update pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'status' => 'required',
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Hapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin')->with('success', 'Pengguna berhasil dihapus.');
    }
    public function kategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'user_id' => Auth::id(), // Jika ada relasi ke user
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroyKategori($id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();

    return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
}

public function updateKategori(Request $request, $id)
{
    $request->validate([
        'nama_kategori' => 'required|string|max:255',
    ]);

    $kategori = \App\Models\Kategori::findOrFail($id);
    $kategori->nama_kategori = $request->nama_kategori;
    $kategori->save();
    

    return redirect()->back()->with('success', 'Kategori berhasil diperbarui.');
}
public function artikel(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'nama_pembuat' => 'required|string|max:100',
            'kategori_id' => 'required|exists:kategori,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('arti', 'public');
        }

        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'nama_pembuat' => $request->nama_pembuat,
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::id(),
            'foto' => $fotoPath,
        ]);
return redirect()->back()->with('success', 'Artikel berhasil ditambahkan!');

    }
    public function pengguna()
    {
        

        // Query data user dengan role 'user'
        $query = User::where('role', 'user');

        // Jika ada filter status, tambahkan ke query
        

        // Ambil semua hasil
        $users = $query->get();
        $kategoris = Kategori::all(); // ambil semua data kategori
        $artikels = Artikel::with('user', 'kategori')->get();

        return view('admin.pengguna', compact('users', 'kategoris','artikels'));
    }

    // Menampilkan halaman artikel
    public function artikels()
    {


        // Query data user dengan role 'user'
        $query = User::where('role', 'user');

        // Jika ada filter status, tambahkan ke query
        

        // Ambil semua hasil
        $users = $query->get();
        $kategoris = Kategori::all(); // ambil semua data kategori
        $artikels = Artikel::with('user', 'kategori')->get();

        return view('admin.artikel', compact('users', 'kategoris','artikels'));
    }

    // Menampilkan halaman kategori
    public function kategorii()
    {


        // Query data user dengan role 'user'
        $query = User::where('role', 'user');

        // Jika ada filter status, tambahkan ke query
        
        // Ambil semua hasil
        $users = $query->get();
        $kategoris = Kategori::all(); // ambil semua data kategori
        $artikels = Artikel::with('user', 'kategori')->get();

        return view('admin.kategori', compact('users', 'kategoris','artikels'));
    }

    // Menampilkan halaman masukkan pengguna
    public function masukkan()
    {
       
        // Query data user dengan role 'user'
        $feedbacks = Feedback::with('user')->latest()->get();
        return view('admin.feedback', compact('feedbacks'));
    }
    public function markAsRead($id)
{
    $feedback = Feedback::findOrFail($id);
    $feedback->is_read = true;
    $feedback->save();

    return redirect()->back()->with('success', 'Feedback telah ditandai sebagai dibaca.');
}


}
