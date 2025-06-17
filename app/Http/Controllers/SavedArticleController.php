<?php

namespace App\Http\Controllers;

use App\Models\SavedArticle;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedArticleController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $artikelFavorit = Artikel::whereHas('SavedArticle', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->latest()->get();

        return view('bookmark', compact('artikelFavorit'));
    }

    public function store(Request $request, $artikelId)
    {
        $userId = Auth::id();

        // Cegah duplikat
        SavedArticle::firstOrCreate([
            'user_id' => $userId,
            'artikel_id' => $artikelId
        ]);

        return back()->with('success', 'Artikel berhasil disimpan.');
    }

    public function destroy($artikelId)
    {
        $userId = Auth::id();

        SavedArticle::where('user_id', $userId)
                    ->where('artikel_id', $artikelId)
                    ->delete();

        return back()->with('success', 'Artikel berhasil dihapus dari simpanan.');
    }
}
