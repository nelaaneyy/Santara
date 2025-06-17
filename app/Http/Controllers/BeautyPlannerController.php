<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeautyPlanner;
use Illuminate\Support\Facades\Auth;

class BeautyPlannerController extends Controller
{
    public function index()
{
    // Ambil semua planner milik user yang login, urutkan berdasarkan tanggal
    $planners = BeautyPlanner::where('user_id', Auth::id())
        ->orderBy('scheduled_at', 'asc')
        ->get();

    return view('beauty_planner', compact('planners'));
}
public function sort(Request $request)
{
    $query = BeautyPlanner::where('user_id', auth()->id());

    switch ($request->input('sort')) {
        case 'due_date':
            $query->orderBy('scheduled_at');
            break;
        case 'alphabetical':
            $query->orderBy('activity');
            break;
        case 'added_date':
        default:
            $query->orderBy('created_at', 'desc');
            break;
    }

    $planners = $query->get();

    return view('planner-list', compact('planners'));
}


    /**
     * Simpan jadwal baru ke database.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'activity' => 'required|string|max:255',
        'scheduled_at' => 'required|date',
    ]);

    // Cek apakah tanggal yang dipilih adalah hari ini atau masa depan
    if (strtotime($validated['scheduled_at']) < strtotime(date('Y-m-d'))) {
        return redirect()->back()->withErrors([
            'scheduled_at' => 'Tanggal yang dipilih sudah lewat. Silakan pilih tanggal hari ini atau yang akan datang.'
        ])->withInput();
    }

    BeautyPlanner::create([
        'user_id' => Auth::id(),
        'activity' => $validated['activity'],
        'scheduled_at' => $validated['scheduled_at'],
        'is_done' => false,
    ]);

    return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan!');
}
public function toggleDone(Request $request, $id)
{
    $planner = BeautyPlanner::findOrFail($id);
    $planner->is_done = $request->is_done;
    $planner->save();

    return response()->json(['message' => 'Status berhasil diperbarui.']);
}
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'activity' => 'required|string|max:255',
        'scheduled_at' => 'required|date',
    ]);
 if (strtotime($validated['scheduled_at']) < strtotime(date('Y-m-d'))) {
        return redirect()->back()->withErrors([
            'scheduled_at' => 'Tanggal yang dipilih sudah lewat. Silakan pilih tanggal hari ini atau yang akan datang.'
        ])->withInput();
    }
        $planner = BeautyPlanner::findOrFail($id);
        $planner->activity = $request->activity;
        $planner->scheduled_at = $request->scheduled_at;
        $planner->save();

        return redirect()->route('beauty-planners.index')->with('succes', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $planner = BeautyPlanner::findOrFail($id);
        $planner->delete();

        return redirect()->route('beauty-planners.index')->with('successs', 'Kegiatan berhasil dihapus.');
    }
}
