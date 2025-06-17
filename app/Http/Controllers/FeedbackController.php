<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;


class FeedbackController extends Controller
{
    public function index()
    {
        // $journal = Journal::where('user_id', Auth::id())
        // ->get();
$feedbacks = Feedback::where('user_id', auth()->id())->latest()->get();
     // Batasi 5 jika ingin seperti sebelumnya
    return view('feedback', compact('feedbacks'));
    }
    public function store(Request $request)
{
    $request->validate([
            'jenis' => 'required|in:feedback,laporanbug',
            'isi' => 'required|string|max:1000',
        ]);

        Feedback::create([
            'user_id' => auth()->id(),
            'jenis'   => $request->jenis,
            'isi'     => $request->isi,
            'is_read' => false, // default belum dibaca
        ]);

        return redirect()->back()->with('success', 'Masukkan berhasil dikirim!');
}

}
