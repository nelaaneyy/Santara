<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }

    public function beautyPlanner()
    {
        return view('beauty_planner');
    }

    public function profile()
    {
        return view('profile');
    }
}
