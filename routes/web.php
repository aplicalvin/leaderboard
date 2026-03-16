<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// LEADERBOARD
Route::get('/leaderboard', function () {
    return view('leaderboard');
});

// MEMBER
Route::get('/member', function () {
    return view('member');
});

// MENTOR 
Route::get('/mentor', function () {
    return view('mentor');
});

// CLASS
Route::get('/class', function () {
    return view('class');
});


