<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EducationController;
use Symfony\Component\Routing\Tests\Fixtures\AttributeFixtures\RouteWithEnv;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/meetourteam', function () {
    return view('meetourteam');
})->name('meetourteam');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/forgotpassword', function () {
    return view('forgotpassword');
})->name('forgotpassword');