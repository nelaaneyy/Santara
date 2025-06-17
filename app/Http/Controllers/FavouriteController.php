<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
// use App\Models\Favorite;
use App\Models\Artikel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $journal = Journal::where('user_id', Auth::id())
        // ->get();
        $userId = Auth::id();

        // Ambil daftar artikel yang difavoritkan oleh user
        $artikelFavorit = Artikel::whereHas('favourite', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->latest()->get();

        // Kirim ke view
        return view('favorit', compact('artikelFavorit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favourite $favourite)
    {
        //
    }
    public function favorite(Request $request)
{
    $userId = auth()->id();
    $artikelId = $request->input('artikel_id');

    // Simpan ke tabel favorites (pastikan tabel & relasi sudah ada)
    DB::table('favorites')->insert([
        'user_id' => $userId,
        'artikel_id' => $artikelId,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Artikel ditambahkan ke favorit!');
}

}
