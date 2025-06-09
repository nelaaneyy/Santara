<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BeautyPlannerController extends Controller
{
    public function index(): View
    {
        return view('beauty-planner');
    }
}