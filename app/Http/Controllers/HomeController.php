<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman home.
     */
    public function index()
    {
         $artikels = \App\Models\Artikel::latest()->take(5)->get(); // Batasi 5 jika ingin seperti sebelumnya
    return view('home', compact('artikels'));
        // return view('home');
    }
}
