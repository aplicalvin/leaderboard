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

// MEMBER DETAIL
Route::get('/member/detail', function () {
    return view('member-detail');
});

// MENTOR 
Route::get('/mentor', function () {
    return view('mentor');
});

// MENTOR DETAIL
Route::get('/mentor/detail', function () {
    return view('mentor-detail');
});

// CLASS
Route::get('/class', function () {
    return view('class');
});


