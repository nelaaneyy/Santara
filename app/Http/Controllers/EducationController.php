<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        // $journal = Journal::where('user_id', Auth::id())
        // ->get();

    $artikels = \App\Models\Artikel::latest()->take(5)->get(); // Batasi 5 jika ingin seperti sebelumnya
    return view('education', compact('artikels'));
    }
    public function inder()
    {
        // $journal = Journal::where('user_id', Auth::id())
        // ->get();

    return view('rekomendasi');
    }
    public function indeb()
    {
        // $journal = Journal::where('user_id', Auth::id())
        // ->get();

    $artikels = \App\Models\Artikel::latest()->take(5)->get(); // Batasi 5 jika ingin seperti sebelumnya
    return view('bookmark', compact('artikels'));
    }
}
