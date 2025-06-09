<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ensure Auth facade is imported if not already


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/beauty-planner', function () {
    return view('beauty_planner');
})->name('beauty.planner');

// Route for the "View Profile" page (resources/views/profile.blade.php)
Route::get('/profile', function () {
    return view('profile'); // Points to views/profile.blade.php
})->name('profile.view'); // Correct route name for the view page

// Route for the "Edit Profile" form (resources/views/profile/edit-profile.blade.php)
// This route is used when clicking "Edit Profile" from settings dropdown or "EDIT PROFILE" button on view page.
Route::get('/profile/edit', function () {
    return view('profile.edit-profile'); // CORRECTED: Use dot notation for nested view
})->name('profile.edit'); // Correct route name for the edit form

// Route to handle profile update (POST request from the edit form)
Route::post('/profile/update', function (Request $request) {
    // IMPORTANT: Implement your actual profile update logic here (validation, saving to DB)
    if (Auth::check()) {
        // Example: Auth::user()->update($request->only(['username', 'email', 'password']));
        return redirect()->route('profile.view')->with('success', 'Profile updated successfully!');
    }
    return redirect()->back()->with('error', 'Authentication required to update profile.');
})->name('profile.update');


// Authentication Routes
// Recommended POST route for logout
Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('register'); // Redirect to signup/register page
})->name('logout');

// REMOVED: Duplicate and problematic GET /logout route
// Your provided code had this, it's safer to only have the POST one.
// Route::get('/logout', function (Request $request) {
//     Auth::guard('web')->logout();
//     $request->session()->invalidate();
//     $request->session()->regenerateToken();
//     return redirect()->route('register');
// })->name('logout');


Route::get('/register', function () {
    return view('auth.register'); // Placeholder for your actual registration view
})->name('register');