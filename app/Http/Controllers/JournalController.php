<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journal = Journal::where('user_id', Auth::id())
        ->get();

    return view('journal', compact('journal'));
    }
    public function menulis()
    {
        // $planners = BeautyPlanner::where('user_id', Auth::id())
        // ->orderBy('scheduled_at', 'asc')
        // ->get();

    return view('menulis');
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
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Journal::create([
            'user_id' => Auth::id(),
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
        ]);
        

        return redirect()->back()->with('success', 'Jurnal berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journal $journal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->delete();

        return redirect()->route('journal.index')->with('successs', 'Journal berhasil dihapus.');
    }
}
